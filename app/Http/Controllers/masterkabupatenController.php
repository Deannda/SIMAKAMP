<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kabupaten;

class masterkabupatenController extends Controller
{
  
    public function index(){
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
    	$data = Kabupaten::all();
    	return view ('admin/master_kabupaten',['kabupaten' => $data]);
    }
    public function create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        

        // untuk simpan file ke penyimpanan
        $request->file('logo_kabupaten')->store('logo_kabupaten');
        //untuk mengambil nama file
        $nama = $request->file('logo_kabupaten')->hashName();

        Kabupaten::create([
            'nama_kabupaten' => $request['nama_kabupaten'],
            'logo_kabupaten' => $nama,
            'status' => $request['status']
        ]);
        
        return redirect('kabupaten');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
        $kabupaten = Kabupaten::where('id_kabupaten','=',$id);

        if ($request->file('logo_kabupaten')) {
            # code...
            $request->file('logo_kabupaten')->store('logo_kabupaten');
            $nama = $request->file('logo_kabupaten')->hashName();

            $kabupaten->update([
                'nama_kabupaten' => $request['nama_kabupaten'],
                'logo_kabupaten' => $nama,
                'status' => $request['status']
            ]);
            return redirect('kabupaten');
        }

        $kabupaten->update([
            'nama_kabupaten' => $request['nama_kabupaten'],
            'logo_kabupaten' => $request['logo1'],
            'status' => $request['status']
        ]);

        return redirect('kabupaten');
    }

    public function hapus($id)
    {
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
        $kabupaten = Kabupaten::where('id_kabupaten','=',$id);

        $kabupaten->delete();

        return redirect('kabupaten');

    }

    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}
