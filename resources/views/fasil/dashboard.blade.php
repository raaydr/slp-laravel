<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>SLP Indonesia | Admin</title>

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
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('template')}}/plugins/summernote/summernote-bs4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css" />
        <link href="{{asset('develop')}}/img/slp.png" rel="icon" />
        <style>.note-group-select-from-files {
  display: none;
}
      </style>
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
                            {{ Auth::user()->Fasil->nama }}
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
                                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
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
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">User Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                    @if(session('pesan'))
                                <div class="alert alert-success alert-dismissable md-5">
                                    <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fa fa-info"></i>Berhasil</h5>
                                    {{session('pesan')}}.
                                    
                                </div>
                            @endif
                        <div class="row">
                            <div class="col-md-3">
                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <a class="btn btn-default" href="{{asset('imgfasil')}}/{{$user->Fasil->url_foto}}" target="_blank">
                                                <img class="profile-user-img img-fluid" src="{{asset('imgfasil')}}/{{$user->Fasil->url_foto}}" class="img-fluid" alt="Cinque Terre" />
                                            </a>
                                        </div>

                                        <h4 class="profile-username text-center">{{$user->Fasil->nama}}</h4>


                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item"><b>Jenis Kelamin</b> <a class="float-right">{{$user->Fasil->jenis_kelamin}}</a></li>
                                            <li class="list-group-item"><b>No.Telp</b> <a class="float-right">{{$user->Fasil->phonenumber}}</a></li>
                                            <li class="list-group-item"><b>Instagram</b> <a class="float-right" href="{{$user->Fasil->instagram}}" target="_blank">lihat</a></li>
                                        </ul>

                                        <div class="text-center">
                                            <a data-toggle="modal" data-target="#modal-foto" class="btn btn-primary btn-sm m-2">ubah foto</a>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-myid="{{$user->Fasil->user_id}}" data-myname="{{$user->Fasil->nama}}" data-phonenumber="{{$user->Fasil->phonenumber}}" data-instagram="{{$user->Fasil->instagram}}" data-quotes="{{$user->Fasil->quotes}}"  data-target="#modal-biodata" href="{{ route('fasil.edit.biodata') }}"  target="_blank">
                                                        <i class="fas fa-info"> </i>
                                                        Ubah Biodata
                                                    </button>
                                        </div>
                                        <div class="modal fade" id="modal-foto">
                                            <div class="modal-dialog">
                                                <div class="modal-content bg-primary">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ubah Foto</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="{{route('fasil.edit.foto')}}" enctype="multipart/form-data" class="was-validated">
                                                        {{csrf_field()}}
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="form-group row">
                                                                    <label for="url_foto" class="col-md-4 col-form-label text-md-right">{{ __('Upload Foto') }}</label>
                                                                    <div class="col-md-7">
                                                                        <input
                                                                            id="url_foto"
                                                                            type="file"
                                                                            class="form-control{{ $errors->has('url_foto') ? ' is-invalid' : '' }}"
                                                                            name="url_foto"
                                                                            value="{{ old('url_foto') }}"
                                                                            required
                                                                            autofocus
                                                                        />
                                                                        <small id="passwordHelpBlock" class="form-text text-sucess">
                                                                            Format harus jpg,png,jpeg dan ukuran 2 mb
                                                                        </small>
                                                                        @if ($errors->has('url_foto'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('url_foto') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-outline-light">Ubah</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                        <div class="modal fade" id="modal-biodata">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content bg-warning">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Ubah Biodata</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="POST" action="{{route('fasil.edit.biodata')}}" enctype="multipart/form-data" class="was-validated">
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
                                                                                    <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama"   required autofocus/>
                                                                                    @if ($errors->has('nama'))
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $errors->first('nama') }}</strong>
                                                                                    </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="form-group row">
                                                                                <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                                                                                <div class="col-md-7">
                                                                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                                                                        <input type="radio" id="customRadioInline1" name="jenis_kelamin" class="custom-control-input" value="Pria" {{ ($user->Fasil->jenis_kelamin== "Pria")? "checked" : "" }}>
                                                                                        <label class="custom-control-label" for="customRadioInline1">Pria</label>
                                                                                    </div>
                                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                                        <input type="radio" id="customRadioInline2" name="jenis_kelamin" class="custom-control-input" value="Wanita" {{ ($user->Fasil->jenis_kelamin== "Wanita")? "checked" : "" }}>
                                                                                        <label class="custom-control-label" for="customRadioInline2">Wanita</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="phonenumber" class="col-md-4 col-form-label text-md-right">{{ __('No.Telp') }}</label>
                                                                                <div class="col-md-7">
                                                                                    <input id="phonenumber" type="text" class="form-control{{ $errors->has('phonenumber') ? ' is-invalid' : '' }}" name="phonenumber"   required autofocus/>
                                                                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                                                                        contoh : 081234567890
                                                                                    </small>
                                                                                    @if ($errors->has('phonenumber'))
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                                                                    </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="instagram" class="col-md-4 col-form-label text-md-right">{{ __('Instagram') }}</label>
                                                                                <div class="col-md-7">
                                                                                    <input id="instagram" type="text" class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}" name="instagram"   required autofocus/>
                                                                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                                                                    contoh : https://www.instagram.com/slp.indonesia/
                                                                                    </small>
                                                                                    @if ($errors->has('instagram'))
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $errors->first('instagram') }}</strong>
                                                                                    </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="prestasi" class="col-md-4 col-form-label text-md-right">{{ __('Prestasi') }}</label>
                                                                                <div class="col-md-8">
                                                                                    <textarea id="summernote"  class="form-control{{ $errors->has('prestasi') ? ' is-invalid' : '' }}" name="prestasi" value="{{ old('prestasi') }}" weight= "500" required autofocus></textarea>

                                                                                    @if ($errors->has('prestasi'))
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $errors->first('prestasi') }}</strong>
                                                                                    </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="quotes" class="col-md-4 col-form-label text-md-right">{{ __('Quotes') }}</label>
                                                                                <div class="col-md-7">
                                                                                    <input id="quotes" type="text" class="form-control{{ $errors->has('quotes') ? ' is-invalid' : '' }}" name="quotes"   required autofocus/>
                                                                                    @if ($errors->has('quotes'))
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $errors->first('quotes') }}</strong>
                                                                                    </span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->  
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header p-2">

                                        
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Quotes</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$user->Fasil->quotes}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Prestasi</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <?php
                                                       echo $user->Fasil->prestasi ;
                                                    ?>
                                                </div>
                                                <!-- /.post -->
                                            </div>
                                            
                                       
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block"></div>
                <strong>Copyright &copy;2021 <a href="https://slpindonesia.com">SLP Indonesia</a>.</strong> All rights reserved.
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
        <!-- jQuery Knob -->
        <script src="{{asset('template')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- Sparkline -->
        <script src="{{asset('template')}}/plugins/sparklines/sparkline.js"></script>
        <!-- Summernote -->
        <script src="{{asset('template')}}/plugins/summernote/summernote-bs4.min.js"></script>
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
                        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
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
            $('#modal-biodata').on('show.bs.modal', function (event) {
                
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('myid')
                var nama = button.data('myname')
                var phonenumber = button.data('phonenumber')
                var instagram = button.data('instagram')
                var quotes = button.data('quotes')
                var modal = $(this)
                
                modal.find('.modal-body #user_id').val(id)
                modal.find('.modal-body #nama').val(nama)
                modal.find('.modal-body #phonenumber').val(phonenumber)
                modal.find('.modal-body #instagram').val(instagram)
                modal.find('.modal-body #quotes').val(quotes)
               
            });
            $(function () {
                // Summernote
                $('#summernote').summernote()

                // CodeMirror
                CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
                });
            })
        </script>
    </body>
</html>
