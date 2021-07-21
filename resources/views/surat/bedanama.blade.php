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
            </td>
            </tr>

            <tr>
            <td width="170">
            </td>
            <td width="230"><font size="18"><u>SURAT KETERANGAN</u></font></td>
            </tr>
            <tr>
            <td width="180">
            </td>
            <td width="230"><font size="13">NOMOR: {{ $nosurat }}</font></td>
            </tr>
           
        <tr height="0">
        	<td width="50" align="justify">
        	</td>
            <td width="" align="justify">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   			Yang bertanda tangan dibawah ini Penghulu {{ ucfirst($desa[0]->kabupaten[0]->status)}} {{ ucfirst($desa[0]->nama_desa) }} Kecamatan {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}} dengan ini menerangkan bahwa:
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
 
            </td>
           
        </tr>
          <tr height="0">
            <td width="50" align="justify">
            </td>
            <td width="" align="justify">
            <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Nama tersebut diatas adalah benar berdomisili di {{ ucfirst($desa[0]->kabupaten[0]->status)}} {{ ucfirst($desa[0]->nama_desa) }} Kecamatan {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}}. {!! ucwords($datasurat[0]->keterangan_kesalahan) !!}
            </td>
        </tr>
            <tr height="0">
            <td width="50" align="justify">
            </td>
            <td width="" align="justify">
            <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           Demikianlah Surat Keterangan ini di buat atas dasar yang sebenarnya untuk dapat digunakan sebagai mana mestinya.
            </td>
        </tr>
		<tr>
        	<td width="350">
        	</td>
            <td width="">
            
   			<strong><p>PENGHULU {{ strtoupper($desa[0]->nama_desa) }}</p></strong>

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




			
		</tbody>
	</table>
</div>

</body>
</html>
