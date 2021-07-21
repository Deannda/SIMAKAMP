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
      </td>
    </tr>

    <tr>
      <td width="148">
      </td>
      <td width="280"><font size="15"><u><strong>SURAT KETERANGAN PERJALANAN</strong></u></font></td>
    </tr>
    <tr>
      <td width="200">
      </td>
      <td width="230"><font size="13"><strong>NOMOR:   {{ $nosurat }}</strong></font></td>
    </tr>
    
    <tr height="0">
     <td width="50" align="justify">
     </td>
     <td width="" align="justify">
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Kepala {{ ucwords($desa[0]->kabupaten[0]->status)}} {{ ucfirst($desa[0]->kabupaten[0]->status)}} {{ ucfirst($desa[0]->nama_desa) }} Kecamatan {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}} dengan ini menerangkan bahwa:
      </p>
    </td>
  </tr>

  <tr>
   <td width="125">
   </td>
   <td width="150"><br><br>
    
     Nama 

   </td>
   <td><br><br>
    
     : {{ strtoupper($penduduk[0]->nama ) }}

     
   </td>
   
 </tr>
 <tr>
   <td width="125">
   </td>
   <td width="150">
    
     NIK 

   </td>
   <td>
    
     : {{ $penduduk[0]->nik }}
     
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
    
     Tempat/Tanggal Lahir 

   </td>
   <td>
    
     : {{ ucwords($penduduk[0]->tempat_lahir) }}/{{ date('d F Y', strtotime($penduduk[0]->tanggal_lahir)) }}

     
   </td>
   
 </tr>
 <tr>
   <td width="125">
   </td>
   <td width="150">
    
     Warga Negara 

   </td>
   <td>
    
     : {{ ucwords($penduduk[0]->kewarganegaraans[0]->kewarganegaraan) }}
     
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
    
     Status Perkawinan

   </td>
   <td>
    
     : {{ ucwords( $penduduk[0]->statusperkawinan[0]->statusperkawinan) }}
     
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
     
   </td>
   
 </tr>
 <tr height="0">
  <td width="50" align="justify">
  </td>
  <td width="" align="justify">
    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Nama tersebut diatas adalah benar warga {{ ucfirst($desa[0]->kabupaten[0]->status)}} {{ ucfirst($desa[0]->nama_desa) }} Kecamatan {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}} yang akan mengadakan perjalanan ke:
    
  </td>
</tr>
<tr>
  <td width="125">
  </td>
  <td width="150">
    
   Desa/Kelurahan

 </td>
 <td>
  
   : {{ ucwords($datasurat[0]->desa) }}

   
 </td>
 
</tr>
<tr>
  <td width="125">
  </td>
  <td width="150">
    
   Kecamatan

 </td>
 <td>
  
   : {{ ucwords($datasurat[0]->kecamatan) }}

   
 </td>
 
</tr>
<tr>
  <td width="125">
  </td>
  <td width="150">
    
   Kab/Kota

 </td>
 <td>
  
   : {{ ucwords($datasurat[0]->kabupaten) }}

   
 </td>
 
</tr>
<tr>
  <td width="125">
  </td>
  <td width="150">
    
   Provinsi

 </td>
 <td>
  
   : {{ ucwords($datasurat[0]->provinsi) }}

   
 </td>
 
</tr>
<tr>
  <td width="125">
  </td>
  <td width="150">
    
   Tujuan Perjalanan

 </td>
 <td>
  
   : {{ ucwords($datasurat[0]->tujuan) }}

   
 </td>
 
</tr>
<tr>
  <td width="125">
  </td>
  <td width="150">
    
   Jumlah Pengikut

 </td>
 <td>
  :
  @if(($datasurat[0]->jumlah_pengikut == '0') or ($datasurat[0]->jumlah_pengikut == '-'))
  - 

  @else
  {{ ucwords($datasurat[0]->jumlah_pengikut) }} yaitu : 
  {{ ucwords($datasurat[0]->pengikut) }} 
  @endif
  
</td>

</tr>
<tr height="0">
  <td width="50" align="justify">
  </td>
  <td width="" align="justify">
    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Demikianlah Surat Keterangan ini dibuat dengan sebenarnya,untuk dapat digunakan sebagaiman mestinya.</td>
</tr>
<tr>
 <td width="350">
 </td>
 <td width="">
  
  <strong><p>KEPALA {{ strtoupper($desa[0]->kabupaten[0]->status)}} {{ strtoupper($desa[0]->nama_desa) }}</p></strong>

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
  
  <strong><u>{{ strtoupper($desa[0]->kepala_desa) }}. S. Ag</u></strong>

</td>
</tr>





</tbody>
</table>
</div>

</body>
</html>
