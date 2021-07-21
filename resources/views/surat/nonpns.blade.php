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
                <td width="160">
                </td>
                <td width="300"><font size="15"><u><strong>SURAT KETERANGAN NON PNS</strong></u></font></td>
            </tr>
            <tr>
                <td width="200">
                </td>
                <td width="230"><font size="13">NOMOR: {{ $nosurat }}</font></td>
            </tr>

            <tr height="0">
               <td width="50" align="justify">
               </td>
               <td width="" align="justify">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  Kepala {{ ucwords($desa[0]->kabupaten[0]->status)}} {{ ucfirst($desa[0]->nama_desa) }} Kecamatan {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}} dengan ini menerangkan bahwa:
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

       Agama

   </td>
   <td>

       :  {{ ucwords($penduduk[0]->agamaa[0]->agama) }}

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
        <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Nama tersebut diatas adalah benar penduduk Kampung {{ ucfirst($desa[0]->nama_desa) }} Kecamatan {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}} yang bukan merupakan Pegawai Negeri Sipil (PNS).
    </td>
</tr>
<tr height="0">
    <td width="50" align="justify">
    </td>
    <td width="" align="justify">
        <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Demikianlah Surat Keterangan ini di buat atas dasar yang sebenarnya untuk dapat digunakan sebagai mana mestinya.
        <br>
        <br>
        <br>
    </td>
</tr>
<tr>
    <td width="320">
    </td>
    <td width="">

     {{ ucwords($desa[0]->nama_desa) }} , {{ date('d F Y', strtotime($tanggalsurat)) }}

 </td>
</tr>
<tr>
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
    <td width="250">
    </td>
    <td width="" align="center">

        <strong><u>{{ strtoupper($desa[0]->kepala_desa) }}. S. Ag</u></strong>

    </td>
</tr>





</tbody>
</table>
</div>

</body>
</html>
