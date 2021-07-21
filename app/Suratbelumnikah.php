<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratbelumnikah extends Model
{
    protected $table = 'surat_belum_nikah';
    protected $fillable = ['tanggal_surat','ayah','ibu','saksi1','saksi2','wali','nama_pasangan','hubungan','nik'];

  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }
	public function ayahhh() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','ayah');
	    }
	public function ibuuu() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','ibu');
	    }
	public function saksike1() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','saksi1');
	    }
	public function saksike2() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','saksi2');
	    }
	public function walii() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','wali');
	    }
}
