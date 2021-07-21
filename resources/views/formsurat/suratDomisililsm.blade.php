@extends('../layouts/master')

@section('css')
  <link rel="stylesheet" href="{{  asset('datepicker/css/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">


@endsection

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Surat Keterangan Domisili LSM</h1>
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
					<form action="{{ url('SuratKeteranganDomisiliLSM/'.$id_noSurat) }}" target="_blank" id="suratdomisililsmcreate" method="post" role="form">
						@csrf
						<div class="card-body">    
                <div class="form-group">
                <label>Nama Perusahaan:</label>
                <input type="text" class="form-control" name="nama_perusahaan">
              </div>
              <div class="form-group">
                <label>Dasar Pendirian:</label>
                <input type="text" class="form-control" name="dasar_pendirian">
              </div>
              <div class="form-group">
                <label>Nama Pimpinan:</label>
                <input type="text" class="form-control" name="nama_pimpinan">
              </div>
              <div class="form-group">
                <label>Jenis Usaha:</label>
                <input type="text" class="form-control" name="jenis_usaha">
              </div>
               <div class="form-group">
                <label>Alamat Sekretariat:</label>
                <input type="text" class="form-control" name="alamat_sekretariat">
              </div>            
               <div class="form-group">
               <label>Keterangan:</label>  
              <div class="mb-3">
                <textarea name="keterangan" class="form-control"></textarea>
              </div>
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
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
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


    

    // sesuiakan dengan id yang ada pada form
    $('#suratdomisililsmcreate').validate({
        rules: {
            // id_kk sesuaikan dengan name yang ada pada input
            nama_perusahaan : {
                required:true
            },
            dasar_pendirian : {
                required:true
            },
            nama_pimpinan : {
                required:true
            },
            jenis_usaha : {
                required:true
            },
            alamat_sekretariat : {
                required:true
            },
            keterangan : {
                required:true
            },
          
        },
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{
            // id_kk sesuaikan dengan name pada input
            nama_perusahaan : {
                required: "NIK tidak boleh kosong"
            },
            dasar_pendirian : {
                required: "Dasar Pendirian tidak boleh kosong"
            }, 
            nama_pimpinan : {
                required: "Nama Pimpinan tidak boleh kosong"
            }, 
            jenis_usaha : {
                required: "Jenis Usaha tidak boleh kosong"
            },
            alamat_sekretariat : {
                required: "Alamat Sekretariat tidak boleh kosong"
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
@endsection