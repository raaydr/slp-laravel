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
         <nav class="main-header navbar navbar-expand navbar-orange navbar-dark">
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
               <!-- Sidebar Menu -->
               <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                     <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                     <li class="nav-item">
                        <a href="{{ route('peserta.pengumuman') }}" class="nav-link">
                           <i class="nav-icon nav-icon far fa-envelope"></i>
                           <p>
                              Pengumuman
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ route('peserta.grup') }}" class="nav-link ">
                           <i class="nav-icon fas fa-table"></i>
                           <p>
                              Grup
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ route('peserta.daily.quest') }}" class="nav-link ">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <p>
                              Daily Quest
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ route('peserta.record.quest') }}" class="nav-link active">
                           <i class="nav-icon fas fa-edit"></i>
                           <p>
                              Quest Record
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ route('peserta.dashboard') }}" class="nav-link ">
                           <i class="nav-icon fas ion-person"></i>
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
                        <h1>Record Quest Peserta</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Peserta</a></li>
                           <li class="breadcrumb-item active">Record-Quest-Peserta</li>
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
               <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i>Success</h4>
                  {{session('pesan')}}.
               </div>
               @endif
               <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card card-warning">
                     <div class="card-header">
                        <h3 class="card-title">Record Daily Quest</h3>
                     </div>
                     <!-- /.card-header -->
                     <!-- form start -->
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-4 col-sm-8 col-12">
                              <div class="info-box bg-gradient-info">
                                 <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                                 <div class="info-box-content">
                                    <span class="info-box-text">Writing Rate</span>
                                    <span class="info-box-number">{{$writing_challenge}}x passed challenge</span>
                                    <div class="progress">
                                       <div class="progress-bar" style="width: {{$rate_writing}}%"></div>
                                    </div>
                                    <span class="progress-description">
                                    {{$rate_writing}}% until {{$quest}} days
                                    </span>
                                 </div>
                                 <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                           </div>
                           <!-- /.col -->
                           <div class="col-md-4 col-sm-8 col-12">
                              <div class="info-box bg-gradient-success">
                                 <span class="info-box-icon"><i class="fas fa-shopping-cart"></i></span>
                                 <div class="info-box-content">
                                    <span class="info-box-text">Business Rate</span>
                                    <span class="info-box-number">{{$business_challenge}}x passed challenge</span>
                                    <div class="progress">
                                       <div class="progress-bar" style="width: {{$rate_business}}%"></div>
                                    </div>
                                    <span class="progress-description">
                                    {{$rate_business}}% until {{$quest}} days
                                    </span>
                                 </div>
                                 <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                           </div>
                           <!-- /.col -->
                           <div class="col-md-4 col-sm-8 col-12">
                              <div class="info-box bg-gradient-danger">
                                 <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                                 <div class="info-box-content">
                                    <span class="info-box-text">Video Rate</span>
                                    <span class="info-box-number">{{$video_challenge}}x passed challenge</span>
                                    <div class="progress">
                                       <div class="progress-bar" style="width: {{$rate_video}}%"></div>
                                    </div>
                                    <span class="progress-description">
                                    {{$rate_video}}% until {{$quest}} days
                                    </span>
                                 </div>
                                 <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                           </div>
                           <!-- /.col -->
                           <div class="col-md-4 col-sm-8 col-12">
                              <div class="info-box bg-gradient-orange">
                                 <span class="info-box-icon"><i class="ion ion-stats-bars"></i></span>
                                 <div class="info-box-content">
                                    <span class="info-box-text">Profit</span>
                                    <span class="info-box-number"><hasil></hasil> earn</span>
                                    <div class="progress">
                                       <div class="progress-bar" style="width: {{$rate_hasil}}%"></div>
                                    </div>
                                    <span class="progress-description">
                                    {{$rate_hasil}}% until {{$quest}} days
                                    </span>
                                 </div>
                                 <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                           </div>
                           <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                           <div class="col-12">
                              <div class="card">
                                 <div class="card-header">
                                    <h3 class="card-title">List Daily Quest</h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                       <thead>
                                          <tr>
                                             <th>Hari</th>
                                             <th>Public Speaking</th>
                                             <th>Writing</th>
                                             <th>Business</th>
                                             <th>status</th>
                                             <th></th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach ($daily_quest as $user)
                                          <tr>
                                             <td>{{ $user->day }}</td>
                                             <td>
                                                @if(($user->video_check)== 0)
                                                <p class="text-danger">tidak mengerjakan</p>
                                                @endif @if(($user->video_check)== 1)
                                                <p class="text-success">done</p>
                                                @endif
                                             </td>
                                             <td>
                                                @if(($user->writing_check)== 0)
                                                <p class="text-danger">gk ngerjain</p>
                                                @endif @if(($user->writing_check)== 1)
                                                <p class="text-success">completed</p>
                                                @endif
                                             </td>
                                             <td>
                                                @if(($user->business_check)== 0)
                                                <p class="text-danger">mission failed</p>
                                                @endif @if(($user->business_check)== 1)
                                                <p class="text-success">clear</p>
                                                @endif
                                             </td>
                                             <td>
                                                @if(($user->status)== 0)
                                                <p class="text-danger">belum diperiksa</p>
                                                @endif @if(($user->status)== 1)
                                                <p class="text-success">sudah diperiksa</p>
                                                @endif
                                             </td>
                                             <td class="project-actions text-right">
                                                <a class="btn btn-primary btn-sm" href="{{ route('peserta.detail.quest', Crypt::encrypt($user->id)) }}" target="_blank">
                                                <i class="fas fa-folder"> </i>
                                                Detail
                                                </a>
                                             </td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                       <tfoot>
                                          <tr>
                                             <th>Hari</th>
                                             <th>Public Speaking</th>
                                             <th>Writing</th>
                                             <th>Business</th>
                                             <th>status</th>
                                             <th></th>
                                          </tr>
                                       </tfoot>
                                    </table>
                                 </div>
                                 <!-- /.card-body -->
                              </div>
                              <!-- /.card -->
                           </div>
                        </div>
                        <!-- /.row -->
                     </div>
                     <!-- /.card -->
                  </div>
               </div>
               <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
         </div>
         <!-- /.content-wrapper -->
         <footer class="main-footer">
            <div class="float-right d-none d-sm-block"></div>
            <strong>Copyright &copy;2021 <a href="https://slpindonesia.com/program-beasiswa">SLP Indonesia</a>.</strong> All rights reserved.
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
         function rupiah(){
            var bilangan = {{$hasil_business}} ;
            var	number_string = bilangan.toString(),
            sisa 	= number_string.length % 3,
            rupiah 	= number_string.substr(0, sisa),
            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
               
         if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
         }
         
         // Cetak hasil
         
                     
         
         $("hasil").text("Rp "+rupiah)
         
         //the function body is the same as you have defined sue the textbox object to set the value
         }
         rupiah();
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
            var rupiah = document.getElementById("hasil");
            hasil.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, "Rp. ");
            });
            
            /* Fungsi formatRupiah */
            function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
            }
            
            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
            }
      </script>
   </body>
</html>
