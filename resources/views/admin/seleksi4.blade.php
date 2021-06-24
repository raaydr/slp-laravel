<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>SLP Indonesia | {{$title}}</title>
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
      
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
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
                        <h1>Seleksi</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Rank-Challenge</li>
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
                           <h3 class="card-title">List Pendaftar Tahap Challenge</h3>
                           <div class="modal fade" id="modal-penilaian">
                                    <div class="modal-dialog">
                                       <div class="modal-content bg-warning">
                                          <div class="modal-header">
                                             <h4 class="modal-title">Penilaian</h4>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <form id="form-penilaian-edit" name="form-penilaian-edit"  enctype="multipart/form-data" class="was-validated">
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
                                                   <label for="writing" class="col-md-4 col-form-label text-md-right">{{ __('writing') }}</label>
                                                   <div class="col-md-7">
                                                      <input
                                                         id="writing"
                                                         type="text"
                                                         class="form-control{{ $errors->has('writing') ? ' is-invalid' : '' }}"
                                                         name="writing"
                                                         value="{{ old('writing') }}"
                                                         required
                                                         autofocus
                                                         />
                                                      @if ($errors->has('writing'))
                                                      <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('writing') }}</strong>
                                                      </span>
                                                      @endif
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('video') }}</label>
                                                   <div class="col-md-7">
                                                      <input
                                                         id="video"
                                                         type="text"
                                                         class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}"
                                                         name="video"
                                                         value="{{ old('video') }}"
                                                         required
                                                         autofocus
                                                         />
                                                      @if ($errors->has('video'))
                                                      <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('video') }}</strong>
                                                      </span>
                                                      @endif
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label for="penjualan" class="col-md-4 col-form-label text-md-right">{{ __('penjualan') }}</label>
                                                   <div class="col-md-7">
                                                      <input
                                                         id="penjualan"
                                                         type="text"
                                                         class="form-control{{ $errors->has('penjualan') ? ' is-invalid' : '' }}"
                                                         name="penjualan"
                                                         value="{{ old('penjualan') }}"
                                                         required
                                                         autofocus
                                                         />
                                                      @if ($errors->has('business'))
                                                      <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('business') }}</strong>
                                                      </span>
                                                      @endif
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label for="point" class="col-md-4 col-form-label text-md-right">{{ __('point') }}</label>
                                                   <div class="col-md-7">
                                                      <input
                                                         id="point"
                                                         type="text"
                                                         class="form-control{{ $errors->has('point') ? ' is-invalid' : '' }}"
                                                         name="point"
                                                         value="{{ old('point') }}"
                                                         required
                                                         autofocus
                                                         />
                                                      @if ($errors->has('point'))
                                                      <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('point') }}</strong>
                                                      </span>
                                                      @endif
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-light" id="tombol-simpan"value="create">Simpan</button>
                                             </div>
                                          </form>
                                       </div>
                                       <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                 </div>
                                 <!-- /.modal -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           @if(session('berhasil'))
                           <div class="alert alert-success alert-dismissable md-5">
                              <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check"></i>Penilaian</h5>
                              {{session('berhasil')}}.
                           </div>
                           @endif
                           @if(session('pesan'))
                           <div class="alert alert-warning alert-dismissable md-5">
                              <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-info"></i>Penilaian</h5>
                              {{session('pesan')}}.
                           </div>
                           @endif
                           @if(session('challenge'))
                           <div class="alert alert-danger alert-dismissable md-5">
                              <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check"></i>Penilaian </h5>
                              {{session('challenge')}}.
                           </div>
                           @endif
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>Rank</th>
                                    <th>nama</th>
                                    <th>Writing</th>
                                    <th>Video</th>
                                    <th>Business</th>
                                    <th>extra</th>
                                    <th>Penjualan</th>
                                    <th>total</th>
                                    <th>Penilaian</th>
                                    <th>Status</th>
                                    <th>Challenge Writing</th>
                                    <th>Challenge Video</th>
                                    <th>Challenge Business</th>
                                 </tr>
                              </thead>
                                
                              
                              <tfoot>
                                 <tr>
                                    <th>Rank</th>
                                    <th>nama</th>
                                    <th>Writing</th>
                                    <th>Video</th>
                                    <th>Business</th>
                                    <th>extra</th>
                                    <th>penjualan</th>
                                    <th>total</th>
                                    <th>Penilaian</th>
                                    <th>Status</th>
                                    <th>Challenge Writing</th>
                                    <th>Challenge Video</th>
                                    <th>Challenge Business</th>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>


      <script>
         $(function () {
             $("#example1")
                 .DataTable({
                      processing:true,
                     serverSide:true,
                     ajax : {
                        url : "{{route('admin.challenge.rank')}}",
                        type : 'GET'
                     },
                     columns:[            
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        {data:'nama',name:'nama'},
                        {data:'writing',name:'writing'},
                        {data:'video',name:'video'},
                        {data:'business',name:'business'},
                        {data:'point',name:'point'},
                        {data:'penjualan',name:'penjualan'},
                        {data:'total',name:'total'},
                        {data: 'Penilaian', name: 'Penilaian'},
                        {data: 'Status', name: 'Status', orderable: true, searchable: true},
                        {data: 'Challenge Writing', name: 'Challenge Writing', orderable: true, searchable: true},
                        {data: 'Challenge Video', name: 'Challenge Video', orderable: true, searchable: true},
                        {data: 'Challenge Business', name: 'Challenge Business', orderable: true, searchable: true},
                        
                     ],
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
         $('#modal-penilaian').on('show.bs.modal', function (event) {
             
             var button = $(event.relatedTarget) // Button that triggered the modal
             var id = button.data('myid')
             var writing = button.data('writing') 
             var video = button.data('video') 
             var penjualan = button.data('penjualan') 
             var point = button.data('point')  
             var modal = $(this)
             modal.find('.modal-body #user_id').val(id)
             modal.find('.modal-body #writing').val(writing)
             modal.find('.modal-body #video').val(video)
             modal.find('.modal-body #penjualan').val(penjualan)
             modal.find('.modal-body #point').val(point)
         });
         //SIMPAN & UPDATE DATA DAN VALIDASI (SISI CLIENT)
        //jika id = modal-penilaian panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
        //jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
        if ($("#form-penilaian-edit").length > 0) {
            $("#form-penilaian-edit").validate({
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');

                    $.ajax({
                        data: $('#form-penilaian-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('admin.challenge.editpenilaian') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function (data) { //jika berhasil 
                            $('#form-penilaian-edit').trigger("reset"); //form reset
                            $('#modal-penilaian').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#example1').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('
                                success ')}}',
                                position: 'bottomRight'
                            });
                        },
                        error: function (data) { //jika error tampilkan error pada console
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }
      </script>
   </body>
</html>
