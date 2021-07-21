<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kewarganegaraan;

class masterkewarganegaraanController extends Controller
{

    public function index(){
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
    	$data = Kewarganegaraan::all();
    	return view ('admin/master_kewarganegaraan',['kewarganegaraan' => $data]);
    }
    public function create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        

        Kewarganegaraan::create([
            'kewarganegaraan' => $request['kewarganegaraan'],
  
        ]);
    	
        return redirect('kewarganegaraan');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
        $kewarganegaraan = Kewarganegaraan::where('id_kewarganegaraan','=',$id);

            $kewarganegaraan->update([
            'kewarganegaraan' => $request['kewarganegaraan'],
          
            ]);
            return redirect('kewarganegaraan');
     }

    public function hapus($id)
    {
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
        $kewarganegaraan = Kewarganegaraan::where('id_kewarganegaraan','=',$id);

        $kewarganegaraan->delete();

        return redirect('kewarganegaraan');

    }

    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}