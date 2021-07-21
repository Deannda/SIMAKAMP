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
        <h1>Surat Pernyataan Belum Pernah Menikah</h1>
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
					<form action="{{ url('SuratPernyataanBelumPernahMenikah/'.$id_noSurat) }}" target="_blank" id="suratbelumnikahcreate" method="post" role="form">
						@csrf
						<div class="card-body">    
              <div class="form-group">
                <label>Masukkan NIK:</label>
                <select name="nik" class="form-control select2" style="width: 100%;">
                 <option value="">Pilih NIK</option>
                 @foreach ($penduduk as $data)
                 <option value="{{$data->nik}}">{{$data->nik}}|{{$data->nama}}</option>
                 @endforeach
               </select>
             </div>
         <!--     <div class="form-group">
              <label>Ayah:</label>
              <select name="ayah" class="form-control select2" style="width: 100%;">
               <option value="">Pilih NIK</option>
               @foreach ($penduduk as $data)
               <option value="{{$data->nik}}">{{$data->nik}}|{{$data->nama}}</option>
               @endforeach
             </select>
           </div> -->
           <!-- <div class="form-group">
            <label>Ibu:</label>
            <select name="ibu" class="form-control select2" style="width: 100%;">
             <option value="">Pilih NIK</option>
             @foreach ($penduduk as $data)
             <option value="{{$data->nik}}">{{$data->nik}}|{{$data->nama}}</option>
             @endforeach
           </select>
         </div> -->
         <div class="form-group">
          <label>Nama Pasangan:</label>
          <input type="text" class="form-control" name="nama_pasangan">
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
                  <!--  <div class="form-group">
                  <label>Wali:</label>
                  <select name="wali" class="form-control select2" style="width: 100%;">
                     <option value="">Pilih NIK</option>
                    @foreach ($penduduk as $data)
                    <option value="{{$data->nik}}">{{$data->nik}}|{{$data->nama}}</option>
                   @endforeach
                  </select>
                </div> -->
               <!--  <div class="form-group">
                  <label>Hubungan Dengan Mempelai:</label>
                  <input type="text" class="form-control" name="hubungan">
                </div> -->

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
    $('#suratbelumnikahcreate').validate({
      rules: {
            // id_kk sesuaikan dengan name yang ada pada input
            nik : {
              required:true
            },
            ayah : {
              required:true
            },
            ibu : {
              required:true
            },
            saksi1 : {
              required:true
            },
            saksi2 : {
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
            ayah : {
              required: "Ayah tidak boleh kosong"
            },
            ibu : {
              required: "Ibu tidak boleh kosong"
            },
            saksi1 : {
              required: "Saksi tidak boleh kosong"
            },
            saksi2 : {
              required: "Saksi tidak boleh kosong"
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