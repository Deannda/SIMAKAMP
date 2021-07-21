<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendidikanterakhir;

class masterpendidikanterakhirController extends Controller
{

    public function index()
    {

        $this->authorize('isAdmin');
    	$data = Pendidikanterakhir::all();
    	return view ('admin/master_pendidikanterakhir',['pendidikanterakhir' => $data]);
    }
    public function create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya
         $this->authorize('isAdmin');
         
        Pendidikanterakhir::create([
            'pendidikanterakhir' => $request['pendidikanterakhir'],
  
        ]);
    	
        return redirect('pendidikan');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya

         $this->authorize('isAdmin');

        $pendidikanterakhir = Pendidikanterakhir::where('id_pendidikanterakhir','=',$id);

            $pendidikanterakhir->update([
            'pendidikanterakhir' => $request['pendidikanterakhir'],
          
            ]);
            return redirect('pendidikan');
     }

    public function hapus($id)
    {
         $this->authorize('isAdmin');

        $pendidikanterakhir = Pendidikanterakhir::where('id_pendidikanterakhir','=',$id);

        $pendidikanterakhir->delete();

        return redirect('pendidikan');

    }

    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}