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
      <td width="190">
      </td>
      <td width="300"><font size="15"><u><strong>SURAT KETERANGAN</strong></u></font></td>
    </tr>
    <tr>
      <td width="200">
      </td>
      <td width="230"><font size="13">Nomor : {{ $nosurat }}</font>
        <br></td>
      </tr>

      <tr height="0">
       <td width="50" align="justify">
       </td>
       <td width="" align="justify">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Saya yang bertanda tangan dibawah ini:
        <br>
      </td>
    </tr>

    <tr>
     <td width="125">
     </td>
     <td width="150">

       Nama 

     </td>
     <td>

       : {{ strtoupper($desa[0]->kepala_desa) }}

     </td>

   </tr>
   <tr>
     <td width="125">
     </td>
     <td width="150">

       Jabatan

     </td>
     <td>

       : Penghulu {{ ucfirst($desa[0]->nama_desa) }}

     </td>

   </tr>
   <tr>
    <td width="125">
    </td>
    <td width="150">

     NIP 

   </td>
   <td>

     : {{ strtoupper($desa[0]->nip_kepala_desa) }}
     <br>

   </td>

 </tr>  

 <tr height="0">
   <td width="50" align="justify">
   </td>
   <td width="" align="justify">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Menerangkan bahwa:
    <br>
  </td>
</tr>


<tr>
  <td width="125">
  </td>
  <td width="150">

   Nama 

 </td>
 <td>
   : {{ strtoupper($penduduk[0]->nama ) }}

 </td>

</tr>
<tr>
  <td width="125">
  </td>
  <td width="150">

   Umur 

 </td>
 <td>

   : {{ date('Y') - date('Y', strtotime($penduduk[0]->tanggal_lahir)) }} Tahun 

 </td>

</tr>
<tr>
  <td width="125">
  </td>
  <td width="150">

   Jenis Kelamin 

 </td>
 <td>

   : {{ ucwords($penduduk[0]->jeniskelamin[0]->jeniskelamin) }}

 </td>

</tr>
<tr>
  <td width="125">
  </td>
  <td width="150">

   Pekerjaan

 </td>
 <td>

   : {{ ucwords($penduduk[0]->pekerjaans[0]->pekerjaan) }}

 </td>

</tr>
<tr>
  <td width="125">
  </td>
  <td width="150">

   NIP/NIK

 </td>
 <td>

   : {{ ucwords($datasurat[0]->nipnik) }}

 </td>
</tr>
<tr>
  <td width="125">
  </td>
  <td width="150">

    Alamat 

  </td>
  <td>

   : {{ ucwords( $penduduk[0]->kk[0]->alamat )}}
   <br>

 </td>

</tr>
<tr height="0">
 <td width="50" align="justify">
 </td>
 <td width="" align="justify">
  &nbsp;&nbsp;&nbsp;&nbsp;
  {{ ucwords($datasurat[0]->ketprof) }}
  <br>
</td>
</tr>
<tr height="0">
  <td width="47" align="justify">
  </td>
  <td width="" align="justify">
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagai kelengkapan {{ ucwords($datasurat[0]->fungsi) }}
    <br>
  </td>
</tr>
<tr>
  <td width="320">
  </td>
  <td width="">

   {{ ucwords($desa[0]->nama_desa) }} , {{ bulanIndo($tanggalsurat) }}

 </td>
</tr>
<tr height="0">

 <td width="320">
 </td>
 <td width="">

  <strong>KEPALA {{ strtoupper($desa[0]->kabupaten[0]->status)}} {{ strtoupper($desa[0]->nama_desa) }}</strong>
  <br>
  <br>
  <br>
  <br>

</td>
</tr>

<tr>
 <td width="370">
 </td>
 <td width="">  
  <strong><u>{{ strtoupper($desa[0]->kepala_desa) }}. S. Ag</u></strong>
</td>
</tr>



</tbody>
</table>
</div>

</body>
</html>
