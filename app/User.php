<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $table = 'data_pengguna';

    protected $fillable = ['username','password','name','alamat','no_hp','email','keterangan','id_desa','id_kecamatan','id_kabupaten'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function kabupaten() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
        {
            return $this->hasMany(Kabupaten::class,'id_kabupaten','id_kabupaten'); //yang pertama idnya harus cocok dengan tabel data_kabupate, yang kedua harus sesuai dengan field yang dibuat dengan yang dikecamatan
        }
    public function kecamatan()
        {
            return $this->hasMany(Kecamatan::class,'id_kecamatan','id_kecamatan');
        }
    public function desa()
        {
            return $this->hasMany(Desa::class,'id_desa','id_desa');
        }

}
