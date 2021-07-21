<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMAKAMP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  @yield('css')
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('adminlte/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      @can('isDesa')
      <img src="{{ url('storage/logo_kabupaten/'.Session::get('logokabupaten')) }}" height="40" width="30" alt="User Image">&nbsp
      <span>Kabupaten {{ ucfirst(Session::get('kabupaten'))}} /Kecamatan {{ ucfirst(Session::get('kecamatan'))}} /{{ ucfirst(Session::get('statuskabupaten'))}} {{ ucfirst(Session::get('desa')) }}</span>
      @endcan

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#editpassword">Edit password </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ url('logout') }}">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <div class="modal fade" id="editpassword">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Password</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ url('password/edit/'.auth()->user()->id) }}" method="post" id="editpassword" role="form" >
            @csrf
            <div class="card-body">
              <div class="form-group">
              </div>
              <div class="form-group">
                <label>Password Baru</label>
                <input type="password" class="form-control" name="password_baru" required="">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Edit</button>
            </div>
          </form>

          @if ($message = Session::get('sukses'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i>
              <strong>{{ $message }}</strong>
            </div>
            @endif

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
          <img src="/adminlte/dist/img/logos.png"
          alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3"
          style="opacity: .8">
          <span class="brand-text font-weight-light">SIMAKAMP</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              {{--          <img src="/adminlte/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">--}}
            </div>
            @can('isDesa')
            <div class="info">
              <a href="#" class="d-block">Admin {{ ucfirst(Session::get('statuskabupaten'))}}</a>
            </div>
            @endcan
            @can('isAdmin')
            <div class="info">
              <a href="#" class="d-block">Admin Center</a>
            </div>
            @endcan
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <!-- SUPER ADMIN -->
           @can('isAdmin')
           <li class="nav-item">
            <a href="{{ url('dashboard') }}" class="nav-link">
              <i class="fas fa-home nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- Datamaster -->
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt nav-icon"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('kabupaten') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kabupaten</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('kecamatan') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kecamatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('desa') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Desa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('jeniskelamin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Jenis Kelamin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('agama') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Agama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('golongandarah') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Golongan Darah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('statusperkawinan') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Status Perkawinan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('pendidikan') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pendidikan Terakhir</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('pekerjaan') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pekerjaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('hubungankeluarga') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Hubungan Keluarga</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('kewarganegaraan') }}" class="nav-link">
                  <i class="far fa-circle"></i>
                  <p>Data Kewarganegaraan</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- keseluruhan Penduduk -->
          <li class="nav-item">
            <a href="{{ url('jenissurat') }}" class="nav-link">
              <i class="fas fa-envelope-open nav-icon"></i>
              <p>Manajemen Surat</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('pengguna') }}" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>Manajemen Pengguna</p>
            </a>
          </li>

          @endcan
          <!-- ADMIN DESA -->
          @can('isDesa')
          <li class="nav-item">
            <a href="{{ url('home') }}" class="nav-link">
              <i class="fas fa-home nav-icon"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('datapenduduk') }}" class="nav-link">
             <i class="fas fa-folder nav-icon"></i>
             <p>Data Penduduk</p>
           </a>
          </li>
         <li class="nav-item">
          <a href="{{ url('nomorsurat') }}" class="nav-link">
           <i class="fas fa-folder-open nav-icon"></i>                 
           <p>Data Surat</p>
         </a>
       </li>
       <li class="nav-item">
        <a href="{{ url('surat') }}" class="nav-link">
         <i class="fas fa-envelope-open nav-icon"></i>                 
         <p>Buat Surat</p>
       </a>
     </li>
     <li class="nav-item">
      <a href="{{ url('rekapsurat') }}" class="nav-link">
        <i class="fas fa-file-archive nav-icon"></i>
        <p>Rekap Surat</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('panduanprintsurat') }}" class="nav-link">
        <i class="fas fa-download nav-icon"></i>
        <p>Donwload Panduan</p>
      </a>
    </li>
     <li class="nav-item">
      <a href="{{ url('statistik') }}" class="nav-link">
        <i class="fas fa-chart-pie nav-icon"></i>
        <p>Statistik {{ ucfirst(Session::get('statuskabupaten'))}}</p>
      </a>
    </li>
  <!--   <li class="nav-item">
      <a href="{{ url('edit_profile') }}" class="nav-link">
        <i class="fas fa-user nav-icon"></i>
        <p>Edit Profil Desa</p>
      </a>
    </li>

     <li class="nav-item">
        <a href="{{ url('jabatan') }}" class="nav-link">
            <i class="fas fa-users nav-icon"></i>
            <p> Perangkat Desa</p>
            </a>
     </li> -->

   <!--  <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt nav-icon"></i>
              <p>
                Perangkat Desa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('statistik') }}" class="nav-link">
                  <i class="fas fa-chart-pie nav-icon"></i>
                  <p>Statistik Desa</p>
                </a>
              </li>
            </ul>
          </li> -->

    @endcan
  </ul>
</nav>
</div>
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @yield('content')
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>@PSMNET</b>
  </div>
  <strong>Copyright &copy; 2020 <a href="http://citrainfomedia.net">PT. CITRA INFOMEDIA</a></strong> 
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ url('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('adminlte/dist/js/demo.js')}}"></script>

@yield('js')

</body>
</html>
