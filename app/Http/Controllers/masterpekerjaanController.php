<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pekerjaan;

class masterpekerjaanController extends Controller
{

    public function index(){
    	$data = Pekerjaan::all();
    	return view ('admin/master_pekerjaan',['pekerjaan' => $data]);
    }
    public function create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya

        Pekerjaan::create([
            'pekerjaan' => $request['pekerjaan'],
  
        ]);
    	
        return redirect('pekerjaan');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
        $pekerjaan = Pekerjaan::where('id_pekerjaan','=',$id);

            $pekerjaan->update([
            'pekerjaan' => $request['pekerjaan'],
          
            ]);
            return redirect('pekerjaan');
     }

    public function hapus($id)
    {
        $pekerjaan = Pekerjaan::where('id_pekerjaan','=',$id);

        $pekerjaan->delete();

        return redirect('pekerjaan');

    }

    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}
