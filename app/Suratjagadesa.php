<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratjagadesa extends Model
{
    protected $table = 'surat_jaga_desa';
    protected $fillable = ['tanggal_surat','lampiran','keterangan'];



}
