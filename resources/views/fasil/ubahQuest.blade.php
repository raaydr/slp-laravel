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
               @if(session('pesan'))
               <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i>Success</h4>
                  {{session('pesan')}}.
               </div>
               @endif
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Detail Quest Peserta</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Fasil</a></li>
                           <li class="breadcrumb-item active">Detail-Quest</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                
            <div class="col-md-12">
                     <!-- general form elements -->
                     <div class="card card-primary">
                        <div class="card-header">
                           <h3 class="card-title">Pemeriksaan Quest Peserta hari ke - {{$data->day}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label for="exampleInputEmail1">ID</label>
                                 <input type="text" class="form-control" name="id" value="{{$data->user_id}}" readonly>
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="exampleInputPassword1">Nama</label>
                                 <input type="text" class="form-control" name="nama" value="{{ $peserta}}"readonly>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="video" class="col-md-6 col-form-label text-md-right">{{ __('Link Video Challenge') }}</label>
                              <div class="col-md-2 col-form-label text-md-left">
                                 @if(($data->video)== 'belum mengerjakan')
                                 <a class="text-danger">kosong</a>
                                 @else 
                                 <a type="text" href="{{$data->video}}" target="_blank">Periksa</a>
                                 @endif
                                 @if(($data->video_check)== 1)
                                 <span class="float-right badge bg-success"><i class="fas fa-check"> </i></span>
                                 @else
                                 <span class="float-right badge bg-danger">X</span>
                                 @endif    
                              </div>
                              @if(($data->status)== 0)
                                 @if(($data->video_check)== 0)
                                 <div class="col-md-4 col-form-label text-md-left">
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-myid="{{$data->id}}" data-myname="{{$peserta}}" data-target="#modal-video"target="_blank">
                                    <i class="fas fa-check"> </i>
                                    checked
                                    </button>
                                 </div>
                                 @else 
                                 <div class="col-md-4 col-form-label text-md-left">
                                    <a class="btn btn-danger btn-sm" href="{{ route('fasil.batal.quest', [$data->id,0]) }}">
                                    <i class="fas fa-info"> </i>
                                    kesalahan
                                    </a>
                                 </div>
                                 @endif
                              @endif
                           </div>
                           <div class="form-group row">
                              <label for="writing" class="col-md-6 col-form-label text-md-right">{{ __('Upload Writing Challenge ') }}</label>
                              <div class="col-md-2 col-form-label text-md-left">
                                 @if(($data->writing)== 'belum mengerjakan')
                                 <a class="text-danger" type="text" >kosong</a>
                                 @else 
                                 <a type="text" href="{{ route('fasil.download.writing', Crypt::encrypt($data->id)) }}" >Periksa</a>
                                 @endif
                                 @if(($data->writing_check)== 1)
                                 <span class="float-right badge bg-success"><i class="fas fa-check"> </i></span>
                                 @else
                                 <span class="float-right badge bg-danger">X</span>
                                 @endif 
                              </div>
                              @if(($data->status)== 0)
                                 @if(($data->writing_check)== 0)
                                 <div class="col-md-4 col-form-label text-md-left">
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-myid="{{$data->id}}" data-myname="{{$peserta}}" data-target="#modal-writing"target="_blank">
                                    <i class="fas fa-check"> </i>
                                    checked
                                    </button>
                                 </div>
                                 @else 
                                 <div class="col-md-4 col-form-label text-md-left">
                                    <a class="btn btn-danger btn-sm" href="{{ route('fasil.batal.quest', [$data->id,1]) }}">
                                    <i class="fas fa-info"> </i>
                                    kesalahan
                                    </a>
                                 </div>
                                 @endif
                              @endif                                 
                           </div>
                           <div class="form-group row">
                              <label for="business" class="col-md-6 col-form-label text-md-right">{{ __('Upload Business Challenge') }}</label>
                              <div class="col-md-2 col-form-label text-md-left">
                                 @if(($data->business)== 'belum mengerjakan')
                                 <a class="text-danger" type="text" >kosong</a>
                                 @else 
                                 <a type="text" href="{{asset('docWriting')}}/{{$data->business}}" target="_blank">Periksa</a>
                                 @endif
                                 @if(($data->business_check)== 1)
                                 <span class="float-right badge bg-success"><i class="fas fa-check"> </i></span>
                                 @else
                                 <span class="float-right badge bg-danger">X</span>
                                 @endif 
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="sumber_produk" class="col-md-6 col-form-label text-md-right">{{ __('Sumber Produk') }}</label>
                              <div class="col-md-6 col-form-label ">
                                 <a type="text" >{{$data->sumber_produk}}</a>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="jenis_produk" class="col-md-6 col-form-label text-md-right">{{ __('Jenis Produk') }}</label>
                              <div class="col-md-6 col-form-label ">
                                 <a type="text" >{{$data->jenis_produk}}</a>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="keterangan" class="col-md-6 col-form-label text-md-right">{{ __('Keterangan') }}</label>
                              <div class="col-md-6 col-form-label ">
                                 <?php
                                    echo $data->keterangan ;
                                    ?>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="hasil" class="col-md-6 col-form-label text-md-right">{{ __('Profit Hari Ini') }}</label>
                              <div class="col-md-2 col-form-label text-md-left">
                                 <hasil></hasil>
                              </div>
                           </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="modal fade" id="modal-video">
                           <div class="modal-dialog">
                              <div class="modal-content bg-primary">
                                 <div class="modal-header">
                                    <h4 class="modal-title">Periksa Video Challenge</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <form method="POST" action="{{route('fasil.video.quest')}}" enctype="multipart/form-data" class="was-validated">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                       <div class="form-group row">
                                          <label for="id" class="col-md-5 col-form-label text-md-right">{{ __('id') }}</label>
                                          <div class="col-md-7">
                                             <input id="id" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id"  readonly />
                                             @if ($errors->has('user_id'))
                                             <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('user_id') }}</strong>
                                             </span>
                                             @endif
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="nama" class="col-md-5 col-form-label text-md-right">{{ __('nama') }}</label>
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
                                          <label for="video" class="col-md-5 col-form-label text-md-right">{{ __('Note Video') }}</label>
                                          <div class="col-md-7">
                                             <textarea id="video" type="text" class="form-control" name="video" value="{{ old('video') }}" required autofocus ></textarea>
                                             <small id="passwordHelpBlock" class="form-text text-sucess">
                                             maksimal huruf 255
                                             </small>
                                             @if ($errors->has('video'))
                                             <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('video') }}</strong>
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
                        <div class="modal fade" id="modal-writing">
                           <div class="modal-dialog">
                              <div class="modal-content bg-primary">
                                 <div class="modal-header">
                                    <h4 class="modal-title">Edit Writing Challenge</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <form method="POST" action="{{route('fasil.writing.quest')}}" enctype="multipart/form-data" class="was-validated">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                       <div class="form-group row">
                                          <label for="id" class="col-md-5 col-form-label text-md-right">{{ __('id') }}</label>
                                          <div class="col-md-7">
                                             <input id="id" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id"  readonly />
                                             @if ($errors->has('user_id'))
                                             <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('user_id') }}</strong>
                                             </span>
                                             @endif
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="nama" class="col-md-5 col-form-label text-md-right">{{ __('nama') }}</label>
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
                                          <label for="writing" class="col-md-5 col-form-label text-md-right">{{ __('Note Writing') }}</label>
                                          <div class="col-md-7">
                                             <textarea id="writing" type="text" class="form-control" name="writing" value="{{ old('writing') }}" required autofocus ></textarea>
                                             <small id="passwordHelpBlock" class="form-text text-sucess">
                                             maksimal huruf 255
                                             </small>
                                             @if ($errors->has('writing'))
                                             <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('writing') }}</strong>
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
                        <div class="card-footer">
                           
                        </div>
                     </div>
                     <!-- /.card -->
                     <div class="col-12">
                     <div class="card">
                        <div class="card-header">
                           <h3 class="card-title">Quest Peserta</h3>
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
                                    @if(($user->video)== 'belum mengerjakan')
                                                   <a class="text-danger" type="text" >kosong</a>
                                                @else    
                                                <a type="text" href="{{$user->video}}" target="_blank">link video</a>
                                                   @if(($user->video_check)== 0)
                                                      <p class="text-danger">dalam pemeriksaan</p>
                                                   @endif 
                                                   @if(($user->video_check)== 1)
                                                   <p class="text-success">Quest Done</p>
                                                   <p class="text-success">topik : {{ $user->topik_video }}</p>
                                                   @endif
                                          @endif
                                    </td>
                                    <td>
                                    @if(($user->writing)== 'belum mengerjakan')
                                                   <a class="text-danger" type="text" >kosong</a>
                                                @else    
                                                   <a type="text" href="{{ route('fasil.download.writing', Crypt::encrypt($user->id)) }}" >file</a>
                                                   @if(($user->writing_check)== 0)
                                                      <p class="text-danger">sedang diperiksa</p>
                                                   @endif 
                                                   @if(($user->writing_check)== 1)
                                                   <p class="text-success">Quest Clear</p>
                                                   <p class="text-success">topik : {{ $user->topik_writing }}</p>
                                                   @endif
                                                @endif
                                    </td>
                                    <td>
                                    @if(($user->business)== 'belum mengerjakan')
                                                   <a class="text-danger" type="text" >kosong</a>
                                                @else    
                                                   @if(($user->business_check)== 0)
                                                      <p class="text-danger">lagi diperiksa</p>
                                                   @endif 
                                                   @if(($user->business_check)== 1)
                                                   <p class="text-success">Quest Complete</p>
                                                   @endif
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
                                       
                                       <a class="btn btn-primary btn-sm" href="{{ route('fasil.detail.quest',[$user->user_id,Crypt::encrypt($user->id)])}}"  target="_blank">
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
            var bilangan = {{$data->hasil}} ;
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
         $('#modal-video').on('show.bs.modal', function (event) {
             
             var button = $(event.relatedTarget) // Button that triggered the modal
             var id = button.data('myid')
             var nama = button.data('myname')
             
             var modal = $(this)
             
             modal.find('.modal-body #id').val(id)
             modal.find('.modal-body #nama').val(nama)
         });
         $('#modal-writing').on('show.bs.modal', function (event) {
             
             var button = $(event.relatedTarget) // Button that triggered the modal
             var id = button.data('myid')
             var nama = button.data('myname')
             
             var modal = $(this)
             
             modal.find('.modal-body #id').val(id)
             modal.find('.modal-body #nama').val(nama)
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
