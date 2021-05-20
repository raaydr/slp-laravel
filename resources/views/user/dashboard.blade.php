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
                                <a href="{{ route('pendaftar.dashboard') }}" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Seleksi
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('pendaftar.seleksi1') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tahap 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('pendaftar.ranking.challenge') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tahap 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{ route('pendaftar.pengumuman') }}" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Pengumuman
                                        <span class="right badge badge-danger">New</span>
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
                                <h1>Profile</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
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
                    @if(session('pesan'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i>Success</h4>
            {{session('pesan')}}.
        </div>
      @endif
                        <div class="row">
                            <div class="col-md-3">
                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <a class="btn btn-default" href="{{asset('imgdaftar')}}/{{$biodata->url_foto}}" target="_blank">
                                                <img class="profile-user-img img-fluid" src="{{asset('imgdaftar')}}/{{$biodata->url_foto}}" class="img-fluid" alt="Cinque Terre" />
                                            </a>
                                        </div>

                                        <h3 class="profile-username text-center">{{ $biodata->nama }}</h3>

                                        <p class="text-muted text-center">{{ $biodata->aktivitas}}</p>
                                        <div class="text-center">
                                            <a data-toggle="modal" data-target="#modal-foto" class="btn btn-primary btn-sm m-2">ubah foto</a>
                                        </div>
                                        <div class="modal fade" id="modal-foto">
                                            <div class="modal-dialog">
                                                <div class="modal-content bg-primary">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ubah Foto</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="{{route('pendaftar.edit.foto')}}" enctype="multipart/form-data" class="was-validated">
                                                        {{csrf_field()}}
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="form-group row">
                                                                    <label for="url_foto" class="col-md-4 col-form-label text-md-right">{{ __('Upload Foto') }}</label>
                                                                    <div class="col-md-7">
                                                                        <input
                                                                            id="url_foto"
                                                                            type="file"
                                                                            class="form-control{{ $errors->has('url_foto') ? ' is-invalid' : '' }}"
                                                                            name="url_foto"
                                                                            value="{{ old('url_foto') }}"
                                                                            required
                                                                            autofocus
                                                                        />
                                                                        <small id="passwordHelpBlock" class="form-text text-sucess">
                                                                            Format harus jpg,png,jpeg dan ukuran 2 mb
                                                                        </small>
                                                                        @if ($errors->has('url_foto'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('url_foto') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-outline-light">Ubah</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item"><b>Domisili</b> <a class="float-right">{{$biodata->domisili}}</a></li>
                                            <li class="list-group-item"><b>Jenis Kelamin</b> <a class="float-right">{{$biodata->jenis_kelamin}}</a></li>
                                            <li class="list-group-item"><b>Tanggal Lahir</b> <a class="float-right">{{$biodata->tanggal_lahir}}</a></li>
                                            <li class="list-group-item"><b>Kode Unik</b> <a class="float-right">{{$biodata->user_id}}</a></li>
                                            @if (!empty($biodata->seleksi_berkas))
                                            <li class="list-group-item">
                                                <b>Tahap Pemberkasan</b> <a class="float-right"><strong>{{$biodata->seleksi_berkas}}</strong></a>
                                            </li>
                                            @endif @if (!empty($biodata->seleksi_pertama))
                                            <li class="list-group-item">
                                                <b>Tahap Pertama</b> <a class="float-right"><strong>{{$biodata->seleksi_pertama}}</strong></a>
                                            </li>
                                            @endif
                                        </ul>
                                        <div class="text-center">
                                                    <a href="{{ route('pendaftar.edit.biodata') }}" class="btn btn-primary m-2">Ubah Biodata</a>
                                                </div>
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
                                            {{$biodata->phonenumber}}
                                        </p>

                                        <hr />

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                                        <p class="text-muted">{{$biodata->alamat_domisili}}</p>

                                        <hr />

                                        <strong><i class="fas fa-pencil-alt mr-1"></i>Minat Program</strong>

                                        <p class="text-muted">
                                            <span class="tag tag-danger"> {{$biodata->minatprogram}}</span>
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
                                            <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#Pertama" data-toggle="tab">More about Me</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#Kedua" data-toggle="tab">Challenge</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="timeline">
                                                <!-- The timeline -->
                                                <div class="timeline timeline-inverse">
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-danger">
                                                            15 April 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-envelope bg-primary"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header"><a href="#">Pembukaan Pendaftaran</a></h3>

                                                            <div class="timeline-body">
                                                                Mengisi Form Pendaftaran dengan benar dan sesuai. Setelah itu <b>LOGIN</b> dan <b>join link grup WA</b>
                                                                <a href="https://chat.whatsapp.com/GAZV0KBBI8T6a6kfYSnKWZ" target="”_blank”"><b>Join disini</b></a>
                                                                <br />
                                                                Jika Grup WA sudah penuh, join Grup WA lainnya <a href="https://chat.whatsapp.com/ElhCuc6irdn2HtGNnoJAMf" target="”_blank”"><b>Disini</b></a> dan
                                                                <a href="https://chat.whatsapp.com/KEM8zlDzYsZFG1BcGPW4ct" target="”_blank”"><b>Disini</b></a> <br />
                                                                Cukup join salah satu grup WA saja dari ketiga grup tersebut
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-success">
                                                            25 April 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-user bg-info"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header border-0"><a href="#">Seleksi Pertama</a></h3>
                                                            <div class="timeline-body">
                                                                Selanjutnya bagi yang lulus dari seleksi pendaftaran, akan masuk ke tahap selanjutnya yaitu melakukan semua challenge yang diberikan. Writing, Bussines, dan Video Challenge.
                                                                (Pengumuman dapat di check saat login di web ini).
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->

                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-success">
                                                            2 Mei 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-camera bg-purple"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header"><a href="#">Pengisian Form Challenge</a></h3>

                                                            <div class="timeline-body">
                                                                Jangan lupa untuk mengisi form sebagai laporan kamu telah menyelesaikan challenge sebelumnya.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-success">
                                                            22 Mei 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-comments bg-warning"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header"><a href="#">In Depth Interview</a></h3>

                                                            <div class="timeline-body">
                                                                Bagi yang lulus pada tahap challenge, akan lanjut ke tahap interview yang dilaksanakan secara offline.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->

                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-success">
                                                            23 Mei 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->

                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-danger">
                                                            28 Mei 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-envelope bg-green"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header"><a href="#">Pengumuman Tahap Akhir</a></h3>

                                                            <div class="timeline-body">
                                                                Setelah melewati semua tahapan seleksi, akan diumumkan hasil akhir penerima beasiswa SLP. Semoga mendapatkan hasil yang terbaik!
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-success">
                                                            5 Juni 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-envelope bg-primary"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header"><a href="#">Stadium General</a></h3>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->

                                                    <div>
                                                        <i class="far fa-clock bg-gray"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="Pertama">
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Alasan Beasiswa</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$biodata->alasanbeasiswa}}
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
                                                        {{$biodata->five_pros}}
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
                                                        {{$biodata->five_cons}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->
                                                
                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="Kedua">
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Challenge</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <label for="exampleInputEmail1">Link Video Challenge :</label>
                                                    <a type="text" href="{{$seleksiPertama->url_video}}" target="_blank">{{$seleksiPertama->url_video}}</a>
                                                    <br />
                                                    <label for="exampleInputEmail1">Link Writing Challenge :</label>
                                                    <a type="text" href="{{$seleksiPertama->url_Writing}}" target="_blank">{{$seleksiPertama->url_writing}}</a>
                                                    <br />
                                                    <label for="exampleInputEmail1">Link Bussines Challenge :</label>
                                                    <a class="btn btn-success" href="{{asset('imgPembelian')}}/{{$seleksiPertama->url_Business}}" target="_blank">foto</a>
                                                    <br />
                                                    <label for="exampleInputEmail1">User CV :</label>
                                                    <a class="btn btn-warning" href="{{asset('cvPDF')}}/{{$seleksiPertama->url_cv}}" target="_blank">Lihat</a>
                                                    <br />
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Apakah kamu pernah mengikuti kegiatan mentoring keagamaan atau halaqoh?</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->mentoring}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Jika "Ya", seberapa sering kamu mengikuti kegiatan mentoring tersebut ? </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->mentoring_rutin}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Apa yang kamu lakukan ketika sedang futur (ketika malas beribadah dan melakukan kebaikan) ?</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->futur}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Apa yang kamu pahami tentang "Faith" (Keyakinan) ?</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->faith}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Apa yang kamu pahami tentang "ethic" (etika) ?</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->ethic}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Bagaimana tanggapanmu jika melihat atau mengenal orang yang memiliki kemampuan lebih baik dibandingkan dirimu ? </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->question1}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Menurutmu apa perbedaan antara etika, moral, dan akhlak ?</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->question2}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Bagaimana caramu agar dapat konsisten beretika dan berakhlak baik ? Berikan contohnya !</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->question3}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Apa yang kamu pahami tentang "Leadership" ? </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->question4}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Pernahkan kamu aktif terlibat dalam sebuah organisasi ? </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->organisasi}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Jika "Pernah", apa peranmu dalam organisasi tersebut ? Jelaskan aktivitas organisasi tersebut !</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->aktif_organisasi}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Sebagai seorang pemimpin, apa yang kamu lakukan jika anggota kelompokmu melakukan kesalahan ? </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->question5}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Sebagai seorang anggota, apa yang kamu lakukan jika mengetahui pemimpinmu melakukan kesalahan?</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->question6}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Apa yang kamu pahami tentang "Entrepreneurship" ?Jelaskan ! </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->entrepreneurship}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Kenapa kamu ingin berwirausaha? Jelaskan alasan terbesarmu ! </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->alasan_wirausaha}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Apakah kamu pernah berdagang atau berbisnis ? (selain challenge dari SLP) </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->pernah_wirausaha}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Jika pernah berdagang atau berbisnis, jelaskan pengalamanmu ! (selain challenge dari SLP)</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->exp_wirausaha}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Berapa omset terbesar yang pernah kamu raih dalam berwirausaha ? </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->omset}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->
                                                <div class="input-group-append">
                                                    <a href="{{ route('pendaftar.seleksi1') }}" class="btn btn-primary m-2">Ubah</a>
                                                </div>                                                
                                            </div>
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
                <strong>Copyright &copy;2021 <a href="https://slpindonesia.com/home">SLP Indonesia</a>.</strong> All rights reserved.
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
