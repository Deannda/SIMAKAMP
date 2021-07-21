<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratpindah extends Model
{
    protected $table = 'surat_pindah';
    protected $fillable = ['tanggal_surat','kepala_keluarga','alamat_tujuan_pindah','jumlah_keluarga_pindah','anggota_keluarga_pindah','nik','id_desa'];

  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','kepala_keluarga');
	    }

}
