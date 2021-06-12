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
                     <li class="nav-item">
                        <a href="../widgets.html" class="nav-link">
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
                              <a href="{{ route('admin.challenge.rank') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Rank Challenge</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{ route('admin.interview.antrian') }}" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Antrian Interview</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="../widgets.html" class="nav-link ">
                           <i class="nav-icon fas fa-columns"></i>
                           <p>
                              Fasil
                              <i class="fas fa-angle-left right"></i>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="{{ route('admin.create.fasil') }}" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Daftar Fasil</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{ route('admin.list.fasil') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>List Fasil</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="../widgets.html" class="nav-link ">
                           <i class="nav-icon fas ion-person"></i>
                           <p>
                              Peserta
                              <i class="fas fa-angle-left right"></i>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="{{ route('admin.peserta.pengelompok') }}" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Pengelompokkan</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{ route('admin.daily.quest') }}" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Daily Quest</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="../widgets.html" class="nav-link ">
                           <i class="nav-icon far fa-plus-square"></i>
                           <p>
                              Controller
                              <i class="fas fa-angle-left right"></i>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="{{ route('admin.coba') }}" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Control</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{ route('admin.controller.create') }}" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create-control</p>
                              </a>
                           </li>
                        </ul>
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
                  <div class="row">
                     <div class="col-md-3">
                        @if(!empty($Lulus))
                        <div class="alert alert-success alert-dismissable">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                           <h4><i class="icon fa fa-check"></i>Success</h4>
                           {{session('lulus')}}.
                        </div>
                        @endif @if(!empty($Gagal))
                        <div class="alert alert-danger alert-dismissable">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                           <h4><i class="icon fa fa-check"></i>Success</h4>
                           {{session('gagal')}}.
                        </div>
                        @endif
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
                                 <li class="list-group-item"><b>Instagram</b> <a class="float-right">{{$user->Fasil->instagram}}</a></li>
                              </ul>
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
         $(function () {
         /* jQueryKnob */
         
         $('.knob').knob({
         /*change : function (value) {
         //console.log("change : " + value);
         },
         release : function (value) {
         console.log("release : " + value);
         },
         cancel : function () {
         console.log("cancel : " + this.value);
         },*/
         draw: function () {
         
         // "tron" case
         if (this.$.data('skin') == 'tron') {
         
         var a   = this.angle(this.cv)  // Angle
         ,
           sa  = this.startAngle          // Previous start angle
         ,
           sat = this.startAngle         // Start angle
         ,
           ea                            // Previous end angle
         ,
           eat = sat + a                 // End angle
         ,
           r   = true
         
         this.g.lineWidth = this.lineWidth
         
         this.o.cursor
         && (sat = eat - 0.3)
         && (eat = eat + 0.3)
         
         if (this.o.displayPrevious) {
         ea = this.startAngle + this.angle(this.value)
         this.o.cursor
         && (sa = ea - 0.3)
         && (ea = ea + 0.3)
         this.g.beginPath()
         this.g.strokeStyle = this.previousColor
         this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
         this.g.stroke()
         }
         
         this.g.beginPath()
         this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
         this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
         this.g.stroke()
         
         this.g.lineWidth = 2
         this.g.beginPath()
         this.g.strokeStyle = this.o.fgColor
         this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
         this.g.stroke()
         
         return false
         }
         }
         })
         /* END JQUERY KNOB */
         
         //INITIALIZE SPARKLINE CHARTS
         var sparkline1 = new Sparkline($('#sparkline-1')[0], { width: 240, height: 70, lineColor: '#92c1dc', endColor: '#92c1dc' })
         var sparkline2 = new Sparkline($('#sparkline-2')[0], { width: 240, height: 70, lineColor: '#f56954', endColor: '#f56954' })
         var sparkline3 = new Sparkline($('#sparkline-3')[0], { width: 240, height: 70, lineColor: '#3af221', endColor: '#3af221' })
         
         sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021])
         sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921])
         sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21])
         
         })
      </script>
   </body>
</html>
