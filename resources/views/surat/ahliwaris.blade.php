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
					<td width="160">
					</td>
					<td width="350"><font size="15" face="Times New Roman"><u><strong>SURAT KETERANGAN AHLIWARIS</strong></u></font></td>
				</tr>
				<tr>
					<td width="210">
					</td>
					<td width="230"><font size="13" face="Times New Roman"><strong>NOMOR:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $nosurat }}</strong></font></td>
				</tr>

				<tr height="0">
					<td width="50" align="justify">
					</td>
					<td width="" align="justify">
						<br>
						<br>
						<font size="14" face="Times New Roman"> 
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Yang bertanda tangan di bawah ini Kepala {{ ucwords($desa[0]->kabupaten[0]->status)}} {{ ucfirst($desa[0]->nama_desa) }} Kecamatan {{ ucfirst($desa[0]->kecamatan[0]->nama_kecamatan) }} Kabupaten {{ ucfirst($desa[0]->kabupaten[0]->nama_kabupaten)}} dengan ini menerangkan bahwa:
					</font>

						<br>
					</td>
				</tr>

				<table>
					<tr>
						<td width="50" border="2" align="center">
							No
						</td>
						<td width="160" border="2" align="center">
							Nama
						</td>
						<td width="160" border="2" align="center">
							Tempat/Tgl. Lahir
						</td>
						<td width="100" border="2" align="center">
							Alamat
						</td>
						<td width="70" border="2" align="center">
							Ket
						</td>
					</tr>
					@foreach($ahliwaris as $key => $data)
					<tr>
						<td width="50" border="2" align="center">
							{{ ++$key }}
						</td>
						<td width="160" border="2" align="center">
							{{ $data->nama }}
						</td>
						<td width="160" border="2" align="center">
							{{ $data->tempat_lahir}}/{{ date('d M Y',strtotime($data->tanggal_lahir))}}
						</td>
						<td width="100" border="2" align="center">
							{{ $data->kk[0]->alamat}}
						</td>
						<td width="70" border="2" align="center">
							{{ $data->hubungankeluarga[0]->hubungankeluarga}}
						</td>
					</tr>
					@endforeach
				</table>

				<tr height="0">
					<td width="50" align="justify">
					</td>
					<td width="" align="justify">
						<br>   <br>   
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Benar nama-nama yang tersebut di atas adalah Keluarga dan sebagai ahli waris yang sah dari :
						<br>

					</td>
				</tr>

				<tr>
					<td width="125"><br>
					</td>
					<td width="150"><br>

						Nama 

					</td>
					<td width="15"><br>

						: 

					</td>
					<td width="200">
						<br>

						{{ strtoupper($penduduk[0]->nama ) }}

					</td>

				</tr>
				<tr>
					<td width="125">
					</td>
					<td width="150">

						Tempat/Tanggal Lahir 

					</td>
					<td width="15">

						: 

					</td>
					<td width="200">

						{{ ucwords($penduduk[0]->tempat_lahir) }}/{{ date('d F Y', strtotime($penduduk[0]->tanggal_lahir)) }}

					</td>

				</tr>
				<tr>
					<td width="125">
					</td>
					<td width="150">

						Agama

					</td>
					<td width="15">

						: 

					</td>
					<td width="200">

						{{ ucwords($penduduk[0]->agamaa[0]->agama) }}

					</td>

				</tr>
				<tr>
					<td width="125">
					</td>
					<td width="150">

						Warga Negara 

					</td>
					<td width="15">

						: 

					</td>
					<td width="200">

						{{ ucwords($penduduk[0]->kewarganegaraans[0]->kewarganegaraan) }}

					</td>

				</tr>
				<tr>
					<td width="125">
					</td>
					<td width="150">

						Alamat

					</td>
					<td width="15">

						: 

					</td>
					<td width="200">

						{{ ucwords( $penduduk[0]->kk[0]->alamat )}}


					</td>

				</tr>
				<tr>
					<td width="125">
					</td>
					<td width="150">

						Tanggal Kematian

					</td>
					<td width="15">

						: 

					</td>
					<td width="200">

						{{ date('d M Y',strtotime($tanggal_kematian->tanggal_kematian))}}


					</td>

				</tr>
				<tr height="0">
					<td width="50" align="justify">
					</td>
					<td width="" align="justify">
						<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						{{ ucwords($datasurat[0]->keterangan) }}

					</td>
				</tr>
				<tr height="0">
					<td width="50" align="justify">
					</td>
					<td width="" align="justify">
						<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Demikianlah Surat Keterangan Ahli Waris  ini dibuat dengan sebenarnya untuk dapat digunakan sebagai mana mestinya.
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

						<strong><u>{{ ucfirst($desa[0]->kepala_desa) }}. S. Ag</u></strong>

					</td>
				</tr>





			</tbody>
		</table>
	</div>

</body>
</html>
