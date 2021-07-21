<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statusperkawinan;

class masterstatusperkawinanController extends Controller
{

    public function index()
    {
        $this->authorize('isAdmin');
    	$data = Statusperkawinan::all();
    	return view ('admin/master_statusperkawinan',['statusperkawinan' => $data]);
    }
    public function create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya

        $this->authorize('isAdmin');
        Statusperkawinan::create([
            'statusperkawinan' => $request['statusperkawinan'],
  
        ]);
    	
        return redirect('statusperkawinan');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
        $this->authorize('isAdmin');
        $statusperkawinan = Statusperkawinan::where('id_statusperkawinan','=',$id);

            $statusperkawinan->update([
            'statusperkawinan' => $request['statusperkawinan'],
          
            ]);
            return redirect('statusperkawinan');
     }

    public function hapus($id)
    {
        $this->authorize('isAdmin');
        $statusperkawinan = Statusperkawinan::where('id_statusperkawinan','=',$id);

        $statusperkawinan->delete();

        return redirect('statusperkawinan');

    }

    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}
