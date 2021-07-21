<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratdispensasinikah extends Model
{
    protected $table = 'surat_dispensasi_nikah';
    protected $fillable = ['tanggal_surat','lampiran','sebagai1','nik','sebagai2','nama','tempat_lahir','tanggal_lahir','warga','agama','status','alamat','keterangan','tanggal_nikah'];


  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}
