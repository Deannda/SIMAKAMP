<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kk extends Model
{
    protected $table = 'data_kk';
    protected $fillable = ['id_kk','alamat','rt','rw','id_desa'];

    public function desa() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Kk::class,'id_desa','id_desa');
	    }

}
