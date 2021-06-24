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
         @include('admin.sidebar')
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Daftar Fasil</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Fasil</li>
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
                           <h3 class="card-title">Pendaftaran Fasil</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           @if(session()->has('success'))
                           <div class="alert alert-success">{{ session()->get('success') }}</div>
                           @endif
                           <form method="POST" action="{{ route('admin.daftar.fasil') }}" enctype="multipart/form-data" class="was-validated">
                              {{csrf_field()}}
                              <div class="form-group row">
                                 <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>
                                 <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus />
                                    <div class="valid-feedback"></div>
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
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus />
                                    <div class="valid-feedback"></div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                 <div class="col-md-5">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}"  required autofocus />
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                    Minimal 8 karakter
                                    </small>
                                    <div class="valid-feedback"></div>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                 <div class="col-md-5">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password') }}"  required autofocus />
                                    <div class="valid-feedback"></div>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                                 <div class="col-md-7">
                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                       <input type="radio" id="customRadioInline1" name="jenis_kelamin" class="custom-control-input" value="Pria" required autofocus />
                                       <label class="custom-control-label" for="customRadioInline1">Pria</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input type="radio" id="customRadioInline2" name="jenis_kelamin" class="custom-control-input" value="Wanita" required autofocus />
                                       <label class="custom-control-label" for="customRadioInline2">Wanita</label>
                                    </div>
                                 </div>
                                 @if ($errors->has('jenis_kelamin'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                 </span>
                                 @endif
                              </div>
                              <div class="form-group row">
                                 <label for="phonenumber" class="col-md-4 col-form-label text-md-right">{{ __('No Handphone (terhubung dengan Whatsapp)') }}</label>
                                 <div class="col-md-4">
                                    <input id="phonenumber" type="text" class="form-control{{ $errors->has('phonenumber') ? ' is-invalid' : '' }}" name="phonenumber" value="{{ old('phonenumber') }}" required autofocus />
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
                                 <label for="instagram" class="col-md-4 col-form-label text-md-right">{{ __('Akun Instagram') }}</label>
                                 <div class="col-md-6">
                                    <input id="instagram" type="text" class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}" name="instagram" value="{{ old('instagram') }}" required autofocus />
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                    contoh : https://www.instagram.com/slp.indonesia/
                                    </small>
                                    <div class="valid-feedback"></div>
                                    @if ($errors->has('instagram'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('instagram') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="prestasi" class="col-md-4 col-form-label text-md-right">{{ __('Prestasi') }}</label>
                                 <div class="col-md-6">
                                    <textarea id="summernote"  class="form-control{{ $errors->has('prestasi') ? ' is-invalid' : '' }}" name="prestasi" value="{{ old('prestasi') }}" height= "500" required autofocus></textarea>
                                    @if ($errors->has('prestasi'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('prestasi') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="quotes" class="col-md-4 col-form-label text-md-right">{{ __('Quotes') }}</label>
                                 <div class="col-md-6">
                                    <input id="quotes" type="text" class="form-control{{ $errors->has('quotes') ? ' is-invalid' : '' }}" name="quotes" value="{{ old('quotes') }}" required autofocus />
                                    <div class="valid-feedback"></div>
                                    @if ($errors->has('quotes'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('quotes') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="url_foto" class="col-md-4 col-form-label text-md-right">{{ __('Upload Foto') }}</label>
                                 <div class="col-md-7">
                                    <input id="url_foto" type="file" class="form-control{{ $errors->has('url_foto') ? ' is-invalid' : '' }}" name="url_foto" value="{{ old('url_foto') }}" required autofocus />
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
                              <!--  Error handle -->
                              @if($errors->any())
                              <div class="row collapse">
                                 <ul class="alert-box warning radius">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
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
      <!-- Summernote -->
      <script src="{{asset('template')}}/plugins/summernote/summernote-bs4.min.js"></script>
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
