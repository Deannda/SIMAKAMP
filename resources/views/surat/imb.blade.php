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
        <td width="240" valign="top">
            {{ $datasurat[0]->lampiran }} berkas
        </td>
        <td width="40" valign="top">

            Yth:
        </td>
        <td width="150" colspan="3" valign="top">

            Bapak Kepala UPTD



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
            Pengantar pembuatan IMB
        </td>
        <td width="200" valign="top">
           Tata Ruang dan Cipta Karya 
       </td>
       <td width="192" colspan="2" valign="top">
       </td>
   </tr>
   <tr>
       <td width="80" valign="top">
       </td>
       <td width="20" valign="top">
       </td>
       <td width="280" valign="top">
        An. <strong>{{ strtoupper($penduduk[0]->nama ) }}</strong>
    </td>
    <td width="200" valign="top">
       Kec. {{ ucwords($desa[0]->kecamatan[0]->nama_kecamatan) }}
   </td>

</tr>
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
        Di-
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
      <strong><u>{{ ucwords($desa[0]->kecamatan[0]->nama_kecamatan) }}</u></strong>
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
   <td width="87" align="justify">
   </td>
   <td width="" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Bersama ini disampaikan berkas permohonan Pengurusan  Surat Izin Mendirikan Bangunan (IMB) atas nama tersebut di atas dengan persyaratan sebagai mana terlampir.
    <br>

</td>
</tr>
<tr>
    <td width="87" align="justify">
    </td>
    <td width="" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Demikian disampaikan kehadapan Bapak dapat ditinjaklanjuti.           
        <br>
        <br>
        <br>
    </td>
</tr>

<tr>
   <td width="345">
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
   <td width="300">
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