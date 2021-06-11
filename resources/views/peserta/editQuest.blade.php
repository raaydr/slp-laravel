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
                                <a href="{{ route('peserta.daily.quest') }}" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                Daily Quest
                                </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('peserta.record.quest') }}" class="nav-link ">
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
                        <h1>Daily Quest Peserta</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Peserta</a></li>
                           <li class="breadcrumb-item active">Daily-Quest-Edit</li>
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
               <div class="col-12" id="accordion">
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                            <b>Cara input Laporan Writing Challenge ke Website SLP Indonesia : </b>
                                
                            </h4>
                        </div>
                    </a>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <a>Ikuti langkah dibawah ini :</a>
                            <ol>
                                <li>Buat tulisan yang akan di publikasi di word</li>
                                <li>Upload hasil tulisan mu ke Instagram Pribadimu</li>
                                <li>Tag akun Instagram <a href="https://www.instagram.com/slp.indonesia/" target="_blank">@slp.indonesia</a> dan gunakan hastag <a class="text-primary">#SmartLeaderPreneur</a> <a class="text-primary">#SLPBatch2</a></li>
                                <li>Screenshoot hasil Upload-tan tulisan mu dan taruh dibawah file word yg sudah kamu buat diawal</li>
                                <li>Save Hasil Tulisan + Screenshoot dalam file word tdi dengan format <b>Warna Kelompok _ Nama Lengkap _ WCDay#1</b></li>
                                Contoh :  <b>Orange_Aprilliana _ WCDay#1</b>
                                <br>
                                Notes : Maks. File 2mb ya 
                                <br>
                                <li>Setelah selesai, tinggal Upload di website deh! </li>
                            </ol>
                            <a>Semangat 💪🏻✨</a>
                            <br>
                            
                        </div>
                    </div>
                </div>
                <div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               <b>Cara input Laporan Public Speaking Challenge ke Website SLP Indonesia : </b> 
                            </h4>
                        </div>
                    </a>
                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                        <a>Ikuti langkah dibawah ini :</a>
                            <ol>
                                <li>Buat video sesuai dengan konsep yang sudah kamu buat</li>
                                <li>Upload hasilnya di Youtube / Instagram Pribadi mu</li>
                                <li>Jangan Private Instagram kamu ya kalau uploadnya di IG</li>
                                <li>Tag akun Instagram <a href="https://www.instagram.com/slp.indonesia/" target="_blank">@slp.indonesia</a> dan gunakan hastag <a class="text-primary">#SmartLeaderPreneur</a> <a class="text-primary">#SLPBatch2</a></li>
                                <li>Masukin link dari video yg di Upload ke Website</li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
                
                <div class="card card-danger card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSeven">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                            <b>Cara input Laporan Business Challenge ke Website SLP Indonesia : </b> 
                                
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSeven" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                        <a>Ikuti langkah dibawah ini :</a>
                            <ol>
                                <li>Pada bagian Upload file, isi dengan <b>Bukti Transfer</b> yah</li>
                                📝 Notes : Jika bukti Transfer banyak, silahkan digabungkan seperti biasa ya
                                <br>
                                <li>Pada bagian sumber produk, silahkan pilih dari mana sumber produk yang kamu jual</li>
                                <li>Pada bagian jenis produk, silahkan pilih jenis produk apa saja yang kamu jual hari ini</li>
                                <li>Pada bagian keterangan, isi dengan : 
                                 <br>                                 
                                    Nama Produk : 
                                    <br>                                    
                                    Harga Jual : 
                                    <br>
                                    Harga Beli : 
                                    <br>
                                    Profit : </li>
                                 📝 Notes : Jika menjual lebih dari 1 produk, <b>silahkan diisi terus kebawah</b> sesuai dengan format
                                 <br>
                                <li>Pada bagian profit hari ini, tuliskan jumlah <b>PROFIT</b> yang kamu dapatkan hari ini. Profitnya aja yaaa~</li>
                                <li>Pastikan setiap <b>file bukti transfer</b> yg kamu Upload, <b>sesuai</b> dengan jumlah yang tertulis dibagian <b>Keterangan</b> dan <b>Profit</b> ya</li>
                                
                            </ol>
                        
                        </div>
                    </div>
                </div>

            </div>
        
               <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card card-success">
                     <div class="card-header">
                        <h3 class="card-title">Edit Daily Quest hari ke - {{$quest}}</h3>
                     </div>
                     <!-- /.card-header -->
                     <!-- form start -->
                        <div class="card-body">
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label for="exampleInputEmail1">ID</label>
                                 <input type="text" class="form-control" name="id" value="{{$user->Biodata->user_id}}" readonly>
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="exampleInputPassword1">Nama</label>
                                 <input type="text" class="form-control" name="nama" value="{{ $user->Biodata->nama}}"readonly>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="video" class="col-md-6 col-form-label text-md-right">{{ __('Link Video Challenge') }}</label>
                              <div class="col-md-2 col-form-label text-md-left">
                                 
                                 
                                 @if(($data->video)== 'belum mengerjakan')
                                 <p class="text-danger">belum mengerjakan</p>
                                 @else 
                                 <a type="text" href="{{$data->video}}" target="_blank">check</a>
                                 @endif
                              </div>
                              <div class="col-md-4 col-form-label text-md-left">
                              @if(($data->video_check)== 1)
                                 <p class="text-success">sudah diperiksa</p>
                              @else 
                                 <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-video" target="_blank">
                                                        <i class="fas fa-info"> </i>
                                                        Ubah Link Video
                                                    </button>
                              @endif
                              
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="writing" class="col-md-6 col-form-label text-md-right">{{ __('Upload Writing Challenge ') }}</label>
                              <div class="col-md-2 col-form-label text-md-left">
                                 
                                 
                                 @if(($data->writing)== 'belum mengerjakan')
                                 <p class="text-danger">belum mengerjakan</p>
                                 @else 
                                 <a type="text" href="{{ route('peserta.download.writing', Crypt::encrypt($data->id)) }}" target="_blank">check</a>
                                 @endif
                              </div>
                              <div class="col-md-4 col-form-label text-md-left">
                              @if(($data->writing_check)== 1)
                                 <p class="text-success">sudah diperiksa</p>
                              @else 
                              <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-writing" target="_blank">
                                                        <i class="fas fa-info"> </i>
                                                         Upload Writing
                                                    </button>
                              @endif
                              
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="business" class="col-md-6 col-form-label text-md-right">{{ __('Upload Business Challenge') }}</label>
                              <div class="col-md-2 col-form-label text-md-left">
                                 
                                 
                                 @if(($data->business)== 'belum mengerjakan')
                                 <p class="text-danger">belum mengerjakan</p>
                                 @else 
                                 <a type="text" href="{{asset('imgBusinessQuest')}}/{{$data->business}}" target="_blank">check</a>
                                 @endif
                              </div>
                              <div class="col-md-4 col-form-label text-md-left">
                              @if(($data->business_check)== 1)
                                 <p class="text-success">sudah diperiksa</p>
                              @else 
                              <a class="btn btn-warning btn-sm" href="{{ route('peserta.quest.business',Crypt::encrypt($data->id)) }}">
                                                        <i class="fas fa-info"> </i>
                                                         Upload Business
                                                    </a>
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
                        
                  </div>
                  <!-- /.card -->
                  <div class="modal fade" id="modal-video">
                        <div class="modal-dialog">
                            <div class="modal-content bg-primary">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Video Challenge</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{route('peserta.video.quest')}}" enctype="multipart/form-data" class="was-validated">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group row">
                                                <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('Edit Link Video') }}</label>
                                                <div class="col-md-6">
                                                   <input id="video" type="text" class="form-control" name="video" value="{{ old('video') }}" required autofocus >
                                                   <small  class="form-text text-sucess">
                                                   contoh : https://www.youtube.com/watch?v=dQw4w9WgXcQ
                                                   </small>
                                                   @if ($errors->has('video'))
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('video') }}</strong>
                                                   </span>
                                                   @endif
                                                </div>
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
                                <form method="POST" action="{{route('peserta.writing.quest')}}" enctype="multipart/form-data" class="was-validated">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group row">
                                                <label for="writing" class="col-md-4 col-form-label text-md-right">{{ __('Upload Writing') }}</label>
                                                <div class="col-md-7">
                                                   <input id="writing" type="file" class="form-control{{ $errors->has('writing') ? ' is-invalid' : '' }}" name="writing" value="{{ old('writing') }}" required autofocus>
                                                   <small  class="form-text text-sucess">
                                                   Format harus doc,docx,pdf dan ukuran maksimal 2mb
                                                   </small> 
                                                   @if ($errors->has('writing'))
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('writing') }}</strong>
                                                   </span>
                                                   @endif
                                                </div>
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
         var rupiah = document.getElementById("profit");
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
