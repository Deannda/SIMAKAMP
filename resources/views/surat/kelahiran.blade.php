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
	
			<tr>
				<td align="center" width="100%">
					<!-- size untuk mengganti ukuran font -->
					<font size="15"><strong><u>SURAT PERNYATAAN</u></strong></font><br>


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
            </td>
            </tr>

        <tr height="0">
        	<td width="10" align="justify">
        	</td>
            <td width="" align="justify">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   			Saya yang bertanda tangan dibawah ini:
			</p>
            </td>
        </tr>

        <tr>
        	<td width="125">
        	</td>
            <td width="150"><br><br>
            
   			 Nama 

            </td>
            <td width="20"><br><br>
            
   			 :
 
            </td>
            <td width="500"><br><br>
            
       {{ strtoupper($penduduk[0]->nama ) }}
 
            </td>
           
        </tr>
         <tr>
        	<td width="125">
        	</td>
            <td width="150">
            
   			 Jenis Kelamin 

            </td>
            <td width="20">
            
   			 : 
 
            </td>
               <td width="500">
            
       {{ ucwords($penduduk[0]->jeniskelamin[0]->jeniskelamin) }}
 
            </td>
           
        </tr>
         <tr>
        	<td width="125">
        	</td>
            <td width="150">
            
   			 Tempat/Tanggal Lahir 

            </td>
            <td width="20">
            
   			 :
 
            </td>
            <td width="500">
            
       {{ ucwords($penduduk[0]->tempat_lahir) }}/{{ date('d F Y', strtotime($penduduk[0]->tanggal_lahir)) }}
 
            </td>
           
        </tr>
          <tr>
            <td width="125">
            </td>
            <td width="150">
            
             Agama

            </td>
            <td width="20">
            
             :
 
            </td>
               <td width="500">
            
       {{ ucwords($penduduk[0]->agamaa[0]->agama) }}
 
            </td>
           
        </tr>
       <tr>
        	<td width="125">
        	</td>
            <td width="150">
            
   			 Warga Negara 

            </td>
            <td width="20">
            
   			 :
 
            </td>
             <td width="500">
            
       {{ ucwords($penduduk[0]->kewarganegaraans[0]->kewarganegaraan) }}
 
 
            </td>
           
        </tr>
         <tr>
        	<td width="125">
        	</td>
            <td width="150">
            
   			 Pekerjaan

            </td>
            <td width="20">
            
   			 :  

 
            </td>
                    <td width="500">
            
      {{ ucwords($penduduk[0]->pekerjaans[0]->pekerjaan) }}
 
 
            </td>
           
        </tr>
         <tr>
        	<td width="125">
        	</td>
            <td width="150">
            
   			 Status Perkawinan

            </td>
            <td width="20">
            
   			 : 
 
            </td>
                      <td width="500">
            
      {{ ucwords( $penduduk[0]->statusperkawinan[0]->statusperkawinan) }}
 
            </td>
           
        </tr>
        <tr>
        	<td width="125">
        	</td>
            <td width="150">
            
   			 Alamat

            </td>
            <td width="20">
            
   			 :  
 
            </td>
            <td width="500">
            
      {{ ucwords( $penduduk[0]->kk[0]->alamat )}}
  <br>
            </td>
           
        </tr>
       <tr height="0">
          <td width="20" align="justify">
          </td>
            <td width="" align="justify">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Menerangkan dengan sebenarnya bahwa pada tanggal {{ ucwords($datasurat[0]->tanggal_lahir) }} di {{ ucwords($datasurat[0]->tempat_lahir) }} Telah Lahir seorang anak yang diberi nama {{ strtoupper($datasurat[0]->anak) }} dari pasangan suami istri {{ strtoupper($datasurat[0]->ayahh[0]->nama) }} dan {{ strtoupper($datasurat[0]->ibuu[0]->nama) }}
        <br>
        </td>
        </tr>
      <tr height="0">
          <td width="20" align="justify">
          </td>
            <td width="" align="justify">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Demikian surat pernyataan ini saya buat dengan sebenarnya untuk dapat digunakan sebagaimana mestinya.
          <br>
          <br>            
        </td>
       </tr>
           <tr>
            <td width="320">
            </td>
            <td width="">
            
           {{ ucwords($desa[0]->nama_desa) }} , {{ date('d F Y', strtotime($tanggalsurat)) }}

            </td>
        </tr>
        <tr height="0">
            <td width="47" align="justify">
            </td>
            <td width="150" align="justify">
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <strong></strong>
            </td>
             <td width="120">
            </td>
            <td width="">
            
              Saya yang membuat pernyataan
              <br>
            </td>
        </tr>
	         <tr>
            <td width="300" align="justify">
            </td>
            <td border="1" width="100" cellpadding="20" align="center" >
            <strong><font size="12">Materai Rp.6000-</font></strong>
            </td>
        </tr>
        <tr height="0">
            <td width="65" align="justify">
            </td>
            <td width="180" align="justify">
            <br> <br> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <strong></strong>
            </td>
             <td width="120">
            </td>
            <td width="">
            
               <strong> <br> <br> {{ strtoupper($penduduk[0]->nama ) }}</strong>
               <br>
               <br>
               <br>
               <br>
            </td>
        </tr>
        
    


			
		</tbody>
	</table>
</div>
</body>
</html>
