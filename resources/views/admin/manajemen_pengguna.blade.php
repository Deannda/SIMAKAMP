@extends('../layouts/master')
@section('css')
  <link rel="stylesheet" href="{{ url('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{ url('adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ url('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@endsection


@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manajemen Pengguna</h1>
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
              <button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i> Pengguna</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kampung</th>
                  <th>Kecamatan</th>
                  <th>Kabupaten</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th >No Hp</th>
                  <th width="10">E-mail</th>
                  <th >Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($pengguna as $key => $datapengguna)
                  <tr>
                    <td><center> {{ ++$key }} </center></td>
                    <td>{{ $datapengguna->desa[0]->nama_desa}}</td>
                    <td>{{ $datapengguna->kecamatan[0]->nama_kecamatan }}</td>
                    <td>{{ $datapengguna->kabupaten[0]->nama_kabupaten}}</td>
                    <td>{{ $datapengguna->username }}</td>
                    <td>{{ $datapengguna->name }}</td>
                    <td>{{ $datapengguna->alamat }}</td>
                    <td>{{ $datapengguna->no_hp }}</td>
                    <td title="{{ $datapengguna->email }}">{{ substr($datapengguna->email,0,10) }}</td>
                    <td>

                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $datapengguna->id }}">
                      <i class="fas fa-edit"></i>
                      </button>
                       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $datapengguna->id }}">
                      <i class="fas fa-trash-alt"></i>
                      </button>
                    </td>
                  </tr>
                  <div class="modal fade" id="edit{{ $datapengguna->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data Pengguna</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ url('pengguna/edit/'.$datapengguna->id) }}" method="post" role="form" >
                          @csrf
                          <div class="card-body">
                          <div class="form-group">
                              <label>Pilih Kampung:</label>
                              <select name="id_desa" class="form-control select2" style="width: 100%;">
                                  <option value="{{$datapengguna->desa[0]->id_desa}}"> {{$datapengguna->desa[0]->nama_desa}}</option>
                                    @foreach ($desa as $data)
                                  <option  value="{{$data->id_desa}}">{{$data->nama_desa}} </option>
                                    @endforeach
                                </select>
                            </div>
                         <div class="form-group">
                              <label>Pilih Kecamatan:</label>
                              <select name="id_kecamatan" class="form-control select2" style="width: 100%;">
                                  <option value="{{$datapengguna->kecamatan[0]->id_kecamatan}}"> {{$datapengguna->kecamatan[0]->nama_kecamatan}}</option>
                                    @foreach ($kecamatan as $data)
                                  <option  value="{{$data->id_kecamatan}}">{{$data->nama_kecamatan}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                              <label>Pilih Kabupaten:</label>
                              <select name="id_kabupaten" class="form-control select2" style="width: 100%;">
                                  <option value="{{$datapengguna->kabupaten[0]->id_kabupaten}}"> {{$datapengguna->kabupaten[0]->nama_kabupaten}}</option>
                                    @foreach ($kabupaten as $data)
                                  <option  value="{{$data->id_kabupaten}}">{{$data->nama_kabupaten}} </option>
                                    @endforeach
                                </select>
                            </div>
                          <div class="form-group">
                              <label>Username</label>
                              <input type="text" class="form-control" name="username" value="{{ $datapengguna->username }}" required="">
                            </div>
                          <div class="form-group">
                              <label> New Password</label>
                              <input type="password" class="form-control" name="password">
                            </div>
                          <div class="form-group">
                              <label>Nama</label>
                              <input type="text" class="form-control" name="nama" value="{{ $datapengguna->name }}" required="">
                          </div>
                              <div class="form-group">
                              <label>Alamat</label>
                              <input type="text" class="form-control" name="alamat" value="{{ $datapengguna->alamat }}" required="">
                            </div>
                          <div class="form-group">
                              <label>No Hp</label>
                              <input type="text" class="form-control" name="no_hp" value="{{ $datapengguna->no_hp }}" required="">
                            </div>
                          <div class="form-group">
                              <label>E-mail</label>
                              <input type="text" class="form-control" name="email" value="{{ $datapengguna->email }}" required="">
                            </div>
                          <div class="form-group">
                              <label>Keterangan</label>
                              <input type="text" class="form-control" name="keterangan" value="{{ $datapengguna->keterangan }}" required="">
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

                   <div class="modal fade" id="hapus{{ $datapengguna->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content bg-danger">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus Data Pengguna</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p> Apakah anda yakin ingin menghapus Pengguna <b>{{ $datapengguna->nama }}</b>? </p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                          <a href="{{ url('pengguna/hapus/'.$datapengguna->id) }}" type="button" class="btn btn-outline-light">Hapus</a>
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
              <h4 class="modal-title">Tambah Data Pengguna</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('pengguna/create') }}" id="penggunacreate" method="post" role="form" enctype="multipart/form-data">
              @csrf
             <div class="card-body">
                           <div class="form-group">
                              <label>Pilih Kabupaten:</label>
                              <select id="kabupaten" name="id_kabupaten" class="form-control select2" style="width: 100%;">
                                <option  value="">Pilih Kabupaten </option>
								@foreach ($kabupaten as $data)
                                  <option  value="{{$data->id_kabupaten}}">{{$data->nama_kabupaten}} </option>
                                    @endforeach
                                </select>

                            </div>
                         <div class="form-group">
                              <label>Pilih Kecamatan:</label>
                              <select id="kecamatan" name="id_kecamatan" class="form-control select2" disabled="true" style="width: 100%;">
                                
                                </select>

                            </div>
                             <div class="form-group">
                              <label>Pilih Kampung:</label>
                              <select name="id_desa" id="desa" class="form-control select2" disabled="true" style="width: 100%;">
                                    
                                </select>
                            </div>
                         
                           
                          <div class="form-group">
                              <label>Username</label>
                              <input type="text" class="form-control" name="username">
                            </div>
                          <div class="form-group">
                              <label>Password</label>
                              <input type="text" class="form-control" name="password">
                            </div>
                          <div class="form-group">
                              <label>Nama</label>
                              <input type="text" class="form-control" name="nama" >
                          </div>
                              <div class="form-group">
                              <label>Alamat</label>
                              <input type="text" class="form-control" name="alamat">
                            </div>
                          <div class="form-group">
                              <label>No Hp</label>
                              <input type="text" class="form-control" name="no_hp">
                            </div>
                          <div class="form-group">
                              <label>E-mail</label>
                              <input type="text" class="form-control" name="email">
                            </div>
                          <div class="form-group">
                              <label>Keterangan</label>
                              <select class="form-control select2"  name="keterangan">
                                <option value="desa">Admin Desa</option>
                                <option value="admin">Super Admin</option>
                              </select>
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
<script type="text/javascript">

  $(document).ready(function(){
    $('#kecamatan').change(function(){

      $.ajax({
        url:'{{ url("desaPengguna")}}/'+ $('#kabupaten').val()+'/'+ $('#kecamatan').val(),
        method : 'GET',
        beforeSend: function(){
        $('#desa').html('<option> Loading.. </option>');

        },
        success: function(data){
        	let desa = '';
        	for (var i = 0; i < data.length; i++) {
        		desa += '<option value="'+data[i].id_desa+'">'+data[i].nama_desa+'</option>'
        	}
       		
       		$('#desa').html(desa);
       		$('#desa').prop('disabled',false);


        }

      })
    })

     $('#kabupaten').change(function(){

      $.ajax({
        url:'{{ url("kecamatanPengguna")}}/'+ $('#kabupaten').val(),
        method : 'GET',
        beforeSend: function(){
        $('#kecamatan').html('<option> Loading.. </option>');

        },
        success: function(data){
        	let kecamatan = '';
        	for (var i = 0; i < data.length; i++) {
        		kecamatan += '<option value="'+data[i].id_kecamatan+'">'+data[i].nama_kecamatan+'</option>'
        	}
       		
       		$('#kecamatan').html(kecamatan);
       		$('#kecamatan').prop('disabled',false);


        }

      })
    })

  })

    // sesuiakan dengan id yang ada pada form
    $('#penggunacreate').validate({
        rules: {
            id_desa : {
                required:true
            },
            id_kecamatan : {
                required:true
            },
            id_kabupaten : {
                required:true
            },
            username : {
                required:true
            },
            nama : {
                required:true
            },
            alamat : {
                required:true
            },
            no_hp : {
                required:true
            },
            email : {
                required:true
            },
            keterangan : {
                required:true
            },
            

        },
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{

            id_desa : {
                required: "Kampung tidak boleh kosong"
            },
            id_kecamatan : {
                required: "Kecamatan tidak boleh kosong"
            },
            id_kabupaten : {
                required: "Kabupaten lahir tidak boleh kosong"
            },
            jenis_kelamin : {
                required: "Jenis kelamin tidak boleh kosong"
            },
            username : {
                required: "Username tidak boleh kosong"
            },
           
            nama : {
                required: "Nama tidak boleh kosong"
            },
            alamat : {
                required: "Alamat tidak boleh kosong"
            },
            no_hp : {
                required: "No hp tidak boleh kosong"
            },
            email : {
                required: "Email tidak boleh kosong"
            },
            keterangan : {
                required: "Keterangan tidak boleh kosong"
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
<script src="{{ url('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ url('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

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
