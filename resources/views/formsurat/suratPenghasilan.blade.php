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
        <h1>Surat Keterangan Penghasilan</h1>
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
					<form action="{{ url('SuratKeteranganPenghasilan/'.$id_noSurat) }}" target="_blank" id="suratpenghasilancreate" method="post" role="form">
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
                <label>Jumlah Penghasilan:</label>
                <input type="text" class="form-control" name="jumlah_penghasilan">
              </div>
              <div class="form-group">
                <label>Saksi I:</label>
                 <select name="saksi1" class="form-control select2" style="width: 100%;">
                    <option value="">Pilih NIK</option>
                    @foreach ($penduduk as $data)
                    <option value="{{$data->nik}}">{{$data->nik}}|{{$data->nama}}</option>
                   @endforeach
                  </select>
              </div>
                  <div class="form-group">
                <label>Saksi II:</label>
                 <select name="saksi2" class="form-control select2" style="width: 100%;">
                    <option value="">Pilih NIK</option>
                    @foreach ($penduduk as $data)
                    <option value="{{$data->nik}}">{{$data->nik}}|{{$data->nama}}</option>
                   @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label>Saksi III:</label>
                 <select name="saksi3" class="form-control select2" style="width: 100%;">
                    <option value="">Pilih NIK</option>
                    @foreach ($penduduk as $data)
                    <option value="{{$data->nik}}">{{$data->nik}}|{{$data->nama}}</option>
                   @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label>Sebagai:</label>
                <input type="text" class="form-control" name="sebagai3">
              </div>
              <div class="form-group">
                <label>Saksi IV:</label>
                 <select name="saksi4" class="form-control select2" style="width: 100%;">
                    <option value="">Pilih NIK</option>
                    @foreach ($penduduk as $data)
                    <option value="{{$data->nik}}">{{$data->nik}}|{{$data->nama}}</option>
                   @endforeach
                  </select>
              </div>
                  <div class="form-group">
                <label>Sebagai:</label>
                <input type="text" class="form-control" name="sebagai4">
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
    $('#suratpenghasilancreate').validate({
        rules: {
            // id_kk sesuaikan dengan name yang ada pada input
            nik : {
                required:true
            },
            jumlah_penghasilan : {
                required:true
            },
            saksi1 : {
                required:true
            },
            saksi2 : {
                required:true
            },
            saksi3 : {
                required:true
            },
            sebagai3 : {
                required:true
            },
            saksi4 : {
                required:true
            },
            sebagai4 : {
                required:true
            },
     
          
        },
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{
            // id_kk sesuaikan dengan name pada input
            nik : {
                required: "NIK tidak boleh kosong"
            },
            jumlah_penghasilan : {
                required: "Jumlah Penghasilan tidak boleh kosong"
            }, 
            saksi1 : {
                required: "Saksi I tidak boleh kosong"
            }, 
            saksi2 : {
                required: "Saksi II tidak boleh kosong"
            },
            saksi3 : {
                required: "Saksi III tidak boleh kosong"
            },
            sebagai3 : {
                required: "Sebagai tidak boleh kosong"
            },
            saksi4 : {
                required: "Saksi IV tidak boleh kosong"
            },
            sebagai4 : {
                required: "Sebagai tidak boleh kosong"
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