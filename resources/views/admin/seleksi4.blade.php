<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>SLP Indonesia | {{$title}}</title>

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
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-success navbar-dark">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="/" role="button"><i class="fas fa-bars"></i></a>
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
            <aside class="main-sidebar sidebar-light-primary elevation-4">
                <!-- Brand Logo -->
                <a href="/" class="brand-link">
                    <img src="{{asset('develop')}}/img/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: 0.8;" />
                    <span class="brand-text font-weight-light">AdminSLP</span>
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
                                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../widgets.html" class="nav-link active">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Seleksi
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.eliminasi') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Pendaftar Tereliminasi</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.gagaldaftar') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Pendaftar Ulang</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.challenge') }}" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tahap Challenge</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.challenge.rank') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Rank Challenge</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/coba" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Layout Options
                                        <i class="fas fa-angle-left right"></i>
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
                                <h1>Dashboard Menu</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/">Admin</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List Pendaftar Tahap Challenge</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                @if(session('berhasil'))
        <div class="alert alert-success alert-dismissable md-5">
            <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-check"></i>Penilaian</h5>
            {{session('berhasil')}}.
            
        </div>
      @endif
      @if(session('pesan'))
        <div class="alert alert-warning alert-dismissable md-5">
            <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-info"></i>Penilaian</h5>
            {{session('pesan')}}.
            
        </div>
      @endif
      @if(session('challenge'))
        <div class="alert alert-danger alert-dismissable md-5">
            <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-check"></i>Seleksi Challenge</h5>
            {{session('challenge')}}.
            
        </div>
      @endif
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Rank</th>
                                                <th>nama</th>
                                                <th>Writing</th>
                                                <th>Video</th>
                                                <th>Business</th>
                                                <th>extra</th>
                                                <th>total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($data as $check)
                                            <?php $i++ ;?>
                                                    <div class="modal fade" id="modal-penilaian">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content bg-warning">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Penilaian</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="POST" action="{{route('admin.challenge.editpenilaian')}}" enctype="multipart/form-data" class="was-validated">
                                                                    {{csrf_field()}}
                                                                    <div class="modal-body">
                                                                        
                                                                            <div class="form-group row">
                                                                                <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('id') }}</label>
                                                                                <div class="col-md-7">
                                                                                    <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id"  readonly />
                                                                                    @if ($errors->has('user_id'))
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $errors->first('user_id') }}</strong>
                                                                                    </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('nama') }}</label>
                                                                                <div class="col-md-7">
                                                                                    <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama"   readonly/>
                                                                                    @if ($errors->has('nama'))
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $errors->first('nama') }}</strong>
                                                                                    </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="writing" class="col-md-4 col-form-label text-md-right">{{ __('writing') }}</label>

                                                                                <div class="col-md-7">
                                                                                    <input
                                                                                        id="writing"
                                                                                        type="text"
                                                                                        class="form-control{{ $errors->has('writing') ? ' is-invalid' : '' }}"
                                                                                        name="writing"
                                                                                        value="{{ old('writing') }}"
                                                                                        required
                                                                                        autofocus
                                                                                    />
                                                                                    <small id="passwordHelpBlock" class="form-text text-sucess">lihat : <a type="text" href="{{$check->url_writing}}" target="_blank">challenge</a></small>
                                                                                    <small id="passwordHelpBlock" class="form-text text-sucess">nilai sebelumnya {{$check->writing}}</small>
                                                                                    
                                                                                    @if ($errors->has('writing'))
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $errors->first('writing') }}</strong>
                                                                                    </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('video') }}</label>
                                                                                <div class="col-md-7">
                                                                                    <input
                                                                                        id="video"
                                                                                        type="text"
                                                                                        class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}"
                                                                                        name="video"
                                                                                        value="{{ old('video') }}"
                                                                                        required
                                                                                        autofocus
                                                                                    />
                                                                                    <small id="passwordHelpBlock" class="form-text text-sucess">lihat : <a type="text" href="{{$check->url_video}}" target="_blank">challenge</a></small>
                                                                                    <small id="passwordHelpBlock" class="form-text text-sucess">nilai sebelumnya {{$check->video}}</small>
                                                                                    
                                                                                    @if ($errors->has('video'))
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $errors->first('video') }}</strong>
                                                                                    </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="penjualan" class="col-md-4 col-form-label text-md-right">{{ __('penjualan') }}</label>
                                                                                <div class="col-md-7">
                                                                                    <input
                                                                                        id="penjualan"
                                                                                        type="text"
                                                                                        class="form-control{{ $errors->has('penjualan') ? ' is-invalid' : '' }}"
                                                                                        name="penjualan"
                                                                                        value="{{ old('penjualan') }}"
                                                                                        required
                                                                                        autofocus
                                                                                    />
                                                                                    <small id="passwordHelpBlock" class="form-text text-sucess">lihat : <a type="text" href="{{$check->url_Business}}" target="_blank">challenge</a></small>
                                                                                    <small id="business" class="form-text text-sucess">nilai sebelumnya {{$check->penjualan}}</small>
                                                                                    
                                                                                    @if ($errors->has('business'))
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $errors->first('business') }}</strong>
                                                                                    </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="point" class="col-md-4 col-form-label text-md-right">{{ __('point') }}</label>
                                                                                <div class="col-md-7">
                                                                                    <input
                                                                                        id="point"
                                                                                        type="text"
                                                                                        class="form-control{{ $errors->has('point') ? ' is-invalid' : '' }}"
                                                                                        name="point"
                                                                                        value="{{ old('point') }}"
                                                                                        required
                                                                                        autofocus
                                                                                    />
                                                                                    
                                                                                    <small id="passwordHelpBlock" class="form-text text-sucess">nilai sebelumnya {{$check->point}}</small>
                                                                                    
                                                                                    @if ($errors->has('point'))
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $errors->first('point') }}</strong>
                                                                                    </span>
                                                                                    @endif
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
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td>{{ $check->nama }}</td>
                                                <td>
                                                {{$check->writing}}
                                                </td>
                                                <td>
                                                {{$check->video}}
                                                </td>
                                                <td>
                                                {{$check->business}}
                                                </td>
                                                <td>
                                                {{$check->point}}
                                                </td>
                                                <td>
                                                {{$check->total}}
                                                </td>                                                    
                                                <td class="project-actions text-right">
                                                    
                                                    
                                                    @if(((($check->business) != '0')&&(($check->video)!= '0')&&(($check->writing)!= '0'))== 1)
                                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-myid="{{$check->user_id}}" data-myname="{{$check->nama}}" data-target="#modal-penilaian"href="{{ route('admin.userprofile', $check->user_id) }}" target="_blank">
                                                        <i class="fas fa-info"> </i>
                                                        Ubah Penilaian
                                                    </button>
                                                    @else
                                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-myid="{{$check->user_id}}" data-myname="{{$check->nama}}" data-target="#modal-penilaian"href="{{ route('admin.userprofile', $check->user_id) }}" target="_blank">
                                                        <i class="fas fa-info"> </i>
                                                        Ubah Penilaian
                                                    </button>
                                                    @endif
                                                    @if(((($check->business) == 0)&&(($check->video)== 0)&&(($check->writing)== 0))== 0)
                                                    <a class="btn btn-success btn-sm m-2" href="{{ route('admin.challenge.gagal', $check->user_id) }}">
                                                        <i class="fas fa-check"> </i>
                                                        Lulus
                                                    </a>
                                                    <a class="btn btn-danger btn-sm m-2" href="{{ route('admin.challenge.gagal', $check->user_id) }}">
                                                        <i class="fas fa-exclamation"> </i>
                                                        Gagal
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Rank</th>
                                                <th>nama</th>
                                                <th>Writing</th>
                                                <th>Video</th>
                                                <th>Business</th>
                                                <th>extra</th>
                                                <th>total</th>
                                                <th></th>
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
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block"></div>
                <strong>Copyright &copy; 2014-2021 <a href="https://slpindonesia.com">SLP Indonesia</a>.</strong> All rights reserved.
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
            $('#modal-penilaian').on('show.bs.modal', function (event) {
                
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('myid')
                var nama = button.data('myname') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                console.log('modal kebuka');
                console.log(nama);
                console.log(id);
                var modal = $(this)
                modal.find('.modal-body #user_id').val(id)
                modal.find('.modal-body #nama').val(nama)
            });
        </script>
    </body>
</html>
