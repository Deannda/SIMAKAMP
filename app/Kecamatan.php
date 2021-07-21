<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'data_kecamatan';
    protected $fillable = ['nama_kecamatan','alamat_kecamatan','kode_pos','nama_camat','nip','id_kabupaten'];

    public function kabupaten() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Kabupaten::class,'id_kabupaten','id_kabupaten'); //yang pertama idnya harus cocok dengan tabel data_kabupate, yang kedua harus sesuai dengan field yang dibuat dengan yang dikecamatan
	    }
}
