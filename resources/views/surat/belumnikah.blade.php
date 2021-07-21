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
						<font size="12"><strong>SURAT PERNYATAAN/SUMPAH BELUM PERNAH NIKAH</strong></font><br>
						<font size="12"><strong>ATAU TIDAK TERIKAT DENGAN PERNIKAHAN LAIN</strong></font><br>


					</td>
				</tr>

				<tr height="0">
					<td width="20" align="justify">
					</td>
					<td width="" align="justify">
					
							Saya yang bertanda tangan dibawah ini:
							<br>
					
					</td>
				</tr>

				<tr>
					<td width="70">
					</td>
					<td width="150">

						Nama 

					</td>
					<td width="20">

						: 


					</td>
					<td width="500">

						{{ strtoupper($penduduk[0]->nama ) }}


					</td>

				</tr>
				<tr>
					<td width="70">
					</td>
					<td width="150">

						NIK 

					</td>
					<td width="20">

						: 


					</td>
					<td width="500">

						{{ strtoupper($penduduk[0]->nik ) }}


					</td>

				</tr>
				<tr>
					<td width="70">
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
					<td width="70">
					</td>
					<td width="150">

						Tempat/Tanggal Lahir 

					</td>
					<td width="20">

						:

					</td>
					<td width="500">

						{{ ucwords($penduduk[0]->tempat_lahir) }}, {{ date('d F Y', strtotime($penduduk[0]->tanggal_lahir)) }}


					</td>

				</tr>
				<tr>
					<td width="70">
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
					<td width="70">
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
					<td width="70">
					</td>
					<td width="150">

						Pekerjaan

					</td>
					<td width="13">

						:

					</td>
					<td width="500"> 

						{{ ucwords($penduduk[0]->pekerjaans[0]->pekerjaan) }}

					</td>

				</tr>
				<tr>
					<td width="70">
					</td>
					<td width="150">

						Status Perkawinan

					</td>
					<td width="13">

						:

					</td>
					<td width="500"> 

						{{ ucwords( $penduduk[0]->statusperkawinan[0]->statusperkawinan) }}

					</td>

				</tr>
				<tr>
					<td width="70">
					</td>
					<td width="150">

						Alamat

					</td>
					<td width="13">

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
						
						Dalam keadaan sehat dan berfikiran waras serta tidak ada paksaan dan lainya dari siapapun juga,
						dengan ini menyatakan dan bersumpah : Demi ALLAH, saya bersumpah bahwa saya belum
						pernah menikah dan tidak terikat oleh pertunangan atau perkawinan lainnya sampai pada hari ini
						dan tanggal surat ini saya tanda tangani.
						<p>
							Jika ada persoalan (masalah) di belakang hari nanti yang disebabkan oleh pernyataan dan
							sumpah saya yang tidak benar (palsu), maka saya bersedia dituntut di hukum sesuai dengan
							Undang – Undang dan Peraturan yang berlaku tanpa melibatkan ketua RT – RW dan Lurah /
							Kepala Desa, P3N serta Ka. KUA kec, setempat.
						</p>

						<p>
							Surat penyataan ini / sumpah ini saya buat adalah untuk melengkapi pernyaratan administrasi
							penikahan saya dengan seorang Laki-Laki  yang bernama <strong>{{ strtoupper($datasurat[0]->nama_pasangan) }}</strong>.                
						</p>

						<p>
							Demikian surat penyataan ini / sumpah ini saya buat dengan sebenarnya untuk dapat
							dipergunakan seperlunya.

						</p>
						<br>
	
					</td>
				</tr>
				<tr>
					<td width="317">
					</td>
					<td width="">

						{{ ucwords($desa[0]->nama_desa) }} , {{ date('d F Y', strtotime($tanggalsurat)) }}

					</td>
				</tr>
				<tr height="0">
					<td width="47" align="justify">
					</td>
					<td width="150" align="justify">
					</td>
					<td width="120">
					</td>
					<td width="">
						Saya yang menyatakan bersumpah
						<br>
					</td>
				</tr>
				<tr>
					<td width="300" align="justify">
					</td>
					<td border="1" width="70" cellpadding="20" align="center" >
						<font size="12">Materai Rp.6000-</font>
					</td>
				</tr>
				<tr height="0">
					<td width="65" align="justify">
					</td>
					<td width="180" align="justify">
					</td>
					<td width="100">
					</td>
					<td width="">
					({{ strtoupper($penduduk[0]->nama ) }})
						<br>

					</td>
				</tr>
				<tr>
					<td width="10">
					</td>
					<td width="150" valign="top">

						<strong>SAKSI-SAKSI:</strong>
						<br>
					</td>


				</tr>
				<tr>
					<td width="10">
					</td>
					<td width="20" valign="top">

						1.
					</td>
					<td width="100" valign="top">

						Nama

					</td>
					<td width="20">

						:


					</td>
					<td width="250">

						{{ ucfirst($datasurat[0]->saksike1[0]->nama) }}


					</td>
				</tr>
				<tr>
					<td width="10">
					</td>
					<td width="20" valign="top">


					</td>
					<td width="100" valign="top">

						Umur

					</td>
					<td width="20">

						:


					</td>
					<td width="250">

						{{ date('Y') - date('Y', strtotime($datasurat[0]->saksike1[0]->tanggal_lahir)) }} Tahun


					</td>
				</tr>
				<tr>
					<td width="10">
					</td>
					<td width="20" valign="top">


					</td>
					<td width="100" valign="top">

						Pekerjaan

					</td>
					<td width="20">

						:


					</td>
					<td width="250">

						{{ ucfirst($datasurat[0]->saksike1[0]->pekerjaans[0]->pekerjaan) }}


					</td>
				</tr>
				<tr>
					<td width="10">
					</td>
					<td width="20" valign="top">


					</td>
					<td width="100" valign="top">

						Alamat

					</td>
					<td width="20">

						:


					</td>
					<td width="250">

						{{ ucfirst($datasurat[0]->saksike1[0]->kk[0]->alamat) }}


					</td>
				</tr>
				<tr>
					<td width="10">
					</td>
					<td width="20" valign="top">

						2.
					</td>
					<td width="100" valign="top">

						Nama

					</td>
					<td width="20">

						:


					</td>
					<td width="250">

						{{ ucfirst($datasurat[0]->saksike2[0]->nama) }}


					</td>
				</tr>
				<tr>
					<td width="10">
					</td>
					<td width="20" valign="top">


					</td>
					<td width="100" valign="top">

						Umur

					</td>
					<td width="20">

						:


					</td>
					<td width="250">

						{{ date('Y') - date('Y', strtotime($datasurat[0]->saksike2[0]->tanggal_lahir)) }} Tahun


					</td>
				</tr>
				<tr>
					<td width="10">
					</td>
					<td width="20" valign="top">


					</td>
					<td width="100" valign="top">

						Pekerjaan

					</td>
					<td width="20">

						:


					</td>
					<td width="250">

						{{ ucfirst($datasurat[0]->saksike2[0]->pekerjaans[0]->pekerjaan) }}


					</td>
				</tr>
				<tr>
					<td width="10">
					</td>
					<td width="20" valign="top">


					</td>
					<td width="100" valign="top">

						Alamat

					</td>
					<td width="20">

						:


					</td>
					<td width="250">

						{{ ucfirst($datasurat[0]->saksike2[0]->kk[0]->alamat) }}


					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>
