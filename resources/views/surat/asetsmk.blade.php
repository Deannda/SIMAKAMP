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
            <td width="190">
            </td>
            <td width="300"><font size="15"><u><strong>SURAT KETERANGAN</strong></u></font></td>
            </tr>
            <tr>
            <td width="186">
            </td>
            <td width="230"><font size="13"><strong>NO :  {{ $nosurat }}</strong></font>
                <br></td>
            </tr>
           
        <tr height="0">
        	<td width="50" align="justify">
        	</td>
            <td width="" align="justify">
            &nbsp;&nbsp;&nbsp;
   			   Penghulu Kampung {{ ucfirst($desa[0]->nama_desa) }} Kecamatan {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}}, {{ ucwords($datasurat[0]->isi_surat) }}
   			<br>
            </td>
        </tr>
        <tr height="0">
          <td width="50" align="justify">
          </td>
            <td width="" align="justify">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya 
        <br>
         <br>
          <br>
           <br>
            </td>
        </tr>
           
        <tr>
            <td width="300">
            </td>
            <td width="100">
            
            Dikeluarkan di

            </td>
             <td width="20">
            
             :
 
            </td>
             <td width="200">
            
             {{ ucwords($desa[0]->nama_desa) }}
 
            </td>
        </tr>
         <tr>
            <td width="300">
            </td>
            <td width="100">
            
            Pada Tanggal

            </td>
             <td width="20">
            
             :
 
            </td>
            <td width="200">
            
             {{ date('d F Y', strtotime($tanggalsurat)) }}
 
            </td>
        </tr>
            <tr>
            <td width="300">
            </td>
            <td width="">
            
            <strong>An PENGHULU KAMPUNG {{ strtoupper($desa[0]->nama_desa) }}</strong>

            </td>
        </tr>
        <tr>
            <td width="350">
            </td>
            <td width="">
            
            Kerani Kampung 

        <br>
        <br>
        <br>
            </td>
        </tr>
         <tr>
            <td width="250">
            </td>
            <td width="" align="center">
            
            <strong><u>{{ strtoupper($desa[0]->kerani_desa) }}. S. Ag</u></strong>

            </td>
        </tr>

			
		</tbody>
	</table>
</div>

</body>
</html>
