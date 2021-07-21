<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use PDF;
use App\Penduduk;
use App\Desa;
use App\Nomorsurat;
use App\Suratsktmsekolah;


class suratsktmsekolahController extends Controller
{

	public function index($id_no)
	{

		$this->authorize('isDesa');
		$penduduk = Penduduk::where('id_desa','=',auth()->user()->id_desa)->get();

			// arahkan ke form suratnya ok :)
		return view('formsurat/suratSktmsekolah',['penduduk' => $penduduk,'id_noSurat' => $id_no]);
	}
	public function cetaksuratsktmsekolah(Request $request,$id_noSurat)
	{
		
			// 1. data desa kecamatan dan kabupaten
		$desa = Desa::where('id_desa',Auth()->user()->id_desa)->with('kabupaten', 'kecamatan')->get();

		// 2. data penduduk
			// relasinya sesuaikan dengan data yang dibutuhkan di template surat
		$penduduk = Penduduk::where('nik','=',$request['nik'])->with('kk','jeniskelamin','pekerjaans','kewarganegaraans','statusperkawinan','agamaa')->get();

		// 3. tanggal surat
		$tglSurat = date('Y-m-d');
		

		$insert = Suratsktmsekolah::create([
			'nik' => $request['nik'],
			'tanggal_surat' => $tglSurat,
			'orang_tua' => $request['nika'],
			'sek_univ' => $request['sek_univ'],
			'kel_jur' => $request['kel_jur'],
			'fungsi' => $request['fungsi'],

		]);

			//untuk mengambil id dari insert data yg di atas
		$idinsertsurat = $insert->id;

		// 4. no surat
			// nosurat didapat dari hasil insert data ke database
			// panggil format nosuratnya 
		$formatnomorsurat = Nomorsurat::where('id_no','=',$id_noSurat)->first();

		$nosurat = $formatnomorsurat->no_surat.'/'.date('Y');

		// 5.panggil data surat yang sudah di insertkan
		$datasurat = Suratsktmsekolah::where('nomor_surat',$idinsertsurat)->with('penduduk')->get();

		// kalau sudah dipanggil semua data yang dibutuhkan tinggal di masukkan kedalam view suratnya
		$view = \View::make('surat/sktmsekolah',['desa' =>$desa,'penduduk' => $penduduk, 'nosurat' =>$nosurat, 'tanggalsurat' => $tglSurat, 'datasurat' => $datasurat, 'kop' => $request['kop']]);

		$html_content = $view->render();

		PDF::SetTitle('Surat SKTM Sekolah PDF');
		PDF::AddPage();
		PDF::writeHTML($html_content, true, false, true, false, '');

		PDF::output('cetaksuratsktmsekolah.pdf');
	}

	public function permohonan($namaSurat)
	{
		$sktmsekolah = Suratsktmsekolah::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->with('penduduk')->get();
		// sesuai dengan route
		$idsurat = 10;
		
		$formatnomorsurat = Nomorsurat::where('id_desa',auth()->user()->id_desa)->where('id_jenissurat','=',$idsurat)->first();
		$link = 'cetakPermohonanSKTMSekolah';
		return view ('admindesa/permohonan_surat',['namaSurat' => $namaSurat, 'data' => $sktmsekolah,'link' => $link,'format_nomor_surat' => $formatnomorsurat->id_no]);

	} 

	public function permohonanCetak(Request $request,$id,$noFormat)
	{

		$datasurat = Suratsktmsekolah::where('nomor_surat',$id)->get();
		// $datasurat->update(['status_surat'=>'sudah di proses']);
		$desa = Desa::where('id_desa',$datasurat[0]->id_desa)->with('kabupaten', 'kecamatan')->get();

		$updateSurat = Suratsktmsekolah::where('nomor_surat',$id);

		$updateSurat->update(['status_surat' => 'sudah diproses']);

		// 2. data penduduk
			// relasinya sesuaikan dengan data yang dibutuhkan di template surat
		$penduduk = Penduduk::where('nik','=',$datasurat[0]->nik)->with('kk','jeniskelamin','pekerjaans','kewarganegaraans','statusperkawinan','agamaa','golongandarah','hubungankeluarga','pendidikans')->get();


		$formatnomorsurat = Nomorsurat::where('id_no','=',$noFormat)->first();

		$nosurat = $formatnomorsurat->no_surat.'/'.date('Y');

		$tglSurat = $datasurat[0]->tanggal_surat;
		// kalau sudah dipanggil semua data yang dibutuhkan tinggal di masukkan kedalam view suratnya
		$view = \View::make('surat/sktmsekolah',['desa' =>$desa,'penduduk' => $penduduk, 'nosurat' =>$nosurat, 'tanggalsurat' => $tglSurat, 'datasurat' => $datasurat, 'kop' => $request['kop']]);

		$html_content = $view->render();

		PDF::SetTitle('Surat SKTM Sekolah PDF');
		PDF::AddPage();
		PDF::writeHTML($html_content, true, false, true, false, '');

		PDF::output('cetakSuratsktmsekolah.pdf');
	}


	public function ortu($nik)
	{
		$anak = Penduduk::where('nik',$nik)->first();
		$keluarga = Penduduk::where('id_kk',$anak->id_kk)->get();
		$ortu = [];

		// cek ayah
		foreach ($keluarga as $key => $value) {
			# code...

			// angka 3 di bawah sesuaikan dengan id Kepala keluarga di data hubungan keluarga
			if($value->hubungan_keluarga == 3){
				array_push($ortu, $value);
			} 
		}

		// kalau pengecekan ayah diatas kosong
		// lakukan pengecekan ibu dibawah
		if (count($ortu) == 0) {
			# code...
			foreach ($keluarga as $key => $value) {
			# code...

			// angka 4 di bawah sesuaikan dengan id istri  di data hubungan keluarga
				if($value->hubungan_keluarga == 4){
					array_push($ortu, $value);
				} 
			}

		}
		return $ortu;
	}

}