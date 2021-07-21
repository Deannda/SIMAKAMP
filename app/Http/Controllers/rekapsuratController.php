<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statusperkawinan;
use App\Suratsitu;
use App\Nomorsurat;
use App\Suratkematian;
use App\Suratbedanama;
use App\Suratdomisili;
use App\Suratjalan;
use App\Suratkeramaian;
class rekapsuratController extends Controller
{

    public function index()
    {
        $this->authorize('isDesa');
        $surat=[];
    	return view ('admindesa/rekapsurat',['surat' => $surat]);
    }

    public function rekap(Request $request)
    {
    	
    	$tgl = explode('-', $request->date);
        $surat = [];
       
        // SITU
        $situ = Suratsitu::orderby('nomor_surat','asc')->with('penduduk')->get();
        foreach ($situ as $key => $data) {
            # code...
            $tglsurat = strtotime($data->created_at);
            if (($tglsurat >= strtotime($tgl[0])) and ($tglsurat <= strtotime($tgl[1]))) {
                # code...
                $idnomor = 1;
                $formatnomorsurat = Nomorsurat::where('id_no', $idnomor)->with('jenissurat')->first();
                $nosurat = $formatnomorsurat->no_surat.'/'.date('Y',$tglsurat).'/'.$data->nomor_surat;
                $jenissurat = $formatnomorsurat->jenissurat[0]->nama_surat;

                 array_push($surat, [ 'jenis_surat'=> $jenissurat, 'nomor_surat' => $nosurat,'nama' => $data->penduduk[0]->nama, 'alamat' => $data->penduduk[0]->kk[0]->alamat,'tglsurat'=>$tglsurat]);
            }
        }

        // KEMATIAN
        $suratKematian = Suratkematian::orderby('nomor_surat','asc')->with('penduduk')->get();
        foreach ($suratKematian as $key => $data) {
            # code...
            $tglsurat = strtotime($data->created_at);
            if (($tglsurat >= strtotime($tgl[0])) and ($tglsurat <= strtotime($tgl[1]))) {
                # code...
                // id nomor di dapat dari id_no pada tabel nomor_surat 
                $idnomor = 2;
                $formatnomorsurat = Nomorsurat::where('id_no', $idnomor)->with('jenissurat')->first();
                $nosurat = $formatnomorsurat->no_surat.'/'.date('Y',$tglsurat).'/'.$data->nomor_surat;
                $jenissurat = $formatnomorsurat->jenissurat[0]->nama_surat;

                 array_push($surat, [ 'jenis_surat'=> $jenissurat, 'nomor_surat' => $nosurat,'nama' => $data->penduduk[0]->nama, 'alamat' => $data->penduduk[0]->kk[0]->alamat,'tglsurat'=>$tglsurat]);
            }
        }
             //DOMISILI
        $suratdomisili = Suratdomisili::orderby('nomor_surat','asc')->with('penduduk')->get();
        foreach ($suratdomisili as $key => $data) {
            # code...
            $tglsurat = strtotime($data->created_at);
            if (($tglsurat >= strtotime($tgl[0])) and ($tglsurat <= strtotime($tgl[1]))) {
                # code...
                // id nomor di dapat dari id_no pada tabel nomor_surat 
                $idnomor = 3;
                $formatnomorsurat = Nomorsurat::where('id_no', $idnomor)->with('jenissurat')->first();
                $nosurat = $formatnomorsurat->no_surat.'/'.date('Y',$tglsurat).'/'.$data->nomor_surat;
                $jenissurat = $formatnomorsurat->jenissurat[0]->nama_surat;

                 array_push($surat, [ 'jenis_surat'=> $jenissurat, 'nomor_surat' => $nosurat,'nama' => $data->penduduk[0]->nama, 'alamat' => $data->penduduk[0]->kk[0]->alamat,'tglsurat'=>$tglsurat]);
            }
        }

             // BEDANAMA
        $suratbedanama = Suratbedanama::orderby('nomor_surat','asc')->with('penduduk')->get();
        foreach ($suratbedanama as $key => $data) {
            # code...
            $tglsurat = strtotime($data->created_at);
            if (($tglsurat >= strtotime($tgl[0])) and ($tglsurat <= strtotime($tgl[1]))) {
                # code...
                // id nomor di dapat dari id_no pada tabel nomor_surat 
                $idnomor = 4;
                $formatnomorsurat = Nomorsurat::where('id_no', $idnomor)->with('jenissurat')->first();
                $nosurat = $formatnomorsurat->no_surat.'/'.date('Y',$tglsurat).'/'.$data->nomor_surat;
                $jenissurat = $formatnomorsurat->jenissurat[0]->nama_surat;

                 array_push($surat, [ 'jenis_surat'=> $jenissurat, 'nomor_surat' => $nosurat,'nama' => $data->penduduk[0]->nama, 'alamat' => $data->penduduk[0]->kk[0]->alamat,'tglsurat'=>$tglsurat]);
            }
        }
                // JALAN
        $suratjalan= Suratjalan::orderby('nomor_surat','asc')->with('penduduk')->get();
        foreach ($suratjalan as $key => $data) {
            # code...
            $tglsurat = strtotime($data->created_at);
            if (($tglsurat >= strtotime($tgl[0])) and ($tglsurat <= strtotime($tgl[1]))) {
                # code...
                // id nomor di dapat dari id_no pada tabel nomor_surat 
                $idnomor = 5;
                $formatnomorsurat = Nomorsurat::where('id_no', $idnomor)->with('jenissurat')->first();
                $nosurat = $formatnomorsurat->no_surat.'/'.date('Y',$tglsurat).'/'.$data->nomor_surat;
                $jenissurat = $formatnomorsurat->jenissurat[0]->nama_surat;

                 array_push($surat, [ 'jenis_surat'=> $jenissurat, 'nomor_surat' => $nosurat,'nama' => $data->penduduk[0]->nama, 'alamat' => $data->penduduk[0]->kk[0]->alamat,'tglsurat'=>$tglsurat]);
            }
        }

                     // KERAMAIAN
        $suratkeramaian= Suratkeramaian::orderby('nomor_surat','asc')->with('penduduk')->get();
        foreach ($suratjalan as $key => $data) {
            # code...
            $tglsurat = strtotime($data->created_at);
            if (($tglsurat >= strtotime($tgl[0])) and ($tglsurat <= strtotime($tgl[1]))) {
                # code...
                // id nomor di dapat dari id_no pada tabel nomor_surat 
                $idnomor = 6;
                $formatnomorsurat = Nomorsurat::where('id_no', $idnomor)->with('jenissurat')->first();
                $nosurat = $formatnomorsurat->no_surat.'/'.date('Y',$tglsurat).'/'.$data->nomor_surat;
                $jenissurat = $formatnomorsurat->jenissurat[0]->nama_surat;

                 array_push($surat, [ 'jenis_surat'=> $jenissurat, 'nomor_surat' => $nosurat,'nama' => $data->penduduk[0]->nama, 'alamat' => $data->penduduk[0]->kk[0]->alamat,'tglsurat'=>$tglsurat]);
            }
        }



        
        
        

        return view ('admindesa/rekapsurat',['surat' => $surat]);
        
    }
}