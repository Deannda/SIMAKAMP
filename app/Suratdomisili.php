<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratdomisili extends Model
{
    protected $table = 'surat_domisili';
    protected $fillable = ['tanggal_surat','tanggal_domisili','nik','id_desa','fungsi'];


  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }


}
