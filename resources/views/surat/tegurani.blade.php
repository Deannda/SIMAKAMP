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

        {{ $datasurat[0]->kepada }}

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
       Teguran I  
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
        
      <strong>{{ $datasurat[0]->di }} </strong>
      <br>

  </td>
</tr>
<tr>
   <td width="115" align="justify">
   </td>
   <td width="" align="justify">
       {{ $datasurat[0]->dasar_teguran }}
       <br>
   </td>
</tr>
<tr>
   <td width="80" align="justify">
   </td>
   <td width="" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    Sehubungan dengan hal tersebut diatas disampaikan kepada saudara sebagai berikut :
    <br>

</td>
</tr>
<tr>
   <td width="90" align="justify">
   </td>
   <td width="" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    {{ $datasurat[0]->isi_teguran }}
    <br>

</td>
</tr>
<tr>
   <td width="80" align="justify">
   </td>
   <td width="" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;

    Demikian disampaikan untuk diperhatikan dan dilaksanakan dengan sebagaimana mestinya.
    <br>
    <br>
    <br>

</td>
</tr>

<tr>
    <td width="310">
    </td>
    <td width="">

        <strong>KEPALA {{ strtoupper($desa[0]->kabupaten[0]->status)}} {{ strtoupper($desa[0]->nama_desa) }}</strong>

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
        <strong><u>Tembusan</u></strong>, disampaikan Kepada Yth :
    </td>
</tr>
<tr height="0">
    <td width="60" align="justify">
    </td>
    <td width="" align="justify">
        1. Bapak camat {{ ucwords($desa[0]->kecamatan[0]->nama_kecamatan) }}  di Kecamatan {{ ucwords($desa[0]->kecamatan[0]->nama_kecamatan) }}
    </td>
</tr>
<tr height="0">
    <td width="60" align="justify">
    </td>
    <td width="" align="justify">
        2. Arsip
    </td>
</tr>




</tbody>
</table>
</div>

</body>
</html>