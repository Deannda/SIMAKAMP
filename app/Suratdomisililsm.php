<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratdomisililsm extends Model
{
    protected $table = 'surat_domisili_lsm';
    protected $fillable = ['tanggal_surat','nama_perusahaan','dasar_pendirian','nama_pimpinan','jenis_usaha','alamat_sekretariat','keterangan'];

    

}
