<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>SLP Indonesia | Fasil</title>
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
            <span class="brand-text font-weight-light">Fasil</span>
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
                                <a href="{{ route('fasil.pengumuman') }}" class="nav-link ">
                                <i class="nav-icon nav-icon far fa-envelope"></i>
                                <p>
                                    Pengumuman
                                </p>
                                </a>
                            </li>
                     <li class="nav-item">
                        <a href="{{ route('fasil.daily.quest') }}" class="nav-link active">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <p>
                              Daily Quest
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ route('fasil.grup') }}" class="nav-link ">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                              Grup
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ route('fasil.dashboard') }}" class="nav-link ">
                           <i class="nav-icon fas ion-person"></i>
                           <p>
                              Profile
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
                        <h1>Daily Quest</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Fasil</a></li>
                           <li class="breadcrumb-item active">Daily Quest</li>
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
                  <div class="col-md-12">
                     <!-- general form elements -->
                     <div class="card card-primary">
                        <div class="card-header">
                           <h3 class="card-title">Daily Quest hari ke - {{$hari}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                           <h3 class="mt-4 mb-4">List Peserta</h3>
                           <div class="row">
                              @foreach ($quest as $user)
                              <div class="col-md-4">
                                 <!-- Widget: user widget style 2 -->
                                 <div class="card card-widget widget-user-2">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-orange">
                                       <div class="widget-user-image">        
                                          <img class="img-circle elevation-2" src="{{asset('imgdaftar')}}/{{$user->url_foto}}" alt="User Avatar">
                                       </div>
                                       <!-- /.widget-user-image -->
                                       <h3 class="widget-user-username">{{$user->nama}}</h3>
                                       <h5 class="widget-user-desc">Grup - {{$user->grup}}</h5>
                                    </div>
                                    <div class="card-footer p-0">
                                       <ul class="nav flex-column">
                                          <li class="nav-item">
                                             @if (($user->writing_check) == 0)
                                             <a  class="nav-link">
                                             Writing                       
                                             <span class="float-right badge bg-danger">Belum Diperiksa</span>
                                             </a>
                                             @else                 
                                             <a  class="nav-link">
                                             Writing                       
                                             <span class="float-right badge bg-success">Sudah Diperiksa</span>
                                             </a>
                                             @endif
                                          </li>
                                          <li class="nav-item">
                                             @if (($user->video_check) == 0)
                                             <a  class="nav-link">
                                             Public Speaking                      
                                             <span class="float-right badge bg-danger">Belum Diperiksa</span>
                                             </a>
                                             @else
                                             <a  class="nav-link">
                                             Public Speaking                       
                                             <span class="float-right badge bg-success">Sudah Diperiksa</span>
                                             </a>
                                             @endif
                                          </li>
                                          <li class="nav-item">
                                             @if (($user->business_check) == 0)
                                             <a  class="nav-link">
                                             Business                       
                                             <span class="float-right badge bg-danger">Belum Diperiksa</span>
                                             </a>
                                             @else                   
                                             <a  class="nav-link">
                                             Business                       
                                             <span class="float-right badge bg-success">Sudah Diperiksa</span>
                                             </a>
                                             @endif
                                          </li>
                                          <li class="nav-item">
                                             @if (($user->status) == 1)
                                             <a  class="nav-link">
                                             Daily Quest Hari Ini                       
                                             <span class="float-right badge bg-success">Sudah Diperiksa</span>
                                             </a>
                                             @elseif (($user->status) == 0)                     
                                             <a  class="nav-link">
                                             Daily Quest Hari Ini                       
                                             <span class="float-right badge bg-danger">Belum Diperiksa</span>
                                             </a>
                                             @endif
                                          </li>
                                          <li class="nav-item">
                                          <a class="btn btn-primary float-left btn-sm m-2" href="{{ route('fasil.peserta.quest', Crypt::encrypt($user->user_id)) }}" >
                                                        <i class="fas fa-folder"> </i>
                                                        Quest
                                                    </a>
                                          <a class="btn btn-primary float-right btn-sm m-2" href="{{ route('fasil.peserta.profil', Crypt::encrypt($user->user_id))}}" >
                                                        <i class="fas fa-folder"> </i>
                                                        Profil
                                          </a>                                                    
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <!-- /.widget-user -->
                              </div>
                              <!-- /.col -->
                              @endforeach
                           </div>
                           <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        
                           <!-- /.card-body -->
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
