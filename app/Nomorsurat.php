<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomorsurat extends Model
{
    protected $table = 'nomor_surat';
    protected $fillable = ['no_surat','id_desa','id_jenissurat'];

       public function jenissurat() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	    	
	        return $this->hasMany(Jenissurat::class,'id_jenissurat','id_jenissurat'); //yang pertama idnya harus cocok dengan tabel data_kabupate, yang kedua harus sesuai dengan field yang dibuat dengan yang dikecamatan
	    }
	   public function desa() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	    	
	        return $this->hasMany(Desa::class,'id_desa','id_desa'); //yang pertama idnya harus cocok dengan tabel data_kabupate, yang kedua harus sesuai dengan field yang dibuat dengan yang dikecamatan
	    }
	}