<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desa;
use App\Kecamatan;
use App\Kabupaten;

class masterdesaController extends Controller
{

    public function index(){
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');

        $kabupaten = Kabupaten::all();
        $kecamatan = Kecamatan::all();
    	$desa = Desa::select('id_desa','id_kecamatan','id_kabupaten','nama_desa','alamat_desa','kepala_desa','nip_kepala_desa','kode_pos','kerani_desa','visi','misi','profil','sejarah','bts_utara','bts_timur','bts_selatan','bts_barat')->with('kabupaten','kecamatan')->get(); //select digunakan untuk memanggil data apa aja yang mau dipanggil
    	// return $kecamatan;

        return view ('admin/master_desa',['kabupaten' => $kabupaten,'kecamatan' => $kecamatan,'desa' => $desa]);
    }
    public function create(Request $request)
    {
            //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');

        Desa::create([
            'id_kabupaten' => $request['id_kabupaten'],
            'id_kecamatan' => $request['id_kecamatan'],
            'nama_desa' => $request['nama_desa'],
            'alamat_desa' => $request['alamat_desa'],
            'kepala_desa' => $request['kepala_desa'],
            'nip_kepala_desa' => $request['nip_kepala_desa'],
            'kode_pos' => $request['kode_pos'],
            'kerani_desa' => $request['kerani_desa']
            
        ]);

        return redirect('desa');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya

                //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');


        $desa = Desa::where('id_desa','=',$id);

        $desa->update([
            'id_kabupaten' => $request['id_kabupaten'],
            'id_kecamatan' => $request['id_kecamatan'],
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

        return redirect('desa');
    }

    public function hapus($id)
    {
                //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');


        $desa = Desa::where('id_desa','=',$id);

        $desa->delete();

        return redirect('desa');

    }

    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}
