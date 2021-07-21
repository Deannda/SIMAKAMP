@extends('../layouts/master')
@section('css')
<link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endsection


@section('content')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Kabupaten</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active">Kabupaten</li>
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
					<button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i> Kabupaten</button>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example1" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th><center>No</center></th>
								<th><center>Nama Kabupaten</center></th>
								<th><center>Logo Kabupaten</center></th>
								<th><center>Status</center></th>
								<th><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
							@foreach($kabupaten as $key => $datas)
							<tr>
								<td> <center>{{ ++$key }}</center></td>
								<td><center>{{ $datas->nama_kabupaten }}</center></td>
								<td><center><img src="{{ url('storage/logo_kabupaten/'. $datas->logo_kabupaten) }}" height="50" width="50"></center></td>
								<td><center>{{ $datas->status }}</center></td>
								<td><center>
									
									<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $datas->id_kabupaten }}">
										<i class="fas fa-edit"></i>
									</button>
									<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $datas->id_kabupaten }}">
										<i class="fas fa-trash-alt"></i>
									</button>
								</center>
							</td>
						</tr>
						<div class="modal fade" id="edit{{ $datas->id_kabupaten }}">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Edit Data Kabupaten</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form action="{{ url('kabupaten/edit/'.$datas->id_kabupaten) }}" method="post" role="form" enctype="multipart/form-data">
										@csrf
										<div class="card-body">
											<div class="form-group">
												<label>Nama Kabupaten</label>
												<input type="text" class="form-control" name="nama_kabupaten" value="{{ $datas->nama_kabupaten }}" required="">
											</div>
											<div class="form-group">
												<label>Status</label>
												<select name="status" class="form-control select2" style="width: 100%;">
													<!-- <option   value="{{ $datas->status }}" required=""></option> -->
													<option> Kampung </option>
													<option> Desa </option>

												</select>
											</div>    
                             <!--  <div class="form-group">
                              <label>Status</label>
                              <input type="text" class="form-control" name="status" value="{{ $datas->status }}" required="">
                          </div>     -->
                          <input type="hidden" name="logo1" value="{{ $datas->logo_kabupaten }}">
                          <div class="form-group">
                          	<label for="exampleInputFile">Logo Kabupaten</label><br>
                          	<input type="file" name="logo_kabupaten" >
                          </div>   
                      </div>
                      <div class="modal-footer justify-content-between">
                      	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                      	<button type="submit" class="btn btn-primary">Edit</button>
                      </div>
                  </form>

              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="hapus{{ $datas->id_kabupaten }}">
      	<div class="modal-dialog">
      		<div class="modal-content bg-danger">
      			<div class="modal-header">
      				<h4 class="modal-title">Hapus Data Kabupaten</h4>
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">&times;</span>
      				</button>
      			</div>
      			<div class="modal-body">
      				<p> Apakah anda yakin ingin menghapus Kabupaten <b>{{ $datas->nama_kabupaten }}</b>? </p>
      			</div>
      			<div class="modal-footer justify-content-between">
      				<button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
      				<a href="{{ url('kabupaten/hapus/'.$datas->id_kabupaten) }}" type="button" class="btn btn-outline-light">Hapus</a>
      			</div>
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
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data Kabupaten</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('kabupaten/create') }}" id="kabupatencreate" method="post" role="form" enctype="multipart/form-data">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<label>Nama Kabupaten</label>
						<input type="text" class="form-control" name="nama_kabupaten">
					</div>
					<div class="form-group">
						<label>Status</label>
						<select name="status" class="form-control select2" style="width: 100%;">
							<!-- <option   value="{{ $datas->status }}" required=""></option> -->
							<option> Kampung </option>
							<option> Desa </option>

						</select>
					</div>    
					<!-- <div class="form-group">
						<label>Status</label>
						<input type="text" class="form-control" name="status">
					</div>     -->
					<div class="form-group">
						<label for="exampleInputFile">Logo Kabupaten</label><br>
						<input type="file" name="logo_kabupaten" >
					</div>   
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>

		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
@endsection


@section('js')
<!-- DataTables -->
<script type="text/javascript">

    // sesuiakan dengan id yang ada pada form
    $('#kabupatencreate').validate({
    	rules: {
            // id_kk sesuaikan dengan name yang ada pada input
            nama_kabupaten : {
            	required:true
            },
            logo_kabupaten : {
            	required: true

            },
            
        },
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{
            // id_kk sesuaikan dengan name pada input
            nama_kabupaten : {
            	required: "kabupaten tidak boleh kosong"
            },
            logo_kabupaten: {
            	required: "logo kabupaten tidak boleh kosong"

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