<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratpenghasilan extends Model
{
    protected $table = 'surat_penghasilan';
    protected $fillable = ['tanggal_surat','jumlah_penghasilan','saksi1','saksi2','saksi3','sebagai3','saksi4','sebagai4','mengetahui','nik'];

  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','saksi1');
	    }
	public function saksike2() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','saksi2');
	    }
	public function saksike3() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','saksi3');
	    }
	public function saksike4() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','saksi4');
	    }


}