<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenissurat;
use App\Desa;

class jenissuratController extends Controller
{
   

    public function index(){
           //cek status user Sadmin atau Adesa 
     
        $this->authorize('isAdmin');
            $jenissurat = Jenissurat::all();
            
            return view ('admin/manajemen_surat',['jenissurat' => $jenissurat]);



    }
    public function create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya
        
        $this->authorize('isAdmin');
            # code...
            Jenissurat::create([
                'nama_surat' => $request['nama_surat'],
                
            ]);
        return redirect('jenissurat');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
        $jenissurat = Jenissurat::where('id_jenissurat','=',$id);

        $jenissurat->update([
            'nama_surat' => $request['nama_surat'],
        ]);
        return redirect('jenissurat');
    }

    public function hapus($id)
    {
           //cek status user Sadmin atau Adesa 
       
        $this->authorize('isAdmin');
        
        $jenissurat = Jenissurat::where('id_jenissurat','=',$id);

        $jenissurat->delete();

        return redirect('jenissurat');

    }

    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}