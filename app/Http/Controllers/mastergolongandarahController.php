<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Golongandarah;

class mastergolongandarahController extends Controller
{

    public function index()
    {
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
     $data = Golongandarah::all();
     return view ('admin/master_golongandarah',['golongandarah' => $data]);
    }
    public function create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        

        Golongandarah::create([
            'golongandarah' => $request['golongandarah'],

        ]);

        return redirect('golongandarah');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
        $golongandarah = Golongandarah::where('id_golongandarah','=',$id);

        $golongandarah->update([
            'golongandarah' => $request['golongandarah'],

        ]);
        return redirect('golongandarah');
    }

    public function hapus($id)
    {
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
        $golongandarah = Golongandarah::where('id_golongandarah','=',$id);

        $golongandarah->delete();

        return redirect('golongandarah');

    }

    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}

