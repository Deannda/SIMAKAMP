<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'data_desa';
    protected $fillable = ['nama_desa','alamat_desa','kepala_desa','nip_kepala_desa','kode_pos','kerani_desa','profil','visi','misi','sejarah','bts_utara','bts_timur','bts_selatan','bts_barat','id_kabupaten','id_kecamatan'];

    public function kabupaten() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Kabupaten::class,'id_kabupaten','id_kabupaten'); //yang pertama idnya harus cocok dengan tabel data_kabupate, yang kedua harus sesuai dengan field yang dibuat dengan yang dikecamatan
	    }
	public function kecamatan() 
	    {
	        return $this->hasMany(Kecamatan::class,'id_kecamatan','id_kecamatan'); 
	    }
}


