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
            @endif            <tr>
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
                <td width="140">
                </td>
                <td width="300"><font size="15"><u><strong>SURAT KETERANGAN PENGHASILAN</strong></u></font></td>
            </tr>
            <tr>
                <td width="200">
                </td>
                <td width="230"><font size="13">NO : {{ $nosurat }}</font>
                    <br></td>
                </tr>
                
                <tr height="0">
                   <td width="50" align="justify">
                   </td>
                   <td width="" align="justify">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Kepala {{ ucwords($desa[0]->kabupaten[0]->status)}} {{ ucfirst($desa[0]->nama_desa) }} Kecamatan {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}} dengan ini menerangkan bahwa:
                    <br>
                </td>
            </tr>

            <tr>
               <td width="125">
               </td>
               <td width="150">
                
                 Nama 

             </td>
             <td >
                
                 : {{ strtoupper($penduduk[0]->nama ) }}
                 
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
        
         : {{ ucwords($penduduk[0]->tempat_lahir) }}&nbsp;/&nbsp;{{ bulanIndo($penduduk[0]->tanggal_lahir)  }}
         
     </td>
     
 </tr>
 <tr>
    <td width="125">
    </td>
    <td width="150">
        
       Agama

   </td>
   <td>
    
      : {{ ucwords($penduduk[0]->agamaa[0]->agama) }}
      
      
  </td>
</tr>
<tr>
    <td width="125">
    </td>
    <td width="150">
        
       Kewarganegaraan

   </td>
   <td>
    
      : {{ ucwords($penduduk[0]->kewarganegaraans[0]->kewarganegaraan) }}
      
      
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
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Nama tersebut diatas adalah masyarakat {{ ucwords($desa[0]->kabupaten[0]->status)}} {{ ucfirst($desa[0]->nama_desa) }} Kecamatan {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}}. Dengan berpenghasilan sebesar {{ ucwords($datasurat[0]->jumlah_penghasilan) }}
        <br>
    </td>
</tr>
<tr height="0">
    <td width="50" align="justify">
    </td>
    <td width="" align="justify">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            
        Demikian Surat Keterangan Tidak Mampu ini dibuat untuk dapat dipergunakan dengan sebagaimana mestinya.
        
    </td>
</tr>
<tr>
    <td width="320">
    </td>
    <td width="100">
        
        Dikeluarkan di

    </td>
    <td>
        
       :  {{ ucwords($desa[0]->nama_desa) }}
       
       
       
   </td>
</tr>
<tr>
    <td width="320">
    </td>
    <td width="100">
        
        Pada Tanggal

    </td>
    <td>
        
       {{ bulanIndo($tanggalsurat) }}
       
   </td>
</tr>
<tr>
    <td width="220">
    </td>
    <td width="">
        
     <strong>SAKSI-SAKSI</strong>

 </td>
</tr>
<tr height="0">
    <td width="60" align="justify">
    </td>
    <td width="220" align="justify">
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>SAKSI I</strong>
    </td>
    <td width="130">
    </td>
    <td width="">
        
        <strong>SAKSI II</strong>
        
    </td>
</tr>
<tr>
    <td width="60" align="justify">
    </td>
    <td width="175" align="justify">
        <br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>{{ ucwords($datasurat[0]->penduduk[0]->nama) }}</strong><br>
    </td>
    <td width="150">
    </td>
    <td width="">
        <br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <strong>{{ ucwords($datasurat[0]->saksike2[0]->nama) }}</strong><br>
    </td>
</tr>
<tr height="0">
    <td width="60" align="justify">
    </td>
    <td width="220" align="justify">
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>SAKSI III</strong>
    </td>
    <td width="130">
    </td>
    <td width="">
        
        <strong>SAKSI IV</strong>
        
    </td>
</tr>
<tr>
    <td width="60" align="justify">
    </td>
    <td width="175" align="justify">
        <br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>{{ ucwords($datasurat[0]->saksike3[0]->nama) }}</strong><br>
    </td>
    <td width="150">
    </td>
    <td width="">
        <br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <strong>{{ ucwords($datasurat[0]->saksike4[0]->nama) }}</strong><br>
    </td>
</tr>
<tr>
    <td width="197" align="justify">
    </td>
    <td width="200" align="justify">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>Mengetahui</strong>
    </td>
</tr>
<tr>
    <td width="135" align="justify">
    </td>
    <td width="300" align="justify">
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>An. KEPALA {{ strtoupper($desa[0]->kabupaten[0]->status)}} {{ strtoupper($desa[0]->nama_desa) }}</strong>
    </td>
</tr>
<tr>
    <td width="180" align="justify">
    </td>
    <td width="300" align="justify">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>KERANI {{ strtoupper($desa[0]->kabupaten[0]->status)}}</strong>
        <br>
        
    </td>
</tr>
<tr>
    <td width="220" align="justify">
    </td>
    <td width="200" align="justify">
        <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>{{ ucwords($desa[0]->kerani_desa) }}</strong>
    </td>
</tr>





</tbody>
</table>
</div>

</body>
</html>
