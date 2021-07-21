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
            <td width="28" valign="top">
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
            <td width="200" colspan="3" valign="top">
              
                    Bapak Penghulu Kampung
             
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
                    Pindah Nikah
            </td>
             <td width="150" valign="top">

                    {{ ucwords($datasurat[0]->kepada) }}
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
                    <strong>{{ ucwords($datasurat[0]->di) }}</strong>
                    <br>
             
            </td>
        </tr>
        <tr height="0">
            <td width="75">
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
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
            Sehubungan akan dilangsungkan akad nikah warga kami di Kampung Saudara, Untuk itu bersama ini disampaikan persyaratan berkenaan  hal tersebut.
        <br>
            </td>
        </tr>
           <tr height="0">
            <td width="50" align="justify">
            </td>
            <td width="" align="justify">
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
            Dengan ini juga kami berharap kepada saudara untuk dapat memberikan izin kepada warga kami yang akan melaksanakan Akad Nikah diwilayah kerja saudara.
        <br>
            </td>
        </tr>
        <tr height="0">
            <td width="50" align="justify">
            </td>
            <td width="" align="justify">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
             Demikianlah surat ini disampaikan kehadapan Bapak, Atas perhatian dan bantuannya diucapkan terima kasih. 
             <br>

            
            </td>
        </tr>
        <tr>
            <td width="300">
            </td>
            <td width="">         
            <strong>PENGHULU KAMPUNG {{ strtoupper($desa[0]->nama_desa) }}</strong>
            <br>
            <br>
            <br>
            </td>
        </tr>
         <tr>
            <td width="300">
            </td>
            <td width="" align="center">
            
            <strong>{{ ucfirst($desa[0]->kepala_desa) }}</strong>
                   <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

            </td>
        </tr>
 




            
        </tbody>
    </table>
</div>
<div  >
    <table>
        <thead>
            
        </thead>
        <tbody >
            <!-- melakukan pengecekan kondisi dimana kalau $kop berisi 'denganKop' maka Kop surat akan ditampilkan -->
    
            <tr>
                <td  width="60"><img src="image/siak.png" width="80" height="110"  ></td>
                <td align="center" width="80%">
                    <!-- size untuk mengganti ukuran font -->
                    <font size="24">PEMERINTAH KABUPATEN {{ strtoupper($desa[0]->kabupaten[0]->nama_kabupaten)}} </font><br>
                    <font size="24">KECAMATAN {{ strtoupper($desa[0]->kecamatan[0]->nama_kecamatan) }} </font><br>
                    <font size="24">KAMPUNG {{ strtoupper($desa[0]->nama_desa) }}</font><br>
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
              
                   Ka.KUA Kec. {{ ucwords($desa[0]->kecamatan[0]->nama_kecamatan) }} 
                   

             
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
                    Permohonan Rekomendasi Pindah Nikah
            </td>
             <td width="200" valign="top">
                     Di-
            </td>
         
        </tr>
        <tr>
             <td width="80" valign="top">
            </td>
            <td width="20" valign="top">
            </td>
             <td width="280" valign="top">
                    An. <strong>{{ ucwords($penduduk[0]->nama ) }}</strong>
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
                    <strong><u>{{ ucwords($desa[0]->kecamatan[0]->nama_kecamatan) }} </u></strong>
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
            <td width="" align="justify">
&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan akan dilangsungkan akad nikah  warga Kampung Temusai Kecamatan Bungaraya Kabupaten Siak yang akan dilaksanakan di :
            <br>

            </td>
        </tr>
        <tr>
            <td width="125">
            </td>
            <td width="150">
            
             Desa/Kel 

            </td>
            <td width="20">
            
             :
 
            </td>
             <td width="300">
            
             {{ $datasurat[0]->desa }}
 
            </td>
           
        </tr>
        <tr>
            <td width="125">
            </td>
            <td width="150">
            
             Kecamatan 

            </td>
            <td width="20">
            
             :
 
            </td>
            <td width="300">
            
             {{ $datasurat[0]->kecamatan }}
 
            </td>
           
        </tr>
          <tr>
            <td width="125">
            </td>
            <td width="150">
            
             Kabupaten 

            </td>
            <td width="20">
            
             :
 
            </td>
            <td width="300">
            
             {{ $datasurat[0]->kabupaten }}
             <br>
 
            </td>
           
        </tr>
        <tr>
            <td width="87" align="justify">
            </td>
            <td width="" align="justify">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Oleh karena itu dapat kiranya Bapak untuk memberikan Rekomendasi Pindah Nikah Kepada yang bersangkutan berkenaan dengan hal tersebut.<br>

            </td>
        </tr>
        <tr>
            <td width="87" align="justify">
            </td>
            <td width="450" align="justify">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikianlah surat ini disampaikan untuk dapat di maklumi, atas kerjasamanya diucapkan terima kasih.
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