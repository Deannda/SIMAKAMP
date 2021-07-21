<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratsitu extends Model
{
    protected $table = 'surat_situ';
    protected $fillable = ['tanggal_surat','lampiran','id_desa','kepada','di','alamat_usaha','luas_usaha','jenis_usaha','merek_usaha','ttd','nik'];


  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}
