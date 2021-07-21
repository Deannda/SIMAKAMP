<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nomorsurat;
class suratController extends Controller
{

    public function index()
    {
    	$this->authorize('isDesa');

    	$surat = Nomorsurat::where('id_desa','=', auth()->user()->id_desa )->with('jenissurat')->get();
    	// return $surat;
    	

    	return view ('admindesa/surat',['surat' => $surat]);
    }

}
