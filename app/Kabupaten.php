<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'data_kabupaten';
    protected $fillable = ['nama_kabupaten', 'logo_kabupaten', 'status'];

	
}
