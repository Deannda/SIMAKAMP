<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jeniskelamin;

class masterjeniskelaminController extends Controller
{
   
    public function index(){
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
    	$data = Jeniskelamin::all();
    	return view ('admin/master_jeniskelamin',['jeniskelamin' => $data]);
    }
    public function create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        

        Jeniskelamin::create([
            'jeniskelamin' => $request['jeniskelamin'],
            
        ]);
        
        return redirect('jeniskelamin');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
        $jeniskelamin = Jeniskelamin::where('id_jeniskelamin','=',$id);

        $jeniskelamin->update([
            'jeniskelamin' => $request['jeniskelamin'],
            
        ]);
        return redirect('jeniskelamin');
    }

    public function hapus($id)
    {
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
        $jeniskelamin = Jeniskelamin::where('id_jeniskelamin','=',$id);

        $jeniskelamin->delete();

        return redirect('jeniskelamin');

    }

    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}

