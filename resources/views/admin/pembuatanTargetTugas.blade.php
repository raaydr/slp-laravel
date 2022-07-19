<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>SLP Indonesia</title>
      <meta name="csrf-token" content="{{ csrf_token() }}" />
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
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
          @include('admin.sidebar')
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Target Tugas</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Target-Tugas</li>
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
                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Tambah Target Tugas</h3>
                     </div>
                     <!-- /.card-header -->
                     <!-- form start -->
                     <form id="formTarget" enctype="multipart/form-data" >
                     @csrf  
                        <div class="card-body">
                           <div class="form-group row">
                              <label for="judul" class="col-md-4 col-form-label text-md-right">{{ __('Judul') }}</label>
                              <div class="col-md-6">
                                 <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" >
                                 <small id="passwordHelpBlock" class="form-text text-sucess">
                                 contoh : Target Daily Video
                                 </small>
                                 @if ($errors->has('judul'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('judul') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="jumlah" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah') }}</label>
                              <div class="col-md-6">
                                 <input id="jumlah" type="text" class="form-control" name="jumlah" value="{{ old('jumlah') }}" >
                                 <small id="passwordHelpBlock" class="form-text text-sucess">
                                 contoh : 60 . artinya dikerjakan sebanyak 60 kali karena 2 bulan
                                 </small>
                                 @if ($errors->has('jumlah'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('jumlah') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                            <label for="tipe_tugas" class="col-md-4 col-form-label text-md-right">{{ __('tugas') }}</label>
                            <div class="col-md-7">
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="customRadioInline1" name="tipe_tugas" class="custom-control-input" value="Creative Writing" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline1">Creative Writing</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="tipe_tugas" class="custom-control-input" value="Public Speaking" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline2">Public Speaking</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline3" name="tipe_tugas" class="custom-control-input" value="Business" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline3">Business</label>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                           <label for="keterangan" class="col-md-4 col-form-label text-md-right">{{ __('keterangan') }}</label>
                           <div class="col-md-6">
                              <textarea id="summernote"  class="form-control{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" name="keterangan"   required autofocus></textarea>
                                 <small id="passwordHelpBlock" class="form-text text-sucess">Penjelasan tentang target</small> 
                                    @if ($errors->has('keterangan'))
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $errors->first('keterangan') }}</strong>
                                    </span>
                                    @endif
                           </div>
                        </div>
                           <div class="form-group row">
                              <label for="gen" class="col-md-4 col-form-label text-md-right">{{ __('generasi') }}</label>
                              <div class="col-md-6">
                                 <input id="gen" type="text" class="form-control" name="gen" value="{{ old('gen') }}" required autofocus>
                                 @if ($errors->has('gen'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('gen') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                           <!-- /.card-body -->
                           <div class="text-center">
                           <button class="btn btn-success btn-submit" id="simpanBTN">Submit</button>
                           <div id="load" class="spinner-border text-primary"></div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <!-- /.card -->
               </div>
               <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Target Tugas List</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>Nama</th>
                                                <th>Jenis</th>
                                                <th>Jumlah</th>
                                                <th>Gen</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                          <td>1</td>
                                          <td>Daily vlog</td>
                                          <td>Public Speaking</td>
                                          <td>60</td>
                                          <td>2</td>
                                          <td>
                                             <button type="submit" class="btn btn-primary">edit</button>
                                             <button  class="btn btn-danger">delete</button>
                                          </td>
                                          </tr>
                                          <tr>
                                          <td>2</td>
                                          <td>Daily Writing</td>
                                          <td>Creative Writing</td>
                                          <td>30</td>
                                          <td>2</td>
                                          <td>
                                             <button type="submit" class="btn btn-primary">edit</button>
                                             <button  class="btn btn-danger">delete</button>
                                          </td>
                                          </tr>
                                          <tr>
                                          <td>3</td>
                                          <td>Entrepeneur Bulan 1</td>
                                          <td>Business</td>
                                          <td>3.000.0000</td>
                                          <td>2</td>
                                          <td>
                                             <button type="submit" class="btn btn-primary">edit</button>
                                             <button  class="btn btn-danger">delete</button>
                                          </td>
                                          </tr>
                                          <tr>
                                          <td>4</td>
                                          <td>Daily vlog</td>
                                          <td>Public Speaking</td>
                                          <td>60</td>
                                          <td>2</td>
                                          <td>
                                             <button type="submit" class="btn btn-primary">edit</button>
                                             <button  class="btn btn-danger">delete</button>
                                          </td>
                                          </tr>
                                          <tr>
                                          <td>5</td>
                                          <td>Daily vlog</td>
                                          <td>Public Speaking</td>
                                          <td>60</td>
                                          <td>2</td>
                                          <td>
                                             <button type="submit" class="btn btn-primary">edit</button>
                                             <button  class="btn btn-danger">delete</button>
                                          </td>
                                          </tr>
                                          <tr>
                                          <td>6</td>
                                          <td>Daily vlog</td>
                                          <td>Public Speaking</td>
                                          <td>60</td>
                                          <td>2</td>
                                          <td>
                                             <button type="submit" class="btn btn-primary">edit</button>
                                             <button  class="btn btn-danger">delete</button>
                                          </td>

                                       </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>no</th>
                                                <th>Nama</th>
                                                <th>Jenis</th>
                                                <th>Jumlah</th>
                                                <th>Gen</th>
                                                <th>action</th>
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
      <!-- Summernote -->
      <script src="{{asset('template')}}/plugins/summernote/summernote-bs4.min.js"></script>
      <!-- AdminLTE App -->
      <script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="{{asset('template')}}/dist/js/demo.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
      <script>
          $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });
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
         });
         $('#load').hide();
        
         $(function () {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
               mode: "htmlmixed",
               theme: "monokai"
            });
         })
         $(document).ready(function() {
               if ($("#formTarget").length > 0) {
                  $("#formTarget").validate({
                        rules: {
                           judul: {
                              required: true
                              
                           },
                           jumlah: {
                              required: true,
                              
                           },
                     
                           summernote: {
                              required: true,
                              
                           },
                           gen: {
                              required: true,
                              
                           }
                           
                        },
                        messages: {
                           judul: {
                              required: 'Tolong Diisi'
                           },
                           jumlah: {
                              required: 'Tolong Diisi',
                              
                             
                           },
                           
                           summernote: {
                              required: 'Tolong Diisi'
                           },
                           gen: {
                              required: 'Tolong Diisi',
                              
                           },
                           
                        },
                        submitHandler: function(form) {
                           var actionType = $('#simpanBTN').val();
                           $('#simpanBTN').html('Sending..');
                           $('#load').show();
                           var form = $("#formTarget").closest("form");
                           var formData = new FormData(form[0]);
                           $.ajax({
                              xhr: function() {
                                       var xhr = new window.XMLHttpRequest();
                                       xhr.upload.addEventListener("progress", function(evt) {
                                          if (evt.lengthComputable) {
                                                var percentComplete = Math.round(((evt.loaded / evt.total) * 100));
                                                $(".progress-bar").width(percentComplete + '%');
                                                $(".progress-bar").html(percentComplete+'%');
                                          }
                                       }, false);
                                       return xhr;
                                    },
                              data: formData,
                              url: "{{ route('admin.AddTargetTugas') }}", //url simpan data
                              type: "POST", //karena simpan kita pakai method POST
                              dataType: 'json', //data tipe kita kirim berupa JSON
                              processData: false,
                              contentType: false,
                              success: function(data) { //jika berhasil
                                 switch(data.status){
                                    case 0 :
                                          $('#load').hide();
                                          $('#simpanBTN').html('Submit');
                                          $('#simpanBTN').show();
                                          var oTable = $('#example1').dataTable(); //inialisasi datatable
                                          oTable.fnDraw(false); //reset datatable
                                          iziToast.error({
                                             title: 'Error',
                                             message: data.error,
                                          });
                                          console.log('Error:', "periksa");
                                          break;
                                       case 1 :
                                          $('#load').hide();
                                          $('#simpanBTN').html('Submit'); //tombol simpan
                                          $('#simpanBTN').show();
                                          document.getElementById("formTarget").reset();
                                          $('#summernote').summernote('code', ''); 
                                          var oTable = $('#example1').dataTable(); //inialisasi datatable
                                          oTable.fnDraw(false); //reset datatable
                                          //$('#uploadStatus').html('<p style="color:#28A74B;">File Berhasil diupload!</p>');
                                          iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                             title: 'Data Berhasil Disimpan',
                                             message: '{{ Session('
                                             success ')}}',
                                             position: 'bottomRight'
                                          });
                                          break;
                                       default:
                                    // code block
            
                                 } 
                                    
                              },
                              error: function(data) { //jika error tampilkan error pada console
                                    $('#load').hide();
                                    $('#judul').val("");
                                    $('#jumlah').val("");
                                    $('#gen').val("");
                                    $('#tipe_tugas').val("");
                                    
                                    $('#simpanBTN').html('Submit'); //tombol simpan
                                    iziToast.error({
                                       title: 'Error',
                                       message: 'Illegal operation',
                                    });
                                    console.log('Error:', "Data kosong");
            
                              }
                           });
                        }
                  })
               }
            
               function printErrorMsg(msg) {
            
                  $(".print-error-msg").find("ul").html('');
            
                  $(".print-error-msg").css('display', 'block');
            
                  $.each(msg, function(key, value) {
            
                        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            
                  });
            
               }
   
   });
      </script>
   </body>
</html>
