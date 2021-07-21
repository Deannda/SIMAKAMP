<?php

function bulanIndo($tgl){
  $bulan = [
    '01' => 'januari',
    '02' => 'februari',
    '03' => 'Maret',
    '04' => 'april',
    '05' => 'mei',
    '06' => 'juni',
    '07' => 'juli',
    '08' => 'agustus',
    '09' => 'september',
    '10' => 'oktober',
    '11' => 'November',
    '12' => 'Desember',
  ];

  $tglIndo = date('d',strtotime($tgl)).' '. ucfirst(strtolower($bulan[date('m',strtotime($tgl))])) .' '.date('Y',strtotime($tgl));
  return  $tglIndo;
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>



	</title>
</head>
<body >
  <div  >
   <table>
    <thead>

    </thead>
    <tbody >
     <!-- melakukan pengecekan kondisi dimana kalau $kop berisi 'denganKop' maka Kop surat akan ditampilkan -->
     @if($kop == 'denganKop')

     <tr>
      <td  width="70"><img src="image/sepotong.jpeg" width="130" height="185"  ></td>
      <td align="center" width="80%">
        <!-- size untuk mengganti ukuran font -->
        <font size="20" face="Times New Roman">PEMERINTAH KABUPATEN {{ strtoupper($desa[0]->kabupaten[0]->nama_kabupaten)}} </font><br>
        <font size="33" face="Times New Roman">{{ strtoupper($desa[0]->kabupaten[0]->status)}} {{ strtoupper($desa[0]->nama_desa) }}</font><br>
        <font size="20" face="Times New Roman">KECAMATAN {{ strtoupper($desa[0]->kecamatan[0]->nama_kecamatan) }} </font><br>
        <font size="12" face="Times New Roman"><strong>Alamat: {{ $desa[0]->alamat_desa }} </strong></font><br>
        <font size="12" face="Times New Roman"><strong>Website: <a href="https://www.sepotong.desa.id/ ">https://www.sepotong.desa.id/ </a></strong></font>


      </td>
    </tr>
    <hr size="1000px" double #8c8c8c border="1000px" height="3px">


    <tr>
      <td colspan="2" height="10px"></td>
    </tr>
    @else
    <tr>
      <td colspan="2" height="100px"></td>
    </tr>
    @endif


    <tr>
      <td width="70" valign="top">
      </td>
      <td width="10" valign="top">
      </td>
      <td width="270" valign="top">
      </td>
      <td width="30" valign="top">
      </td>
      <td width="200" colspan="3" valign="top">
       <br>
       <br>
       <font size="13" face="Times New Roman">{{ ucwords($desa[0]->nama_desa) }}, {{ bulanIndo($tanggalsurat)  }}


       </font>
       <br>
     </td>

   </tr>

   <tr>

    <td width="80" valign="top">

      <font size="13" face="Times New Roman">Nomor</font>


    </td>
    <td width="20" valign="top">
      :
    </td>
    <td width="350" valign="top">

      <font size="13" face="Times New Roman">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $nosurat }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepada :
      </font>
    </td>
  </tr>
  <tr>
    <td width="80" valign="top">

      <font size="13" face="Times New Roman">Lampiran
      </font>

    </td>
    <td width="20" valign="top">
      : 
    </td>
    <td width="280" valign="top">

      <font size="13" face="Times New Roman">{{ $datasurat[0]->lampiran }} berkas
      </font>
    </td>
    <td width="40" valign="top">

      <font size="13" face="Times New Roman">Yth,

      </font>
    </td>
    <td width="120" colspan="3" valign="top">

      <font size="13" face="Times New Roman">Camat {{ ucwords($desa[0]->kecamatan[0]->nama_kecamatan) }}

      </font>

    </td>
  </tr>
  <tr>
    <td width="80" valign="top">

      <font size="13" face="Times New Roman">Perihal

      </font>

    </td>
    <td width="20" valign="top">
      :
    </td>
    <td width="280" valign="top">

      <font size="13" face="Times New Roman">Pengantar Pengurusan SITU
      </font>
    </td>
    <td width="61" valign="top">

      <font size="13" face="Times New Roman">Di -
      </font>

    </td>
    <td width="192" colspan="2" valign="top">
    </td>
  </tr>
  <tr>
    <td width="70" valign="top">
    </td>
    <td width="10" valign="top">
    </td>
    <td width="270" valign="top">
    </td>
    <td width="70" valign="top">
    </td>
    <td width="200" colspan="3" valign="top">
      <br>
      <br>
      <font size="13" face="Times New Roman"><strong>{{ ucwords($desa[0]->kecamatan[0]->nama_kecamatan) }}</strong>
      </font>
      <br>

    </td>
  </tr>
  <tr>
   <td width="5">
   </td>
   <td width=""><font size="13" face="Times New Roman">Dengan Hormat,

   </font>
   <br>
 </td>
</tr>
<tr>
 <td width="5" align="justify">
 </td>
 <td width="" align="justify"><font size="13" face="Times New Roman">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bersama ini disampaikan warga yang akan mengurus Pembuatan Surat Izin Tempat Usaha (SITU) yaitu :
 </font>
</td>
</tr>


<tr>
 <td width="50" align="justify">
 </td>
 <td width="150" align="justify"><font size="13" face="Times New Roman">Nama 
 </font>
</td>


<td><font size="13" face="Times New Roman">: {{ strtoupper($penduduk[0]->nama ) }}</font>
</td>


</tr>


<tr>
 <td width="50" align="justify">
</td>
 <td width="150" align="justify"><font size="13" face="Times New Roman">NIK </font>

</td>

<td><font size="13" face="Times New Roman">:  {{ $penduduk[0]->nik }}</font>

</td>

</tr>


<tr>
 <td width="50" align="justify">
 </td>
 <td width="156" align="justify"><font size="13" face="Times New Roman">Jenis Kelamin </font>

</td>

<td><font size="13" face="Times New Roman">: {{ ucwords($penduduk[0]->jeniskelamin[0]->jeniskelamin) }}</font>

</td>

</tr>


<tr>
 <td width="50" align="justify">
 </td>
 <td width="150" align="justify"><font size="13" face="Times New Roman">Tempat/Tanggal Lahir</font>

</td>
<td><font size="13" face="Times New Roman">: {{ ucwords($penduduk[0]->tempat_lahir) }}/{{ bulanIndo($penduduk[0]->tanggal_lahir)  }}</font>

</td>

</tr>


<tr>
 <td width="50" align="justify">
 </td>
 <td width="150" align="justify"><font size="13" face="Times New Roman">Warga Negara </font>

</td>
<td><font size="13" face="Times New Roman">: {{ ucwords($penduduk[0]->kewarganegaraans[0]->kewarganegaraan) }}</font>

</td>

</tr>

<tr>
 <td width="50" align="justify">
 </td>
 <td width="150" align="justify"><font size="13" face="Times New Roman">Pekerjaan</font>

</td>

<td><font size="13" face="Times New Roman">: {{ ucwords($penduduk[0]->pekerjaans[0]->pekerjaan) }}</font>

</td>

</tr>

<tr>
 <td width="50" align="justify">
 </td>
 <td width="150" align="justify"><font size="13" face="Times New Roman">Status Perkawinan</font>

</td>

<td><font size="13" face="Times New Roman">: {{ ucwords( $penduduk[0]->statusperkawinan[0]->statusperkawinan) }}</font>

</td>

</tr>


<tr>
 <td width="50" align="justify">
 </td>
 <td width="150" align="justify"><font size="13" face="Times New Roman">Alamat</font>

</td>

<td><font size="13" face="Times New Roman">: {{ ucwords( $penduduk[0]->kk[0]->alamat )}}</font>

</td>

</tr>
<tr>
 <td width="50" align="justify">
 </td>
 <td width="150" align="justify"><font size="13" face="Times New Roman">Alamat Usaha</font>

 </td>
 <td><font size="13" face="Times New Roman">: {{ ucwords($datasurat[0]->alamat_usaha) }}

 </font>

</td>

</tr>


<tr>
 <td width="50" align="justify">
 </td>
 <td width="150" align="justify"><font size="13" face="Times New Roman">Luas Lantai Usaha

 </font>

</td>
<td><font size="13" face="Times New Roman">: {{ ucwords($datasurat[0]->luas_usaha) }}</font>
 <br>

</td>

</tr>
<tr>
 <td width="5" align="justify">
 </td>
 <td width="" align="justify"><font size="13" face="Times New Roman">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian disampaikan kehadapan Bapak, sebagai Pengantar bagi yang bersangkutan dalam pengurusan izin tersebut, untuk dapat ditindaklanjuti. Atas perhatiannya diucapkan terimakasih.
  </font>
  <br>
  <br>
  <br>
  <br>
</td>
</tr>

@if($datasurat[0]->ttd == 'kerani')
<tr>
 <td width="260">
 </td>
 <td width="">
  <font size="13" face="Times New Roman">
    <strong>An KEPALA {{ strtoupper($desa[0]->kabupaten[0]->status)}} {{ strtoupper($desa[0]->nama_desa) }}</strong>

  </font>

</td>
</tr>
<tr>
 <td width="270">
 </td>
 <td width="">

  <font size="13" face="Times New Roman">

    <strong>SEKRETARIS {{ strtoupper($desa[0]->kabupaten[0]->status)}} {{ strtoupper($desa[0]->nama_desa) }}</strong>

  </font>

  
</td>
</tr>
<tr>
 <td width="240">
 </td>
 <td width="" align="center">
  <br>
  <br>
  <br>
  <br>

  <font size="13" face="Times New Roman">
    <strong>{{ ucfirst($desa[0]->kerani_desa) }}</strong>
  </font>

</td>
</tr>
@else
<tr>
  <td width="330">
  </td>
  <td width="">

    <font size="13" face="Times New Roman">

      <strong>KEPALA {{ strtoupper($desa[0]->kabupaten[0]->status)}} {{ strtoupper($desa[0]->nama_desa) }}</strong>

    </font>

  </td>
</tr>
<tr>
  <td width="300">
  </td>
  <td width="" align="center">
    <br>
    <br>
    <br>
    <br>
    <font size="13" face="Times New Roman">
      <strong><u>{{ strtoupper($desa[0]->kepala_desa) }}. S. Ag</u></strong>
    </font>

  </td>
</tr>
@endif




</tbody>
</table>
</div>

</body>
</html>