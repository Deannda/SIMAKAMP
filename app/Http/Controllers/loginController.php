<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\User;

class loginController extends Controller
{
    public function index()
    {
    	return view ('welcome');
    }
    public function checklogin(Request $request)
    {

    	$data_pengguna = array(
    		'email' => $request->get('username'),
    		'password' => $request->get('password')
    	);

    	if(Auth::attempt($request->only('username','password')))
    	{
    	    $user = User::where('id','=',\auth()->user()->id)->with('desa','kecamatan','kabupaten')->get();
//    	    return $user;
    	    Session::put('desa', $user[0]->desa[0]->nama_desa);
    	    Session::put('kecamatan',$user[0]->kecamatan[0]->nama_kecamatan);
    	    Session::put('kabupaten',$user[0]->kabupaten[0]->nama_kabupaten);
            Session::put('logokabupaten',$user[0]->kabupaten[0]->logo_kabupaten);
            Session::put('statuskabupaten',$user[0]->kabupaten[0]->status);

    	    if (\auth()->user()->keterangan == 'admin'){
                return redirect('dashboard');
            } else {
                return redirect('home');
            }
        	} else {
    	    return back()->with('error', 'Login Gagal! Periksa Kembali Username dan Password Anda');
    	}
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


     public function editpassword(Request $request, $id)
     {
       
        $validatedData = $request->validate([
           'password_baru' => 'required|string|min:6',
        ]);

        //Change Password
        $user = User::where('id','=',$id);
        $user->update([
            'password'=> bcrypt($request['password_baru']),
        ]);
        

         if(auth()->user()->keterangan == 'admin'){
            return view('admin/dashboard',['successPassword' => 'Password berhasil di perbarui']);
         }else{
            return view('admindesa/statistik',['successPassword' => 'Password berhasil di perbarui']);
         }


    }

}
