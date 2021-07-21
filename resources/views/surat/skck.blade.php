<!DOCTYPE html>
<html>
<head>
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
                        {{ ucwords($desa[0]->nama_desa) }}, {{ date('d F Y', strtotime($tanggalsurat)) }}
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

                    Kapolsek {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }}

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
                    Pengantar Pembuatan SKCK
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
                    <strong>{{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }}</strong>
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
           <tr height="0">
            <td width="50" align="justify">
            </td>
            <td width="" align="justify">
                &nbsp;&nbsp;
                Kepala {{ ucwords($desa[0]->kabupaten[0]->status)}} {{ ucfirst($desa[0]->nama_desa) }} Kecamatan {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}} dengan ini menerangkan bahwa:
                <br>

            </td>
        </tr>

        <tr>
            <td width="125">
            </td>
            <td width="130">

               Nama 

           </td>
           <td width="20">
            :
        </td>
        <td width="300">

           {{ strtoupper($penduduk[0]->nama ) }}

       </td>

   </tr>
   <tr>
    <td width="125">
    </td>
    <td width="130">

       Jenis Kelamin 

   </td>
   <td width="20">
    :
</td>
<td width="300">

  {{ ucwords($penduduk[0]->jeniskelamin[0]->jeniskelamin) }}


</td>
</tr>
<tr>
    <td width="125">
    </td>
    <td width="130">

        Tempat/Tanggal Lahir 

    </td>
    <td width="20">
        :
    </td>
    <td width="300">

       {{ ucwords($penduduk[0]->tempat_lahir) }}/{{ date('d F Y', strtotime($penduduk[0]->tanggal_lahir)) }}


   </td>

</tr>
<tr>
    <td width="125">
    </td>
    <td width="130">

       Pendidikan Terakhir

   </td>
   <td width="20">
    :
</td>
<td width="300">

   {{ ucwords($penduduk[0]->pendidikans[0]->pendidikanterakhir) }}

</td>

</tr>
<tr>
    <td width="125">
    </td>
    <td width="130">

       Pekerjaan

   </td>
   <td width="20">

       :

   </td>
   <td width="300">

    {{ ucwords($penduduk[0]->pekerjaans[0]->pekerjaan) }}

</td>


</tr>
<tr>
    <td width="125">
    </td>
    <td width="130">

       Agama
   </td>
   <td width="20">

       : 

   </td>
   <td width="300">

    {{ ucwords($penduduk[0]->agamaa[0]->agama) }}

</td>

</tr>
<tr>
    <td width="125">
    </td>
    <td width="130">

       Status Perkawinan

   </td>
   <td width="20">

       : 

   </td>
   <td width="300">

    {{ ucwords( $penduduk[0]->statusperkawinan[0]->statusperkawinan) }}

</td>

</tr>
<tr>
    <td width="125">
    </td>
    <td width="130">

       Alamat

   </td>
   <td width="20">

       :
   </td>
   <td width="300">

    {{ ucwords( $penduduk[0]->kk[0]->alamat )}}

    <br>
</td>

</tr>
<tr>
    <td width="50" align="justify">
    </td>
    <td width="" align="justify">
        <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Nama tersebut diatas adalah benar penduduk Kampung {{ ucfirst($desa[0]->nama_desa) }} Kecamatan {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}}. Sepengetahuan kami berkelakuan baik, tidak terlibat dalam kenakalan remaja, minuman keras dan sejenisnya dan tidak pula sebagai penyokong salah satu partai / organisasi terlarang.
        <br>
    </td>
</tr>
<tr>
    <td width="50" align="justify">
    </td>
    <td width="" align="justify">
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Demikianlah disampaikan kehadapan Bapak sebagai pengantar bagi yang bersangkutan untuk mengurus pembuatan Surat Keterangan Catatan kepolisian ( SKCK ) sebagai syarat pelengkap untuk {{ ucwords($datasurat[0]->fungsi) }}
        <br>
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
    </td>
</tr>
<tr>
    <td width="280">
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