<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use PDF;
use App\Penduduk;
use App\Desa;
use App\Nomorsurat;
use App\Suratusaha;

class suratusahaController extends Controller
{

	public function index($id_no)
	{

		$this->authorize('isDesa');
		$penduduk = Penduduk::where('id_desa','=',auth()->user()->id_desa)->get();

			// arahkan ke form suratnya ok :)
		return view('formsurat/suratUsaha',['penduduk' => $penduduk,'id_noSurat' => $id_no]);
	}
	public function cetaksuratusaha(Request $request,$id_noSurat)
	{


		// 1. data desa kecamatan dan kabupaten
		$desa = Desa::where('id_desa',Auth()->user()->id_desa)->with('kabupaten', 'kecamatan')->get();

		// 2. data penduduk
			// relasinya sesuaikan dengan data yang dibutuhkan di template surat
		$penduduk = Penduduk::where('nik','=',$request['nik'])->with('kk','jeniskelamin','pekerjaans','kewarganegaraans','statusperkawinan','agamaa')->get();

		// 3. tanggal surat
		$tglSurat = date('Y-m-d');
		

		$insert = Suratusaha::create([
			'nik' => $request['nik'],
			'tanggal_surat' => $tglSurat,
			'keterangan_usaha' => $request['keterangan_usaha'],
			'jenis_usaha' => $request['jenis_usaha'],
			'luas_lahan' => $request['luas_lahan'],
			'tenaga_pembantu' => $request['tenaga_pembantu'],
			'alamat_usaha' => $request['alamat_usaha'],
			'fungsi' => $request['fungsi']
		]);

			//untuk mengambil id dari insert data yg di atas
		$idinsertsurat = $insert->id;

		// 4. no surat
			// nosurat didapat dari hasil insert data ke database
			// panggil format nosuratnya 
		$formatnomorsurat = Nomorsurat::where('id_no','=',$id_noSurat)->first();

		$nosurat = $formatnomorsurat->no_surat.'/'.date('Y');

		// 5.panggil data surat yang sudah di insertkan
		$datasurat = Suratusaha::where('nomor_surat',$idinsertsurat)->with('penduduk')->get();

		// kalau sudah dipanggil semua data yang dibutuhkan tinggal di masukkan kedalam view suratnya
		$view = \View::make('surat/usaha',['desa' =>$desa,'penduduk' => $penduduk, 'nosurat' =>$nosurat, 'tanggalsurat' => $tglSurat, 'datasurat' => $datasurat, 'kop' => $request['kop']]);

		$html_content = $view->render();


		PDF::SetTitle('Surat Usaha PDF');
		PDF::AddPage();
		PDF::writeHTML($html_content, true, false, true, false, '');

		PDF::output('cetaksuratusaha.pdf');
	}

	public function permohonan($namaSurat)
	{
		$usaha = Suratusaha::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->with('penduduk')->get();
		// sesuai dengan route
		$idsurat = 11;
		
		$formatnomorsurat = Nomorsurat::where('id_desa',auth()->user()->id_desa)->where('id_jenissurat','=',$idsurat)->first();
		$link = 'cetakPermohonanUsaha';
		return view ('admindesa/permohonan_surat',['namaSurat' => $namaSurat, 'data' => $usaha,'link' => $link,'format_nomor_surat' => $formatnomorsurat->id_no]);

	} 

	public function permohonanCetak(Request $request,$id,$noFormat)
	{

		$datasurat = Suratusaha::where('nomor_surat',$id)->get();
		// $datasurat->update(['status_surat'=>'sudah di proses']);
		$desa = Desa::where('id_desa',$datasurat[0]->id_desa)->with('kabupaten', 'kecamatan')->get();

		$updateSurat = Suratusaha::where('nomor_surat',$id);

		$updateSurat->update(['status_surat' => 'sudah diproses']);


		// 2. data penduduk
			// relasinya sesuaikan dengan data yang dibutuhkan di template surat
		$penduduk = Penduduk::where('nik','=',$datasurat[0]->nik)->with('kk','jeniskelamin','pekerjaans','kewarganegaraans','statusperkawinan','agamaa','golongandarah','hubungankeluarga','pendidikans')->get();


		$formatnomorsurat = Nomorsurat::where('id_no','=',$noFormat)->first();

		$nosurat = $formatnomorsurat->no_surat.'/'.date('Y');

		$tglSurat = $datasurat[0]->tanggal_surat;
		// kalau sudah dipanggil semua data yang dibutuhkan tinggal di masukkan kedalam view suratnya
		$view = \View::make('surat/usaha',['desa' =>$desa,'penduduk' => $penduduk, 'nosurat' =>$nosurat, 'tanggalsurat' => $tglSurat, 'datasurat' => $datasurat, 'kop' => $request['kop']]);

		$html_content = $view->render();

		PDF::SetTitle('Surat Usaha PDF');
		PDF::AddPage();
		PDF::writeHTML($html_content, true, false, true, false, '');

		PDF::output('cetaksuratusaha.pdf');
	}
	

	

}