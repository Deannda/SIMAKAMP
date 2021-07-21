<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use PDF;
use App\Penduduk;
use App\Desa;
use App\Nomorsurat;
USE App\Suratdomisililsm;

class suratdomisililsmController extends Controller
{

	public function index($id_no)
	{

		$this->authorize('isDesa');
		$penduduk = Penduduk::where('id_desa','=',auth()->user()->id_desa)->get();

			// arahkan ke form suratnya ok :)
		return view('formsurat/suratDomisililsm',['penduduk' => $penduduk,'id_noSurat' => $id_no]);
	}
	public function cetaksuratdomisililsm(Request $request,$id_noSurat)
	{
		
			$desa = Desa::where('id_desa',Auth()->user()->id_desa)->with('kabupaten', 'kecamatan')->get();

		// 2. data penduduk
			// relasinya sesuaikan dengan data yang dibutuhkan di template surat
			$penduduk = Penduduk::where('nik','=',$request['nik'])->with('kk','jeniskelamin','pekerjaans','kewarganegaraans','statusperkawinan','agamaa')->get();
	
		// 3. tanggal surat
			$tglSurat = date('Y-m-d');
		

			$insert = Suratdomisililsm::create([
				'tanggal_surat' => $tglSurat,
				'nama_perusahaan' => $request['nama_perusahaan'],
				'dasar_pendirian' => $request['dasar_pendirian'],
				'nama_pimpinan' => $request['nama_pimpinan'],
				'jenis_usaha' => $request['jenis_usaha'],
				'alamat_sekretariat' => $request['alamat_sekretariat'],
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
			$datasurat = Suratdomisililsm::where('nomor_surat',$idinsertsurat)->get();

		// kalau sudah dipanggil semua data yang dibutuhkan tinggal di masukkan kedalam view suratnya
		$view = \View::make('surat/domisililsm',['desa' =>$desa,'penduduk' => $penduduk, 'nosurat' =>$nosurat, 'tanggalsurat' => $tglSurat, 'datasurat' => $datasurat, 'kop' => $request['kop']]);

		$html_content = $view->render();

		PDF::SetTitle('Surat Domisili LSM PDF');
		PDF::AddPage();
		PDF::writeHTML($html_content, true, false, true, false, '');

		PDF::output('cetaksuratdomisililsm.pdf');
	}

	

}