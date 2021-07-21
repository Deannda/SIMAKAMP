<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil_desa extends Model
{

    protected $table = 'profil_desa';
    protected $fillable = ['id_desa','profil','sejarah','bts_utara','bts_timur','bts_selatan','bts_barat'];



}
