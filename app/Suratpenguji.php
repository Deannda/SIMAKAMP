<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratpenguji extends Model
{
    protected $table = 'surat_penguji';
    protected $fillable = ['tanggal_surat','lampiran','hari_tanggal','waktu','tempat','periode','nik','keterangan1','nik2','keterangan2','nik3','keterangan3','nik4','keterangan4','nik5','keterangan5'];

  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }
	public function nikke2() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik2');
	    }
	public function nikke3() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik3');
	    }
	public function nikke4() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik4');
	    }
	public function nikke5() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik5');
	    }
}
