@extends('../layouts/master')

@section('css')
  <link rel="stylesheet" href="{{  asset('datepicker/css/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Surat Pengantar Pindah</h1>
    </div>
 
</div>
</div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <form action="{{ url('SuratPengantarPindah/'.$id_noSurat) }}" target="_blank" id="suratpindahcreate" method="post" role="form">
            @csrf
            <div class="card-body">    
           <div class="form-group">
                  <label>Masukkan NIK:</label>
                  <select name="nik" id="nik" class="form-control select2" style="width: 100%;">
                    <option value="">Pilih NIK</option>
                    @foreach ($penduduk as $data)
                    <option value="{{$data->nik}}">{{$data->nik}}|{{$data->nama}}</option>
                   @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Kepala Keluarga:</label>
                  <!-- //untuk menampilkan nama ortu -->
                  <input class="form-control" type="text" id="ortu" disabled="">
                  <!-- untuk menyimpan nik ortu type hidden jadi gak tampil di form -->
                  <input type="hidden" name="nik2" id="nik2">
                  </select>
                </div>
              <div class="form-group">
                <label>Alamat Tujuan Pindah:</label>
                <input type="text" class="form-control" name="alamattuj">
              </div>
              <div class="form-group">
                <label>Jumlah Keluarga yang Pindah:</label>
                <input type="text" class="form-control" name="jumkelpin">
              </div>
              <div class="form-group">
                <label>Anggota Keluarga yang Pindah:</label>
                <input type="text" class="form-control" name="anggota">
              </div>
              <input type="hidden" id="kop" class="form-control" name="kop">

            </div>
            <div class="modal-footer center-content-between">
              <button type="button" id="" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" id="tanpaKop" class="btn btn-primary">Print tanpa Kop</button>
              <button type="submit" id="denganKop" class="btn btn-primary">Print dengan Kop</button>
            </div>
          </form>
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
<script src="{{ asset('adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>



<script type="text/javascript">
    $(document).ready(function () {
        $('#haritanggal').datepicker({
            format: 'dd/mm/yyyy',
            autoclose:true
        });
    });
</script>

<script type="text/javascript">
    $('.select2').select2()
    //untuk mengisi value pada input kop..
    // kalau di kelik tombol tanpa kop maka value pada input kop akan berisi tanpaKop
    $('#tanpaKop').click(function(){
        // melakukan pengisian value pada input kop
        $('#kop').val('tanpaKop');
    });

    // kalau di kelik tombol dengan kop maka value pada input kop akan berisi denganKop
    $('#denganKop').click(function(){
        // melakukan pengisian value pada input kop
        $('#kop').val('denganKop');
    });
    
    $('#nik').change(function(){
        $.ajax({
          url:"{{ url('/SuratPengantarPindah/ortu') }}/"+$('#nik').val(),
          method:"GET",
          success: function(data){
            if(data.length == 1){
              $("#ortu").val(data[0].nama)
              $("#nik2").val(data[0].nik)
            } else {
              $("#ortu").val("data orang tua belum terdata")
              
            }
          }
        })
    })


    // sesuiakan dengan id yang ada pada form
    $('#suratpindahcreate').validate({
        rules: {
            // id_kk sesuaikan dengan name yang ada pada input
            nik : {
                required:true
            },
            nik2 : {
                required:true
            },
            alamattuj : {
                required:true
            },
            jumkelpin : {
                required:true
            },
            anggota : {
                required:true
            },
          
        },
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{
            // id_kk sesuaikan dengan name pada input
            nik : {
                required: "NIK tidak boleh kosong"
            },
            nik2 : {
                required: "Kepala Keluarga tidak boleh kosong"
            },
            alamattuj : {
                required: "Alamat Tujuan tidak boleh kosong"
            },
            jumkelpin : {
                required: "Jumlah Keluarga Pindah tidak boleh kosong"
            },
            anggota : {
                required: "Anggota tidak boleh kosong"
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
@endsection