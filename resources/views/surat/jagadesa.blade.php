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
        	<td width="439">
        	</td>
            <td width="">
            
   			Kode Pos: {{ $desa[0]->kode_pos }} 

            </td>
        </tr>
			<hr size="50px" width="100%" double #8c8c8c>
			<hr size="50px" width="100%" double #8c8c8c>
			<hr size="50px" width="100%" double #8c8c8c>
			<hr size="50px" width="100%" double #8c8c8c>
			<hr size="50px" width="100%" double #8c8c8c>
			<hr size="50px" width="100%" double #8c8c8c>
			<hr size="50px" width="100%" double #8c8c8c>
			<hr size="50px" width="100%" double #8c8c8c>
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
             <td width="240" valign="top">
                    {{ $datasurat[0]->lampiran }} berkas
            </td>
            <td width="40" valign="top">
                
                    Yth:
            </td>
            <td width="200" colspan="3" valign="top">
              
                    Kepala Kejaksaan Negeri {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}} 
             
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
                    Permohonan Pendampingan Tim Jaga 
            </td>
            <td width="61" valign="top">
             
                    Di -
            
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
                    Desa Kejari {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}}
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
    
                    <strong>Tempat</strong>
                    <br>
                      <br>
             
            </td>
        </tr>
        <tr height="0">
        	<td width="80" align="justify">
        	</td>
            <td width="" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
   			 {{ $datasurat[0]->keterangan }}

			<br>
            </td>
        </tr>
         <tr height="0">
            <td width="80" align="justify">
            </td>
            <td width="" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
             Dengan diajukannya Permohonan ini maka kami bersedia untuk mengikuti setiap arahan dan petunjuk dari Tim Jaga Desa. 
             <br>

            
            </td>
        </tr>
         <tr height="0">
            <td width="80" align="justify">
            </td>
            <td width="" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         
                Demikian Surat Permohonan ini kami sampaikan, atas perkenannya kami ucapkan terima kasih.<br>
                <br>
                <br>
            </td>
        </tr>

		     <tr>
            <td width="380">
            </td>
            <td width="">
            
           Hormat Kami,

            </td>
          </tr>
              <tr>
            <td width="350">
            </td>
            <td width="">
            
            <strong>PENGHULU {{ strtoupper($desa[0]->nama_desa) }}</strong>

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
          
           

            </td>
        </tr>
        <tr>
            <td width="10">
            </td>
            <td width="150" valign="top">

                    <strong><u>Tembusan Kepada Yth:</u></strong>
                    <br>
            </td>
          
           
        </tr>
         <tr>
            <td width="10">
            </td>
             <td width="20" valign="top">

                    1.
            </td>
            <td width="150" valign="top">

                    Bapak Bupati {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}} 
            </td>
        </tr>
         <tr>
            <td width="10">
            </td>
             <td width="20" valign="top">

                    2.
            </td>
            <td width="200" valign="top">

                   Kabag Hukum Pemkab  {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}} 
            </td>
        </tr>
               <tr>
            <td width="10">
            </td>
             <td width="20" valign="top">

                    3.
            </td>
            <td width="150" valign="top">

                   Arsip
            </td>
        </tr>



			
		</tbody>
	</table>
</div>

</body>
</html>