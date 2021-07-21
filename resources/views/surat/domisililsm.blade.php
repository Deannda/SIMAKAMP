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
            </td>
            </tr>

            <tr>
            <td width="180">
            </td>
            <td width="250"><font size="18"><u><strong>SURAT KETERANGAN</strong></u></font></td>
            </tr>
            <tr>
            <td width="190">
            </td>
            <td width="230"><font size="13"><strong>NOMOR: {{ $nosurat }}</strong></font></td>
            </tr>
           
        <tr height="0">
        	<td width="50" align="justify">
        	</td>
            <td width="" align="justify">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   			Penghulu Kampung {{ ucfirst($desa[0]->nama_desa) }} Kecamatan {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}} dengan ini menerangkan bahwa:
			</p>
            </td>
        </tr>

        <tr>
        	<td width="125">
        	</td>
            <td width="150"><br><br>
            
   			 Nama Perusahaan

            </td>
            <td width="20"><br><br>
            
   			 :
 
            </td>
            <td width="300"><br><br>
            
         {{ ucwords($datasurat[0]->nama_perusahaan) }}
 
            </td>
           
        </tr>
         <tr>
        	<td width="125">
        	</td>
            <td width="150">
            
   			 Dasar Pendirian 

            </td>
            <td width="20">
            
   			 :
 
            </td>
                <td width="300">
            
         {{ ucwords($datasurat[0]->dasar_pendirian) }}
         
 
            </td>
           
        </tr>
         <tr>
        	<td width="125">
        	</td>
            <td width="150">
            
   			 Nama Pimpinan 

            </td>
            <td width="20">
            
   			 :
 
            </td>
            <td width="300">
            
         {{ ucwords($datasurat[0]->nama_pimpinan) }}
         
 
            </td>
           
        </tr>
         <tr>
        	<td width="125">
        	</td>
            <td width="150">
            
   			 Jenis Usaha

            </td>
            <td width="20">
            
   			 :
 
            </td>
                   <td width="300">
            
         {{ ucwords($datasurat[0]->jenis_usaha) }}
         
 
            </td>
           
        </tr>
          <tr>
            <td width="125">
            </td>
            <td width="150">
            
             Alamat Sekretariat

            </td>
            <td width="20">
            
             :
 
            </td>
                   <td width="300">
            
         {{ ucwords($datasurat[0]->alamat_sekretariat) }}
         
 
            </td>
           
        </tr>
          <tr height="0">
            <td width="50" align="justify">
            </td>
            <td width="" align="justify">
            <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           
            
         {{ ucwords($datasurat[0]->keterangan) }}
         
 
    
            
            </td>
        </tr>
            <tr height="0">
            <td width="50" align="justify">
            </td>
            <td width="" align="justify">
            <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           Demikian Surat Keterangan ini dibuat dengan sebenarnya, untuk dapat dipergunakan dengan sebagaimana mestinya.
           <br>
           <br>
           <br>
            </td>
        </tr>
          <tr>
            <td width="350">
            </td>
            <td width="">
            
           {{ ucwords($desa[0]->nama_desa) }} , {{ date('d F Y', strtotime($tanggalsurat)) }}

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

            </td>
        </tr>




			
		</tbody>
	</table>
</div>

</body>
</html>
