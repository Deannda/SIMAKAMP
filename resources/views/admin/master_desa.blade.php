@extends('../layouts/master')
@section('css')
  <link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css')}}">

@endsection


@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kampung</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Kampung</li>
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
              <button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i> Kampung</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kecamatan</th>
                  <th>Kabupaten</th>
                  <th>Kampung</th>
                  <th>Alamat</th>
                  <th>Penghulu</th>
                  <th>NIP Penghulu</th>
                  <th>Kerani Kampung</th>
                  <th>Kode Pos</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($desa as $key => $datas)
                  <tr>
                    <td> {{ ++$key }}</td>
                    <td>{{ $datas->kecamatan[0]->nama_kecamatan }}</td>
                    <td>{{ $datas->kabupaten[0]->nama_kabupaten}}</td>
                    <td>{{ $datas->nama_desa }}</td>
                    <td>{{ $datas->alamat_desa }}</td>
                    <td>{{ $datas->kepala_desa }}</td>
                    <td>{{ $datas->nip_kepala_desa }}</td>
                    <td>{{ $datas->kerani_desa }}</td>
                    <td>{{ $datas->kode_pos }}</td>
                    <td>
                      
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $datas->id_desa }}">
                      <i class="fas fa-edit"></i>
                      </button>
                       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $datas->id_desa }}">
                      <i class="fas fa-trash-alt"></i>
                      </button>
                    </td>
                  </tr>
                  <div class="modal fade" id="edit{{ $datas->id_desa }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data Kampung</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ url('desa/edit/'.$datas->id_desa) }}" method="post" role="form" >
                          @csrf
                          <div class="card-body">
                          <div class="form-group">
                              <label>Pilih Kabupaten:</label>
                              <select name="id_kabupaten" class="form-control select2" style="width: 100%;">
                                  <option value="{{$datas->kabupaten[0]->id_kabupaten}}"> {{$datas->kabupaten[0]->nama_kabupaten}}</option>
                                    @foreach ($kabupaten as $data)
                                  <option  value="{{$data->id_kabupaten}}">{{$data->nama_kabupaten}} </option>
                                    @endforeach
                                </select>
                            </div>
                         <div class="form-group">
                              <label>Pilih Kecamatan:</label>
                              <select name="id_kecamatan" class="form-control select2" style="width: 100%;">
                                  <option value="{{$datas->kecamatan[0]->id_kecamatan}}"> {{$datas->kecamatan[0]->nama_kecamatan}}</option>
                                    @foreach ($kecamatan as $data)
                                  <option  value="{{$data->id_kecamatan}}">{{$data->nama_kecamatan}} </option>
                                    @endforeach
                                </select>
                            </div>
                          <div class="form-group">
                              <label>Nama Kampung</label>
                              <input type="text" class="form-control" name="nama_desa" value="{{ $datas->nama_desa }}" required="">
                            </div> 
                          <div class="form-group">
                              <label>Alamat Kampung</label>
                              <input type="text" class="form-control" name="alamat_desa" value="{{ $datas->alamat_desa }}" required="">
                            </div>
                         <!--  <div class="form-group">
                              <label>Penghulu</label>
                              <input type="text" class="form-control" name="kepala_desa" value="{{ $datas->kepala_desa }}" required="">
                          </div>
                              <div class="form-group">
                              <label>NIP Penghulu</label>
                              <input type="text" class="form-control" name="nip_kepala_desa" value="{{ $datas->nip_kepala_desa }}" required="">
                            </div>
                               <div class="form-group">
                              <label>Kerani Kampung</label>
                              <input type="text" class="form-control" name="kerani_desa" value="{{ $datas->kerani_desa }}" required="">
                            </div>  -->
                              <div class="form-group">
                              <label>Kode Pos</label>
                              <input type="text" class="form-control" name="kode_pos" value="{{ $datas->kode_pos }}" required="">
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

                   <div class="modal fade" id="hapus{{ $datas->id_desa }}">
                    <div class="modal-dialog">
                      <div class="modal-content bg-danger">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus Data Kampung</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p> Apakah anda yakin ingin menghapus Kampung <b>{{ $datas->nama_desa }}</b>? </p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                          <a href="{{ url('desa/hapus/'.$datas->id_desa) }}" type="button" class="btn btn-outline-light">Hapus</a>
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
              <h4 class="modal-title">Tambah Data Kampung</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('desa/create') }}" method="post" role="form" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Pilih Kabupaten:</label>

                  <select name="id_kabupaten" class="form-control select2" style="width: 100%;">
                    <option  >Pilih Kabupaten </option>
                    @foreach ($kabupaten as $data)
                    <option  value="{{$data->id_kabupaten}}">{{$data->nama_kabupaten}} </option>
                    @endforeach
                    </select>
                </div>
                 <div class="form-group">
                  <label>Pilih Kecamatan:</label>

                  <select name="id_kecamatan" class="form-control select2" style="width: 100%;">
                    <option  >Pilih Kecamatan </option>
                    @foreach ($kecamatan as $data)
                    <option  value="{{$data->id_kecamatan}}">{{$data->nama_kecamatan}} </option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label>Nama Kampung</label>
                  <input type="text" class="form-control" name="nama_desa">
                </div>   
                 <div class="form-group">
                  <label>Alamat Kampung</label>
                  <input type="text" class="form-control" name="alamat_desa">
                </div> 
                 <div class="form-group">
                  <label>Penghulu</label>
                  <input type="text" class="form-control" name="kepala_desa">
                </div>  
                 <div class="form-group">
                  <label>NIP Penghulu</label>
                  <input type="text" class="form-control" name="nip_kepala_desa">
                </div>
                 <div class="form-group">
                  <label>Kerani Kampung</label>
                  <input type="text" class="form-control" name="kerani_desa">
                  </div>
                 <div class="form-group">
                  <label>Kode Pos</label>
                  <input type="text" class="form-control" name="kode_pos">
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
<script src="adminlte/plugins/datatables/jquery.dataTables.js"></script>
<script src="adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>

<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
 $(document).ready(function(){

    // Summernote
    $('.konten').summernote();
  })
</script>

@endsection