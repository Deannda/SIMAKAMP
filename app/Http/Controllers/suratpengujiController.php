<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use PDF;
use App\Penduduk;
use App\Desa;
use App\Nomorsurat;
use App\Suratpenguji;

class suratpengujiController extends Controller
{

	public function index($id_no)
	{

		$this->authorize('isDesa');
		$penduduk = Penduduk::where('id_desa','=',auth()->user()->id_desa)->get();

			// arahkan ke form suratnya ok :)
		return view('formsurat/suratPenguji',['penduduk' => $penduduk,'id_noSurat' => $id_no]);
	}
	public function cetaksuratpenguji(Request $request,$id_noSurat)
	{
				$desa = Desa::where('id_desa',Auth()->user()->id_desa)->with('kabupaten', 'kecamatan')->get();

		// 2. data penduduk
			// relasinya sesuaikan dengan data yang dibutuhkan di template surat
			$penduduk = Penduduk::where('nik','=',$request['nik'])->with('kk','jeniskelamin','pekerjaans','kewarganegaraans','statusperkawinan','agamaa')->get();
	
		// 3. tanggal surat
			$tglSurat = date('Y-m-d');
		

			$insert = Suratpenguji::create([
				'nik' => $request['nik'],
				'keterangan1' => $request['keterangan1'],
				'tanggal_surat' => $tglSurat,
				'lampiran' => $request['lampiran'],
				'hari_tanggal' => date('Y-m-d', strtotime( $request['hari_tanggal'])),
				'waktu' => $request['waktu'],
				'tempat' => $request['tempat'],
				'periode' => $request['periode'],
				'nik2' => $request['nik2'],
				'keterangan2' => $request['keterangan2'],
				'nik3' => $request['nik3'],
				'keterangan3' => $request['keterangan3'],
				'nik4' => $request['nik4'],
				'keterangan4' => $request['keterangan4'],
				'nik5' => $request['nik5'],
				'keterangan5' => $request['keterangan5'],
			]);

			//untuk mengambil id dari insert data yg di atas
			$idinsertsurat = $insert->id;

		// 4. no surat
			// nosurat didapat dari hasil insert data ke database
			// panggil format nosuratnya 
			$formatnomorsurat = Nomorsurat::where('id_no','=',$id_noSurat)->first();
			
			$nosurat = $formatnomorsurat->no_surat.'/'.date('Y').'/'.$idinsertsurat;
				
		// 5.panggil data surat yang sudah di insertkan
			$datasurat = Suratpenguji::where('nomor_surat',$idinsertsurat)->with('penduduk','nikke2','nikke3','nikke4','nikke5')->get();
		// kalau sudah dipanggil semua data yang dibutuhkan tinggal di masukkan kedalam view suratnya
		$view = \View::make('surat/pengujidesa',['desa' =>$desa,'penduduk' => $penduduk, 'nosurat' =>$nosurat, 'tanggalsurat' => $tglSurat, 'datasurat' => $datasurat, 'kop' => $request['kop']]);

		$html_content = $view->render();

		PDF::SetTitle('Surat Mohon Penguji PDF');
		PDF::AddPage();
		PDF::writeHTML($html_content, true, false, true, false, '');

		PDF::output('cetaksuratpenguji.pdf');
	}

	

}