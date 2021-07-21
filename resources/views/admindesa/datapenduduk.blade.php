@extends('../layouts/master')
@section('css')
<link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="adminlte/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="datepicker/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection


@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Penduduk</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"></li>
        </ol>
    </div>
</div>
</div><!-- /.container-fluid -->
</section>
@if ($sukses = Session::get('sukses'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $sukses }}</strong>
        </div>
        @endif
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i> Penduduk</button>
          <button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#importExcel"><i class="fas fa-file-import">&nbsp;</i>Import Data</button>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>No</th>
                  <th>No KK</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach($penduduk as $key => $datas)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $datas->id_kk }}</td>
                <td>{{ $datas->nik }}</td>
                <td>{{ $datas->nama }}</td>
                <td>
                    </a>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $datas->nik }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $datas->nik }}">
                        <i class="fas fa-trash-alt"></i>
                    </button>

                </td>
            </tr>
            <div class="modal fade" id="hapus{{ $datas->nik }}">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-header">
                            <h4 class="modal-title">Hapus Data Penduduk</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p> Apakah anda yakin ingin menghapus Penduduk <b>{{ $datas->nama }}</b>? </p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline" data-dismiss="modal">Batal</button>
                            <a href="{{ url('penduduk/hapus/'.$datas->nik) }}" type="button" class="btn btn-outline-light">Hapus</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <div class="modal fade" id="edit{{ $datas->nik }}">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data Penduduk</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('penduduk/edit/'.$datas->nik) }}" method="post" role="form" enctype="multipart/form-data">

                            <div class="card-body">
                                <div class="row col-lg-12">
                                    <div class="col-lg-6">
                                        @csrf
                                        <div class="form-group">
                                            <label>KK</label>
                                            <input type="text" name="id_kk" value="{{ $datas->id_kk }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" name="nik" value="{{ $datas->nik }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Kampung</label>
                                            <input type="text" name="desa" value="{{ $desa }}" class="form-control" disabled="">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Kecamatan</label>
                                            <input type="text" name="kecamatan" value="{{ $kec }}" class="form-control" disabled="">

                                        </div>
                                        <div class="form-group">
                                            <label>Nama Kabupaten</label>
                                            <input type="text" name="kabupaten" value="{{ $kab }}" class="form-control" disabled="">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" value="{{ $datas->nama }}" class="form-control" name="nama">
                                        </div>

                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" class="form-control" value="{{ $datas->tempat_lahir }}" name="tempat_lahir">
                                        </div>
                                        <div class="form-group">
                                          <label>Tanggal Lahir</label>

                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                          </div>
                                          <input type="text" class="form-control" name="tanggal_lahir" id="dateedit"  value="{{ date('d/m/Y', strtotime($datas->tanggal_lahir)) }}" >
                                      </div>
                                      <!-- /.input group -->
                                  </div>
                                  <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control select2" style="width: 100%;">
                                        <option value="{{ $datas->jeniskelamin[0]->id_jeniskelamin }}">{{ $datas->jeniskelamin[0]->jeniskelamin }}</option>
                                        @foreach($jeniskelamin as $jk)
                                        <option value="{{ $jk->id_jeniskelamin }}">{{ $jk->jeniskelamin }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Golongan Darah</label>
                                    <select name="golongan_darah" class="form-control select2" style="width: 100%;">
                                        <option value="{{ $datas->golongandarah[0]->id_golongandarah }}" >{{ $datas->golongandarah[0]->golongandarah }}</option>
                                        @foreach($golongandarah as $data)
                                        <option value="{{ $data->id_golongandarah }}">{{ $data->golongandarah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select name="agama" class="form-control select2" style="width: 100%;">
                                        <option value="{{ $datas->agamaa[0]->id_agama }}" >{{ $datas->agamaa[0]->agama }}</option>
                                        @foreach($agama as $data)
                                        <option value="{{ $data->id_agama }}">{{ $data->agama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Status Perkawinan</label>
                                    <select name="status_perkawinan" class="form-control select2" style="width: 100%;">
                                        <option value="{{ $datas->statusperkawinan[0]->id_statusperkawinan }}" >{{ $datas->statusperkawinan[0]->statusperkawinan }}</option>
                                        @foreach($statusperkawinan as $data)
                                        <option value="{{ $data->id_statusperkawinan }}">{{ $data->statusperkawinan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan</label>
                                    <select name="pendidikan" class="form-control select2" style="width: 100%;">
                                        <option value="{{ $datas->pendidikans[0]->id_pendidikanterakhir}}" >{{ $datas->pendidikans[0]->pendidikanterakhir }}</option>
                                        @foreach($pendidikan as $data)
                                        <option value="{{ $data->id_pendidikanterakhir }}">{{ $data->pendidikanterakhir }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <select name="pekerjaan" class="form-control select2" style="width: 100%;">
                                        <option value="{{ $datas->pekerjaans[0]->id_pekerjaan }}" >{{ $datas->pekerjaans[0]->pekerjaan}}</option>
                                        @foreach($pekerjaan as $data)
                                        <option value="{{ $data->id_pekerjaan }}">{{ $data->pekerjaan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Hubungan Keluarga</label>
                                    <select name="hubungan_keluarga" class="form-control select2" style="width: 100%;">
                                        <option value="{{ $datas->hubungankeluarga[0]->id_hubungankeluarga }}" >{{ $datas->hubungankeluarga[0]->hubungankeluarga }}</option>
                                        @foreach($hubKeluarga as $data)
                                        <option value="{{ $data->id_hubungankeluarga }}">{{ $data->hubungankeluarga }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kewarganegaraan</label>
                                    <select name="kewarganegaraan" class="form-control select2" style="width: 100%;">
                                        <option value="{{ $datas->kewarganegaraans[0]->id_kewarganegaraan }}" >{{ $datas->kewarganegaraans[0]->kewarganegaraan }}</option>
                                        @foreach($kewarganegaraan as $data)
                                        <option value="{{ $data->id_kewarganegaraan }}">{{ $data->kewarganegaraan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ayah</label>
                                    <input type="text" class="form-control" value="{{ $datas->ayah }}" name="ayah">
                                </div>
                                <div class="form-group">
                                    <label>Ibu</label>
                                    <input type="text" class="form-control" value="{{ $datas->ibu }}" name="ibu">
                                </div>
                                <div class="form-group">
                                    <label>Keberadaan</label>
                                    <input type="text" class="form-control" value="{{ $datas->keberadaan }}" name="keberadaan">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat">{{ $datas->kk[0]->alamat }}</textarea>
                                </div>
                               <!--  <div class="form-group">
                                    <label>RT</label>
                                    <input type="text" value="{{ $datas->kk[0]->rt }}" class="form-control" name="rt">
                                </div>
                                <div class="form-group">
                                    <label>RW</label>
                                    <input type="text" value="{{ $datas->kk[0]->rw }}" class="form-control" name="rw">
                                </div> -->
                            </div>
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
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Penduduk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{ url('penduduk/create') }}" id="pendudukcreate" method="post" role="form" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
          <div class="row col-lg-12">
              <div class="col-lg-6">
                  <div class="form-group">
                      <label>KK</label>
                      <input type="number" name="id_kk" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>NIK</label>
                      <input type="number" name="nik" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Nama Kampung</label>
                      <input type="text" name="desa" value="{{ $desa }}" class="form-control" disabled="">
                  </div>
                  <div class="form-group">
                      <label>Nama Kecamatan</label>
                      <input type="text" name="kecamatan" value="{{ $kec }}" class="form-control" disabled="">

                  </div>
                  <div class="form-group">
                      <label>Nama Kabupaten</label>
                      <input type="text" name="kabupaten" value="{{ $kab }}" class="form-control" disabled="">
                  </div>
                  <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="nama">
                  </div>
                  <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir">
                  </div>
                  <div class="form-group">
                      <label>Tanggal Lahir</label>

                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" class="form-control" id="datemask" name="tanggal_lahir">
                  </div>
                  <!-- /.input group -->
              </div>
              <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select name="jenis_kelamin" class="form-control select2" style="width: 100%;">
                      <option  value="">Pilih Jenis Kelamin </option>
                      @foreach($jeniskelamin as $jk)
                      <option value="{{ $jk->id_jeniskelamin }}">{{ $jk->jeniskelamin }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label>Golongan Darah</label>
                  <select name="golongan_darah" class="form-control select2" style="width: 100%;">
                      <option  value="">Pilih Golongan Darah </option>
                      @foreach($golongandarah as $data)
                      <option value="{{ $data->id_golongandarah }}">{{ $data->golongandarah }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label>Agama</label>
                  <select name="agama" class="form-control select2" style="width: 100%;">
                      <option  value="">Pilih Agama </option>
                      @foreach($agama as $data)
                      <option value="{{ $data->id_agama }}">{{ $data->agama }}</option>
                      @endforeach
                  </select>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="form-group">
                  <label>Status Perkawinan</label>
                  <select name="status_perkawinan" class="form-control select2" style="width: 100%;">
                      <option  value="">Pilih Status Perkawinan </option>
                      @foreach($statusperkawinan as $data)
                      <option value="{{ $data->id_statusperkawinan }}">{{ $data->statusperkawinan }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label>Pendidikan</label>
                  <select name="pendidikan" class="form-control select2" style="width: 100%;">
                      <option  value="">Pilih Pendidikan </option>
                      @foreach($pendidikan as $data)
                      <option value="{{ $data->id_pendidikanterakhir }}">{{ $data->pendidikanterakhir }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label>Pekerjaan</label>
                  <select name="pekerjaan" class="form-control select2" style="width: 100%;">
                      <option  value="">Pilih Pekerjaan</option>
                      @foreach($pekerjaan as $data)
                      <option value="{{ $data->id_pekerjaan }}">{{ $data->pekerjaan }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label>Hubungan Keluarga</label>
                  <select name="hubungan_keluarga" class="form-control select2" style="width: 100%;">
                      <option  value="">Pilih Hubungan Keluarga </option>
                      @foreach($hubKeluarga as $data)
                      <option value="{{ $data->id_hubungankeluarga }}">{{ $data->hubungankeluarga }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label>Kewarganegaraan</label>
                  <select name="kewarganegaraan" class="form-control select2" style="width: 100%;">
                      <option  value="">Pilih Kewarganegaraan </option>
                      @foreach($kewarganegaraan as $data)
                      <option value="{{ $data->id_kewarganegaraan }}">{{ $data->kewarganegaraan }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label>Ayah</label>
                  <input type="text" class="form-control" name="ayah">
              </div>
              <div class="form-group">
                  <label>Ibu</label>
                  <input type="text" class="form-control" name="ibu">
              </div>
              <div class="form-group">
                  <label>Keberadaan</label>
                  <input type="text" class="form-control" name="keberadaan">
              </div>
              <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat"></textarea>
              </div>
<!--               <div class="form-group">
                  <label>RT</label>
                  <input type="text" class="form-control" name="rt">
              </div>
              <div class="form-group">
                  <label>RW</label>
                  <input type="text" class="form-control" name="rw">
              </div> -->
          </div>
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

<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" action="/penduduk/import_excel" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                        </div>
                        <div class="modal-body">
 
                            {{ csrf_field() }}
 
                            <label>Pilih file excel</label>
                            <div class="form-group">
                                <input type="file" name="file" required="required">
                            </div>
 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection



@section('js')
<!-- DataTables -->
<script type="text/javascript">

    // sesuiakan dengan id yang ada pada form
    $('#pendudukcreate').validate({
        rules: {
            // id_kk sesuaikan dengan name yang ada pada input
            id_kk : {
                digits: true,
                minlength:16,
                maxlength:16
            },
            nik: {
                digits: true,
                minlength:16,
                maxlength:16

            },
            nama : {
                required:true
            },
            tempat_lahir : {
                required:true
            },
            tanggal_lahir : {
                required:true
            },
            jenis_kelamin : {
                required:true
            },
            golongan_darah : {
                required:true
            },
            agama : {
                required:true
            },
            status_perkawinan : {
                required:true
            },
            pendidikan : {
                required:true
            },
            pekerjaan : {
                required:true
            },
            hubungan_keluarga : {
                required:true
            },
            kewarganegaraan : {
                required:true
            },
            ayah : {
                required:true
            },
            ibu : {
                required:true
            },
            keberadaan : {
                required:true
            }, 
            alamat : {
                required:true
            },
            rt : {
                required:true
            },
            rw : {
                required:true
            },        
            

        },
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{
            // id_kk sesuaikan dengan name pada input
            id_kk: {
                minlength: "mohon isi minimal 16 karakter",
                maxlength: " maksimal 16 karakter"
            },
            nik: {
                minlength: "mohon isi minimal 16 karakter",
                maxlength: " maksimal 16 karakter"
            },
            nama : {
                required: "nama tidak boleh kosong"
            },
            tempat_lahir : {
                required: "tempat lahir tidak boleh kosong"
            },
            tanggal_lahir : {
                required: "tanggal lahir tidak boleh kosong"
            },
            jenis_kelamin : {
                required: "jenis kelamin tidak boleh kosong"
            },
            golongan_darah : {
                required: "golongan darah tidak boleh kosong"
            },
            agama : {
                required: "agama tidak boleh kosong"
            },
            status_perkawinan : {
                required: "status perkawinan tidak boleh kosong"
            },
            pendidikan : {
                required: "pendidikan tidak boleh kosong"
            },
            pekerjaan : {
                required: "pekerjaan tidak boleh kosong"
            },
            hubungan_keluarga : {
                required: "hubungan keluarga tidak boleh kosong"
            },
            kewarganegaraan : {
                required: "kewarganegaraan tidak boleh kosong"
            },
            ayah : {
                required: "Ayah tidak boleh kosong"
            },
            ibu : {
                required: "Ibu tidak boleh kosong"
            },
            keberadaan : {
                required: "keberadaan tidak boleh kosong"
            },
            alamat : {
                required: "alamat tidak boleh kosong"
            },
            rt : {
                required: "RT tidak boleh kosong"
            },
            rw : {
                required: "RW tidak boleh kosong"
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
<script src="adminlte/plugins/select2/js/select2.full.min.js"></script>
<script src="adminlte/plugins/moment/moment.min.js"></script>
<script src="adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="datepicker/js/bootstrap-datepicker.min.js"></script>

<!-- date-range-picker -->
<script src="adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#datemask').datepicker({
            format: 'dd/mm/yyyy',
            autoclose:true
        });
         $('#dateedit').datepicker({
            format: 'dd/mm/yyyy',
            autoclose:true
        })
    });
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
  })

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
