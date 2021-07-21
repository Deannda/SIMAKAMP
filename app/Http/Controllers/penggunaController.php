<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Desa;
use App\Kecamatan;
use App\Kabupaten;

class penggunaController extends Controller
{

    public function index()
    {
    	$this->authorize('isAdmin');
        $kabupaten = Kabupaten::all();
    	$kecamatan = Kecamatan::all();
        $desa = Desa::all();
    	$pengguna = User::select('id','id_desa','id_kecamatan','id_kabupaten','username','password','name','alamat','no_hp','email','keterangan')->orderby('created_at','desc')->with('kabupaten','kecamatan','desa')->get(); //select digunakan untuk memanggil data apa aja yang mau dipanggil
    	// return $pengguna;

    return view ('admin/manajemen_pengguna',['kabupaten' => $kabupaten,'kecamatan' => $kecamatan,'desa' => $desa, 'pengguna' => $pengguna]);
    }

    public function desa($idkeb,$idkec)
    {
        $data = Desa::where('id_kabupaten',$idkeb)->where('id_kecamatan',$idkec)->get();

        return response()->json($data);

    }

     public function kecamatan($id)
    {
        $data = Kecamatan::where('id_kabupaten',$id)->get();

        return response()->json($data);

    }


    public function create(Request $request)
    {
        $this->authorize('isAdmin');
        User::create([
            'id_desa' => $request['id_desa'],
            'id_kecamatan' => $request['id_kecamatan'],
            'id_kabupaten' => $request['id_kabupaten'],
            'username' => $request['username'],
            'password' => bcrypt($request['password']),
            'name' => $request['nama'],
            'alamat' => $request['alamat'],
            'no_hp' => $request['no_hp'],
            'email' => $request['email'],
            'keterangan' => $request['keterangan']
        ]);

        return redirect('pengguna');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
        $this->authorize('isAdmin');
        $pengguna = User::where('id','=',$id);

           if (is_null($request->password)) {
               # code...
            $pengguna->update([
            'id_desa' => $request['id_desa'],
            'id_kecamatan' => $request['id_kecamatan'],
            'id_kabupaten' => $request['id_kabupaten'],
            'username' => $request['username'],
            'name' => $request['nama'],
            'alamat' => $request['alamat'],
            'no_hp' => $request['no_hp'],
            'email' => $request['email'],
            'keterangan' => $request['keterangan']
            ]);
           } else {
             $pengguna->update([
            'id_desa' => $request['id_desa'],
            'id_kecamatan' => $request['id_kecamatan'],
            'id_kabupaten' => $request['id_kabupaten'],
            'username' => $request['username'],
            'password' => bcrypt($request['password']),
            'name' => $request['nama'],
            'alamat' => $request['alamat'],
            'no_hp' => $request['no_hp'],
            'email' => $request['email'],
            'keterangan' => $request['keterangan']
            ]);
           }

            return redirect('pengguna');
    }

    public function hapus($id)
    {
        $this->authorize('isAdmin');
        $pengguna = User::where('id','=',$id);

        $pengguna->delete();

        return redirect('pengguna');

    }

    public function store(){ // fungsi store untuk mengolah data yang dikirim dari
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}
