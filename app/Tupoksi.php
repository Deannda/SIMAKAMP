<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tupoksi extends Model
{
    protected $table = 'tupoksi';
    protected $fillable = ['id_desa','id_jabatan','nama'];

   
	public function desa() 
	    {
	        return $this->hasMany(Desa::class,'id_desa','id_desa'); 
	    }
	public function jabatan() 
	    {
	        return $this->hasMany(Jabatan::class,'id_jabatan','id_jabatan'); 
	    }
}


