<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratsktmbdt extends Model
{
    protected $table = 'surat_sktm_bdt';
    protected $fillable = ['tanggal_surat','orang_tua','fungsi','petugas','nik'];

   
  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','orang_tua');
	    }

}
