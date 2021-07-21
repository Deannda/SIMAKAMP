<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agama;

class masteragamaController extends Controller
{
 
    public function index(){
        //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');

        $data = Agama::all();
        return view ('admin/master_agama',['agama' => $data]);
    }
    public function create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya
        //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');


        Agama::create([
            'agama' => $request['agama'],
            
        ]);
        
        return redirect('agama');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
             //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');

        $agama = Agama::where('id_agama','=',$id);

        $agama->update([
            'agama' => $request['agama'],
            
        ]);
        return redirect('agama');
    }

    public function hapus($id)
    {
               //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');

        $agama = Agama::where('id_agama','=',$id);

        $agama->delete();

        return redirect('agama');

    }

    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}
