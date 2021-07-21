@extends('../layouts/master')
@section('css')
<link rel="{{ asset('stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="{{ asset('stylesheet" href="adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="{{ asset('stylesheet" href="datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="{{ asset('stylesheet" href="adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Permohonan Surat Penduduk</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Surat</li>
      </ol>
  </div>
</div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Permohonan Pembuatan Surat</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
          </div>
          <div class="card-body">
            <div class="row">
                
                @foreach($permohonanSurat as $data)
                <div class="col-lg-3">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $data['jmlPermohonan'] }}</h3>

                            <p>{{ $data['namaSurat'] }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-envelope nav-icon"></i>
                        </div>
                        <a href="{{ url(''.$data['link']) }}" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endforeach
             
            </div>

        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>




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
