<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use App\Kabupaten;

class masterkecamatanController extends Controller
{
   
    public function index(){
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
    	$kabupaten = Kabupaten::all();
    	$kecamatan = Kecamatan::select('id_kecamatan','id_kabupaten','nama_kecamatan','alamat_kecamatan','kode_pos','nama_camat','nip')->with('kabupaten')->get(); //select digunakan untuk memanggil data apa aja yang mau dipanggil
    	// return $kecamatan;
    	return view ('admin/master_kecamatan',['kabupaten' => $kabupaten,'kecamatan' => $kecamatan]);
    }
    public function create(Request $request)
    {
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
        Kecamatan::create([
            'id_kabupaten' => $request ['id_kabupaten'],
            'nama_kecamatan' => $request ['nama_kecamatan'],
            'alamat_kecamatan' => $request ['alamat_kecamatan'],
            'kode_pos' => $request['kode_pos'],
            'nama_camat' => $request['nama_camat'],
            'nip' => $request['nip']

        ]);
        
        return redirect('kecamatan');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
        $kecamatan = Kecamatan::where('id_kecamatan','=',$id);

        $kecamatan->update([
            'id_kabupaten' => $request['id_kabupaten'],
            'nama_kecamatan' => $request['nama_kecamatan'],
            'alamat_kecamatan' => $request ['alamat_kecamatan'],
            'kode_pos' => $request['kode_pos'],
            'nama_camat' => $request['nama_camat'],
            'nip' => $request['nip']
        ]);

        return redirect('kecamatan');
    }

    public function hapus($id)
    {
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
        $kecamatan = Kecamatan::where('id_kecamatan','=',$id);

        $kecamatan->delete();

        return redirect('kecamatan');

    }

    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}
