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
                <td  width="60"><img src="image/sepotong.jpeg" width="80" height="110"  ></td>
                <td align="center" width="80%">
                   <!-- size untuk mengganti ukuran font -->
                   <font size="20">PEMERINTAH KABUPATEN {{ strtoupper($desa[0]->kabupaten[0]->nama_kabupaten)}} </font><br>
                   <font size="20">KECAMATAN {{ strtoupper($desa[0]->kecamatan[0]->nama_kecamatan) }} </font><br>
                   <font size="20">{{ strtoupper($desa[0]->kabupaten[0]->status)}} {{ strtoupper($desa[0]->nama_desa) }}</font><br>
                   <font size="12">Alamat: {{ $desa[0]->alamat_desa }} </font><br>

               </td>
           </tr>
           <tr>
               <td width="420">
               </td>
               <td width="">

                  Kode Pos: {{ $desa[0]->kode_pos }} 

              </td>
          </tr>
          <hr size="50px" width="100%" double #8c8c8c>
     
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
             {{ ucwords($desa[0]->nama_desa) }} , {{ date('d F Y', strtotime($tanggalsurat)) }}
             <br>
         </td>

     </tr>

     <tr>

        <td width="80" valign="top">

            Nomor
        </td>
        <td width="20" valign="top">
            :
        </td>
        <td width="280" valign="top">

            {{ $nosurat }}

        </td>
        <td width="50" valign="top">

            Kepada

        </td>
        <td width="178" valign="top">

            :

        </td>
    </tr>
    <tr>
        <td width="80" valign="top">
          Lampiran

      </td>
      <td width="20" valign="top">
        : 
    </td>
     <td width="280" valign="top">
        {{ $datasurat[0]->lampiran }} berkas
    </td>
    <td width="40" valign="top">

        Yth:
    </td>
    <td width="120" colspan="3" valign="top">

        Camat {{ ucwords($desa[0]->kecamatan[0]->nama_kecamatan) }}

    </td>
</tr>
<tr>
    <td width="80" valign="top">
        Perihal

    </td>
    <td width="20" valign="top">
        :
    </td>
    <td width="280" valign="top">
      Pengantar Dispensasi Waktu Pernikahan
    </td>
    <td width="61" valign="top">

        Di -

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
      <strong>{{ ucwords($desa[0]->kecamatan[0]->nama_kecamatan) }}</strong>
      <br>

  </td>
</tr>
<tr height="0">
   <td width="80">
   </td>
   <td width="">

     Dengan Hormat,
    


 </td>
</tr>
<tr>
   <td width="115" align="justify">
   </td>
   <td width="" align="justify">
       Bersama ini kami sampaikan warga kami yang akan melangsungkan Pernikahan pada tanggal {{ ucwords($datasurat[0]->tanggal_nikah) }}. {{ ucwords($datasurat[0]->keterangan) }}


   </td>
</tr>
<tr>
   <td width="80" align="justify">
   </td>
   <td width="" align="justify">

    Adapun warga yang akan melangsungkan pernikahan yaitu :


    <br>

</td>
</tr>
 <tr>
            <td width="90">
            </td>
            <td width="20"><br>
            
             I. 

            </td>
            <td width="150"><br>
            
             <strong>CALON {{ strtoupper($datasurat[0]->sebagai1) }} :</strong>
    
            </td>
        
        </tr>
            <tr>
            <td width="110">
            </td>
            <td width="150"><br>
            
             Nama

            </td>
               <td width="15"><br>
            
             :
 
            </td>
            <td width="300"><br>
            
             <strong>{{ strtoupper($datasurat[0]->penduduk[0]->nama ) }}</strong>
 
            </td>
        
        </tr>
         <tr>
            <td width="110">
            </td>
            <td width="150"><br>
            
             Tempat/Tanggal lahir

            </td>
               <td width="15"><br>
            
             :
 
            </td>
            <td width="300"><br>
            
             {{ ucwords($penduduk[0]->tempat_lahir) }}/{{ date('d F Y', strtotime($penduduk[0]->tanggal_lahir)) }}
 
            </td>
        
        </tr>
         <tr>
            <td width="110">
            </td>
            <td width="150"><br>
            
             Warga Negara

            </td>
               <td width="15"><br>
            
             :
 
            </td>
            <td width="300"><br>
            
             {{ ucwords($penduduk[0]->kewarganegaraans[0]->kewarganegaraan) }}
 
            </td>
        
        </tr>
           <tr>
            <td width="110">
            </td>
            <td width="150"><br>
            
             Agama

            </td>
               <td width="15"><br>
            
             :
 
            </td>
            <td width="300"><br>
            
             {{ ucwords($penduduk[0]->agamaa[0]->agama) }}
 
            </td>
        
        </tr>
           <tr>
            <td width="110">
            </td>
            <td width="150"><br>
            
             Status Perkawinan

            </td>
               <td width="15"><br>
            
             :
 
            </td>
            <td width="300"><br>
            
          {{ ucwords( $penduduk[0]->statusperkawinan[0]->statusperkawinan) }}
             
 
            </td>
        
        </tr>
                <tr>
            <td width="110">
            </td>
            <td width="150"><br>
            
            Alamat

            </td>
               <td width="15"><br>
            
             :
 
            </td>
            <td width="300"><br>
            
              {{ ucwords( $penduduk[0]->kk[0]->alamat )}}
          
             
 
            </td>
        
        </tr>
        
 <tr>
            <td width="90">
            </td>
            <td width="20"><br><br>
            
             2. 

            </td>
            <td width="150"><br><br>
            
             <strong>CALON {{ strtoupper($datasurat[0]->sebagai2) }} :</strong>
    
            </td>
        
        </tr>
            <tr>
            <td width="110">
            </td>
            <td width="150"><br>
            
             Nama

            </td>
               <td width="15"><br>
            
             :
 
            </td>
            <td width="300"><br>
            
             <strong>{{ strtoupper($datasurat[0]->nama) }}</strong>
 
            </td>
        
        </tr>
         <tr>
            <td width="110">
            </td>
            <td width="150"><br>
            
             Tempat/Tanggal lahir

            </td>
               <td width="15"><br>
            
             :
 
            </td>
            <td width="300"><br>
            
             {{ ucwords($datasurat[0]->tempat_lahir) }}/{{ date('d F Y', strtotime($datasurat[0]->tanggal_lahir)) }}
 
            </td>
        
        </tr>
         <tr>
            <td width="110">
            </td>
            <td width="150"><br>
            
             Warga Negara

            </td>
               <td width="15"><br>
            
             :
 
            </td>
            <td width="300"><br>
            
             {{ ucwords($datasurat[0]->warga) }}
 
            </td>
        
        </tr>
           <tr>
            <td width="110">
            </td>
            <td width="150"><br>
            
             Agama

            </td>
               <td width="15"><br>
            
             :
 
            </td>
            <td width="300"><br>
            
             {{ ucwords($datasurat[0]->agama) }}
 
            </td>
        
        </tr>
           <tr>
            <td width="110">
            </td>
            <td width="150"><br>
            
             Status Perkawinan

            </td>
               <td width="15"><br>
            
             :
 
            </td>
            <td width="300"><br>
            
          {{ ucwords( $datasurat[0]->status) }}
             
 
            </td>
        
        </tr>
                <tr>
            <td width="110">
            </td>
            <td width="150"><br>
            
            Alamat

            </td>
               <td width="15"><br>
            
             :
 
            </td>
            <td width="300"><br>
            
              {{ ucwords( $datasurat[0]->alamat )}}
          
             <br>
 
            </td>
        
        </tr>
        


<tr>
   <td width="90" align="justify">
   </td>
   <td width="" align="justify">&nbsp;&nbsp;&nbsp;
   Demikianlah disampaikan kehadapan Bapak untuk dapat di tindak lanjuti, atas perhatian dan kerjasamanya diucapkan terima kasih.
<br>
<br>

</td>
</tr>


<tr>
    <td width="300">
    </td>
    <td width="">

        <strong>KEPALA {{ strtoupper($desa[0]->kabupaten[0]->status)}} {{ strtoupper($desa[0]->nama_desa) }}</strong>

    </td>
</tr>
<tr>
    <td width="290">
    </td>
    <td width="" align="center">

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