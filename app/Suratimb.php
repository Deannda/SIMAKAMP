<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratimb extends Model
{
    protected $table = 'surat_imb';
    protected $fillable = ['tanggal_surat','lampiran','nik','id_desa'];

  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Suratimb::class,'nik','nik');
	    }

}