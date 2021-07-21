<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratkematian extends Model
{
    protected $table = 'surat_kematian';
    protected $fillable = ['tanggal_surat','tanggal_kematian','tempat_kematian','sebab','id_kk','nik','id_desa','pasangan'];

    public function kk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Kk::class,'id_kk','id_kk');
	    }
  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }
	public function pasangannn() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','pasangan');
	    }

}
