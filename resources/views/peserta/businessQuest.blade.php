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
         @include('peserta.sidebar')
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
                           <li class="breadcrumb-item active">Daily-Quest</li>
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
                <div class="card card-danger card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSeven">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                            <b>Cara input Laporan Business Challenge ke Website SLP Indonesia : </b> 
                                
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSeven" class="collapse show" data-parent="#accordion">
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
               <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Daily Quest hari ke - {{$data->day}}</h3>
                     </div>
                     <!-- /.card-header -->
                     <!-- form start -->
                     <form action="{{ route('peserta.business.quest') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="card-body">
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label for="exampleInputEmail1">ID</label>
                                 <input type="text" class="form-control" name="id" value="{{$data->id}}" readonly>
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="exampleInputPassword1">Nama</label>
                                 <input type="text" class="form-control" name="nama" value="{{ $user->Biodata->nama}}"readonly>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="business" class="col-md-4 col-form-label text-md-right">{{ __('Upload Business Challenge') }}</label>
                              <div class="col-md-7">
                                 <input id="business" type="file" class="form-control{{ $errors->has('business') ? ' is-invalid' : '' }}" name="business" value="{{ old('business') }}" required autofocus>
                                 <small  class="form-text text-sucess">
                                 Format harus jpeg,png,pdf dan ukuran maksimal 2mb
                                 <br>
                                 tolong gabungkan gambar jika punya gambar banyak menjadi 1 gambar
                                 </small> 
                                 @if ($errors->has('business'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('business') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                            <label for="sumber_produk" class="col-md-4 col-form-label text-md-right">{{ __('Sumber Produk') }}</label>
                            <div class="col-md-7">
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="customRadioInline1" name="sumber_produk" class="custom-control-input" value="Produk SLP" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline1">Produk SLP</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="sumber_produk" class="custom-control-input" value="Produk Luar" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline2">Produk Luar</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline3" name="sumber_produk" class="custom-control-input" value="Produk Campuran" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline3">Produk Campuran(SLP+Luar)</label>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_produk" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Produk') }}</label>
                            <div class="col-md-7">
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="customRadioInline7" name="jenis_produk" class="custom-control-input" value="Jasa" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline7">Jasa</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline4" name="jenis_produk" class="custom-control-input" value="Konsumtif" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline4">Konsumtif</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline5" name="jenis_produk" class="custom-control-input" value="Barang" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline5">Barang</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline6" name="jenis_produk" class="custom-control-input" value="Lainnya" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline6">Lainnya</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline8" name="jenis_produk" class="custom-control-input" value="Campuran" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline8">Campuran</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                                            <label for="keterangan" class="col-md-4 col-form-label text-md-right">{{ __('keterangan') }}</label>
                                            <div class="col-md-6">
                                                <textarea id="summernote"  class="form-control{{ $errors->has('summernote') ? ' is-invalid' : '' }}" name="summernote" value="{{ old('summernote') }}"  required autofocus></textarea>
                                                <small class="form-text text-sucess">
                                 Diisi dengan harga jual barang, harga beli barang, dan profit
                                 <br>
                                 contoh : 
                                 <br>
                                 Nama Barang : Pempek , harga jual 80.000 , harga beli 65.000, profit 15.000
                                 </small> 
                                                @if ($errors->has('summernote'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('summernote') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                           <div class="form-group row">
                              <label for="hasil" class="col-md-4 col-form-label text-md-right">{{ __('Profit Hari ini') }}</label>
                              <div class="col-md-6">
                                 <input id="hasil" type="text" class="form-control" name="hasil" value="{{ old('hasil') }}" required autofocus>
                                 @if ($errors->has('hasil'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('hasil') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                           <!-- /.card-body -->
                           <div class="text-center">
                              <!--<button type="submit" class="btn btn-primary">Submit</button> -->
                           </div>
                        </div>
                     </form>
                  </div>
                  <!-- /.card -->
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
