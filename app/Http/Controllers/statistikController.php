<?php

namespace App\Http\Controllers;

use App\Agama;
use App\Golongandarah;
use App\Jeniskelamin;
use App\Kk;
use App\Kewarganegaraan;
use App\Pekerjaan;
use App\Pendidikanterakhir;
use App\Penduduk;
use App\Statusperkawinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class statistikController extends Controller
{
    public function index()
    {
        return view('admindesa/statistik');
    }

    public function dataStatistik()
    {
        $data['penduduk'] = Penduduk::where('id_desa', Auth::user()->id_desa)->count();
        $data['kk'] = Kk::where('id_desa', Auth::user()->id_desa)->count();

        $data['listAgama'] = [];
        $data['dataAgama'] = [];
        $agama = Agama::all();
        foreach ($agama as $list){
            $jml = Penduduk::where('id_desa', Auth::user()->id_desa)->where('agama',$list->id_agama)->count();
            if($jml > 0){
                array_push($data['listAgama'],$list->agama);
                array_push($data['dataAgama'],$jml);
            }
        }

        $data['listJenisKelamin'] = [];
        $data['dataJenisKelamin'] = [];
        $jenisKelamin = Jeniskelamin::all();
        foreach ($jenisKelamin as $list){
            $jml = Penduduk::where('id_desa', Auth::user()->id_desa)->where('jenis_kelamin',$list->id_jeniskelamin)->count();
            if ($jml > 0){
                array_push($data['listJenisKelamin'],$list->jeniskelamin);
                array_push($data['dataJenisKelamin'],$jml);
            }
        }

        $data['listGolonganDarah'] = [];
        $data['dataGolonganDarah'] = [];
        $golonganDarah = Golongandarah::all();
        foreach ($golonganDarah as $list){
            $jml = Penduduk::where('id_desa', Auth::user()->id_desa)->where('golongan_darah',$list->id_golongandarah)->count();
            if ($jml > 0){
                array_push($data['listGolonganDarah'],$list->golongandarah);
                array_push($data['dataGolonganDarah'],$jml);
            }
        }

        $data['listPendidikan'] = [];
        $data['dataPendidikan'] = [];
        $pendidikan = Pendidikanterakhir::all();
        foreach ($pendidikan as $list){
            $jml = Penduduk::where('id_desa', Auth::user()->id_desa)->where('pendidikan',$list->id_pendidikanterakhir)->count();
            if ($jml > 0){
                array_push($data['listPendidikan'],$list->pendidikanterakhir);
                array_push($data['dataPendidikan'],$jml);
            }
        }

        $data['listPekerjaan'] = [];
        $data['dataPekerjaan'] = [];
        $pekerjaan = Pekerjaan::all();
        foreach ($pekerjaan as $list){
            $jml = Penduduk::where('id_desa', Auth::user()->id_desa)->where('pekerjaan',$list->id_pekerjaan)->count();
            if($jml > 0){
                array_push($data['listPekerjaan'],$list->pekerjaan);
                array_push($data['dataPekerjaan'],$jml);
            }
        }

        $data['listKewarganegaraan'] = [];
        $data['dataKewarganegaraan'] = [];
        $kewarganegaraan = Kewarganegaraan::all();
        foreach ($kewarganegaraan as $list){
            $jml = Penduduk::where('id_desa', Auth::user()->id_desa)->where('kewarganegaraan',$list->id_kewarganegaraan)->count();
            if($jml > 0){
                array_push($data['listKewarganegaraan'],$list->kewarganegaraan);
                array_push($data['dataKewarganegaraan'],$jml);
            }
        }

        $data['listStatusPerkawinan'] = [];
        $data['dataStatusPerkawinan'] = [];
        $statusPerkawinan = Statusperkawinan::all();
        foreach ($statusPerkawinan as $list){
            $jml = Penduduk::where('id_desa', Auth::user()->id_desa)->where('status_perkawinan',$list->id_statusperkawinan)->count();
            if($jml > 0){
                array_push($data['listStatusPerkawinan'],$list->statusperkawinan);
                array_push($data['dataStatusPerkawinan'],$jml);
            }
        }


        return response()->json($data);
    }
}
