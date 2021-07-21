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
        <h1>Surat Mohon Penguji</h1>
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
					<form action="{{ url('SuratMohonPenguji/'.$id_noSurat) }}" target="_blank" id="suratpengujicreate" method="post" role="form">
						@csrf
						<div class="card-body">    
                      <div class="form-group">
                	  <label>Lampiran:</label>
                      <input type="text" class="form-control" name="lampiran">
               		  </div>
                <div class="form-group">
                <label>Tanggal Penyeleksian:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" name="hari_tanggal" id="dateseleksi">
                </div>
                  <div class="form-group">
                    <label>Waktu Pelaksanaan:</label>
                      <input type="text" class="form-control" name="waktu">
                    </div>
                         <div class="form-group">
                    <label>Tempat Pelaksanaan:</label>
                      <input type="text" class="form-control" name="tempat">
                    </div>
            <div class="form-group">
            <label>Periode:</label>
            <input type="text" class="form-control" name="periode">
            </div>
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
						<label>Keterangan:</label>
						<input type="text" class="form-control" name="keterangan1">
						</div>
                   <div class="form-group">
                  <label>Masukkan NIK</label>
                  <select name="nik2" class="form-control select2" style="width: 100%;">
                    <option value="">Pilih NIK</option>
                    @foreach ($penduduk as $data)
                    <option value="{{$data->nik}}">{{$data->nik}}|{{$data->nama}}</option>
                   @endforeach
                  </select>
                </div>
                <div class="form-group">
						<label>Keterangan:</label>
						<input type="text" class="form-control" name="keterangan2">
						</div>
                   <div class="form-group">
                  <label>Masukkan NIK</label>
                  <select name="nik3" class="form-control select2" style="width: 100%;">
                    <option value="">Pilih NIK</option>
                    @foreach ($penduduk as $data)
                    <option value="{{$data->nik}}">{{$data->nik}}|{{$data->nama}}</option>
                   @endforeach
                  </select>
                </div>
                <div class="form-group">
						<label>Keterangan:</label>
						<input type="text" class="form-control" name="keterangan3">
						</div>
                   <div class="form-group">
                  <label>Masukkan NIK</label>
                  <select name="nik4" class="form-control select2" style="width: 100%;">
                    <option value="">Pilih NIK</option>
                    @foreach ($penduduk as $data)
                    <option value="{{$data->nik}}">{{$data->nik}}|{{$data->nama}}</option>
                   @endforeach
                  </select>
                </div>
                <div class="form-group">
						<label>Keterangan:</label>
						<input type="text" class="form-control" name="keterangan4">
						</div>
                   <div class="form-group">
                  <label>Masukkan NIK</label>
                  <select name="nik5" class="form-control select2" style="width: 100%;">
                    <option value="">Pilih NIK</option>
                    @foreach ($penduduk as $data)
                    <option value="{{$data->nik}}">{{$data->nik}}|{{$data->nama}}</option>
                   @endforeach
                  </select>
                </div>
                <div class="form-group">
						<label>Keterangan:</label>
						<input type="text" class="form-control" name="keterangan5">
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
        $('#dateseleksi').datepicker({
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


    

    // sesuiakan dengan id yang ada pada form
    $('#suratpengujicreate').validate({
        rules: {
            // id_kk sesuaikan dengan name yang ada pada input
            lampiran : {
                required:true
            },
            hari_tanggal : {
                required:true
            },
            waktu : {
                required:true
            },
            tempat : {
                required:true
            },
            periode : {
                required:true
            },
            nik : {
                required:true
            },
            keterangan1 : {
                required:true
            },
            nik2 : {
                required:true
            },
            keterangan2 : {
                required:true
            },
            nik3 : {
                required:true
            },
            keterangan3 : {
                required:true
            },
            nik4 : {
                required:true
            },
            keterangan4 : {
                required:true
            },
            nik5 : {
                required:true
            },
            keterangan5 : {
                required:true
            },
        },
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{
            // id_kk sesuaikan dengan name pada input
            lampiran : {
                required: "Lampiran tidak boleh kosong"
            }, 
            hari_tanggal : {
                required: "Tanggal tidak boleh kosong"
            }, 
            waktu : {
                required: "Waktu tidak boleh kosong"
            },
            tempat : {
                required: "Tempat tidak boleh kosong"
            },
            periode : {
                required: "Periode tidak boleh kosong"
            },
            nik : {
                required: "NIK tidak boleh kosong"
            },
            keterangan1 : {
                required: "Keterangan tidak boleh kosong"
            },
            nik2 : {
                required: "NIK tidak boleh kosong"
            },
            keterangan2 : {
                required: "Keterangan tidak boleh kosong"
            },
            nik3 : {
                required: "NIK tidak boleh kosong"
            },
            keterangan3 : {
                required: "Keterangan tidak boleh kosong"
            },
            nik4 : {
                required: "NIK tidak boleh kosong"
            },
            keterangan4 : {
                required: "Keterangan tidak boleh kosong"
            },
            nik5 : {
                required: "NIK tidak boleh kosong"
            },
            keterangan5 : {
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