<?php

namespace App\Imports;

use App\Penduduk;
use App\Kk;
use App\Jeniskelamin;
use App\Agama;
use App\Golongandarah;
use App\Statusperkawinan;
use App\Pendidikanterakhir;
use App\Pekerjaan;
use App\Hubungankeluarga;
use App\Kewarganegaraan;
use Maatwebsite\Excel\Concerns\ToModel;

class PendudukImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

       $return = [];
       
       $kk = Kk::where('id_kk', $row[2])->count();
       if ($kk == 0) {
             # code...
         $insertKK =  new Kk([
            'id_kk' => $row[2],
            'id_desa' => auth()->user()->id_desa,
            'rt' => $row[18],
            'rw' => $row[19],
            'alamat' => $row[20]
        ]);
         array_push($return, $insertKK);
     }
         // perhatikan de aku tunjukin 1 untuk jenis_kelamin
     $jk = Jeniskelamin::where('jeniskelamin',$row[7])->first();
     $agama = Agama::where('agama',$row[9])->first();
     $goldar = Golongandarah::where('golongandarah',$row[8])->first();
     $status = Statusperkawinan::where('statusperkawinan',$row[10])->first();
     $pendidikan = Pendidikanterakhir::where('pendidikanterakhir',$row[11])->first();
     $pekerjaan = Pekerjaan::where('pekerjaan',$row[12])->first();
     $hubungan = Hubungankeluarga::where('hubungankeluarga',$row[13])->first();
     $warga = Kewarganegaraan::where('kewarganegaraan',$row[14])->first();




     $penduduk = Penduduk::where('nik', $row[1])->count();
     if ($penduduk == 0) {
             # code...
         $insertPenduduk =  new Penduduk([
            'nik' => $row[1],
            'id_kk' => $row[2], 
            'id_desa' => $row[3], 
            'nama' => $row[4],
            'tempat_lahir' =>$row[5], 
            'tanggal_lahir' => $this->transformDate($row[6]),
            'jenis_kelamin' => $jk->id_jeniskelamin,
            'golongan_darah' => $goldar->id_golongandarah, 
            'agama' => $agama->id_agama,
            'status_perkawinan' =>$status->id_statusperkawinan,
            'pendidikan' => $pendidikan->id_pendidikanterakhir, 
            'pekerjaan' => $pekerjaan->id_pekerjaan,
            'hubungan_keluarga' => $hubungan->id_hubungankeluarga,
            'kewarganegaraan' => $warga->id_kewarganegaraan, 
            'ayah' => $row[15],
            'ibu' => $row[16],
            'keberadaan' => $row[17], 
        ]);
         array_push($return, $insertPenduduk);

     }

     

     return $return;
     
 }

 public function transformDate($value, $format = 'Y-m-d')
 {
    try {
        return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
    } catch (\ErrorException $e) {
        return \Carbon\Carbon::createFromFormat($format, $value);
    }
}
}
