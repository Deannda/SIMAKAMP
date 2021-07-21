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
            <td width="280" valign="top">
                    {{ $datasurat[0]->lampiran }} berkas
            </td>
            <td width="40" valign="top">
                
                    Yth:
            </td>
            <td width="120" colspan="3" valign="top">
              
                    {{ ucwords($datasurat[0]->kepada) }}
             
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
                    Pengantar Permohonan Izin Hiburan {{ ucwords($datasurat[0]->acara) }}
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
                    <strong>{{ ucwords($datasurat[0]->di) }}</strong>
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
            Telah datang menghadap kami selaku Kepala {{ ucwords($desa[0]->kabupaten[0]->status)}} {{ ucfirst($desa[0]->kabupaten[0]->status)}} {{ ucfirst($desa[0]->nama_desa) }} Kecamatan {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}} yaitu
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
            
   			 Umur 

            </td>
            <td>
            
   			 : {{ date('Y') - date('Y', strtotime($penduduk[0]->tanggal_lahir)) }} Tahun
          
 
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
            
   			 Alamat

            </td>
            <td>
            
   			 : {{ ucwords( $penduduk[0]->kk[0]->alamat )}}
            <br>
            </td>
           
        </tr>
        <tr>
        	<td width="87" align="justify">
        	</td>
            <td width="" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           Benar ianya akan mengadakan {{ ucwords($datasurat[0]->acara) }} yang akan dilaksanakan pada :
           <br>
            </td>
        </tr>
        <tr>
            <td width="125">
            </td>
            <td width="150">
            
             Hari/Tanggal

            </td>
            <td>
            
             : {{ ucwords($datasurat[0]->hari_tanggal) }}
 
            </td>
           
        </tr>
         <tr>
            <td width="125">
            </td>
            <td width="150">
            
             Waktu

            </td>
            <td>
            
             : {{ ucwords($datasurat[0]->waktu) }}
 
            </td>
           
        </tr>
         <tr>
            <td width="125">
            </td>
            <td width="150">
            
             Tempat

            </td>
            <td>
            
             : {{ ucwords($datasurat[0]->tempat) }}
             <br>
 
            </td>
           
        </tr>
         <tr>
            <td width="87" align="justify">
            </td>
            <td width="" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Demikian disampaikan kepada bapak sebagai pengantar bagi yang bersangkutan untuk mengurus surat izin Hiburan {{ ucwords($datasurat[0]->acara) }} tersebut. Atas Perhatian dan bantuannya diucapkan terima kasih.
           <br>
            </td>
        </tr>

		<tr>
        	<td width="300">
        	</td>
            <td width="">
            
   			<strong>An KEPALA {{ strtoupper($desa[0]->kabupaten[0]->status)}} {{ strtoupper($desa[0]->kabupaten[0]->status)}} {{ strtoupper($desa[0]->nama_desa) }}</strong>

            </td>
        </tr>
        <tr>
        	<td width="300">
        	</td>
            <td width="">
            
   			<strong>SEKRETARIS {{ strtoupper($desa[0]->kabupaten[0]->status)}} {{ strtoupper($desa[0]->nama_desa) }}</strong>

		<br>
		<br>
		<br>
            </td>
        </tr>
         <tr>
        	<td width="300">
        	</td>
            <td width="" align="center">
            
   			<strong>{{ ucfirst($desa[0]->kerani_desa) }}</strong>

            </td>
        </tr>




			
		</tbody>
	</table>
</div>

</body>
</html>