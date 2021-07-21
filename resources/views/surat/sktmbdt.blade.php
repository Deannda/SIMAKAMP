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
					<td  width="70"><img src="image/sepotong.jpeg" width="130" height="185"  ></td>
					<td align="center" width="80%">
						<!-- size untuk mengganti ukuran font -->
						<font size="20" face="Times New Roman">PEMERINTAH KABUPATEN {{ strtoupper($desa[0]->kabupaten[0]->nama_kabupaten)}} </font><br>
						<font size="33" face="Times New Roman">{{ strtoupper($desa[0]->kabupaten[0]->status)}} {{ strtoupper($desa[0]->nama_desa) }}</font><br>
						<font size="20" face="Times New Roman">KECAMATAN {{ strtoupper($desa[0]->kecamatan[0]->nama_kecamatan) }} </font><br>
						<font size="12" face="Times New Roman"><strong>Alamat: {{ $desa[0]->alamat_desa }} </strong></font><br>
						<font size="12" face="Times New Roman"><strong>Website: <a href="https://www.sepotong.desa.id/ ">https://www.sepotong.desa.id/ </a></strong></font>


					</td>
				</tr>

				<hr size="1000px" double #8c8c8c border="1000px" height="3px">


				<tr>
					<td colspan="2" height="10px"></td>
				</tr>
				@else
				<tr>
					<td colspan="2" height="100px"></td>
				</tr>
				@endif


				<tr>
					<td width="140">
					</td>
					<td width="300"><font size="15" face="Times New Roman"><u><strong>SURAT KETERANGAN TIDAK MAMPU</strong></u></font></td>
				</tr>
				<tr>
					<td width="200">
					</td>
					<td width="230"><font size="13" face="Times New Roman"><strong>NOMOR : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $nosurat }}</strong></font>
						<br>
					</td>
					</tr>

					<tr>
						<td width="5" align="justify">
						</td>
						<td width="" align="justify"><font size="13" face="Times New Roman">Kepala {{ ucwords($desa[0]->kabupaten[0]->status)}} {{ ucfirst($desa[0]->nama_desa) }} Kecamatan {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}} dengan ini menerangkan:</font>
						

							<br>

						</td>
					</tr>
					<tr>
						<td width="50">
						</td>
						<td width="180">
							<font size="13" face="Times New Roman"> 
								Nama 
							</font>

						</td>
						<td width="5">
							:
						</td>
						<td width="300">
							<font size="13" face="Times New Roman"> 

								<strong>{{ strtoupper($penduduk[0]->nama ) }}</strong>
							</font>

						</td>

					</tr>

					<tr>
						<td width="50">
						</td>
						<td width="180">

							<font size="13" face="Times New Roman"> 

								Tempat/Tanggal Lahir 

							</font>

						</td>
						<td width="5">
							:
						</td>
						<td width="300">

							<font size="13" face="Times New Roman"> 

								{{ ucwords($penduduk[0]->tempat_lahir) }}&nbsp;/&nbsp;{{ bulanIndo($penduduk[0]->tanggal_lahir)  }}

							</font>


						</td>

					</tr>

					<tr>
						<td width="50">
						</td>
						<td width="180">

							<font size="13" face="Times New Roman"> 

								Jenis Kelamin 

							</font>

						</td>
						<td width="5">
							:
						</td>
						<td width="300">

							<font size="13" face="Times New Roman"> 

								{{ ucwords($penduduk[0]->jeniskelamin[0]->jeniskelamin) }}

							</font>


						</td>
					</tr>

					<tr>
						<td width="50">
						</td>
						<td width="180">

							<font size="13" face="Times New Roman"> 

								Warganegara

							</font>

						</td>
						<td width="5">
							:
						</td>
						<td width="300">

							<font size="13" face="Times New Roman"> 

								{{ ucwords($penduduk[0]->kewarganegaraans[0]->kewarganegaraan) }}

							</font>


						</td>
					</tr>

					<tr>
						<td width="50">
						</td>
						<td width="180">

							<font size="13" face="Times New Roman"> 
								Pekerjaan

							</font>

						</td>
						<td width="5">

							:

						</td>
						<td width="300">
							<font size="13" face="Times New Roman"> 

								{{ ucwords($penduduk[0]->pekerjaans[0]->pekerjaan) }}

							</font>

						</td>


					</tr>

					<tr>
						<td width="50">
						</td>
						<td width="180">

							<font size="13" face="Times New Roman"> 

								Agama

							</font>
						</td>
						<td width="5">

							: 

						</td>
						<td width="300">

							<font size="13" face="Times New Roman"> 

								{{ ucwords($penduduk[0]->agamaa[0]->agama) }}

							</font>

						</td>

					</tr>

					<tr>
						<td width="50">
						</td>
						<td width="180">
							<font size="13" face="Times New Roman"> 

								Alamat

							</font>

						</td>
						<td width="5">

							:
						</td>
						<td width="300">

							<font size="13" face="Times New Roman"> 

								{{ ucwords( $penduduk[0]->kk[0]->alamat )}}

							</font>


						</td>

					</tr>


					<tr>
						<td width="50">
						</td>
						<td width="180">

							<font size="13" face="Times New Roman"> 

								NIK 

							</font>

						</td>
						<td width="5">
							:
						</td>
						<td width="300">

							<font size="13" face="Times New Roman"> 

								{{ strtoupper($penduduk[0]->nik ) }}


							</font>
							<br>

						</td>

					</tr>

					<tr>
						<td width="5" align="justify">
						</td>
						<td width="" align="justify"><font size="13" face="Times New Roman">Bahwa nama tersebut diatas adalah benar penduduk {{ ucwords($desa[0]->kabupaten[0]->status)}} {{ ucfirst($desa[0]->nama_desa) }} Kecamatan {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}}. Menurut sepengetahuan serta data di lapangan adalah benar keluarga <strong>Tidak Mampu</strong>.</font>

							

							<br>

						</td>
					</tr>

					<tr>
						<td width="5" align="justify">
						</td>
						<td width="" align="justify"><font size="13" face="Times New Roman"><i><strong>Surat keterangan tidak mampu ini dipergunakan untuk {{ ucwords($datasurat[0]->fungsi) }}</strong></i>.</font>



							<br>

						</td>
					</tr>

					<tr>
						<td width="5" align="justify">
						</td>
						<td width="" align="justify"><font size="13" face="Times New Roman">Demikian Surat Keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan seperlunya.</font>


							<br>
							<br>
							<br>

						</td>
					</tr>

					<tr>
						<td width="320">
						</td>
						<td width="">
							<font size="13" face="Times New Roman"> 

								{{ ucwords($desa[0]->nama_desa) }}, {{ bulanIndo($tanggalsurat) }}
							</font>

						</td>
					</tr>
					<tr>
						<td width="320">
						</td>
						<td width="">
							<font size="13" face="Times New Roman"> 

								KEPALA {{ strtoupper($desa[0]->kabupaten[0]->status)}} {{ strtoupper($desa[0]->nama_desa) }}

							</font>

							<br>
							<br>
							<br>
						</td>
					</tr>

					<tr>
						<td width="35">
						</td>
						<td width="">
							<font size="13" face="Times New Roman"> 
								Mengetahui:
							</font>
						</td>
					</tr>
					<tr>
						<td width="10">
						</td>
						<td width="">
							<font size="13" face="Times New Roman"> 
								CAMAT {{ strtoupper($desa[0]->kecamatan[0]->nama_kecamatan) }}
							</font>
						</td>
					</tr>
					<tr>
						<td width="350">
						</td>
						<td width="">
							<font size="13" face="Times New Roman"> 
								<strong><u>{{ strtoupper($desa[0]->kepala_desa) }}. S. Ag</u></strong>
							</font>
						</td>
					</tr>

					<!-- <tr>
						<td width="210" align="justify">
						</td>
						<td width="200" align="justify">
							<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<strong>{{ strtoupper($desa[0]->kecamatan[0]->nama_camat) }}</strong>
						</td>
					</tr>
					<tr>
						<td width="210" align="justify">
						</td>
						<td width="200" align="justify">
							<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<strong>NIP. {{ strtoupper($desa[0]->kecamatan[0]->nip) }}</strong>
						</td>
					</tr>

				-->



			</tbody>
		</table>
	</div>

</body>
</html>
