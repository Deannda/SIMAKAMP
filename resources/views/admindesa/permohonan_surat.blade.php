@extends('../layouts/master')
@section('css')
<link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endsection


@section('content')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Daftar Permohonan Surat {{ $namaSurat }}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active"></li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example1" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th><center>No</center></th>
								<th><center>NIK Pemohon</center></th>
								<th><center>Nama Pemohon</center></th>
								<th><center>Action</center></th>

							</tr>
						</thead>
						<tbody>
							@foreach($data as $key => $datas)
							<tr>
								<td>{{++$key}}</td>
								<td> {{ $datas->nik }} </td>
								<td>{{ $datas->penduduk[0]->nama }}</td>
								<td><center>

									<button type="button" class="btn btn-info btn-sm" data-toggle="modal"
									data-target="#info{{ $datas->nomor_surat }}">
									<strong>Detail Permohonan</strong>
								</button>

								<!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cetak{{$datas->nomor_surat}}">
									<strong>Cetak</strong>
								</button> --></center>
							</td>
						</tr>

						<div class="modal fade" id="info{{ $datas->nomor_surat }}">
							<div class="modal-dialog modal-xl">
								<div class="modal-content">
									<div class="modal-header bg-info">
										<h4 class="modal-title">Data & Persyaratan
											{{ $datas->penduduk[0]->nama }} </h4>
											<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form action="#" method="post" role="form">
										@csrf
										<div class="card-body">
											<div class="row col-lg-50">
												<div class="col-lg-20">
											<!-- 		<div class="form-group">
														<img
														src="{{ url('storage/foto_ktp/'. $datas->foto_ktp) }}"
														height="200" width="400">
													</div> -->
													<div class="form-group">
														<p><strong>NIK</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $datas->penduduk[0]->nik }}</p>
														</div>
														<div class="form-group">
															<p><strong>Nama</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $datas->penduduk[0]->nama }}</p>
															</div>
															<div class="form-group">
																<p><strong>Tempat Lahir</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $datas->penduduk[0]->tempat_lahir }}</p>
																</div>
																<div class="form-group">
																	<p><strong>Tanggal Lahir</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $datas->penduduk[0]->tanggal_lahir }}</p>
																	</div>
																<div class="form-group">
																	<a href="Http://web.kampung.info/storage/syarat/{{$datas->file_syarat}}" download="{{$datas->file_syarat}}" class="nav-link">
																	<button type="button" class="btn btn-primary">
							
																	Download Persyaratan Pemohon

																	</button>
																	</a>	
																</div>


																</div>
															</div>
														</div>
														<div class="modal-footer right-content-between">
															<button type="button" class="btn btn-danger btn-sm"
															data-dismiss="modal">Tutup
														</button>
														<button type="button" class="btn btn-info btn-sm"
														data-toggle="modal" data-target="#cetak{{$datas->nomor_surat}}">Cetak
													</button>
												</div>
											</form>

										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>


								<div class="modal fade" id="cetak{{$datas->nomor_surat}}">
									<div class="modal-dialog">
										<div class="modal-content bg-default">
											<div class="modal-header">
												<h4 class="modal-title">Cetak Surat</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<form action="{{ url($link.'/'.$datas->nomor_surat.'/'.$format_nomor_surat) }}" id="form{{$datas->nomor_surat}}"  method="POST">
												@csrf
												<div class="modal-body">
													<p> Apakah anda yakin ingin mencetak surat? <b></b>? </p>
													@if($namaSurat == 'Situ')
													<div class="form-group">
														<label for="">Pilih TTD</label>
														<select name="ttd" class="form-control">
															<option value="penghulu">Penghulu</option>
															<option value="kerani">Sekretaris</option>
														</select>
													</div>
													@endif
													<div class="form-group">
														<label for="">Pilih KOP</label>
														<select name="kop" class="form-control">
															<option value="denganKop">Pakai KOP</option>
															<option value="noKOp">Tidak Pakai KOP</option>
														</select>
													</div>
												</div>
												<div class="modal-footer justify-content-between">
													<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
													<button type="submit" onclick="newpage({{ $datas->nomor_surat }})" class="btn btn-primary">Cetak</button>
												</div>
											</form>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->


				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>



		<!-- /.modal -->

		<!-- /.row -->
	</section>
	@endsection


	@section('js')
	<script type="text/javascript">

		function newpage(id){
			$('#form'+id).submit(function(){
				window.open("{{ url('home') }}");
			})
		}

    // sesuiakan dengan id yang ada pada form
    $('#popcreate').validate({
    	rules: {
            // id_kk sesuaikan dengan name yang ada pada input
            pop : {
            	required:true
            },
            
        },
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{
            // id_kk sesuaikan dengan name pada input
            pop : {
            	required: "Nama POP tidak boleh kosong"
            },
            
        },

        // yang dibawah gak perlu diedit
        errorElement: 'span',
        errorPlacement: function (error, element) {
        	error.addClass('invalid-feedback');
        	element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
        	$(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
        	$(element).removeClass('is-invalid');
        }
    });
</script>
<!-- DataTables -->
<script src="adminlte/plugins/datatables/jquery.dataTables.js"></script>
<script src="adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
	$(function () {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
		});
	});
</script>
@endsection