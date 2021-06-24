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
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
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
         @include('sidebar')
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
                           <li class="breadcrumb-item active">Create-Controller</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <section class="content">
               <div class="container-fluid">
                  @if(session('pesan'))
                  <div class="alert alert-success alert-dismissable">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h4><i class="icon fa fa-check"></i>Success</h4>
                     {{session('pesan')}}.
                  </div>
                  @endif
                  <div class="col-md-12">
                     <!-- general form elements -->
                     <div class="card card-primary">
                        <div class="card-header">
                           <h3 class="card-title">Create Controller</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.create.controller') }}" method="POST" enctype="multipart/form-data" >
                           @csrf
                           <div class="card-body">
                              <div class="form-group row">
                                 <label for="url_video" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                                 <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus />
                                    @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="string" class="col-md-4 col-form-label text-md-right">{{ __('string') }}</label>
                                 <div class="col-md-6">
                                    <input id="string" type="text" class="form-control" name="string" value="{{ old('string') }}"  />
                                    @if ($errors->has('string'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('string') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="integer" class="col-md-4 col-form-label text-md-right">{{ __('integer') }}</label>
                                 <div class="col-md-6">
                                    <input id="integer" type="text" class="form-control" name="integer" value="{{ old('integer') }}"  />
                                    @if ($errors->has('integer'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('integer') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="boolean" class="col-md-4 col-form-label text-md-right">{{ __('boolean') }}</label>
                                 <div class="col-md-6 was-validated">
                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                       <input type="radio" id="customRadioInline3" name="boolean" class="custom-control-input" value="1" >
                                       <label class="custom-control-label" for="customRadioInline3">true</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input type="radio" id="customRadioInline4" name="boolean" class="custom-control-input" value="0">
                                       <label class="custom-control-label" for="customRadioInline4">false</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>
                                 <div class="col-md-4">
                                    <div class="input-group date">
                                       <div class="input-group-addon">
                                          <span class="glyphicon glyphicon-th"></span>
                                       </div>
                                       <input placeholder="masukkan tanggal Lahir" type="text" class="form-control datepicker" name="date"   />
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-body -->
                           <div class="card-footer">
                              <!-- /.card-body -->
                              <div class="text-center">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- /.card -->
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
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
         $(function(){
         $(".datepicker").datepicker({
             format: 'yyyy-mm-dd',
             autoclose: true,
             todayHighlight: true,
         });
         });
      </script>
   </body>
</html>
