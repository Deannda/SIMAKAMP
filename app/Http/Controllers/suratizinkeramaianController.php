<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use PDF;
use App\Penduduk;
use App\Desa;
use App\Nomorsurat;
use App\Suratkeramaian;

class suratizinkeramaianController extends Controller
{

	public function index($id_no)
	{

		$this->authorize('isDesa');
		$penduduk = Penduduk::where('id_desa','=',auth()->user()->id_desa)->get();

			// arahkan ke form suratnya ok :)
		return view('formsurat/suratKeramaian',['penduduk' => $penduduk,'id_noSurat' => $id_no]);
	}

	public function cetaksuratkeramaian(Request $request,$id_noSurat)
	{
		
		$desa = Desa::where('id_desa',Auth()->user()->id_desa)->with('kabupaten', 'kecamatan')->get();

		// 2. data penduduk
			// relasinya sesuaikan dengan data yang dibutuhkan di template surat
		$penduduk = Penduduk::where('nik','=',$request['nik'])->with('kk','jeniskelamin','pekerjaans','kewarganegaraans','statusperkawinan','agamaa')->get();
		
		// 3. tanggal surat
		$tglSurat = date('Y-m-d');
		

		$insert = Suratkeramaian::create([
			'nik' => $request['nik'],
			'tanggal_surat' => $tglSurat,
			'kepada' => $request['kepada'],
			'di' => $request['di'],
			'lampiran' => $request['lampiran'],
			'acara' => $request['acara'],
			'hari_tanggal' => date('Y-m-d', strtotime( $request['haritanggal'])),
			'waktu' => $request['waktu'],
			'tempat' => $request['tempat'],
			'id_desa' => Auth()->user()->id_desa
		]);

			//untuk mengambil id dari insert data yg di atas
		$idinsertsurat = $insert->id;

		// 4. no surat
			// nosurat didapat dari hasil insert data ke database
			// panggil format nosuratnya 
		$formatnomorsurat = Nomorsurat::where('id_no','=',$id_noSurat)->first();
		
		$nosurat = $formatnomorsurat->no_surat.'/'.date('Y').'/'.$idinsertsurat;
		
		// 5.panggil data surat yang sudah di insertkan
		$datasurat = Suratkeramaian::where('nomor_surat',$idinsertsurat)->get();

		// kalau sudah dipanggil semua data yang dibutuhkan tinggal di masukkan kedalam view suratnya
		$view = \View::make('surat/keramaian',['desa' =>$desa,'penduduk' => $penduduk, 'nosurat' =>$nosurat, 'tanggalsurat' => $tglSurat, 'datasurat' => $datasurat, 'kop' => $request['kop']]);

		$html_content = $view->render();

		PDF::SetTitle('Surat Keramaian PDF');
		PDF::AddPage();
		PDF::writeHTML($html_content, true, false, true, false, '');

		PDF::output('cetaksuratkeramaian.pdf');
	}

	public function permohonan($namaSurat)
	{
		$keramaian = Suratkeramaian::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->with('penduduk')->get();
		// sesuai dengan route
		$idsurat = 18;
		
		$formatnomorsurat = Nomorsurat::where('id_desa',auth()->user()->id_desa)->where('id_jenissurat','=',$idsurat)->first();

		$link = 'cetakPermohonanIzinKeramaian';
		return view ('admindesa/permohonan_surat',['namaSurat' => $namaSurat, 'data' => $keramaian,'link' => $link,'format_nomor_surat' => $formatnomorsurat->id_no]);

	} 

	public function permohonanCetak(Request $request,$id,$noFormat)
	{

		$datasurat = Suratkeramaian::where('nomor_surat',$id)->get();
		// $datasurat->update(['status_surat'=>'sudah di proses']);
		$desa = Desa::where('id_desa',$datasurat[0]->id_desa)->with('kabupaten', 'kecamatan')->get();

		$updateSurat = Suratkeramaian::where('nomor_surat',$id);

		$updateSurat->update(['status_surat' => 'sudah diproses']);

		// 2. data penduduk
			// relasinya sesuaikan dengan data yang dibutuhkan di template surat
		$penduduk = Penduduk::where('nik','=',$datasurat[0]->nik)->with('kk','jeniskelamin','pekerjaans','kewarganegaraans','statusperkawinan','agamaa','golongandarah','hubungankeluarga','pendidikans')->get();


		$formatnomorsurat = Nomorsurat::where('id_no','=',$noFormat)->first();

		$nosurat = $formatnomorsurat->no_surat.'/'.date('Y').'/'.$datasurat[0]->nomor_surat;

		$tglSurat = $datasurat[0]->tanggal_surat;
		// kalau sudah dipanggil semua data yang dibutuhkan tinggal di masukkan kedalam view suratnya
		$view = \View::make('surat/keramaian',['desa' =>$desa,'penduduk' => $penduduk, 'nosurat' =>$nosurat, 'tanggalsurat' => $tglSurat, 'datasurat' => $datasurat, 'kop' => $request['kop']]);

		$html_content = $view->render();

		PDF::SetTitle('Surat Izin Keramaian PDF');
		PDF::AddPage();
		PDF::writeHTML($html_content, true, false, true, false, '');

		PDF::output('cetaksuratizinkeramaian.pdf');
	}

	

}