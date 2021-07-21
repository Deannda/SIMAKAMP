<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratbedanama extends Model
{
    protected $table = 'surat_beda_nama';
    protected $fillable = ['tanggal_surat','keterangan_kesalahan','nik','id_desa'];

  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}