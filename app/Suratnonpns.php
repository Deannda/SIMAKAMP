<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratnonpns extends Model
{
    protected $table = 'surat_nonpns';
    protected $fillable = ['tanggal_surat','nik','id_desa'];

  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}