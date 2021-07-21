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
            <h1>List Surat</h1>
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
            <button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i>&ensp; Surat</button>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Surat</th>
                  <th>Nomor Surat</th>
                  <th >Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($nomorsurat as $key => $list_surat)
                  <tr>
                    <td> {{ ++$key }}</td>
                     <td>{{ $list_surat->jenissurat[0]->nama_surat }}</td>
                    <td>{{ $list_surat->no_surat }}</td>
                    <td>
                   
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $list_surat->id_no }}">
                      <i class="fas fa-edit"></i>
                      </button>
                         </td>
                  </tr>
                  <div class="modal fade" id="edit{{ $list_surat->id_no }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Nomor Surat</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ url('nomorsurat/edit/'.$list_surat->id_no) }}" method="post" role="form" >
                          @csrf
                          <div class="card-body">
                           <div class="form-group">
                              <label>Nomor Surat</label>
                              <input type="text" class="form-control" name="nomor_surat" value="{{ $list_surat->no_surat }}" required="">
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
              <h4 class="modal-title">Tambah Surat</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="{{ url('nomorsurat/create') }}" id="nomorsuratcreate" method="post" role="form" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
               <div class="form-group">
                  <label>Pilih Jenis Surat:</label>
                  <select name="id_jenissurat" class="form-control select2" style="width: 100%;">
                    <option  >Pilih Jenis Surat </option>
                    @if(count($jenissurat) == 0)
                    <option disabled="">Semua jenis surat sudah terdaftar </option>
                    @else
                    @foreach ($jenissurat as $datash)
                    
                    <option  value="{{$datash['id_jenissurat']}}">{{$datash['nama_surat']}} </option>
                    @endforeach
                    @endif
                    </select>
                </div>
               
                <div class="form-group">
                  <label>Nomor Surat</label>
                  <input type="text" class="form-control" name="nomor_surat">
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
