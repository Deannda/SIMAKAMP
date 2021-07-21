<?php

function bulanIndo($tgl){
		$bulan = [
			'01' => 'januari',
			'02' => 'februari',
			'03' => 'Maret',
			'04' => 'april',
			'05' => 'mei',
			'06' => 'juni',
			'07' => 'juli',
			'08' => 'agustus',
			'09' => 'september',
			'10' => 'oktober',
			'11' => 'November',
			'12' => 'Desember',
		];

		$tglIndo = date('d',strtotime($tgl)).' '. ucfirst(strtolower($bulan[date('m',strtotime($tgl))])) .' '.date('Y',strtotime($tgl));
	return  $tglIndo;
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.container {
			border: 1px solid #000;
			width: 50%;
		}
		.margin {
			margin: 130px 130px 130px 130px;
			border: 1px solid #000;
		}
	</style>
</head>
<body >
	<div>
		<table>
			<thead>

			</thead>
			<tbody >
				<!-- melakukan pengecekan kondisi dimana kalau $kop berisi 'denganKop' maka Kop surat akan ditampilkan -->
				<tr height="0">
					<td width="20" align="justify">
					</td>
					<td width="" align="justify">

						<font size ="8" face="Times New Roman">KEPUTUSAN DIREKTUR JENDERAL BIMBINGAN MASYARAKAT ISLAM<br>
							NOMOR 713 TAHUN 2018<br>
						TENTANG PENETAPAN FORMULIR DAN LAPORAN PENCATATAN PERKAWINAN ATAU RUJUK</font>


					</td>
				</tr>

				<tr>
					<br>
					
					<td align="center" width="100%">
						<!-- size untuk mengganti ukuran font -->
						<font size="12" face="Times New Roman"><strong>FORMULIR SURAT KETERANGAN KEMATIAN SUAMI/ISTRI</strong></font>

					</td>
				</tr>

				<tr height="0">
					<td width="450" align="right">
					</td>
					<td width="" align="right">
						<p>
							<font size="10" face="Times New Roman"><strong>Model N 6</strong></font>
						</p>


					</td>
				</tr>


				<tr>
					<td width="20">
					</td>
					<td width="160">
						<font size="11" face="Times New Roman">KANTOR {{ strtoupper($desa[0]->kabupaten[0]->status)}}/KELURAHAN 
						</font>
						
					</td>
					<td width="5">

						: 


					</td>
					<td width="500">
						<font size="11" face="Times New Roman"> {{ strtoupper($desa[0]->nama_desa) }}</font>

						


					</td>

				</tr>
				<tr>
					<td width="20">
					</td>
					<td width="160">
						<font size="11" face="Times New Roman">KECAMATAN
						</font>
						
					</td>
					<td width="5">

						: 


					</td>
					<td width="500">
						<font size="11" face="Times New Roman"> {{ strtoupper($desa[0]->kecamatan[0]->nama_kecamatan) }}</font>

						


					</td>

				</tr>
				<tr>
					<td width="20">
					</td>
					<td width="160">
						<font size="11" face="Times New Roman">KABUPATEN
						</font>
						
					</td>
					<td width="5">

						: 


					</td>
					<td width="500">
						<font size="11" face="Times New Roman"> {{ strtoupper($desa[0]->kabupaten[0]->nama_kabupaten)}}</font>

						<br>


					</td>

				</tr>
				<tr>


					<td align="center" width="100%">
						<!-- size untuk mengganti ukuran font -->
						<font size="12" face="Times New Roman"><strong><u>SURAT KETERANGAN KEMATIAN SUAMI/ISTRI</u></strong></font><br>
						<font size="10" face="Times New Roman"><strong>Nomor : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/{{ $nomorSurat }}{{ date('Y') }}</strong></font>


			
					</td>
				</tr>

				<tr>
					<td width="16">
					</td>
					<td width="">

						<font size="12" face="Times New Roman"> Yang bertanda tangan dibawah ini menjelaskan dengan sesungguhnya bahwa:</font>
						

						<br>

					</td>
				</tr>

				<tr>
					<td width="20"> 
					</td>
					<td width="20"><font size="12" face="Times New Roman">A.</font>
					</td>
					<td width="20" valign="top">
						<font size="12" face="Times New Roman">1.</font>

					</td>
					<td width="180" valign="top">
						<font size="12" face="Times New Roman">Nama</font>


					</td>
					<td width="7">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ strtoupper($penduduk[0]->nama ) }}</font>
						



					</td>
				</tr>

				<tr>
					<td width="40">
					</td>
					<td width="20" valign="top">
						<font size="12" face="Times New Roman">2.</font>

					</td>
					<td width="180" valign="top">
						<font size="12" face="Times New Roman">NIK</font>


					</td>
					<td width="7">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ strtoupper($penduduk[0]->nik ) }}</font>
						



					</td>
				</tr>
				<tr>
					<td width="40">
					</td>
					<td width="20" valign="top">
						<font size="12" face="Times New Roman">3.</font>

					</td>
					<td width="180" valign="top">
						<font size="12" face="Times New Roman">Jenis Kelamin</font>


					</td>
					<td width="7">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ $penduduk[0]->jeniskelamin[0]->jeniskelamin }}</font>
						



					</td>
				</tr>
				<tr>
					<td width="40">
					</td>
					<td width="20" valign="top">
						<font size="12" face="Times New Roman">4.</font>

					</td>
					<td width="180" valign="top">
						<font size="12" face="Times New Roman">Tempat dan Tanggal Lahir</font>


					</td>
					<td width="5">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ $penduduk[0]->tempat_lahir }}, {{ bulanIndo($penduduk[0]->tanggal_lahir)  }}</font>
						



					</td>
				</tr>
				<tr>
					<td width="40">
					</td>
					<td width="20" valign="top">
						<font size="12" face="Times New Roman">5.</font>

					</td>
					<td width="180" valign="top">
						<font size="12" face="Times New Roman">Kewarganegaraan</font>


					</td>
					<td width="5">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ $penduduk[0]->kewarganegaraans[0]->kewarganegaraan }}</font>
						



					</td>
				</tr>

				<tr>
					<td width="40">
					</td>
					<td width="20" valign="top">
						<font size="12" face="Times New Roman">6.</font>

					</td>
					<td width="180" valign="top">
						<font size="12" face="Times New Roman">Agama</font>


					</td>
					<td width="7">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ $penduduk[0]->agamaa[0]->agama }}</font>
						



					</td>
				</tr>

				<tr>
					<td width="40">
					</td>
					<td width="20" valign="top">
						<font size="12" face="Times New Roman">7.</font>

					</td>
					<td width="180" valign="top">
						<font size="12" face="Times New Roman">Pekerjaan</font>


					</td>
					<td width="7">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ $penduduk[0]->pekerjaans[0]->pekerjaan }}</font>
						



					</td>
				</tr>

				<tr>
					<td width="40">
					</td>
					<td width="20" valign="top">
						<font size="12" face="Times New Roman">8.</font>

					</td>
					<td width="180" valign="top">
						<font size="12" face="Times New Roman">Alamat</font>


					</td>
					<td width="7">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ $penduduk[0]->kk[0]->alamat }}</font>

						<br>
					</td>
				</tr>

				<tr>
					<td width="16">
					</td>
					<td width="224">

						<font size="12" face="Times New Roman">Telah meninggal dunia pada tanggal</font>

					</td>

					<td width="7">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ bulanIndo($surat[0]->tanggal_kematian)  }}</font>

					</td>
				</tr>

				<tr>
					<td width="16">
					</td>
					<td width="224">

						<font size="12" face="Times New Roman">Di:</font>

					</td>

					<td width="7">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ $surat[0]->tempat_kematian }}</font>

					</td>
				</tr>
@if($surat[0]->pasangan != null)
				<tr>
					<td width="16">
					</td>
					<td width="224">

						<font size="12" face="Times New Roman">Yang bersangkutan adalah Suami/Istri dari</font>

						<br>
					</td>

					<td width="7">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman"></font>

					</td>
				</tr>

				<tr>
					<td width="20"> 
					</td>
					<td width="20"><font size="12" face="Times New Roman">B.</font>
					</td>
					<td width="20" valign="top">
						<font size="12" face="Times New Roman">1.</font>

					</td>
					<td width="180" valign="top">
						<font size="12" face="Times New Roman">Nama</font>


					</td>
					<td width="7">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ strtoupper($surat[0]->pasangannn[0]->nama ) }}</font>
						



					</td>
				</tr>

				<tr>
					<td width="40">
					</td>
					<td width="20" valign="top">
						<font size="12" face="Times New Roman">2.</font>

					</td>
					<td width="180" valign="top">
						<font size="12" face="Times New Roman">NIK</font>


					</td>
					<td width="7">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ strtoupper($surat[0]->pasangannn[0]->nik ) }}</font>
						



					</td>
				</tr>
				<tr>
					<td width="40">
					</td>
					<td width="20" valign="top">
						<font size="12" face="Times New Roman">3.</font>

					</td>
					<td width="180" valign="top">
						<font size="12" face="Times New Roman">Jenis Kelamin</font>


					</td>
					<td width="7">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ ucwords($surat[0]->pasangannn[0]->jeniskelamin[0]->jeniskelamin ) }}</font>
						



					</td>
				</tr>
				<tr>
					<td width="40">
					</td>
					<td width="20" valign="top">
						<font size="12" face="Times New Roman">4.</font>

					</td>
					<td width="180" valign="top">
						<font size="12" face="Times New Roman">Tempat dan Tanggal Lahir</font>


					</td>
					<td width="5">

						:   


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ ucwords($surat[0]->pasangannn[0]->tempat_lahir) }}, {{ bulanIndo($surat[0]->pasangannn[0]->tanggal_lahir)  }}</font>
						



					</td>
				</tr>
				<tr>
					<td width="40">
					</td>
					<td width="20" valign="top">
						<font size="12" face="Times New Roman">5.</font>

					</td>
					<td width="180" valign="top">
						<font size="12" face="Times New Roman">Kewarganegaraan</font>


					</td>
					<td width="5">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ $surat[0]->pasangannn[0]->kewarganegaraans[0]->kewarganegaraan }}</font>
						



					</td>
				</tr>

				<tr>
					<td width="40">
					</td>
					<td width="20" valign="top">
						<font size="12" face="Times New Roman">6.</font>

					</td>
					<td width="180" valign="top">
						<font size="12" face="Times New Roman">Agama</font>


					</td>
					<td width="7">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ $surat[0]->pasangannn[0]->agamaa[0]->agama }}</font>
						



					</td>
				</tr>

				<tr>
					<td width="40">
					</td>
					<td width="20" valign="top">
						<font size="12" face="Times New Roman">7.</font>

					</td>
					<td width="180" valign="top">
						<font size="12" face="Times New Roman">Pekerjaan</font>


					</td>
					<td width="7">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ $surat[0]->pasangannn[0]->pekerjaans[0]->pekerjaan }}</font>
						



					</td>
				</tr>

				<tr>
					<td width="40">
					</td>
					<td width="20" valign="top">
						<font size="12" face="Times New Roman">8.</font>

					</td>
					<td width="180" valign="top">
						<font size="12" face="Times New Roman">Alamat</font>


					</td>
					<td width="7">

						:  


					</td>
					<td width="250">
						<font size="12" face="Times New Roman">{{ $surat[0]->pasangannn[0]->kk[0]->alamat }}</font>

						<br>
					</td>
				</tr>
@endif
				<tr>
					<td width="16">
					</td>
					<td width="">

						<font size="12" face="Times New Roman">Demikian surat keterangan ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan sebagaimana mestinya</font>
						

						<br>

					</td>
				</tr>

				<tr>
					<td width="357">
					</td>
					<td width="">

						<font size="12" face="Times New Roman">{{ ucwords($desa[0]->nama_desa) }} , {{ bulanIndo($tanggalsurat) }}</font>

					</td>
				</tr>
				<tr>
					<td width="350">
					</td>
					<td width="">
						<font size="12" face="Times New Roman">
							<strong>KEPALA DESA {{ strtoupper($desa[0]->nama_desa) }}</strong>
						</font>

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


						<font size="12" face="Times New Roman">
							<strong><u>{{ strtoupper($desa[0]->kepala_desa) }}. S. Ag</u></strong>
						</font>

					</td>
				</tr>

			</tbody>
		</table>
	</div>

</body>
</html>