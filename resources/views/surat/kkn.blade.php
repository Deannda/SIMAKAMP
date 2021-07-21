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
            <td width="290" valign="top">
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
            <td width="80">
            </td>
             <td width="100" valign="top">
           
                    Kepada Yth,
                
            </td>
        </tr>
        <tr>
            <td width="80">
            </td>
            <td width="500" valign="top">
                 {{ $datasurat[0]->kepada }}
              
            </td>
        
        </tr>
          <tr>
            <td width="110">
            </td>
            <td width="500" colspan="3" valign="top">
                Di  {{ $datasurat[0]->di }}
                <br>
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
            <td width="" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;
            Saya selaku Penghulu Kampung {{ ucwords($desa[0]->nama_desa) }}, Kecamatan {{ ucwords($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucwords($desa[0]->kabupaten[0]->nama_kabupaten)}} sangat berterimakasih atas berbagai program Kukerta/KKN yang merupakan Kegiatan tahunan Universitas. Sejak Kampung ini mekar dari desa Perincit, sudah sering ditempati program Kukerta/KKN, maka dari itu, kami menginginkan Program-Program Kukerta/KKN dari Universitas, merupakan program-program yang sesuai dengan kebutuhan Kampung.
            <br>

            </td>
        </tr>
         <tr>
            <td width="87" align="justify">
            </td>
            <td width="" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Kampung Kami membutuhkan para calon sarjana yang dapat mengaplikasikan  {{ $datasurat[0]->proker }}        
            <br>
            </td>
        </tr>
        <tr>
            <td width="87" align="justify">
            </td>
            <td width="" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Kami juga sangat terbuka untuk para mahasiswa dan dosen untuk melakukan penelitian dikampung kami dengan tema “{{ $datasurat[0]->tema }}” besar harapan kami supaya bapak/ibu berkenan menindaklanjuti permohonan ini.        
            <br>
            </td>
        </tr>
         <tr>
            <td width="87" align="justify">
            </td>
            <td width="" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Atas perhatian dan pertisipasinya kami ucapkan terimakasih.      
            <br>
            <br>
            <br>
            </td>
        </tr>

		<tr>
        	<td width="360">
        	</td>
            <td width="">
            
   			<strong>PENGHULU KAMPUNG</strong>
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
            
   			<strong></strong>

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