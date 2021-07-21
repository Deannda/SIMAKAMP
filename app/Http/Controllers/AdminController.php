<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	
	public function dashboard()
	{
        //cek status user Sadmin atau Adesa 
        $this->authorize('isAdmin');

		return view ('admin/dashboard');
	}
}
