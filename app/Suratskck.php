<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratskck extends Model
{
    protected $table = 'surat_skck';
    protected $fillable = ['tanggal_surat','lampiran','fungsi','nik'];

  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}
