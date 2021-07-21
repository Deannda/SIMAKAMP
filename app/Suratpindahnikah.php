<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratpindahnikah extends Model
{
    protected $table = 'surat_pindah_nikah';
    protected $fillable = ['tanggal_surat','lampiran','kepada','di','desa','kecamatan','kabupaten','nik'];


  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}