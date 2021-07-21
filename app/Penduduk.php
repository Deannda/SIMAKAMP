<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'data_penduduk';
    protected $fillable = ['nik','nama','id_desa','tempat_lahir','tanggal_lahir','jenis_kelamin','golongan_darah','agama','status_perkawinan','pendidikan','pekerjaan','hubungan_keluarga','kewarganegaraan','ayah','ibu','keberadaan','id_kk'];

    public function kk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Kk::class,'id_kk','id_kk'); //yang pertama idnya harus cocok dengan tabel data_kabupate, yang kedua harus sesuai dengan field yang dibuat dengan yang dikecamatan
	    }
	public function jeniskelamin()
	{
		return $this->hasMany(Jeniskelamin::class,'id_jeniskelamin','jenis_kelamin');

	}
	public function golongandarah()
	{
		return $this->hasMany(Golongandarah::class,'id_golongandarah','golongan_darah');

	}
	public function agamaa()
	{
		return $this->hasMany(Agama::class,'id_agama','agama');

	}
	public function statusperkawinan()
	{
		return $this->hasMany(Statusperkawinan::class,'id_statusperkawinan','status_perkawinan');

	}
	public function pendidikans()
	{
		return $this->hasMany(Pendidikanterakhir::class,'id_pendidikanterakhir','pendidikan');

	}
	public function pekerjaans()
	{
		return $this->hasMany(Pekerjaan::class,'id_pekerjaan','pekerjaan');

	}
	public function hubungankeluarga()
	{
		return $this->hasMany(Hubungankeluarga::class,'id_hubungankeluarga','hubungan_keluarga');

	}
	public function kewarganegaraans()
	{
		return $this->hasMany(Kewarganegaraan::class,'id_kewarganegaraan','kewarganegaraan');

	}


}
