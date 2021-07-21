<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
	use Notifiable;
    protected $table = 'data_pengguna';
    protected $fillable = ['username','password','nama','alamat','no_hp','email','keterangan','id_desa','id_kecamatan','id_kabupaten'];

    public function kabupaten() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Kabupaten::class,'id_kabupaten','id_kabupaten'); //yang pertama idnya harus cocok dengan tabel data_kabupate, yang kedua harus sesuai dengan field yang dibuat dengan yang dikecamatan
	    }
	public function kecamatan() 
	    {
	        return $this->hasMany(Kecamatan::class,'id_kecamatan','id_kecamatan'); 
	    }
	public function desa() 
	    {
	        return $this->hasMany(Desa::class,'id_desa','id_desa'); 
	    }
}
