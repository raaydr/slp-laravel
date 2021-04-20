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
        <link href="{{asset('develop')}}/img/slp.png" rel="icon">
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
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
                                <a href="\pendaftar\dashboard" class="nav-link ">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../widgets.html" class="nav-link active">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Seleksi
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="\pendaftar\seleksi-pertama" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tahap 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tahap 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Pengumuman                                        
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
                                <h1>SMART LEADER PRENEUR CHALLENGE</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">User</a></li>
                                    <li class="breadcrumb-item active">Seleksi-Challenge</li>
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
            <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i>Success</h4>
            {{session('pesan')}}.
        </div>
      @endif
        <div class="row">
        <div class="col-12" id="accordion">
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                            <b>1. WRITING CHALLENGE!</b>
                                
                            </h4>
                        </div>
                    </a>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <a>Ikuti tantangan ini sesuai ketentuan berikut!</a>
                            <ol>
                                <li>Setiap peserta wajib menulis sebuah tulisan dengan judul "Kontribusiku untuk Negeri" di upload ke instagram menggunakan foto pribadi.</li>
                                <li>Jumlah kata pada tulisan minimal 200 kata.</li>
                                <li>Tag   akun   instagram   @slpreneur.id   dan   gunakan hashtag   #SmartLeaderPreneur, #WritingChallenge, dan #(kode unik) di postingan kalian.</li>
                                <li>Akun instagram dilarang di <b>private.</b> Agar memudahkan kami dalam proses penilaian karya tulis yang kamu buat.</li>
                                <li>Poin penilaian dari challenge ini dinilai dari jumlah kata, keaslian karya, dan kualitas isi.</li>
                            </ol>
                            <a>Periode challenge ini yaitu 29-31 Desember 2019. Mengerjakan lebih cepat lebih baik.</a>
                            <br>
                            <b>Note :</b>
                            <ol>
                            <li><b>Jika challenge ini belum selesai pada rentang waktu yang sudah ditentukan, maka otomatis gugur dalam seleksi. </b></li>
                            <li><b>Kode Unik adalah nomor absen pengumuman seleksi lolos tahap 1</b></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card card-warning card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                               <b>2. INSPIRATION VIDEO CHALLENGE!</b> 
                            </h4>
                        </div>
                    </a>
                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                        <a>Ikuti tantangan ini sesuai ketentuan berikut :</a>
                            <ol>
                                <li>Membuat video Inspirasi dengan tema <b>"Pemuda Indonesia Berani Berubah"</b></li>
                                <li>Video harus berisi rekaman diri kamu saat kamu melakukan public speaking, jadi bukan hanya tulisan tapi praktik bicara secara langsung</li>
                                <li>Upload ke feed instagram/IGTV, video yang sudah kalian buat.</li>
                                <li>Akun  instagram  dilarang  di  <b>private.</b>  Agar  memudahkan  kami  dalam  proses  penilaian  video yang kamu buat.</li>
                                <li>Tag   akun   instagram   @slpreneur.id   dan   gunakan   hashtag   #SmartLeaderPreneur,   #VideoChallenge, dan #(kode unik) di postingan kalian.</li>
                                <li>Poin penilaian dari challenge ini dinilai dari isi, kekreativitasan, dan penyampaian konten.</li>
                            </ol>
                            <a>Periode challenge ini yaitu mulai tanggal 29 Desember - 02 Januari 2020.</a>
                            <br>
                            <b>Note :</b>
                            <ol>
                            <li><b>Jika challenge ini belum selesai pada rentang waktu yang sudah ditentukan, maka otomatis gugur dalam seleksi.</b></li>
                            <li><b>Kode Unik adalah nomor absen pengumuman seleksi lolos tahap 1</b></li>
                            </ol>
                        </div>
                    </div>
                </div>
                
                <div class="card card-danger card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSeven">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                            <b>3. BUSSINESS CHALLENGE!</b> 
                                
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSeven" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                        <a>Di Challenge kali ini kamu di haruskan memberanikan diri untuk berjualan dengan target omzet <b>pembelian</b> yang sudah kami tentukan, yaitu sebesar <b>LIMA RATUS RIBU RUPIAH</b></a>
                        <a>Nah, gimana sih teknis challenge ini? </a>
                        <a>Panitia sudah menyediakan produk untuk kalian jual.</a>
                            <ol>
                                <li>SUSCO BITE</li>
                                <ul>
                                    <li>Susco bite ini adalah kue sus kering isi coklat yang rasanya enak dan nagih banget.</li>
                                    <li>Harga dari SLP Rp 20.000</li>
                                    <li>Harga jual Rp 25.000 </li>
                                </ul>
                                <li>KAOS Smart Leader Preneur dengan sistem penjualan pre-order.</li>
                                <ul>
                                    <li>Susco bite ini adalah kue sus kering isi coklat yang rasanya enak dan nagih banget.</li>
                                    <li>Harga dari SLP Rp 20.000</li>
                                    <li>Harga jual Rp 25.000 </li>
                                </ul>
                                <li>Upload ke feed instagram/IGTV, video yang sudah kalian buat.</li>
                                <li>Akun  instagram  dilarang  di  <b>private.</b>  Agar  memudahkan  kami  dalam  proses  penilaian  video yang kamu buat.</li>
                                <li>Tag   akun   instagram   @slpreneur.id   dan   gunakan   hashtag   #SmartLeaderPreneur,   #VideoChallenge, dan #(kode unik) di postingan kalian.</li>
                                <li>Poin penilaian dari challenge ini dinilai dari isi, kekreativitasan, dan penyampaian konten.</li>
                            </ol>
                            <a>Periode challenge ini yaitu mulai tanggal 29 Desember - 02 Januari 2020.</a>
                            <br>
                            <b>Note :</b>
                            <ol>
                            <li><b>Jika challenge ini belum selesai pada rentang waktu yang sudah ditentukan, maka otomatis gugur dalam seleksi.</b></li>
                            <li><b>Kode Unik adalah nomor absen pengumuman seleksi lolos tahap 1</b></li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>
          <!-- left column -->
          <div class="col-md-12">
          @if(session('pesan'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i>Success</h4>
            {{session('pesan')}}.
        </div>
      @endif
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Pengisian Challenge</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('pendaftar.upload.seleksi1') }}" method="POST" enctype="multipart/form-data" class="was-validated">
                @csrf
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">ID</label>
                    <input type="text" class="form-control" name="id" value="{{$biodata->user_id}}" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ $biodata->nama}}"readonly>
                  </div>
                    </div>
                    <div class="form-group row">
                            <label for="url_video" class="col-md-4 col-form-label text-md-right">{{ __('Link Video Challenge') }}</label>

                            <div class="col-md-6">
                                <input id="url_video" type="text" class="form-control" name="url_video" value="{{ old('url_video') }}" required autofocus>

                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="url_writing" class="col-md-4 col-form-label text-md-right">{{ __('Link Writing Challenge') }}</label>

                            <div class="col-md-6">
                                <input id="url_writing" type="text" class="form-control" name="url_writing" value="{{ old('url_writing') }}" required autofocus>

                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>


                  <div class="form-group row">
                            <label for="url_Business" class="col-md-4 col-form-label text-md-right">{{ __('Upload Bukti Pembelian Tahap Business Challenge ') }}</label>
                            <div class="col-md-7">
                                <input id="url_Business" type="file" class="form-control{{ $errors->has('url_Business') ? ' is-invalid' : '' }}" name="url_Business" value="{{ old('url_Business') }}" required autofocus>
                                <small id="passwordHelpBlock" class="form-text text-sucess">
                                 Format harus jpg,png,jpeg dan ukuran 2 mb
                                </small> 
                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>
                
                <div class="form-group row">
                            <label for="url_cv" class="col-md-4 col-form-label text-md-right">{{ __('Upload CV') }}</label>
                            <div class="col-md-7">
                                <input id="url_cv" type="file" class="form-control{{ $errors->has('url_cv') ? ' is-invalid' : '' }}" name="url_cv" value="{{ old('url_cv') }}" required autofocus>
                                <small id="passwordHelpBlock" class="form-text text-sucess">
                                 Format harus pdf
                                </small> 
                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mentoring" class="col-md-4 col-form-label text-md-right">{{ __('Apakah kamu pernah mengikuti kegiatan mentoring keagamaan atau halaqoh?') }}</label>
                            <div class="col-md-6">
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="customRadioInline1" name="mentoring" class="custom-control-input" value="Pernah"required>
                                    <label class="custom-control-label" for="customRadioInline1">ya</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="mentoring" class="custom-control-input" value="Belum Pernah"required>
                                    <label class="custom-control-label" for="customRadioInline2">tidak</label>
                                </div>
                            </div>
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mentoring_rutin" class="col-md-4 col-form-label text-md-right">{{ __('Jika "Ya", seberapa sering kamu mengikuti kegiatan mentoring tersebut ?') }}</label>
                            <div class="col-md-6">
                                <textarea id="mentoring_rutin" type="text" class="form-control{{ $errors->has('mentoring_rutin') ? ' is-invalid' : '' }}" name="mentoring_rutin" value="{{ old('mentoring_rutin') }}" rows="3"> Abaikan Bila Menjawab "Tidak"</textarea>

                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="futur" class="col-md-4 col-form-label text-md-right">{{ __('Apa yang kamu lakukan ketika sedang futur (ketika malas beribadah dan melakukan kebaikan) ? ') }}</label>
                            <div class="col-md-6">
                                <textarea id="futur" type="text" class="form-control{{ $errors->has('futur') ? ' is-invalid' : '' }}" name="futur" value="{{ old('futur') }}" rows="3" required autofocus></textarea>

                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="faith" class="col-md-4 col-form-label text-md-right">{{ __('Apa yang kamu pahami tentang "Faith" (Keyakinan) ? ') }}</label>
                            <div class="col-md-6">
                                <textarea id="faith" type="text" class="form-control{{ $errors->has('faith') ? ' is-invalid' : '' }}" name="faith" value="{{ old('faith') }}" rows="3" required autofocus></textarea>

                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ethic" class="col-md-4 col-form-label text-md-right">{{ __('Apa yang kamu pahami tentang "Ethic" (Etika) ?') }}</label>
                            <div class="col-md-6">
                                <textarea id="ethic" type="text" class="form-control{{ $errors->has('ethic') ? ' is-invalid' : '' }}" name="ethic" value="{{ old('ethic') }}" rows="3"required autofocus></textarea>

                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="question1" class="col-md-4 col-form-label text-md-right">{{ __('Bagaimana tanggapanmu jika melihat atau mengenal orang yang memiliki kemampuan lebih baik dibandingkan dirimu ?') }}</label>
                            <div class="col-md-6">
                                <textarea id="question1" type="text" class="form-control{{ $errors->has('question1') ? ' is-invalid' : '' }}" name="question1" value="{{ old('question1') }}" rows="3"required autofocus></textarea>

                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="question2" class="col-md-4 col-form-label text-md-right">{{ __('Menurutmu apa perbedaan antara etika, moral, dan akhlak ?') }}</label>
                            <div class="col-md-6">
                                <textarea id="question2" type="text" class="form-control{{ $errors->has('question2') ? ' is-invalid' : '' }}" name="question2" value="{{ old('question2') }}" rows="3"required autofocus></textarea>

                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="question3" class="col-md-4 col-form-label text-md-right">{{ __('Bagaimana caramu agar dapat konsisten beretika dan berakhlak baik ? Berikan contohnya ! ') }}</label>
                            <div class="col-md-6">
                                <textarea id="question3" type="text" class="form-control{{ $errors->has('question3') ? ' is-invalid' : '' }}" name="question3" value="{{ old('question3') }}" rows="3"required autofocus></textarea>

                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="question4" class="col-md-4 col-form-label text-md-right">{{ __('Apa yang kamu pahami tentang "Leadership"  ') }}</label>
                            <div class="col-md-6">
                                <textarea id="question4" type="text" class="form-control{{ $errors->has('question4') ? ' is-invalid' : '' }}" name="question4" value="{{ old('question4') }}" rows="3"required autofocus></textarea>

                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="organisasi" class="col-md-4 col-form-label text-md-right">{{ __('Pernahkan kamu aktif terlibat dalam sebuah organisasi ?') }}</label>
                            <div class="col-md-6 was-validated">
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="customRadioInline3" name="organisasi" class="custom-control-input" value="Pernah" required>
                                    <label class="custom-control-label" for="customRadioInline3">Pernah</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline4" name="organisasi" class="custom-control-input" value="Belum Pernah"required>
                                    <label class="custom-control-label" for="customRadioInline4">Belum Pernah</label>
                                </div>
                            
                            </div>
                                
                        </div>

                        <div class="form-group row">
                            <label for="aktif_organisasi" class="col-md-4 col-form-label text-md-right">{{ __('Jika "Pernah", apa peranmu dalam organisasi tersebut ? Jelaskan aktivitas organisasi tersebut !') }}</label>
                            <div class="col-md-6">
                                <textarea id="aktif_organisasi" type="text" class="form-control{{ $errors->has('aktif_organisasi') ? ' is-invalid' : '' }}" name="aktif_organisasi" value="{{ old('aktif_organisasi') }}" rows="3">Abaikan Bila Menjawab "Belum Pernah"</textarea>

                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="question5" class="col-md-4 col-form-label text-md-right">{{ __('Sebagai seorang pemimpin, apa yang kamu lakukan jika anggota kelompokmu melakukan kesalahan ?') }}</label>
                            <div class="col-md-6">
                                <textarea id="question5" type="text" class="form-control{{ $errors->has('question5') ? ' is-invalid' : '' }}" name="question5" value="{{ old('question5') }}" rows="3"required autofocus></textarea>

                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="question6" class="col-md-4 col-form-label text-md-right">{{ __('Sebagai seorang anggota, apa yang kamu lakukan jika mengetahui pemimpinmu melakukan kesalahan ?') }}</label>
                            <div class="col-md-6">
                                <textarea id="question6" type="text" class="form-control{{ $errors->has('question6') ? ' is-invalid' : '' }}" name="question6" value="{{ old('question6') }}" rows="3"required autofocus></textarea>

                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="entrepreneurship" class="col-md-4 col-form-label text-md-right">{{ __('Apa yang kamu pahami tentang "Entrepreneurship" ?Jelaskan !') }}</label>
                            <div class="col-md-6">
                                <textarea id="entrepreneurship" type="text" class="form-control{{ $errors->has('entrepreneurship') ? ' is-invalid' : '' }}" name="entrepreneurship" value="{{ old('entrepreneurship') }}" rows="3"required autofocus></textarea>

                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alasan_wirausaha" class="col-md-4 col-form-label text-md-right">{{ __('Kenapa kamu ingin berwirausaha? Jelaskan alasan terbesarmu ! ') }}</label>
                            <div class="col-md-6">
                                <textarea id="alasan_wirausaha" type="text" class="form-control{{ $errors->has('alasan_wirausaha') ? ' is-invalid' : '' }}" name="alasan_wirausaha" value="{{ old('alasan_wirausaha') }}" rows="3"required autofocus></textarea>

                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pernah_wirausaha" class="col-md-4 col-form-label text-md-right">{{ __('Apakah kamu pernah berdagang atau berbisnis ? (selain challenge dari SLP)') }}</label>
                            <div class="col-md-6">
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="customRadioInline5" name="pernah_wirausaha" class="custom-control-input" value="Pernah"required>
                                    <label class="custom-control-label" for="customRadioInline5">Pernah</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline6" name="pernah_wirausaha" class="custom-control-input" value="Belum Pernah"required>
                                    
                                    <label class="custom-control-label" for="customRadioInline6">Belum Pernah</label>
                                </div>
                                 
                            </div>
                            
                            
                        </div>

                        <div class="form-group row">
                            <label for="exp_wirausaha" class="col-md-4 col-form-label text-md-right">{{ __('Jika pernah berdagang atau berbisnis, jelaskan pengalamanmu ! (selain challenge dari SLP)') }}</label>
                            <div class="col-md-6">
                                <textarea id="exp_wirausaha" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="exp_wirausaha" value="{{ old('exp_wirausaha') }}" rows="3">Abaikan Bila Menjawab "Belum Pernah"</textarea>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="omset" class="col-md-4 col-form-label text-md-right">{{ __('Berapa omset terbesar yang pernah kamu raih dalam berwirausaha ?') }}</label>
                            <div class="col-md-6">
                                <textarea id="omset" type="text" class="form-control{{ $errors->has('omset') ? ' is-invalid' : '' }}" name="omset" value="{{ old('omset') }}" rows="3"required autofocus></textarea>

                                <div class="valid-feedback"></div>
      <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card -->

            
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block"></div>
                <strong>Copyright &copy; 2014-2021 <a href="https://slpindonesia.com">SLP Indonesia</a>.</strong> All rights reserved.
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
        </script>
    </body>
</html>
