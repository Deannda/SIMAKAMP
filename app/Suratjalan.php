<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratjalan extends Model
{
    protected $table = 'surat_jalan';
    protected $fillable = ['tanggal_surat','desa','kecamatan','kabupaten','provinsi','tujuan','jumlah_pengikut','pengikut','nik','id_desa'];

  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}
