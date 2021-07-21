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
                <td width="187">
                </td>
                <td width="300"><font size="12"><strong>SURAT PENGANTAR PINDAH</strong></font></td>
            </tr>
            <tr>
                <td width="120">
                </td>
                <td width="400"><font size="12"><strong><u>ANTAR KABUPATEN/KOTA ATAU ANTAR PROVINSI</u></strong></font></td>
            </tr>
            <tr>
                <td width="200">
                </td>
                <td width="230"><font size="12"><strong>NOMOR : {{ $nosurat }}</strong></font></td>
            </tr>

            <tr height="0">
             <td width="30" align="justify">
             </td>
             <td width="" align="justify">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  Yang bertanda tangan dibawah ini, menerangkan Permohonan Pindah Penduduk WNI dengan data sebagai berikut :
              </p>
          </td>
      </tr>
      <tr>
        <td width="40">
        </td>
        <td width="20"><br><br>

           1. 

       </td>
       <td width="200"><br><br>

           NIK 

       </td>
       <td width="20"><br><br>

           : 

       </td>
       <td width="300"><br><br>

           {{ $penduduk[0]->nik }}

       </td>

   </tr>
   <tr>
       <td width="40">
       </td>
       <td width="20">

           2. 

       </td>
       <td width="200">

         Nama Lengkap

     </td>
     <td width="20">

         :

     </td>
     <td width="400">

        <strong>{{ strtoupper($penduduk[0]->nama ) }}</strong>

    </td>

</tr>
<tr>
    <td width="40">
    </td>
    <td width="20">

       3. 

   </td>
   <td width="200">

       Nomor Kartu Keluarga

   </td>
   <td width="20">

       : 

   </td>
   <td width="300">

       {{ $penduduk[0]->id_kk }}

   </td>

</tr>
<tr>
    <td width="40">
    </td>
    <td width="20">

       4. 

   </td>
   <td width="200">

       Nama Kepala Keluarga

   </td>
   <td width="20">

       :

   </td>
   <td width="400">

    <strong>{{ strtoupper($datasurat[0]->penduduk[0]->nama ) }}</strong>

</td>

</tr>
<tr>
    <td width="40">
    </td>
    <td width="20">

       5. 

   </td>
   <td width="200">

       Alamat Sekarang

   </td>
   <td width="20">

       :

   </td>
   <td width="400">

    {{ ucwords( $penduduk[0]->kk[0]->alamat )}}

</td>

</tr>
<tr>
    <td width="40">
    </td>
    <td width="20">

       6. 

   </td>
   <td width="200">

       Alamat Tujuan Pindah

   </td>
   <td width="20">

       :

   </td>
   <td width="400">

    {{ ucwords($datasurat[0]->alamat_tujuan_pindah) }}

</td>


</tr>
<tr>
    <td width="40">
    </td>
    <td width="20">

       7. 

   </td>
   <td width="200">

       Jumlah Keluarga yang Pindah

   </td>
   <td width="20">

       :

   </td>
   <td width="400">
    <!-- pertama diceknya jmlh keluarga yg pindah 0 atau - baru di tampilkannya"-" -->
    @if(($datasurat[0]->jumlah_keluarga_pindah == '0') or ($datasurat[0]->jumlah_keluarga_pindah == '-'))
    - 

    @else
    {{ ucwords($datasurat[0]->jumlah_keluarga_pindah) }} yaitu : 
    {{ ucwords($datasurat[0]->anggota_keluarga_pindah) }} 
    @endif
</td>

</tr>
<tr height="0">
    <td width="30" align="justify">
    </td>
    <td width="" align="justify">
        <br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Adapun Permohonan Pindah Penduduk WNI yang bersangkutan sebagaimana terlampir

    </td>
</tr>
<tr height="0">
    <td width="30" align="justify">
    </td>
    <td width="" align="justify">
        <br><br>&nbsp;&nbsp;&nbsp;&nbsp;
        Demikianlah Surat Keterangan ini di buat atas dasar yang sebenarnya untuk dapat digunakan sebagai mana mestinya.
        <br>
        <br>
        <br>
    </td>
</tr>

<tr>
    <td width="340">
    </td>
    <td width="">

        {{ ucwords($desa[0]->nama_desa) }} , {{ date('d F Y', strtotime($tanggalsurat)) }}

    </td>
</tr>
<tr>
    <td width="300">
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

        <strong>{{ ucfirst($desa[0]->kepala_desa) }}</strong>
        <br>
        <br>
        <br>
        <br>

    </td>
</tr>
<tr height="0">
    <td width="30" align="justify">
    </td>
    <td width="" align="justify">
        Keterangan:
    </td>
</tr>
<tr height="0">
    <td width="30" align="justify">
    </td>
    <td width="" align="justify">
        Surat Pengantar ini dibawa oleh pemohon dan diarsip di Kecamatan.
    </td>
</tr>
</tbody>
</table>
    <div>
        <table>
            <thead>
              </thead>
              
              <tbody>
               @if($kop == 'denganKop')
                 <tr>
                    <td width="470" align="justify">
                    </td>
                    <td colspan="2" border="1" width="50" cellpadding="20" align="center">
                        <strong><font size="12">F.1-35</font></strong>
                    </td>
                </tr>
            <tr>
                <td  width="60"><img src="image/siak.png" width="80" height="110"  ></td>
                <td align="center" width="80%">
                    <!-- size untuk mengganti ukuran font -->
                    <font size="24">PEMERINTAH KABUPATEN {{ strtoupper($desa[0]->kabupaten[0]->nama_kabupaten)}} </font><br>
                    <font size="24">KECAMATAN {{ strtoupper($desa[0]->kecamatan[0]->nama_kecamatan) }} </font><br>
                    <font size="10"><strong>Alamat: {{ ucwords($desa[0]->kecamatan[0]->alamat_kecamatan) }} </strong></font><br>
                    <font size="18"><strong>{{ strtoupper($desa[0]->kecamatan[0]->nama_kecamatan) }} </strong></font><br>
                </td>
            </tr>
            <tr>
                <td width="427">
                </td>
                <td width="">

                    <font size="11"><strong>Kode Pos: {{ $desa[0]->kecamatan[0]->kode_pos }} </strong></font>

                </td>
            </tr>

            <hr size="50px" width=100%>


            <tr>
              <td colspan="2" height="10px"></td>
          </tr>
          @else
          <tr>
            <td colspan="2" height="200px"></td>
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
            <td width="187">
            </td>
            <td width="300"><font size="12"><strong>SURAT PENGANTAR PINDAH</strong></font></td>
        </tr>
        <tr>
            <td width="120">
            </td>
            <td width="400"><font size="12"><strong><u>ANTAR KABUPATEN/KOTA ATAU ANTAR PROVINSI</u></strong></font></td>
        </tr>
        <tr>
            <td width="200">
            </td>
            <td width="230"><font size="12"><strong>NOMOR: </strong></font></td>
        </tr>

        <tr height="0">
            <td width="30" align="justify">
            </td>
            <td width="" align="justify">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Yang bertanda tangan dibawah ini, menerangkan Permohonan Pindah Penduduk WNI dengan data sebagai berikut :
                </p>
            </td>
        </tr>
        <tr>
            <td width="40">
            </td>
            <td width="20"><br><br>

               1. 

           </td>
           <td width="200"><br><br>

               NIK 

           </td>
           <td width="20"><br><br>

               : 

           </td>
           <td width="300"><br><br>

               {{ $penduduk[0]->nik }}

           </td>

       </tr>
       <tr>
        <td width="40">
        </td>
        <td width="20">

           2. 

       </td>
       <td width="200">

           Nama Lengkap

       </td>
       <td width="20">

           :

       </td>
       <td width="400">

        <strong>{{ strtoupper($penduduk[0]->nama ) }}</strong>

    </td>

</tr>

<tr>
    <td width="40">
    </td>
    <td width="20">

       3. 

   </td>
   <td width="200">

       Nomor Kartu Keluarga

   </td>
   <td width="20">

       : 

   </td>
   <td width="300">

       {{ $penduduk[0]->id_kk }}

   </td>

</tr>
<tr>
    <td width="40">
    </td>
    <td width="20">

       4. 

   </td>
   <td width="200">

       Nama Kepala Keluarga

   </td>
   <td width="20">

       :

   </td>
   <td width="400">

    <strong>{{ strtoupper($datasurat[0]->penduduk[0]->nama ) }}</strong>

</td>

</tr>
<tr>
    <td width="40">
    </td>
    <td width="20">

       5. 

   </td>
   <td width="200">

       Alamat Sekarang

   </td>
   <td width="20">

       :

   </td>
   <td width="400">

    {{ ucwords( $penduduk[0]->kk[0]->alamat )}}

</td>

</tr>
<tr>
    <td width="40">
    </td>
    <td width="20">

       6. 

   </td>
   <td width="200">

       Alamat Tujuan Pindah

   </td>
   <td width="20">

       :

   </td>
   <td width="400">

    {{ ucwords($datasurat[0]->alamat_tujuan_pindah) }}

</td>


</tr>
<tr>
    <td width="40">
    </td>
    <td width="20">

       7. 

   </td>
   <td width="200">

       Jumlah Keluarga yang Pindah

   </td>
   <td width="20">

       :

   </td>
   <td width="400">

    {{ ucwords($datasurat[0]->jumlah_keluarga_pindah) }} yaitu : 
    {{ ucwords($datasurat[0]->anggota_keluarga_pindah) }} 

</td>

</tr>
<tr height="0">
    <td width="30" align="justify">
    </td>
    <td width="" align="justify">
        <br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Adapun Permohonan Pindah Penduduk WNI yang bersangkutan sebagaimana terlampir

    </td>
</tr>
<tr height="0">
    <td width="30" align="justify">
    </td>
    <td width="" align="justify">
        <br><br>&nbsp;&nbsp;&nbsp;&nbsp;
        Demikianlah Surat Keterangan ini di buat atas dasar yang sebenarnya untuk dapat digunakan sebagai mana mestinya.
        <br>
        <br>
        <br>
    </td>
</tr>
<tr>
    <td width="339">
    </td>
    <td width="">

        {{ ucwords($desa[0]->nama_desa) }} , {{ date('d F Y', strtotime($tanggalsurat)) }}

    </td>
</tr>
<tr>
    <td width="350">
    </td>
    <td width="">

        <strong>CAMAT {{ strtoupper($desa[0]->kecamatan[0]->nama_kecamatan) }}</strong>
        <br>
        <br>
        <br>
        <br>
    </td>
</tr>
<tr>
    <td width="270">
    </td>
    <td width="" align="center">

        <strong>{{ strtoupper($desa[0]->kecamatan[0]->nama_camat) }}</strong>

    </td>
</tr>
<tr>
    <td width="270">
    </td>
    <td width="" align="center">

        <strong>{{ strtoupper($desa[0]->kecamatan[0]->nip) }}</strong>

        <br>
        <br>
        
    </td>
</tr>

<tr height="0">
    <td width="30" align="justify">
    </td>
    <td width="" align="justify">
        Keterangan:
    </td>
</tr>

<tr height="0">
    <td width="30" align="justify">
    </td>
    <td width="" align="justify">
        Surat Pengantar ini dibawa oleh pemohon dan diarsip di Kecamatan.
    </td>
</tr>
</tbody>
</table>
</div>
</body>
</html>
