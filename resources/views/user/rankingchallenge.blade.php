<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>SLP Indonesia</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css" />
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css" />
        <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
        <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css" />
        <link href="{{asset('develop')}}/img/slp.png" rel="icon" />
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Navbar Search -->

                    <!-- Messages Dropdown Menu -->

                    <!-- Notifications Dropdown Menu -->
                    @guest @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->Biodata->nama }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a
                                class="dropdown-item"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                            >
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-light-success elevation-4">
                <!-- Brand Logo -->
                <a href="/" class="brand-link">
                    <img src="{{asset('develop')}}/img/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: 0.8;" />
                    <span class="brand-text font-weight-light">Peserta</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- SidebarSearch Form -->
                    <div class="form-inline mt-2">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                                <a href="{{ route('pendaftar.dashboard') }}" class="nav-link ">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Seleksi
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('pendaftar.seleksi1') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tahap 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('pendaftar.ranking.challenge') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tahap 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{ route('pendaftar.pengumuman') }}" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Pengumuman
                                        <span class="right badge badge-danger">New</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Profile</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/">Seleksi</a></li>
                                    <li class="breadcrumb-item active">Tahap Kedua</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                    @if(session('pesan'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i>Success</h4>
            {{session('pesan')}}.
        </div>
      @endif
                </section>
                @if (!empty($antrian))
                <!-- Main content -->
                <section class="content">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Pemberitahuan</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            Selamat! Kamu Lolos ke Tahap Selanjutnya!!

                            <br />
                            Berikut adalah Hasil Nilai dari Challenge yang sudah Kamu kerjakan. Kamu Luar Biasa!
                            <br />
                            <form>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-5 col-form-label">Nama</label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$nilai->nama}}" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Challenge Writing : </label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$nilai->writing}}" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Challenge Video : </label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$nilai->video}}" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Challenge Business : </label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$nilai->business}}" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Nomor Antrian : </label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$antrian}}" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Waktu : </label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$waktu}}" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Tempat : </label>
                                    <div class="col-sm-5">
                                    Jl. Merdeka Raya No.7, RT.1/RW.7, Abadijaya,Kec. Sukmajaya, Kota Depok,Jawa Barat 16417 
                                    (<a href="https://maps.app.goo.gl/LWU3T1yT3Xbc18uz7" target="_blank">Disini</a>)
                                    </div>
                                </div>
                            </form>
                            Oh ya, sebelum wawancara berlangsung kamu <b>DIWAJIBKAN</b> untuk mengisi link Tes Kepribadian disini <a href="https://www.16personalities.com/id" target="_blank">16personalities</a>
                            <br />
                            Untuk hasilnya, silahkan upload Screenshot bagian Conclusion/Kesimpulan dari Kepribadian kamu dan Upload disini yaa 😋
                            <br />
                            <button
                                class="btn btn-success btn-sm m-4"
                                data-toggle="modal"
                                data-myid="{{$nilai->user_id}}"
                                data-myname="{{$nilai->nama}}"
                                data-target="#modal-upload"
                                href="{{ route('pendaftar.kepribadian.pdf', $nilai->user_id) }}"
                                target="_blank"
                            >
                                <i class="fas fa-check"> </i>
                                Upload
                            </button>
                            @if (!empty($kepribadian->url_kepribadian))
                            <a class="btn btn-primary btn-sm m-4" href="{{asset('teskepribadian')}}/{{$kepribadian->url_kepribadian}}" target="_blank">check</a>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Selamat berjuang, Salam Leader, Luar Biasa!
                            <br />
                            Admin SLP, 20 Mei 2021
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                    <div class="modal fade" id="modal-upload">
                        <div class="modal-dialog">
                            <div class="modal-content bg-primary">
                                <div class="modal-header">
                                    <h4 class="modal-title">Upload Tes</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{route('pendaftar.kepribadian.pdf')}}" enctype="multipart/form-data" class="was-validated">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group row">
                                                <label for="url_kepribadian" class="col-md-4 col-form-label text-md-right">{{ __('Upload hasil tes') }}</label>
                                                <div class="col-md-7">
                                                    <input
                                                        id="url_kepribadian"
                                                        type="file"
                                                        class="form-control{{ $errors->has('url_kepribadian') ? ' is-invalid' : '' }}"
                                                        name="url_kepribadian"
                                                        value="{{ old('url_kepribadian') }}"
                                                        required
                                                        autofocus
                                                    />
                                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                                        Format harus jpg,png,jpeg,pdf dan ukuran 5 mb
                                                    </small>
                                                    @if ($errors->has('url_kepribadian'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('url_kepribadian') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-outline-light">Save</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Ranking dari Tahap Challenge</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Rank</th>
                                                <th>nama</th>
                                                <th>writing</th>
                                                <th>video</th>
                                                <th>business</th>
                                                <th>extra-point</th>
                                                <th>total nilai</th>
                                                <th>penjualan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($ranking as $rank)
                                            <?php $i++ ;?>
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td>{{ $rank->nama }}</td>
                                                <td>{{ $rank->writing }}</td>
                                                <td>{{ $rank->video }}</td>
                                                <td>{{ $rank->business }}</td>
                                                <td>{{ $rank->point }}</td>
                                                <td>{{ $rank->total }}</td>
                                                <td>{{ $rank->penjualan }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Rank</th>
                                                <th>Nama</th>
                                                <th>writing</th>
                                                <th>video</th>
                                                <th>business</th>
                                                <th>extra-point</th>
                                                <th>total nilai</th>
                                                <th>penjualan</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            @endif
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block"></div>
                <strong>Copyright &copy;2021 <a href="https://slpindonesia.com/home">SLP Indonesia</a>.</strong> All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="{{asset('template')}}/plugins/datatables/jquery.dataTables.js"></script>
        <script src="{{asset('template')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <script src="{{asset('template')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{asset('template')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="{{asset('template')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="{{asset('template')}}/plugins/jszip/jszip.min.js"></script>
        <script src="{{asset('template')}}/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="{{asset('template')}}/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('template')}}/dist/js/demo.js"></script>
        <script>
            $(function () {
                $("#example1")
                    .DataTable({
                        responsive: true,
                        lengthChange: false,
                        autoWidth: false,
                    })
                    .buttons()
                    .container()
                    .appendTo("#example1_wrapper .col-md-6:eq(0)");
                $("#example2").DataTable({
                    paging: true,
                    lengthChange: false,
                    searching: false,
                    ordering: true,
                    info: true,
                    autoWidth: false,
                    responsive: true,
                });
            });
            $("#modal-upload").on("show.bs.modal", function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data("myid");
                var nama = button.data("myname"); // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                console.log("modal kebuka");
                console.log(nama);
                console.log(id);
                var modal = $(this);
                modal.find(".modal-body #user_id").val(id);
                modal.find(".modal-body #nama").val(nama);
            });
        </script>
    </body>
</html>
