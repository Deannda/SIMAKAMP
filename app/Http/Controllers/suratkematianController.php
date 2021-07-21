<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use PDF;
use App\Penduduk;
use App\Desa;
use App\Suratkematian;
use App\Nomorsurat;

class suratkematianController extends Controller
{

	public function index($id_no)
	{

		$this->authorize('isDesa');
		$penduduk = Penduduk::where('id_desa','=',auth()->user()->id_desa)->get();

			// arahkan ke form suratnya ok :)
		return view('formsurat/suratKematian',['penduduk' => $penduduk,'id_noSurat' => $id_no]);
	}

	public function cetaksuratkematian(Request $request,$id_noSurat)
	{
		$this->authorize('isDesa');

		$tglSurat = date('Y-m-d');
		// return date('Y-m-d', strtotime( $request['tanggal_kematian']));
		$nosurat = Nomorsurat::where('id_no','=',$id_noSurat)->get();
		
		$data = Suratkematian::where('nik','=', $request['nik'])->get();

		$penduduk = Penduduk::where('nik','=',$request['nik'])->with('kk','jeniskelamin','golongandarah','agamaa','statusperkawinan','pendidikans','pekerjaans','hubungankeluarga','kewarganegaraans')->get();


		if(count($data) == 0){
			Suratkematian::create([
				'id_kk' => $penduduk[0]->id_kk,
				'nik' => $request['nik'],
				'tanggal_surat' => $tglSurat,
				'tanggal_kematian' => date('Y-m-d', strtotime( $request['tanggal_kematian'])),
				'tempat_kematian' => $request['tempat_kematian'],
				'sebab' => $request['sebab'],
				'pasangan' => $request['pasangan'],
				'id_desa' => Auth()->user()->id_desa
			]);
		}

		$panggilSurat = Suratkematian::where('nik','=', $request['nik'])->with('pasangannn')->get();

		$hari = $this->hari_ini(strtotime($panggilSurat[0]->tanggal_kematian));
		// untuk panggil data desa kan dan kec
		$ldesa = Desa::where('id_desa','=',auth()->user()->id_desa)->with('kabupaten','kecamatan')->get();


		
		
		//kalau mau panggil data yang lain $penduduk[0]->... yng mau ditampilkan
		 // 'kop' => $request['kop'] mengambil nilai atau value pada inputan kop dan di kirim ketampilan surat
		$view = \View::make('surat/kematian',['penduduk'=>$penduduk, 'desa' =>$ldesa,'surat' => $panggilSurat, 'hari' => $hari, 'kop' => $request['kop'],'nomorSurat' => $nosurat[0]->no_surat, 'tanggalsurat' => $tglSurat]);
		$html_content = $view->render();


		PDF::SetTitle('Surat Kematian PDF');
		PDF::AddPage();
		// PDF::SetY(25,true,true);
		// PDF::Ln(0,15.5,15.5,15.5);
		PDF::writeHTML($html_content, true, false, true, false, '');

		PDF::output('cetaksuratkematian.pdf');
	}

	function hari_ini($tgl)
	{
		$this->authorize('isDesa');
		
		$hari = date ("D",$tgl);
		
		switch($hari){
			case 'Sun':
			$hari_ini = "Minggu";
			break;
			
			case 'Mon':			
			$hari_ini = "Senin";
			break;
			
			case 'Tue':
			$hari_ini = "Selasa";
			break;
			
			case 'Wed':
			$hari_ini = "Rabu";
			break;
			
			case 'Thu':
			$hari_ini = "Kamis";
			break;
			
			case 'Fri':
			$hari_ini = "Jumat";
			break;
			
			case 'Sat':
			$hari_ini = "Sabtu";
			break;
			
			default:
			$hari_ini = "Tidak di ketahui";		
			break;
		}
		
		return $hari_ini;
		
	}



	public function permohonan($namaSurat)
	{
		$situ = Suratkematian::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->with('penduduk')->get();
		// sesuai dengan route
		$link = 'cetakPermohonanKematian';

		$idsurat = 3;
		
		$formatnomorsurat = Nomorsurat::where('id_desa',auth()->user()->id_desa)->where('id_jenissurat','=',$idsurat)->first();

		return view ('admindesa/permohonan_surat',['namaSurat' => $namaSurat, 'data' => $situ,'link' => $link,'format_nomor_surat' => $formatnomorsurat->id_no]);

	} 

	public function permohonanCetak(Request $request,$id,$noFormat)
	{


		$panggilSurat = Suratkematian::where('nomor_surat','=', $id)->with('pasangannn')->get();
		$tglSurat = $panggilSurat[0]->tanggal_surat;
		$updateSurat = Suratkematian::where('nomor_surat',$id);

		$updateSurat->update(['status_surat' => 'sudah diproses']);

		// return date('Y-m-d', strtotime( $request['tanggal_kematian']));
		$formatnomorsurat = Nomorsurat::where('id_no','=',$noFormat)->first();

		$nosurat = Nomorsurat::where('id_no','=',$noFormat)->get();
		
		$data = Suratkematian::where('nik','=', $panggilSurat[0]->nik)->get();

		$penduduk = Penduduk::where('nik','=',$data[0]->nik)->with('kk','jeniskelamin','golongandarah','agamaa','statusperkawinan','pendidikans','pekerjaans','hubungankeluarga','kewarganegaraans')->get();


		$hari = $this->hari_ini(strtotime($panggilSurat[0]->tanggal_kematian));
		// untuk panggil data desa kan dan kec
		$ldesa = Desa::where('id_desa','=',auth()->user()->id_desa)->with('kabupaten','kecamatan')->get();
		
		//kalau mau panggil data yang lain $penduduk[0]->... yng mau ditampilkan
		 // 'kop' => $request['kop'] mengambil nilai atau value pada inputan kop dan di kirim ketampilan surat
		$view = \View::make('surat/kematian',['penduduk'=>$penduduk, 'desa' =>$ldesa,'surat' => $panggilSurat, 'hari' => $hari, 'kop' => $request['kop'],'nomorSurat' => $formatnomorsurat->no_surat,'tanggalsurat' => $tglSurat ]);
		$html_content = $view->render();


		PDF::SetTitle('Surat Kematian PDF');
		PDF::AddPage();
		// PDF::SetY(25,true,true);
		// PDF::Ln(0,15.5,15.5,15.5);
		PDF::writeHTML($html_content, true, false, true, false, '');

		PDF::output('cetaksuratkematian.pdf');
	}
}