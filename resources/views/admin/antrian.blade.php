<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>SLP Indonesia | Admin-Seleksi Kedua</title>
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
      <link href="{{asset('develop')}}/img/slp.png" rel="icon">
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
                        <h1>Seleksi</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Antrian-Interview</li>
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
                           <h3 class="card-title">Daftar Antrian Interview</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           @if(session('berhasil'))
                           <div class="alert alert-success alert-dismissable md-5">
                              <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check"></i>Absensi</h5>
                              {{session('berhasil')}}.
                           </div>
                           @endif
                           @if(session('salah'))
                           <div class="alert alert-danger alert-dismissable md-5">
                              <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check"></i>Absensi</h5>
                              {{session('salah')}}.
                           </div>
                           @endif
                           <div class="modal fade" id="modal-note">
                              <div class="modal-dialog">
                                 <div class="modal-content bg-warning">
                                    <div class="modal-header">
                                       <h4 class="modal-title">Note</h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <form method="POST" action="{{route('admin.antrian.note')}}" enctype="multipart/form-data" class="was-validated">
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
                                                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama"   readonly/>
                                                @if ($errors->has('nama'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nama') }}</strong>
                                                </span>
                                                @endif
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <label for="note" class="col-md-4 col-form-label text-md-right">{{ __('note') }}</label>
                                             <div class="col-md-7">
                                                <textarea
                                                   id="note"
                                                   type="text"
                                                   class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}"
                                                   name="note"
                                                   value="{{ old('note') }}"
                                                   required
                                                   autofocus
                                                   /></textarea>
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
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>No.Antrian</th>
                                    <th>Nama</th>
                                    <th>note</th>
                                    <th>kepribadian</th>
                                    <th>Kehadiran</th>
                                    <th></th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php $i = 0; ?>
                                 @foreach ($antrian as $user)
                                 <?php $i++ ;?>
                                 <tr>
                                    <td>{{ $user->antrian }}</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->note }}</td>
                                    <td><a class="btn btn-primary" href="{{asset('teskepribadian')}}/{{$user->url_kepribadian}}" target="_blank">check</a></td>
                                    <td>
                                       @if(($user->absen)== 'Tidak Hadir')
                                       <p class="text-danger">Tidak Hadir</p>
                                       @endif
                                       @if(($user->absen)== 'Hadir')
                                       <p class="text-success">Hadir</p>
                                       @endif
                                    </td>
                                    <td class="project-actions text-right">
                                       <a class="btn btn-primary btn-sm" href="{{ route('admin.userprofile', $user->user_id) }}" target="_blank">
                                       <i class="fas fa-folder">
                                       </i>
                                       Detail
                                       </a>
                                       <button class="btn btn-warning btn-sm" data-toggle="modal" data-myid="{{$user->user_id}}" data-myname="{{$user->nama}}" data-target="#modal-note"href="{{ route('admin.antrian.note', $user->user_id) }}" target="_blank">
                                       <i class="fas fa-info"> </i>
                                       Note
                                       </button>
                                    </td>
                                    <td>@if(($user->absen)== 'Tidak Hadir')
                                       <a class="btn btn-success btn-sm" href="{{ route('admin.interview.hadir', $user->user_id) }}" >
                                       <i class="fas fa-check">
                                       </i>
                                       Hadir
                                       </a>
                                       @endif
                                       @if(($user->absen)== 'Hadir')
                                       <a class="btn btn-danger btn-sm" href="{{ route('admin.interview.hadir', $user->user_id) }}" >
                                       <i class="fas fa-exclamation">
                                       </i>
                                       Tidak Hadir
                                       </a>
                                       @endif
                                    </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th>No.Antrian</th>
                                    <th>Nama</th>
                                    <th>note</th>
                                    <th>kepribadian</th>
                                    <th>Kehadiran</th>
                                    <th></th>
                                    <th></th>
                                 </tr>
                              </tfoot>
                           </table>
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
         $('#modal-note').on('show.bs.modal', function (event) {
             
             var button = $(event.relatedTarget) // Button that triggered the modal
             var id = button.data('myid')
             var nama = button.data('myname')
         
             console.log('modal kebuka');
          
             var modal = $(this)
             modal.find('.modal-body #user_id').val(id)
             modal.find('.modal-body #nama').val(nama)
           
         });
      </script>
   </body>
</html>
