<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hubungankeluarga;

class masterhubungankeluargaController extends Controller
{
  
    public function index(){
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
    	$data = Hubungankeluarga::all();
    	return view ('admin/master_hubungankeluarga',['hubungankeluarga' => $data]);
    }
    public function create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        

        Hubungankeluarga::create([
            'hubungankeluarga' => $request['hubungankeluarga'],
            
        ]);
        
        return redirect('hubungankeluarga');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
        $hubungankeluarga = Hubungankeluarga::where('id_hubungankeluarga','=',$id);

        $hubungankeluarga->update([
            'hubungankeluarga' => $request['hubungankeluarga'],
            
        ]);
        return redirect('hubungankeluarga');
    }

    public function hapus($id)
    {
           //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');
        
        $hubungankeluarga = Hubungankeluarga::where('id_hubungankeluarga','=',$id);

        $hubungankeluarga->delete();

        return redirect('hubungankeluarga');

    }

    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}
