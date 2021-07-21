<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratsktmsekolah extends Model
{
    protected $table = 'surat_sktm_sekolah';
    protected $fillable = ['tanggal_surat','orang_tua','sek_univ','kel_jur','fungsi','nik'];

  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','orang_tua');
	    }

}