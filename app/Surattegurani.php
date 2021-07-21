<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surattegurani extends Model
{
    protected $table = 'surat_tegurani';
    protected $fillable = ['tanggal_surat','lampiran','kepada','di','dasar_teguran','isi_teguran'];

   

}