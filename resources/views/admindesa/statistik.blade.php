@extends('../layouts/master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Statistik Kampung</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Home</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

@if(isset($successPassword))
<section class="content">
    <div class="container-fluid">
        <div class="card-body">
            <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                 {{ $successPassword }}
                </div>
        </div>
</div>
</section>
@endif

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-gradient-green">
                    <div class="inner">
                        <h3></h3>

                        <p>Kartu Keluarga</p>
                    </div>
                    <div class="icon bg-blue">
                        <i class="fas fa-id-card"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-gradient-green">
                    <div class="inner">
                        <h3></h3>

                        <p>Penduduk</p>
                    </div>
                    <div class="icon bg-blue">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-white"><!-- -> untuk ganti warna -->
                    <div class="card-header">
                        <h3 class="card-title">Agama</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="agama"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Jenis Kelamin</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="jenisKelamin"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Golongan Darah</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="golonganDarah"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h3 class="card-title">Kewarganegaraan</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="kewarganegaraan"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Pendidikan</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                                class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="pendidikan"
                                            style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card card-teal">
                                        <div class="card-header">
                                            <h3 class="card-title">Pekerjaan</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                                    class="fas fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="pekerjaan"
                                                style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card card-pink">
                                            <div class="card-header">
                                                <h3 class="card-title">Status Perkawinan</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                        class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                                        class="fas fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <canvas id="statusPerkawinan"
                                                    style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            @endsection

                            @section('js')
                            <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
                            <script>
                                $(function () {
                                    var color = [
                                    '#f56954', '#00a65a',
                                    '#f39c12','#21F7ED',
                                    '#00c0ef', '#3c8dbc',
                                    '#d2d6de', '#7B96EB',
                                    '#06D0FF','#8df719',
                                    '#F3D000','#A48E0A',
                                    '#0E8CFF','#F908F9',
                                    '#F90808','#8832AA',
                                    '#972b2b', '#86561e',
                                    '#549705', '#f5a7d7',
                                    ];

                                    $.ajax({
                                        url:"{{ url('datastatistik') }}",
                                        method: "GET",
                                        success: function (data) {
                                            $(".inner h3:eq(0)").html(data.kk)
                                            $(".inner h3:eq(1)").html(data.penduduk);

                    //-------------
                    //- Agama -
                    //-------------
                    var agama = $('#agama').get(0).getContext('2d')
                    var agamaChart = new Chart(agama, {
                        type: 'doughnut',
                        data: {
                            labels: data.listAgama,
                            datasets: [
                            {
                                data: data.dataAgama,
                                backgroundColor: color,
                            }
                            ]
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                        }
                    })

                    //-------------
                    //- Jenis Kelamin -
                    //-------------
                    var pieChartCanvas = $('#jenisKelamin').get(0).getContext('2d')
                    var pieChart = new Chart(pieChartCanvas, {
                        type: 'pie',
                        data: {
                            labels: data.listJenisKelamin,
                            datasets: [
                            {
                                data: data.dataJenisKelamin,
                                backgroundColor: color,
                            }
                            ]
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                        }
                    })

                    //-------------
                    //- Golongan Darah -
                    //-------------
                    var golonganDarah = $('#golonganDarah').get(0).getContext('2d')
                    var golonganDarahChart = new Chart(golonganDarah, {
                        type: 'doughnut',
                        data: {
                            labels: data.listGolonganDarah,
                            datasets: [
                            {
                                data: data.dataGolonganDarah,
                                backgroundColor: color,
                            }
                            ]
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                        }
                    })

                    //-------------
                    //- Pekerjaan -
                    //-------------
                    var pekerjaan = $('#pekerjaan').get(0).getContext('2d')
                    var pekerjaanChart = new Chart(pekerjaan, {
                        type: 'doughnut',
                        data: {
                            labels: data.listPekerjaan,
                            datasets: [
                            {
                                data: data.dataPekerjaan,
                                backgroundColor: color,
                            }
                            ]
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                        }
                    })

                    //-------------
                    //- Pendidikan -
                    //-------------
                    var pendidikan = $('#pendidikan').get(0).getContext('2d')
                    var Pendidikan = new Chart(pendidikan, {
                        type: 'pie',
                        data: {
                            labels: data.listPendidikan,
                            datasets: [
                            {
                                data: data.dataPendidikan,
                                backgroundColor: color,
                            }
                            ]
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                        }
                    })

                    //-------------
                    //- Kewarganegaraan -
                    //-------------
                    var kewarganegaraan = $('#kewarganegaraan').get(0).getContext('2d')
                    var Kewarganegaraan = new Chart(kewarganegaraan, {
                        type: 'pie',
                        data: {
                            labels: data.listKewarganegaraan,
                            datasets: [
                            {
                                data: data.dataKewarganegaraan,
                                backgroundColor: color,
                            }
                            ]
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                        }
                    })

                    //-------------
                    //- Status Perkawinan -
                    //-------------
                    var statusPerkawinan = $('#statusPerkawinan').get(0).getContext('2d')
                    var StatusPerkawinan = new Chart(statusPerkawinan, {
                        type: 'pie',
                        data: {
                            labels: data.listStatusPerkawinan,
                            datasets: [
                            {
                                data: data.dataStatusPerkawinan,
                                backgroundColor: color,
                            }
                            ]
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                        }
                    })




                }
            })



})
</script>
@endsection
