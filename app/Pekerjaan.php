<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'data_pekerjaan';
    protected $fillable = ['pekerjaan'];
}
