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
                   <font size="24">PEMERINTAH KABUPATEN {{ strtoupper($desa[0]->kabupaten[0]->nama_kabupaten)}} </font><br>
                   <font size="24">KECAMATAN {{ strtoupper($desa[0]->kecamatan[0]->nama_kecamatan) }} </font><br>
                   <font size="24">{{ strtoupper($desa[0]->kabupaten[0]->status)}} {{ strtoupper($desa[0]->nama_desa) }}</font><br>
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

        <td width="60" valign="top">

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
        <td width="60" valign="top">
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
    <td width="60" valign="top">
        Perihal

    </td>
    <td width="20" valign="top">
        :
    </td>
    <td width="400" valign="top">
        Pengiriman nama-nama Calon Perangkat Kampung


    </td>
</tr>
<tr>
    <td width="60" valign="top">
    

    </td>
    <td width="20" valign="top">
 
    </td>
    <td width="300" valign="top">
       
        {{ ucwords($desa[0]->nama_desa) }} Periode {{ ucwords($datasurat[0]->periode) }}

    </td>
    <td width="70" valign="top">

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
     <br>


 </td>
</tr>
<tr>
   <td width="115" align="justify">
   </td>
   <td width="" align="justify">
      Bersama ini disampaikan nama-nama Calon Perangkat Kampung {{ ucwords($desa[0]->nama_desa) }} Kecamatan {{ ucwords($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucwords($desa[0]->kabupaten[0]->nama_kabupaten)}} Periode {{ ucwords($datasurat[0]->periode) }} yang telah terjaring dengan Rincian :

      <br>
   </td>
</tr>
 <table>
          <tr>
            <td width="50" border="2" align="center">
              No
            </td>
            <td width="160" border="2" align="center">
              Nama
            </td>
             <td width="160" border="2" align="center">
              Tempat/Tgl. Lahir
            </td>
             <td width="100" border="2" align="center">
              Tamatan
            </td>
             <td width="70" border="2" align="center">
              Keterangan
            </td>
          </tr>
           <tr>
            <td width="50" border="2" align="center">
              1.
            </td>
            <td width="160" border="2" align="center">
              {{ strtoupper($penduduk[0]->nama ) }}
            </td>
             <td width="160" border="2" align="center">
              {{ ucwords($penduduk[0]->tempat_lahir) }}/{{ date('d F Y', strtotime($penduduk[0]->tanggal_lahir)) }}
            </td>
             <td width="100" border="2" align="center">
              {{ ucwords($penduduk[0]->pendidikans[0]->pendidikanterakhir) }}
            </td>
             <td width="70" border="2" align="center">
              {{ ucwords($datasurat[0]->keterangan1) }}
            </td>
          </tr>
       
        </table>

<tr>
   <td width="80" align="justify">
   </td>
   <td width="" align="justify">

    Tempat Usaha (SITU) yaitu :
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

     NIK 

 </td>
 <td>

     :  {{ $penduduk[0]->nik }}

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
<tr>
   <td width="125">
   </td>
   <td width="150">

     Alamat Usaha

 </td>
 <td>

     : {{ ucwords($datasurat[0]->alamat_usaha) }}

 </td>

</tr>
<tr>
   <td width="125">
   </td>
   <td width="150">

     Luas Lantai Usaha

 </td>
 <td>

   : {{ ucwords($datasurat[0]->luas_usaha) }}
   <br>

</td>

</tr>
<tr>
   <td width="90" align="justify">
   </td>
   <td width="" align="justify">&nbsp;&nbsp;&nbsp;
    Demikian disampaikan kehadapan Bapak, sebagai Pengantar bagi yang bersangkutan dalam pengurusan izin tersebut, untuk dapat ditindaklanjuti. Atas perhatiannya diucapkan terimakasih.
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

      <strong>An PENGHULU KAMPUNG {{ strtoupper($desa[0]->nama_desa) }}</strong>

  </td>
</tr>
<tr>
   <td width="270">
   </td>
   <td width="">

      <strong>KERANI KAMPUNG {{ strtoupper($desa[0]->nama_desa) }}</strong>

  
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
      <strong>{{ ucfirst($desa[0]->kerani_desa) }}</strong>

  </td>
</tr>
@else
<tr>
    <td width="300">
    </td>
    <td width="">

        <strong>PENGHULU KAMPUNG {{ strtoupper($desa[0]->nama_desa) }}</strong>

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
@endif




</tbody>
</table>
</div>

</body>
</html>