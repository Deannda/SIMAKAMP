@extends('../layouts/master')
@section('css')
<link rel="{{ asset('stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="{{ asset('stylesheet" href="adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="{{ asset('stylesheet" href="datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="{{ asset('stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
<link rel="{{ asset('stylesheet" href="adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="{{ asset('stylesheet" href="adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
<link rel="{{ asset('stylesheet" href="adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
<link rel="{{ asset('stylesheet" href="adminlte/dist/css/adminlte.min.css') }}">
<link rel="{{ asset('stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet') }}">
<link rel="stylesheet" href="adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css')}}">
@endsection

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Profil</li>
      </ol>
  </div>
</div>
</div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
	<!-- SELECT2 EXAMPLE -->
        

            <div class="card card-info">
              <div class="card-header">
              	@foreach($profil as $key => $datas)
                <h3 class="card-title">Edit Profile Desa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{ url('profil/edit/'.$datas->id_desa) }}" method="post" >
              	 @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Desa</label>
                    <div class="col-sm-10">
                     <input type="text" class="form-control" name="nama_desa" value="{{ $datas->nama_desa }}" required="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat Desa</label>
                    <div class="col-sm-10">
                       <input type="text" class="form-control" name="alamat_desa" value="{{ $datas->alamat_desa }}" required="">
                    </div>
                  </div>
                   <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Penghulu</label>
                               <div class="col-sm-10">
                              <input type="text" class="form-control" name="kepala_desa" value="{{ $datas->kepala_desa }}" required="">
                          </div></div>
                             <div class="form-group row">
                               <label class="col-sm-2 col-form-label">NIP Penghulu</label>
                               <div class="col-sm-10">
                              <input type="text" class="form-control" name="nip_kepala_desa" value="{{ $datas->nip_kepala_desa }}" required="">
                            </div></div>
                              <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Kerani Desa</label>
                               <div class="col-sm-10">
                              <input type="text" class="form-control" name="kerani_desa" value="{{ $datas->kerani_desa }}" required="">
                            </div></div> 
                             <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Kode Pos</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="kode_pos" value="{{ $datas->kode_pos }}" required="">
                            </div></div> 
                     
                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Profil Desa</label>
                              <div class="col-sm-10">
                               <textarea  class="konten form-control" name="profil"  rows="3" cols="10">{!! $datas->profil !!}</textarea>
                              <!-- <input type="text" class="form-control" name="kode_pos"  required=""> -->
                            </div></div> 
                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Sejarah Desa</label>
                               <div class="col-sm-10">
                               <textarea   class="konten form-control" name="sejarah"  rows="3" cols="10">{!! $datas->sejarah !!}</textarea>
                              <!-- <input type="text" class="form-control" name="kode_pos"  required=""> -->
                            </div></div>  
                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Visi</label>
                               <div class="col-sm-10">
                               <textarea   class="konten form-control" name="visi"  rows="3" cols="10">{!! $datas->visi !!}</textarea>
                              <!-- <input type="text" class="form-control" name="kode_pos"  required=""> -->
                            </div></div> 
                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Misi</label>
                               <div class="col-sm-10">
                               <textarea   class="konten form-control" name="misi"  rows="3" cols="10">{!! $datas->misi !!}</textarea>
                              <!-- <input type="text" class="form-control" name="kode_pos"  required=""> -->
                            </div></div>   
                            <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Batas wilayah</label>
                               <div class="col-sm-10">
                                <label for="timur"></label>Batas Timur <br>
                                <input type="text"  class="form-control" name="bts_timur" value="{{ $datas->bts_timur }}" size="15"><br>
                                 <label for="barat"></label>Batas Barat <br>
                                 <input type="text" class="form-control"  name="bts_barat" value="{{ $datas->bts_barat }}" size="15"><br>
                                  <label for="selatan"></label>Batas Selatan <br>
                                  <input type="text" class="form-control"  name="bts_selatan" value="{{$datas->bts_selatan}}"  size="15"><br>
                                   <label for="utara"></label>Batas Utara <br>
                                   <input type="text"  class="form-control" name="bts_utara" value="{{$datas->bts_utara}}"  size="15"><br>
                              <!-- <input type="text" class="form-control" name="kode_pos" value="{{ $datas->kode_pos }}" required=""> -->
                            </div></div> 
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Edit Profile</button>
                  <button type="button" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
@endforeach
          <!-- /.card-header -->
            
     


        </section>


@endsection

        <!-- /.card -->
@section('js')
        <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>

<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
 $(document).ready(function(){

    // Summernote
    $('.konten').summernote();
  })
</script>
@endsection