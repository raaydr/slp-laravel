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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="{{asset('develop')}}/img/slp.png" rel="icon">
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
                            {{ Auth::user()->email}}
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

            @include('user.sidebar')

            <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mohon untuk mendaftar kembali</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Form Pedaftaran SLP Indonesia') }}</div>
                <a class="text-center m-2"><b>Semua Form Harus Dilengkapi </b></a>
                <div class="card-body">

                    @if(session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('register.ulang') }}" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>

                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="user_id" value="{{ Auth::user()->id }}" readonly>

                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>

                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" readonly>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                            <div class="col-md-7">
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="customRadioInline1" name="jenis_kelamin" class="custom-control-input" value="Pria">
                                    <label class="custom-control-label" for="customRadioInline1">Pria</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="jenis_kelamin" class="custom-control-input" value="Wanita">
                                    <label class="custom-control-label" for="customRadioInline2">Wanita</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                            <div class="col-md-4">
                            <div class="input-group date">
    <div class="input-group-addon">
           <span class="glyphicon glyphicon-th"></span>
       </div>
       <input placeholder="masukkan tanggal Lahir" type="text" class="form-control datepicker" name="tanggal_lahir">
   </div>
  </div>
                                <small id="passwordHelpBlock" class="form-text text-sucess">
                                 Format: YYYY-MM-DD, contoh 1990-11-29.
                                </small>                                

                                @if ($errors->has('tanggal_lahir'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="domisili" class="col-md-4 col-form-label text-md-right">{{ __('Domisili sekarang') }}</label>
                            <div class="col-md-7">
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="customRadioInline3" name="domisili" class="custom-control-input" value="Jakarta">
                                    <label class="custom-control-label" for="customRadioInline3">Jakarta</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline4" name="domisili" class="custom-control-input" value="Bogor">
                                    <label class="custom-control-label" for="customRadioInline4">Bogor</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline5" name="domisili" class="custom-control-input" value="Depok">
                                    <label class="custom-control-label" for="customRadioInline5">Depok</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline6" name="domisili" class="custom-control-input" value="Tangerang">
                                    <label class="custom-control-label" for="customRadioInline6">Tangerang</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline7" name="domisili" class="custom-control-input" value="Bekasi">
                                    <label class="custom-control-label" for="customRadioInline7">Bekasi</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline8" name="domisili" class="custom-control-input" value="Lainnya">
                                    <label class="custom-control-label" for="customRadioInline8">Lainnya</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat_domisili" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Lengkap') }}</label>
                            <div class="col-md-6">
                                <textarea id="alamat_domisili" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat_domisili" value="{{ old('alamat_domisili') }}" rows="3"></textarea>

                                @if ($errors->has('alamat_domisili'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat_domisili') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phonenumber" class="col-md-4 col-form-label text-md-right">{{ __('No Handphone (terhubung dengan Whatsapp)') }}</label>

                            <div class="col-md-4">
                                <input id="phonenumber" type="text" class="form-control{{ $errors->has('phonenumber') ? ' is-invalid' : '' }}" name="phonenumber" value="{{ old('phonenumber') }}" required autofocus>

                                @if ($errors->has('phonenumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="aktivitas" class="col-md-4 col-form-label text-md-right">{{ __('Aktivitas atau pekerjaan saat ini') }}</label>
                            <div class="col-md-7">
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="customRadioInline9" name="aktivitas" class="custom-control-input" value="Mahasiswa">
                                    <label class="custom-control-label" for="customRadioInline9">Mahasiswa</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline10" name="aktivitas" class="custom-control-input" value="Pelajar">
                                    <label class="custom-control-label" for="customRadioInline10">Pelajar</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline11" name="aktivitas" class="custom-control-input" value="Karyawan">
                                    <label class="custom-control-label" for="customRadioInline11">Karyawan</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline12" name="aktivitas" class="custom-control-input" value="Pengusaha">
                                    <label class="custom-control-label" for="customRadioInline12">Pengusaha</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline13" name="aktivitas" class="custom-control-input" value="Yang lain">
                                    <label class="custom-control-label" for="customRadioInline13">Yang lain</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="minatprogram" class="col-md-4 col-form-label text-md-right">{{ __('Silahkan Pilih Peminatan Program Spesifikasi') }}</label>
                            <div class="col-md-7">
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="customRadioInline14" name="minatprogram" class="custom-control-input" value="Public Speaking">
                                    <label class="custom-control-label" for="customRadioInline14">Public Speaking</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline15" name="minatprogram" class="custom-control-input" value="Creative Writing">
                                    <label class="custom-control-label" for="customRadioInline15">Creative Writing</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alasanBeasiswa" class="col-md-4 col-form-label text-md-right">{{ __('Mengapa kamu ingin mendapatkan beasiswa ini? ') }}</label>
                            <div class="col-md-6">
                                <textarea id="alasanBeasiswa" type="text" class="form-control{{ $errors->has('alasanBeasiswa') ? ' is-invalid' : '' }}" name="alasanBeasiswa" value="{{ old('alasanBeasiswa') }}" rows="3"></textarea>

                                @if ($errors->has('alasanBeasiswa'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alasanBeasiswa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="five_pros" class="col-md-4 col-form-label text-md-right">{{ __('Sebutkan 5 kelebihan yang kamu miliki !') }}</label>
                            <div class="col-md-6">
                                <textarea id="five_pros" type="text" class="form-control{{ $errors->has('five_pros') ? ' is-invalid' : '' }}" name="five_pros" value="{{ old('five_pros') }}" rows="3"></textarea>

                                @if ($errors->has('five_pros'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('five_pros') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="five_cons" class="col-md-4 col-form-label text-md-right">{{ __('Sebutkan 5 kekurangan yang kamu miliki !') }}</label>
                            <div class="col-md-6">
                                <textarea id="five_cons" type="text" class="form-control{{ $errors->has('five_cons') ? ' is-invalid' : '' }}" name="five_cons" value="{{ old('five_cons') }}" rows="3"></textarea>

                                @if ($errors->has('five_cons'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('five_cons') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="url_foto" class="col-md-4 col-form-label text-md-right">{{ __('Upload Foto') }}</label>
                            <div class="col-md-7">
                                <input id="url_foto" type="file" class="form-control{{ $errors->has('url_foto') ? ' is-invalid' : '' }}" name="url_foto" value="{{ old('url_foto') }}" required autofocus>

                                @if ($errors->has('url_foto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('url_foto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        

                        
                        <!--  Error handle -->
        @if($errors->any())
        <div class="row collapse">
            <ul class="alert-box warning radius">
                @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
        @endif
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
      <!-- /.error-page -->

    </section>
    <!-- /.content -->
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
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>
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
        </script>
    </body>
</html>
