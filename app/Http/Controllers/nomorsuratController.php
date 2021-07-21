<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nomorsurat;
use App\Jenissurat;

class nomorsuratController extends Controller
{
   
    public function index(){
           //cek status user Sadmin atau Adesa 
     
        $this->authorize('isDesa');

            $jenissurat = [];

            $datasurat = Jenissurat::all();
            foreach ($datasurat as $key => $value) {
                # code...
                $ceknomorsurat = Nomorsurat::where('id_desa','=',auth()->user()->id_desa)->where('id_jenissurat','=',$value->id_jenissurat)->count();

                if ($ceknomorsurat = 0) {
                    # code...
                    array_push($jenissurat, ['id_jenissurat' => $value->id_jenissurat,'nama_surat' => $value->nama_surat,]);
                }
            }
            
            $nomorsurat = Nomorsurat::where('id_desa','=',auth()->user()->id_desa)->with('jenissurat')->get();
            

            return view ('admindesa/listsurat',['nomorsurat' => $nomorsurat,'jenissurat' => $jenissurat]);



    }
     public function create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya
        
        $this->authorize('isDesa');
            # code...
            Nomorsurat::create([
                'id_desa' => auth()->user()->id_desa,
                'id_jenissurat' => $request['id_jenissurat'],
                'no_surat' => $request['nomor_surat'],
                
            ]);
        return redirect('nomorsurat');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        $this->authorize('isDesa');
        
        $nomorsurat = Nomorsurat::where('id_no','=',$id);

        $nomorsurat->update([
            'no_surat' => $request['nomor_surat'],
        ]);
        return redirect('nomorsurat');
    }

       public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}