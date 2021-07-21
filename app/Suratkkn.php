<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratkkn extends Model
{
    protected $table = 'surat_kkn';
    protected $fillable = ['tanggal_surat','kepada','di','proker','tema'];

   

}