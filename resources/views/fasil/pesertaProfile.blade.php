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
                        <a href="{{ route('fasil.daily.quest') }}" class="nav-link ">
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
                        <h1>Profil Peserta</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Fasil</a></li>
                           <li class="breadcrumb-item active">Profile-Peserta</li>
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
                                 <a class="btn btn-default" href="{{asset('imgdaftar')}}/{{$user->Biodata->url_foto}}" target="_blank">
                                 <img class="profile-user-img img-fluid" src="{{asset('imgdaftar')}}/{{$user->Biodata->url_foto}}" class="img-fluid" alt="Cinque Terre" />
                                 </a>
                              </div>
                              <h3 class="profile-username text-center">{{ $user->Biodata->nama }}</h3>
                              <p class="text-muted text-center">{{ $user->Biodata->aktivitas}}</p>
                              <ul class="list-group list-group-unbordered mb-3">
                                 <li class="list-group-item"><b>Domisili</b> <a class="float-right">{{$user->Biodata->domisili}}</a></li>
                                 <li class="list-group-item"><b>Jenis Kelamin</b> <a class="float-right">{{$user->Biodata->jenis_kelamin}}</a></li>
                                 <li class="list-group-item"><b>Tanggal Lahir</b> <a class="float-right">{{$user->Biodata->tanggal_lahir}}</a></li>
                              </ul>
                           </div>
                           <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- About Me Box -->
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">About Me</h3>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <strong><i class="fas fa-book mr-1"></i> No.Handphone</strong>
                              <p class="text-muted">
                                 {{$user->Biodata->phonenumber}}
                              </p>
                              <hr />
                              <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                              <p class="text-muted">{{$user->Biodata->alamat_domisili}}</p>
                              <hr />
                              <strong><i class="fas fa-pencil-alt mr-1"></i>Minat Program</strong>
                              <p class="text-muted">
                                 <span class="tag tag-danger"> {{$user->Biodata->minatprogram}}</span>
                              </p>
                              <hr />
                           </div>
                           <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col -->
                     <div class="col-md-9">
                        <div class="card">
                           <div class="card-header p-2">
                              <ul class="nav nav-pills">
                                 <li class="nav-item"><a class="nav-link active" href="#Pertama" data-toggle="tab">More about Me</a></li>
                                 <li class="nav-item"><a class="nav-link " href="#Kedua" data-toggle="tab">Quest Record</a></li>
                              </ul>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div class="tab-content">
                                 <div class="tab-pane active" id="Pertama">
                                    <!-- Post -->
                                    <div class="post">
                                       <div class="user-block">
                                          <span class="username">
                                          <a href="#">Alasan Beasiswa</a>
                                          </span>
                                       </div>
                                       <!-- /.user-block -->
                                       <p>
                                          {{$user->Biodata->alasanbeasiswa}}
                                       </p>
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                       <div class="user-block">
                                          <span class="username">
                                          <a href="#">5 Kelebihan</a>
                                          </span>
                                       </div>
                                       <!-- /.user-block -->
                                       <p>
                                          {{$user->Biodata->five_pros}}
                                       </p>
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                       <div class="user-block">
                                          <span class="username">
                                          <a href="#">5 Kekurangan</a>
                                          </span>
                                       </div>
                                       <!-- /.user-block -->
                                       <p>
                                          {{$user->Biodata->five_cons}}
                                       </p>
                                    </div>
                                    <!-- /.post -->
                                 </div>
                                 <!-- /.tab-pane -->
                                 <div class="tab-pane " id="Kedua">
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
                                                {{$rate_hasil}}% until Rp 2.000.000
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
                                                <table id="example1" class="table table-bordered table-striped table-responsive">
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
                                                      @foreach ($daily_quest as $data)
                                                      <tr>
                                                         <td>{{ $data->day }}</td>
                                                         <td>
                                                            @if(($data->video)== 'belum mengerjakan')
                                                            <a class="text-danger" type="text" >kosong</a>
                                                            @else    
                                                            <a type="text" href="{{$data->video}}" target="_blank">link video</a>
                                                            @if(($data->video_check)== 0)
                                                            <p class="text-danger">dalam pemeriksaan</p>
                                                            @endif 
                                                            @if(($data->video_check)== 1)
                                                            <p class="text-primary"><b>Quest Done</b></p>
                                                   <p class="text-success">note : {{ $data->topik_video }}</p>
                                                   @endif
                                                   @if(($data->video_check)== 2)
                                                   <p class="text-danger"><b>Quest Fail</b></p>
                                                   <p >note : {{ $data->topik_video }}</p>
                                                            @endif
                                                            @endif
                                                         </td>
                                                         <td>
                                                            @if(($data->writing)== 'belum mengerjakan')
                                                            <a class="text-danger" type="text" >kosong</a>
                                                            @else    
                                                            <a type="text" href="{{ route('fasil.download.writing', Crypt::encrypt($user->id)) }}" >file</a>
                                                            @if(($data->writing_check)== 0)
                                                            <p class="text-danger">sedang diperiksa</p>
                                                            @endif 
                                                            @if(($data->writing_check)== 1)
                                                            <p class="text-primary"><b>Quest Clear</b></p>
                                                   <p class="text-success">note : {{ $data->topik_writing }}</p>
                                                   @endif
                                                   @if(($data->writing_check)== 2)
                                                   <p class="text-danger"><b>Quest Gagal</b></p>
                                                   <p >note : {{ $data->topik_writing }}</p>
                                                            @endif
                                                            @endif
                                                         </td>
                                                         <td>
                                                            @if(($data->business)== 'belum mengerjakan')
                                                            <a class="text-danger" type="text" >kosong</a>
                                                            @else    
                                                            @if(($data->business_check)== 0)
                                                            <p class="text-danger">lagi diperiksa</p>
                                                            @endif 
                                                            @if(($data->business_check)== 1)
                                                            <p class="text-success"><b>Quest Complete</b></p>
                                                   @endif
                                                   @if(($data->business_check)== 2)
                                                   <p class="text-danger"><b>Quest Kandas</b></p>
                                                            @endif
                                                            @endif
                                                         </td>
                                                         <td>
                                                            @if(($data->status)== 0)
                                                            <p class="text-danger"><b>BELUM VALID</b></p>
                                       @endif @if(($data->status)== 1)
                                       <p class="text-success"><b>VALID</b></p>
                                                            @endif
                                                         </td>
                                                         <td class="project-actions text-right">
                                                            <a class="btn btn-primary btn-sm" href="{{ route('fasil.detail.quest', [$user->Biodata->user_id,Crypt::encrypt($data->id),])}}" target="_blank">
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
                                 </div>
                                 <!-- /.row -->
                                 <!-- /.tab-pane -->
                              </div>
                              <!-- /.tab-content -->
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
