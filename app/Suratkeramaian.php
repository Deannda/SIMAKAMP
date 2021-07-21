<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratkeramaian extends Model
{
    protected $table = 'surat_keramaian';
    protected $fillable = ['tanggal_surat','lampiran','kepada','di','acara','hari_tanggal','waktu','tempat','nik','id_desa'];

  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}