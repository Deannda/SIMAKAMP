<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use PDF;
use App\Penduduk;
use App\Desa;
use App\Nomorsurat;
use App\Suratjagadesa;

class suratjagadesaController extends Controller
{

	public function index($id_no)
	{

		$this->authorize('isDesa');
		$penduduk = Penduduk::where('id_desa','=',auth()->user()->id_desa)->get();

			// arahkan ke form suratnya ok :)
		return view('formsurat/suratJagadesa',['penduduk' => $penduduk,'id_noSurat' => $id_no]);
	}
	public function cetaksuratjagadesa(Request $request,$id_noSurat)
	{
			$desa = Desa::where('id_desa',Auth()->user()->id_desa)->with('kabupaten', 'kecamatan')->get();

		// 2. data penduduk
			// relasinya sesuaikan dengan data yang dibutuhkan di template surat
			$penduduk = Penduduk::where('nik','=',$request['nik'])->with('kk','jeniskelamin','pekerjaans','kewarganegaraans','statusperkawinan','agamaa')->get();
	
		// 3. tanggal surat
			$tglSurat = date('Y-m-d');
		

			$insert = Suratjagadesa::create([
				'tanggal_surat' => $tglSurat,
				'lampiran' => $request['lampiran'],
				'keterangan' => $request['keterangan'],
			]);

			//untuk mengambil id dari insert data yg di atas
			$idinsertsurat = $insert->id;

		// 4. no surat
			// nosurat didapat dari hasil insert data ke database
			// panggil format nosuratnya 
			$formatnomorsurat = Nomorsurat::where('id_no','=',$id_noSurat)->first();
			
			$nosurat = $formatnomorsurat->no_surat.'/'.date('Y').'/'.$idinsertsurat;
				
		// 5.panggil data surat yang sudah di insertkan
			$datasurat = Suratjagadesa::where('nomor_surat',$idinsertsurat)->get();

		// kalau sudah dipanggil semua data yang dibutuhkan tinggal di masukkan kedalam view suratnya
		$view = \View::make('surat/jagadesa',['desa' =>$desa,'penduduk' => $penduduk, 'nosurat' =>$nosurat, 'tanggalsurat' => $tglSurat, 'datasurat' => $datasurat, 'kop' => $request['kop']]);

		$html_content = $view->render();

		PDF::SetTitle('Surat Permohonan Jaga Desa PDF');
		PDF::AddPage();
		PDF::writeHTML($html_content, true, false, true, false, '');

		PDF::output('cetaksuratjagadesa.pdf');
	}

	

}