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
                        <h1>Admin Control</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Controller</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  @if(session('berhasil'))
                  <div class="alert alert-success alert-dismissable md-5">
                     <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h5><i class="icon fa fa-info"></i>Berhasil</h5>
                     {{session('berhasil')}}.
                  </div>
                  @endif
                  <div class="row">
                     <div class="col-md-6">
                        @foreach($pendaftaran as $control)
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Pendaftaran</h3>
                           </div>
                           <div class="card-body">
                              <form method="POST" action="{{ route('admin.tutup.pendaftaran') }}" enctype="multipart/form-data">
                                 {{csrf_field()}}
                                 <div class="form-group row">
                                    <label for="pendaftaran" class="col-md-4 col-form-label text-md-right">{{ __('Pendaftaran') }}</label>
                                    <div class="col-md-7">
                                       <div class="custom-control custom-radio custom-control-inline mt-2">
                                          <input type="radio" id="customRadioInline1" name="pendaftaran" class="custom-control-input" value="1" {{ ($control->boolean== True)? "checked" : "" }}>
                                          <label class="custom-control-label" for="customRadioInline1">BUKA</label>
                                       </div>
                                       <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="customRadioInline2" name="pendaftaran" class="custom-control-input" value="0" {{ ($control->boolean== False)? "checked" : "" }}>
                                          <label class="custom-control-label" for="customRadioInline2">TUTUP</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                       <button type="submit" class="btn btn-primary">
                                       {{ __('Ubah') }}
                                       </button>
                                    </div>
                                 </div>
                              </form>
                              @endforeach
                           </div>
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col (left) -->
                     <div class="col-md-6">
                        <!-- iCheck -->
                        <div class="card card-warning">
                           <div class="card-header">
                              <h3 class="card-title">Tombol</h3>
                           </div>
                           <div class="card-body">
                              <!-- Minimal style -->
                              <div class="row">
                                 <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.all.gagal') }}"> <i class="fas fa-info"> </i>Gagal </a>
                                    <label for="radioSuccess1"> tidak mengerjakan challenge </label>
                                 </div>
                                 <div class="col-sm-6">
                                    <!-- radio -->
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.generate.antrian') }}">
                                    <i class="fas fa-check"> </i>
                                    antrian
                                    </a>
                                    <label for="radioSuccess1"> Membuat antrian kalau udah di lulusin </label>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-body -->
                           <div class="card-footer"></div>
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col (right) -->
                     <div class="col-md-6">
                        @foreach($quest as $control)
                        <div class="card card-danger">
                           <div class="card-header">
                              <h3 class="card-title">Daily Quest</h3>
                           </div>
                           <div class="card-body">
                              <form method="POST" action="{{ route('admin.gate.quest') }}" enctype="multipart/form-data">
                                 {{csrf_field()}}
                                 <div class="form-group row">
                                    <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Hari ke - ') }}</label>
                                    <div class="col-md-7">
                                       <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{$control->integer}}"  readonly />
                                       @if ($errors->has('user_id'))
                                       <span class="invalid-feedback" role="alert">
                                       <strong>{{ $errors->first('user_id') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label for="quest" class="col-md-4 col-form-label text-md-right">{{ __('Daily Quest') }}</label>
                                    <div class="col-md-7">
                                       <div class="custom-control custom-radio custom-control-inline mt-2">
                                          <input type="radio" id="customRadioInline3" name="quest" class="custom-control-input" value="1" {{ ($control->boolean== True)? "checked" : "" }}>
                                          <label class="custom-control-label" for="customRadioInline3">BUKA</label>
                                       </div>
                                       <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="customRadioInline4" name="quest" class="custom-control-input" value="0" {{ ($control->boolean== False)? "checked" : "" }}>
                                          <label class="custom-control-label" for="customRadioInline4">TUTUP</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                       <button type="submit" class="btn btn-primary">
                                       {{ __('Ubah') }}
                                       </button>
                                       <a type="button" class="btn btn-primary" href="{{ route('admin.reset.quest') }}">
                                       {{ __('Reset') }}
                                       </a>
                                    </div>
                                 </div>
                              </form>
                              @endforeach
                           </div>
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col (left) -->
                     <div class="col-md-6">
                        @foreach($seleksiPertama as $control)
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Tahap Challenge</h3>
                           </div>
                           <div class="card-body">
                              <form method="POST" action="{{ route('admin.ubah.challenge') }}" enctype="multipart/form-data">
                                 {{csrf_field()}}
                                 <div class="form-group row">
                                    <label for="seleksiPertama" class="col-md-4 col-form-label text-md-right">{{ __('Tahap Challenge') }}</label>
                                    <div class="col-md-7">
                                       <div class="custom-control custom-radio custom-control-inline mt-2">
                                          <input type="radio" id="customRadioInline5" name="seleksiPertama" class="custom-control-input" value="1" {{ ($control->boolean== True)? "checked" : "" }}>
                                          <label class="custom-control-label" for="customRadioInline5">BUKA</label>
                                       </div>
                                       <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="customRadioInline6" name="seleksiPertama" class="custom-control-input" value="0" {{ ($control->boolean== False)? "checked" : "" }}>
                                          <label class="custom-control-label" for="customRadioInline6">TUTUP</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                       <button type="submit" class="btn btn-primary">
                                       {{ __('Ubah') }}
                                       </button>
                                    </div>
                                 </div>
                              </form>
                              @endforeach
                           </div>
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col (right) -->
                     <div class="col-md-6">
                        @foreach($gen as $control)
                        <div class="card card-warning">
                           <div class="card-header">
                              <h3 class="card-title">Generasi</h3>
                           </div>
                           <div class="card-body">
                              <div class="form-group row">
                                 <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Generasi ke - ') }}</label>
                                 <div class="col-md-7">
                                    <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{$control->integer}}"  readonly />
                                    @if ($errors->has('user_id'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row mb-0">
                                 <div class="col-md-6 offset-md-4">
                                    <a type="button" class="btn btn-primary" href="{{ route('admin.pre.gen') }}">
                                    {{ __('Before') }}
                                    </a>
                                    <a type="button" class="btn btn-primary" href="{{ route('admin.next.gen') }}">
                                    {{ __('Next') }}
                                    </a>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                        </div>
                     
                     <!-- /.card -->
                     </div>
                     <!-- /.col (left) -->
                     <div class="col-md-6">
                        @foreach($interview as $control)
                        <div class="card card-success">
                           <div class="card-header">
                              <h3 class="card-title">Antrian Interview</h3>
                           </div>
                           <div class="card-body">
                              <div class="form-group row">
                                 <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Antrian ke - ') }}</label>
                                 <div class="col-md-7">
                                    <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{$control->integer}}"  readonly />
                                    @if ($errors->has('user_id'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row mb-0">
                                 <div class="col-md-6 offset-md-4">
                                    <a type="button" class="btn btn-primary" href="{{ route('admin.reset.interview') }}">
                                    {{ __('Reset') }}
                                    </a>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                        </div>
                     </div>
                     <!-- /.card -->
                  </div>
               
               </div>
            
            <!-- /.container-fluid -->
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
