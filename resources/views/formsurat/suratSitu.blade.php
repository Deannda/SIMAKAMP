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
        <h1>Surat Pengantar Situ</h1>
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
					<form action="{{ url('suratsitu/'.$id_noSurat) }}" target="_blank" id="suratsitucreate" method="post" role="form">
						@csrf
						<div class="card-body">    
              <div class="form-group">
                <label>Masukkan NIK</label>
                <select name="nik" class="form-control select2" style="width: 100%;">
                  <option value="">Pilih NIK</option>
                  @foreach ($penduduk as $data)
                  <option value="{{$data->nik}}">{{$data->nik}}|{{$data->nama}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Lampiran:</label>
                <input type="text" class="form-control" name="lampiran">
              </div>
              <div class="form-group">
                <label>Alamat Usaha:</label>
                <input type="text" class="form-control" name="alamat_usaha">
              </div>
              <div class="form-group">
                <label>Luas Usaha:</label>
                <input type="text" class="form-control" name="luas_usaha">
              </div>   
              <div class="form-group">
                <label>TTD:</label>
                <select name="ttd" class="form-control select2" style="width: 100%;">
                  <option value="penghulu">Penghulu</option>
                  <option value="kerani">Sekretaris</option>
                </select>
                <input type="hidden" id="kop" class="form-control" name="kop">
              </div>       
					<!-- 		<input type="hidden" id="kopsitu" class="form-control" name="kopsitu">
         -->
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


    

    //sesuiakan dengan id yang ada pada form
    $('#suratsitucreate').validate({
      rules: {
            // id_kk sesuaikan dengan name yang ada pada input
            nik : {
              required:true
            },
            lampiran : {
              required:true
            },
            kepada : {
              required:true
            },
            di : {
              required:true
            },
            alamat_usaha : {
              required:true
            },
            luas_usaha : {
              required:true
            },
            jenis_usaha : {
              required:true
            },
            merek_usaha : {
              required:true
            },
            ttd : {
              required:true
            },
          },
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{
            // id_kk sesuaikan dengan name pada input
            nik : {
              required: "NIK tidak boleh kosong"
            },
            lampiran : {
              required: "Lampiran tidak boleh kosong"
            }, 
            kepada : {
              required: "Kepada tidak boleh kosong"
            }, 
            di : {
              required: "Di tidak boleh kosong"
            },
            alamat_usaha : {
              required: "Alamat tidak boleh kosong"
            },
            luas_usaha : {
              required: "Luas Usaha tidak boleh kosong"
            },    
            jenis_usaha : {
              required: "Jenis Usaha tidak boleh kosong"
            },    
            merek_usaha : {
              required: "Merek Usaha tidak boleh kosong"
            },
            ttd : {
              required: "TTD tidak boleh kosong"
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