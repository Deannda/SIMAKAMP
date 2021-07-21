<?php

namespace App\Http\Controllers;

use App\Kabupaten;
use App\Kecamatan;
use App\Kk;
use Illuminate\Http\Request;
use App\Penduduk;
use App\Golongandarah;
use App\Agama;
use App\Jeniskelamin;
use App\Kewarganegaraan;
use App\Pekerjaan;
use App\Pendidikanterakhir;
use App\Hubungankeluarga;
use App\Statusperkawinan;
use App\Desa;
use App\User;
use App\Jabatan;
use App\Tupoksi;
use Session;
use App\Imports\PendudukImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use App\Suratsitu;
use App\Suratkematian;
use App\Suratdomisili;
use App\Suratbedanama;
use App\Suratjalan;
use App\Suratkeramaian;
use App\Suratimb;
use App\Suratktp;
use App\Suratnonpns;
use App\Suratpindah;
use App\Suratskck;
use App\Suratsktmbdt;
use App\Suratsktmsekolah;
use App\Suratusaha;
use App\Suratahliwaris;
use App\Suratprofesi;
use App\Suratpenghasilan;
use App\Suratdispensasinikah;
use App\Suratpindahnikah;
use App\Suratkelahiran;
use App\Suratbelumnikah;
use App\Suratpengantarnikah;
use App\Suratizinorangtua;


class AdmindesaController extends Controller
{
    public function home()
    {
        //cek status user Sadmin atau Adesa 
        $this->authorize('isDesa');
        $permohonan = [];

        // list surat di portal apa aja de?
        
        // suratsitu
        $situ = Suratsitu::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();
        $isiSitu = [];
        if ($situ > 0) {
                # code...
            $isiSitu['namaSurat'] = 'Surat Situ';
            $isiSitu['jmlPermohonan'] = $situ;
            // link sesuaikan dengan yg di route
            $isiSitu['link'] = 'SuratPermohonanSitu/Situ';

            array_push($permohonan, $isiSitu);
        }

        // suratkematian
        $kematian = Suratkematian::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();
        
        $isiKematian = [];
        if ($kematian > 0) {
                # code...
            $isiKematian['namaSurat'] = 'Surat Kematian';
            $isiKematian['jmlPermohonan'] = $kematian;
            // link sesuaikan dengan yg di route
            $isiKematian['link'] = 'SuratPermohonanKematian/Kematian';

            array_push($permohonan, $isiKematian);
        }

         // suratbelumnikah
        $belumnikah = Suratbelumnikah::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();
        
        $isiBelumnikah = [];
        if ($belumnikah > 0) {
                # code...
            $isiBelumnikah['namaSurat'] = 'Surat Pernyataan Belum Menikah';
            $isiBelumnikah['jmlPermohonan'] = $belumnikah;
            // link sesuaikan dengan yg di route
            $isiBelumnikah['link'] = 'SuratPernyatanBelumNikah/Nikah';

            array_push($permohonan, $isiBelumnikah);
        }

        // suratkpengantarnikah
        $pengantarnikah = Suratpengantarnikah::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();
        
        $isiPengantarnikah = [];
        if ($pengantarnikah > 0) {
                # code...
            $isiPengantarnikah['namaSurat'] = 'Surat Pengantar Nikah';
            $isiPengantarnikah['jmlPermohonan'] = $pengantarnikah;
            // link sesuaikan dengan yg di route
            $isiPengantarnikah['link'] = 'SuratPermohonanPengantar/Nikah';

            array_push($permohonan, $isiPengantarnikah);
        }

        // suratizinorangtua
        $izinorangtua = Suratizinorangtua::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();
        
        $isiIzinorangtua = [];
        if ($izinorangtua > 0) {
                # code...
            $isiIzinorangtua['namaSurat'] = 'Surat Permohonan Izin Orangtua';
            $isiIzinorangtua['jmlPermohonan'] = $izinorangtua;
            // link sesuaikan dengan yg di route
            $isiIzinorangtua['link'] = 'SuratPermohonan/IzinOrangtua';

            array_push($permohonan, $isiIzinorangtua);
        }



        // domisili
        $domisili = Suratdomisili::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();
        
        $isiDomisili = [];
        if ($domisili > 0) {
                # code...
            $isiDomisili['namaSurat'] = 'Surat Domisili';
            $isiDomisili['jmlPermohonan'] = $domisili;
            // link sesuaikan dengan yg di route
            $isiDomisili['link'] = 'SuratPermohonanDomisili/Domisili';

            array_push($permohonan, $isiDomisili);
        }

        // jalan
        $jalan = Suratjalan::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();
        
        $isiJalan = [];
        if ($jalan > 0) {
                # code...
            $isiJalan['namaSurat'] = 'Surat Keterangan Jalan';
            $isiJalan['jmlPermohonan'] = $jalan;
            // link sesuaikan dengan yg di route
            $isiJalan['link'] = 'SuratPermohonanJalan/Jalan';

            array_push($permohonan, $isiJalan);
        }
        // bedanama
        $bedanama = Suratbedanama::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();
        
        $isiBedanama = [];
        if ($bedanama > 0) {
                # code...
            $isiBedanama['namaSurat'] = 'Surat Beda Nama';
            $isiBedanama['jmlPermohonan'] = $bedanama;
            // link sesuaikan dengan yg di route
            $isiBedanama['link'] = 'SuratPermohonanBedanama/Bedanama';

            array_push($permohonan, $isiBedanama);
        }
        // keramaian
        $keramaian = Suratkeramaian::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();
        
        $isiKeramaian = [];
        if ($keramaian > 0) {
                # code...
            $isiKeramaian['namaSurat'] = 'Surat Izin Keramaian';
            $isiKeramaian['jmlPermohonan'] = $keramaian;
            // link sesuaikan dengan yg di route
            $isiKeramaian['link'] = 'SuratPermohonanIzinKeramaian/Keramaian';

            array_push($permohonan, $isiKeramaian);
        }
        // IMB
        $imb = Suratimb::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();
        
        $isiImb = [];
        if ($imb > 0) {
                # code...
            $isiImb['namaSurat'] = 'Surat IMB';
            $isiImb['jmlPermohonan'] = $imb;
            // link sesuaikan dengan yg di route
            $isiImb['link'] = 'SuratPermohonanIMB/IMB';

            array_push($permohonan, $isiImb);
        }
        // KTP
        $ktp = Suratktp::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();
        
        $isiKTP = [];
        if ($ktp > 0) {
                # code...
            $isiKTP['namaSurat'] = 'Surat Keterangan KTP';
            $isiKTP['jmlPermohonan'] = $ktp;
            // link sesuaikan dengan yg di route
            $isiKTP['link'] = 'SuratPermohonanKTP/KTP';

            array_push($permohonan, $isiKTP);
        }
        // NonPNS
        $nonpns = Suratnonpns::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();
        
        $isiNONPNS = [];
        if ($nonpns > 0) {
                # code...
            $isiNONPNS['namaSurat'] = 'Surat Keterangan Non PNS';
            $isiNONPNS['jmlPermohonan'] = $nonpns;
            // link sesuaikan dengan yg di route
            $isiNONPNS['link'] = 'SuratPermohonanNonPNS/NonPNS';

            array_push($permohonan, $isiNONPNS);
        }
        // Pindah
        $pindah = Suratpindah::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();
        
        $isiPINDAH = [];
        if ($pindah > 0) {
                # code...
            $isiPINDAH['namaSurat'] = 'Surat Pengantar Pindah';
            $isiPINDAH['jmlPermohonan'] = $pindah;
            // link sesuaikan dengan yg di route
            $isiPINDAH['link'] = 'SuratPermohonanPindah/Pindah';

            array_push($permohonan, $isiPINDAH);
        }

        //SKCK
        $skck = Suratskck::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();
        
        $isiSKCK= [];
        if ($skck > 0) {
                # code...
            $isiSKCK['namaSurat'] = 'Surat Pengantar SKCK';
            $isiSKCK['jmlPermohonan'] = $skck;
            // link sesuaikan dengan yg di route
            $isiSKCK['link'] = 'SuratPermohonanSKCK/SKCK';

            array_push($permohonan, $isiSKCK);
        }

        //SKTM BDT
        $sktm = Suratsktmbdt::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();
        
        $isiSKTM= [];
        if ($sktm > 0) {
                # code...
            $isiSKTM['namaSurat'] = 'Surat SKTM BDT';
            $isiSKTM['jmlPermohonan'] = $sktm;
            // link sesuaikan dengan yg di route
            $isiSKTM['link'] = 'SuratPermohonanSKTMBDT/SKTMBDT';

            array_push($permohonan, $isiSKTM);
        }

             //SKTM SEKOLAH
        $sktmsekolah = Suratsktmsekolah::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();
        
        $isiSKTMSEKOLAH= [];
        if ($sktmsekolah > 0) {
                # code...
            $isiSKTMSEKOLAH['namaSurat'] = 'Surat SKTM Sekolah';
            $isiSKTMSEKOLAH['jmlPermohonan'] = $sktmsekolah;
            // link sesuaikan dengan yg di route
            $isiSKTMSEKOLAH['link'] = 'SuratPermohonanSKTMSekolah/SKTMSekolah';

            array_push($permohonan, $isiSKTMSEKOLAH);
        }
        //SURAT USAHA
        $usaha = Suratusaha::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();

        $isiUSAHA= [];
        if ($usaha > 0) {
                # code...
            $isiUSAHA['namaSurat'] = 'Surat Izin Usaha';
            $isiUSAHA['jmlPermohonan'] = $usaha;
            // link sesuaikan dengan yg di route
            $isiUSAHA['link'] = 'SuratPermohonanUsaha/Usaha';

            array_push($permohonan, $isiUSAHA);
        }

          //SURAT AHLI WARIS
        $ahliwaris = Suratahliwaris::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();

        $isiAHLIWARIS= [];
        if ($ahliwaris > 0) {
                # code...
            $isiAHLIWARIS['namaSurat'] = 'Surat Ahli Waris';
            $isiAHLIWARIS['jmlPermohonan'] = $ahliwaris;
            // link sesuaikan dengan yg di route
            $isiAHLIWARIS['link'] = 'SuratPermohonanAhliWaris/Ahliwaris';

            array_push($permohonan, $isiAHLIWARIS);
        }
           //SURAT PROFESI
        $profesi = Suratprofesi::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();

        $isiPROFESI= [];
        if ($profesi > 0) {
                # code...
            $isiPROFESI['namaSurat'] = 'Surat Keterangan Profesi';
            $isiPROFESI['jmlPermohonan'] = $profesi;
            // link sesuaikan dengan yg di route
            $isiPROFESI['link'] = 'SuratPermohonanProfesi/Profesi';

            array_push($permohonan, $isiPROFESI);
        }
         //SURAT PENGHASILAN
        $penghasilan = Suratpenghasilan::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();

        $isiPENGHASILAN= [];
        if ($penghasilan > 0) {
                # code...
            $isiPENGHASILAN['namaSurat'] = 'Surat Keterangan Penghasilan';
            $isiPENGHASILAN['jmlPermohonan'] = $penghasilan;
            // link sesuaikan dengan yg di route
            $isiPENGHASILAN['link'] = 'SuratPermohonanPenghasilan/Penghasilan';

            array_push($permohonan, $isiPENGHASILAN);
        }
         //SURAT DISPENSASI NIKAH
        $dispensasinikah = Suratdispensasinikah::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();

        $isiDISPENSASI= [];
        if ($dispensasinikah > 0) {
                # code...
            $isiDISPENSASI['namaSurat'] = 'Surat Dispensasi Waktu Pernikahan';
            $isiDISPENSASI['jmlPermohonan'] = $dispensasinikah;
            // link sesuaikan dengan yg di route
            $isiDISPENSASI['link'] = 'SuratPermohonanDispensasiNikah/Dispensasiwaktunikah';

            array_push($permohonan, $isiDISPENSASI);
        }

          //SURAT PINDAH NIKAH
        $pindahnikah = Suratpindahnikah::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();

        $isiPINDAHNIKAH= [];
        if ($pindahnikah > 0) {
                # code...
            $isiPINDAHNIKAH['namaSurat'] = 'Surat Rekomendasi Pindah Nikah';
            $isiPINDAHNIKAH['jmlPermohonan'] = $pindahnikah;
            // link sesuaikan dengan yg di route
            $isiPINDAHNIKAH['link'] = 'SuratPermohonanPindahNikah/PindahNikah';

            array_push($permohonan, $isiPINDAHNIKAH);
        }
           //SURAT KELAHIRAN
        $kelahiran = Suratkelahiran::where('id_desa',auth()->user()->id_desa)->where('status_surat','belum diproses')->count();

        $isiKELAHIRAN= [];
        if ($kelahiran > 0) {
                # code...
            $isiKELAHIRAN['namaSurat'] = 'Surat Pernyataan Kelahiran';
            $isiKELAHIRAN['jmlPermohonan'] = $kelahiran;
            // link sesuaikan dengan yg di route
            $isiKELAHIRAN['link'] = 'SuratPermohonanPindahNikah/PindahNikah';

            array_push($permohonan, $isiKELAHIRAN);
        }

        return view ('admindesa/home',['permohonanSurat' => $permohonan]);
    }

    public function permohonan_surat()
    {
        //cek status user Sadmin atau Adesa 
        $this->authorize('isDesa');


        return view ('admindesa/permohonan_surat');
    }

    public function datapenduduk()
    {
        //cek status user Sadmin atau Adesa 
        $this->authorize('isDesa');


        $goldar = Golongandarah::all();
        $jeniskelamin = Jeniskelamin::all();
        $kewarganegaraan = Kewarganegaraan::all();
        $pendidikan = Pendidikanterakhir::all();
        $hubKeluarga = Hubungankeluarga::all();
        $pekerjaan = Pekerjaan::all();
        $statusperkawinan = Statusperkawinan::all();
        $agama = Agama::all();

        $ldesa = User::where('id','=',auth()->user()->id)->with('kabupaten','kecamatan','desa')->get();

        $penduduk = Penduduk::where('id_desa','=',auth()->user()->id_desa)->with('kk','jeniskelamin','golongandarah','agamaa','statusperkawinan','pendidikans','pekerjaans','hubungankeluarga','kewarganegaraans')->get();
//        return $penduduk;
        return view ('admindesa/datapenduduk',[
          'golongandarah' => $goldar,
          'agama' => $agama,
          'jeniskelamin' => $jeniskelamin,
          'kewarganegaraan' => $kewarganegaraan,
          'pendidikan' => $pendidikan,
          'hubKeluarga' => $hubKeluarga,
          'pekerjaan' => $pekerjaan,
          'statusperkawinan' => $statusperkawinan,
          'kab' => $ldesa[0]->kabupaten[0]->nama_kabupaten,
          'kec' => $ldesa[0]->kecamatan[0]->nama_kecamatan,
          'desa' => $ldesa[0]->desa[0]->nama_desa,
          'penduduk' => $penduduk
      ]);
    }

    public function dataprofil()
    {
        //cek status user Sadmin atau Adesa 
        $this->authorize('isDesa');

        $ldesa = User::where('id','=',auth()->user()->id)->with('kabupaten','kecamatan','desa')->get();

        $profil = Desa::where('id_desa','=',auth()->user()->id_desa)->get();
        return view ('admindesa/edit_profile_kampung',['profil' => $profil]);

    }

    public function editprofil(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya

                //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');

        $desa = Desa::where('id_desa','=',$id);

        $desa->update([
            'nama_desa' => $request['nama_desa'],
            'alamat_desa' => $request['alamat_desa'],
            'kepala_desa' => $request['kepala_desa'],
            'nip_kepala_desa' => $request['nip_kepala_desa'],
            'kode_pos' => $request['kode_pos'],
            'kerani_desa' => $request['kerani_desa'],
            'profil' => $request['profil'],
            'sejarah' => $request['sejarah'],
            'visi' => $request['visi'],
            'misi' => $request['misi'],
            'bts_timur' => $request['bts_timur'],
            'bts_barat' => $request['bts_barat'],
            'bts_selatan' => $request['bts_selatan'],
            'bts_utara' => $request['bts_utara']
        ]);

        return redirect('edit_profile');
    }

    public function tampildesa(Request $request)
    {
        //cek status user Sadmin atau Adesa 
        $this->authorize('isDesa');


        $goldar = Golongandarah::all();
        $jeniskelamin = Jeniskelamin::all();
        $kewarganegaraan = Kewarganegaraan::all();
        $pendidikan = Pendidikanterakhir::all();
        $hubKeluarga = Hubungankeluarga::all();
        $pekerjaan = Pekerjaan::all();
        $statusperkawinan = Statusperkawinan::all();
        $agama = Agama::all();

        $ldesa = auth()->user()->with('kabupaten','kecamatan','desa')->get();
        $dataPenduduk = Penduduk::where('id_kk', $request['cari'])
        ->orWhere('nik', $request['cari'])->with('kk','jeniskelamin','golongandarah','agamaa','statusperkawinan','pendidikans','pekerjaans','hubungankeluarga','kewarganegaraans')->get();
        return view ('admindesa/datapenduduk',[
            'golongandarah' => $goldar,
            'agama' => $agama,
            'jeniskelamin' => $jeniskelamin,
            'kewarganegaraan' => $kewarganegaraan,
            'pendidikan' => $pendidikan,
            'hubKeluarga' => $hubKeluarga,
            'pekerjaan' => $pekerjaan,
            'statusperkawinan' => $statusperkawinan,
            'kab' => $ldesa[0]->kabupaten[0]->nama_kabupaten,
            'kec' => $ldesa[0]->kecamatan[0]->nama_kecamatan,
            'desa' => $ldesa[0]->desa[0]->nama_desa,
            'penduduk' => $dataPenduduk
        ]);
    }


    public function perangkat_kampung()
    {
        //cek status user Sadmin atau Adesa 
        $this->authorize('isDesa');

        $ldesa = User::where('id','=',auth()->user()->id)->with('desa')->get();
        $list = Jabatan::all();
        $dataJabatan = Tupoksi::where('id_desa','=',auth()->user()->id_desa)->with('jabatan')->get();
        return view ('admindesa/perangkat_kampung',[
            'dataJabatan' => $dataJabatan,
            'listjabatan' => $list]);

    }


    public function create(Request $request)
    {
        //cek status user Sadmin atau Adesa 
        $this->authorize('isDesa');

        $ldesa = auth()->user()->with('kabupaten','kecamatan','desa')->get();
        $request['id_desa'] = $ldesa[0]->desa[0]->id_desa;

        $kk = Kk::where('id_kk','=',$request['id_kk']);
        $request['tanggal_lahir'] = date('Y-m-d', strtotime($request['tanggal_lahir']));
        if (count($kk) == 0){
            Kk::create($request->all());
        }
//        return $request->all();
        Penduduk::create( $request->all() );
        return redirect('datapenduduk');
    }

    public function edit(Request $request,$nik)
    {
        //cek status user Sadmin atau Adesa 
        $this->authorize('isDesa');
        
        $ldesa = auth()->user()->with('kabupaten','kecamatan','desa')->get();

        $request['id_desa'] = $ldesa[0]->desa[0]->id_desa;
        $kk = Kk::where('id_kk','=',$request['id_kk']);
        $kk->update([
            'id_kk'=> $request['id_kk'],
            'id_desa'=> $request['id_desa'],
            'alamat'=> $request['alamat'],
            'rt'=> $request['rt'],
            'rw'=> $request['rw'],
        ]);

        $penduduk = Penduduk::where( 'nik','=',$nik );
        $penduduk->update([
            'nik'=> $request['nik'],
            'id_kk' => $request['id_kk'],
            'nama' => $request['nama'],
            'tempat_lahir' => $request['tempat_lahir'],
            'tanggal_lahir' =>date('Y-m-d', strtotime($request['tanggal_lahir'])),
            'jenis_kelamin' => $request['jenis_kelamin'],
            'golongan_darah' => $request['golongan_darah'],
            'agama' => $request['agama'],
            'status_perkawinan' => $request['status_perkawinan'],
            'pendidikan' => $request['pendidikan'],
            'pekerjaan' => $request['pekerjaan'],
            'hubungan_keluarga' => $request['hubungan_keluarga'],
            'kewarganegaraan' => $request['kewarganegaraan'],
            'ayah' => $request['ayah'],
            'ibu' => $request['ibu'],
            'keberadaan' => $request['keberadaan'],
        ]);

        return redirect('datapenduduk');
    }

    public function hapus($id)
    {
        //cek status user Sadmin atau Adesa 
        $this->authorize('isDesa');
        
        $penduduk = Penduduk::where( 'nik','=',$id );
        $penduduk->delete();
        return redirect('datapenduduk');

    }
    public function import_excel(Request $request) 
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();

        // upload ke folder file penduduk di dalam folder public
        $file->move('file_penduduk',$nama_file);

        // import data
        Excel::import(new PendudukImport, public_path('/file_penduduk/'.$nama_file));

        // notifikasi dengan session
        Session::flash('sukses','Data Penduduk Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('datapenduduk');
    }

    public function edit_profil(){
        return view('admindesa/edit_profile_kampung');
    }
}
