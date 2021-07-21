<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use PDF;
use App\Penduduk;
use App\Desa;
use App\Nomorsurat;
use App\Suratdispensasinikah;

class suratdispensasinikahController extends Controller
{

	public function index($id_no)
	{

		$this->authorize('isDesa');
		$penduduk = Penduduk::where('id_desa','=',auth()->user()->id_desa)->get();

			// arahkan ke form suratnya ok :)
		return view('formsurat/suratDispensasinikah',['penduduk' => $penduduk,'id_noSurat' => $id_no]);
	}
	public function cetaksuratdispensasinikah(Request $request,$id_noSurat)
	{
		$desa = Desa::where('id_desa',Auth()->user()->id_desa)->with('kabupaten', 'kecamatan')->get();

		// 2. data penduduk
			// relasinya sesuaikan dengan data yang dibutuhkan di template surat
			$penduduk = Penduduk::where('nik','=',$request['nik'])->with('kk','jeniskelamin','pekerjaans','kewarganegaraans','statusperkawinan','agamaa')->get();
	
		// 3. tanggal surat
			$tglSurat = date('Y-m-d');
		

			$insert = Suratdispensasinikah::create([
				'tanggal_surat' => $tglSurat,
				'lampiran' => $request['lampiran'],
				'sebagai1' => $request['sebagai1'],
				'nik' => $request['nik'],
				'sebagai2' => $request['sebagai2'],
				'nama' => $request['nama'],
				'tempat_lahir' => $request['tempat_lahir'],
				'tanggal_lahir' => date('Y-m-d', strtotime( $request['tanggal_lahir'])),
				'warga' => $request['warga'],
				'agama' => $request['agama'],
				'status' => $request['status'],
				'alamat' => $request['alamat'],
				'keterangan' => $request['keterangan'],
				'tanggal_nikah' => date('Y-m-d', strtotime( $request['tanggal_nikah'])),
				
			]);

			//untuk mengambil id dari insert data yg di atas
			$idinsertsurat = $insert->id;

		// 4. no surat
			// nosurat didapat dari hasil insert data ke database
			// panggil format nosuratnya 
			$formatnomorsurat = Nomorsurat::where('id_no','=',$id_noSurat)->first();
			
			$nosurat = $formatnomorsurat->no_surat.'/'.date('Y').'/'.$idinsertsurat;
				
		// 5.panggil data surat yang sudah di insertkan
			$datasurat = Suratdispensasinikah::where('nomor_surat',$idinsertsurat)->get();

		// kalau sudah dipanggil semua data yang dibutuhkan tinggal di masukkan kedalam view suratnya
		$view = \View::make('surat/dispensasinikah',['desa' =>$desa,'penduduk' => $penduduk, 'nosurat' =>$nosurat, 'tanggalsurat' => $tglSurat, 'datasurat' => $datasurat, 'kop' => $request['kop']]);

		$html_content = $view->render();

		PDF::SetTitle('Surat Dispensasi Waktu Pernikahan PDF');
		PDF::AddPage();
		PDF::writeHTML($html_content, true, false, true, false, '');

		PDF::output('cetaksuratdispensasinikah.pdf');
	}

		public function permohonan($namaSurat)
	{
		$dispensasi = Suratdispensasinikah::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->with('penduduk')->get();
		// sesuai dengan route
		$idsurat = 23;
		
		$formatnomorsurat = Nomorsurat::where('id_desa',auth()->user()->id_desa)->where('id_jenissurat','=',$idsurat)->first();
		$link = 'cetakPermohonanDispensasiNikah';
		return view ('admindesa/permohonan_surat',['namaSurat' => $namaSurat, 'data' => $dispensasi,'link' => $link,'format_nomor_surat' => $formatnomorsurat->id_no]);

	} 

	public function permohonanCetak(Request $request,$id,$noFormat)
	{

		$datasurat = Suratdispensasinikah::where('nomor_surat',$id)->get();
		// $datasurat->update(['status_surat'=>'sudah di proses']);
		$desa = Desa::where('id_desa',$datasurat[0]->id_desa)->with('kabupaten', 'kecamatan')->get();

		$updateSurat = Suratdispensasinikah::where('nomor_surat',$id);

		$updateSurat->update(['status_surat' => 'sudah diproses']);


		// 2. data penduduk
			// relasinya sesuaikan dengan data yang dibutuhkan di template surat
		$penduduk = Penduduk::where('nik','=',$datasurat[0]->nik)->with('kk','jeniskelamin','pekerjaans','kewarganegaraans','statusperkawinan','agamaa','golongandarah','hubungankeluarga','pendidikans')->get();


		$formatnomorsurat = Nomorsurat::where('id_no','=',$noFormat)->first();

		$nosurat = $formatnomorsurat->no_surat.'/'.date('Y').'/'.$datasurat[0]->nomor_surat;

		$tglSurat = $datasurat[0]->tanggal_surat;
		// kalau sudah dipanggil semua data yang dibutuhkan tinggal di masukkan kedalam view suratnya
		$view = \View::make('surat/dispensasinikah',['desa' =>$desa,'penduduk' => $penduduk, 'nosurat' =>$nosurat, 'tanggalsurat' => $tglSurat, 'datasurat' => $datasurat, 'kop' => $request['kop']]);

		$html_content = $view->render();

		PDF::SetTitle('Surat Dispensasi Waktu Nikah PDF');
		PDF::AddPage();
		PDF::writeHTML($html_content, true, false, true, false, '');

		PDF::output('cetakSuratdispensasiwaktunikah.pdf');
	}


	

}