<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratprofesi extends Model
{
    protected $table = 'surat_profesi';
    protected $fillable = ['tanggal_surat','nipnik','ketprof','fungsi','nik'];

  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}