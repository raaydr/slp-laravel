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
         @include('user.sidebar')
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
                           <li class="breadcrumb-item"><a href="#">Seleksi</a></li>
                           <li class="breadcrumb-item active">Tahap Pertama</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
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
                                    <li>3.	Tag akun instagram @slp.indonesia dan gunakan hashtag #SmartLeaderPreneur, #WritingChallenge, dan #(kode unik) di postingan kalian.</li>
                                    <li>Akun instagram dilarang di <b>private.</b> Agar memudahkan kami dalam proses penilaian karya tulis yang kamu buat.</li>
                                    <li>Poin penilaian dari challenge ini dinilai dari jumlah kata, keaslian karya, dan kualitas isi.</li>
                                 </ol>
                                 <a>Periode challenge ini yaitu 26-29 April 2021. Mengerjakan lebih cepat lebih baik.</a>
                                 <br>
                                 <b>Note :</b>
                                 <ol>
                                    <li><b>Jika challenge ini belum selesai pada rentang waktu yang sudah ditentukan, maka otomatis gugur dalam seleksi.</b></li>
                                    <li><b>Kode Unik bisa di cek di profil pendaftaran.</b></li>
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
                                    <li>5.	Tag akun instagram @slp.indonesia dan gunakan hashtag #SmartLeaderPreneur, #VideoChallenge, dan #(kode unik) di postingan kalian.</li>
                                    <li>Poin penilaian dari challenge ini dinilai dari isi, kekreativitasan, dan penyampaian konten.</li>
                                 </ol>
                                 <a>Periode challenge ini yaitu mulai tanggal 26 – 30 April 2021. </a>
                                 <br>
                                 <b>Note :</b>
                                 <ol>
                                    <li><b>Jika challenge ini belum selesai pada rentang waktu yang sudah ditentukan, maka otomatis gugur dalam seleksi.</b></li>
                                    <li><b>Kode Unik bisa di cek di profil pendaftaran.</b></li>
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
                                       <li>Susco bite ini adalah kue sus kering isi coklat, vanilla, dan strawberry yang rasanya enak dan nagih banget.</li>
                                       <li>Harga dari SLP Rp 20.000</li>
                                       <li>Harga jual Rp 25.000 </li>
                                    </ul>
                                    <li>Pempek Asli Jambi.</li>
                                    <ul>
                                       <li>1kg	    : Harga dari SLP Rp 65.000 -> Harga Jual Rp 75.000 – Rp 85.000</li>
                                       <li>½kg     : Harga dari SLP Rp 35.000 -> Harga Jual Rp 40.000 – Rp 50.000</li>
                                       <li>KSB	    : Harga dari SLP Rp 60.000 -> Harga Jual Rp 65.000 – Rp 75.000</li>
                                       <li>Tekwan  : Harga dari SLP Rp 65.000 -> Harga Jual Rp 75.000 – Rp 85.000</li>
                                    </ul>
                                    <li>Buku SHINEBRIDE</li>
                                    <ul>
                                       <li>Berat : 1kg/2 buah buku</li>
                                       <li>Harga dari SLP Rp 60.000</li>
                                       <li>Harga jual Rp 75.000 – Rp 90.000</li>
                                    </ul>
                                 </ol>
                                 <a>▶ Sistem pemesanan </a>
                                 <br>
                                 <ol>
                                    <li>Teman-teman pesan produk dengan menghubungi admin SLP via link berikut : </li>
                                    <ul>
                                       <li>Pemesanan SUSCO  <a href="http://bit.ly/PesenSUSCOdong">di sini</a></li>
                                       <li>Pemesanan Pempek Asli Jambi   <a href="http://bit.ly/PesenPEMPEK">di sini</a></li>
                                       <li>Pemesanan Buku SHINEBRIDE   <a href="http://bit.ly/PesenSHINEBRIDE">di sini</a></li>
                                    </ul>
                                    <li>Pembayaran dilakukan dengan cara transfer ke rekening <b>BNI Syariah, 0691552012 an. Aprillia Lusiana</b> dan tidak menerima <b>CASH</b>.
                                       <br>
                                       *Gunakan aplikasi flip.id bila beda bank.
                                    </li>
                                    <li>Melakukan pembayaran sesuai dengan panduan admin. Menyertakan <b>KODE UNIK</b> di tiga angka terakhir jumlah transfer.</li>
                                    <ul>
                                       <li>Contoh Kasus 1 : Ari dengan kode unik 48. Ari membeli 10 buah SUSCO dengan akses pengiriman Jabodetabek (Rp 9.000,00/kg). Maka Ari wajib membayar pesanannya senilai Rp 209.048,00.</li>
                                       <li>•	Contoh Kasus 2 : Hani bernomor absen 76. Hani membeli 10kg pempek (1kg) dengan akses pengiriman Jabodetabek (Medium - Rp 20.000,00/5kg). Maka Hani wajib membayar pesanannya senilai Rp .670.076,00.</li>
                                    </ul>
                                    <li>Setelah melakukan pembayaran, admin akan merekap dan tim akan membantu mengirimkan pesanannya.</li>
                                 </ol>
                                 <a>▶ Rules of Business Challenge: </a>
                                 <ol>
                                    <li>Mencapai target OMZET <b>PEMBELIAN</b> senilai <b>LIMA RATUS RIBU RUPIAH</b> Contoh target keberhasilan Bussiness Challenge : </li>
                                    <ul>
                                       <li>Berhasil meraih pemesanan SUSCO sebanyak 25pcs, atau</li>
                                       <li>Berhasil meraih pemesanan Pempek (1kg) sebanyak 8pcs , atau</li>
                                       <li>Berhasil meraih pemesanan Pempek (½kg) sebanyak 15pcs, atau</li>
                                       <li>Berhasil meraih pemesanan Pempek (KSB) sebanyak 9pcs, atau</li>
                                       <li>Berhasil meraih pemesanan Tekwan sebanyak 8pcs, atau</li>
                                       <li>Berhasil meraih pemesanan Buku SHINEBRIDE sebanyak 9pcs, atau</li>
                                       <li>Berhasil meraih pemesanan produk random dengan omzet pembelian senilai Lima Ratus Ribu Rupiah. </li>
                                    </ul>
                                    <li>Peserta wajib klik link pemesanan yang telah disediakan untuk melakukan pemesanan dan mengisi lengkap format yang telah disiapkan. </li>
                                    <li>Sistem pembayaran hanya melalui transfer yang terpusat pada satu rekening, yaitu rekening 
                                       <br>
                                       <b>BNI Syariah, 0691552012 an. Aprillia Lusiana</b>
                                    </li>
                                    <li>Marketing Tools berupa poster penjualan telah di lampirkan oleh TIM Smart Leader Preneur, silakan kalian edit info pemesanan dengan nomor WA aktif kalian masing-masing menggunakan aplikasi edit foto/gambar di smartphone dan buat copywriting/broadcast penjualan sekreatif mungkin. </li>
                                    <li>Seluruh keuntungan yang kalian dapatkan dari hasil penjualan bisa kalian nikmati sepenuhnya. Seluruh keuntungan yang didapatkan oleh TIM Smart Leader Preneur akan dialokasikan untuk kebutuhan administrasi program beasiswa selama 6 bulan dan di sedekahkan kepada Rumah Qur’an Youthcare. </li>
                                 </ol>
                                 <a>Periode challenge ini yaitu mulai tanggal 26 April – 5 Mei 2021. </a>
                                 <br>
                                 <b>Note :</b>
                                 <ol>
                                    <li><b>Jika challenge ini belum selesai pada rentang waktu yang sudah ditentukan, maka otomatis gugur dalam seleksi.</b></li>
                                    <li><b>Kode Unik bisa di cek di profil pendaftaran.</b></li>
                                    <li>Budayakan BACA sebelum BERTANYA.</li>
                                 </ol>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- left column -->
                  @if(session('pesan'))
                  <div class="alert alert-success alert-dismissable">
                     <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h4><i class="icon fa fa-check"></i>Success</h4>
                     {{session('pesan')}}.
                  </div>
                  @endif
                  <div class="col-md-12">
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
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                    contoh : https://www.youtube.com/watch?v=dQw4w9WgXcQ
                                    </small>
                                    @if ($errors->has('url_video'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('url_video') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="url_writing" class="col-md-4 col-form-label text-md-right">{{ __('Link Writing Challenge') }}</label>
                                 <div class="col-md-6">
                                    <input id="url_writing" type="text" class="form-control" name="url_writing" value="{{ old('url_writing') }}" required autofocus>
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                    contoh : https://www.instagram.com/p/CN8v_Wesjud/
                                    </small> 
                                    @if ($errors->has('url_writing'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('url_writing') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="url_Business" class="col-md-4 col-form-label text-md-right">{{ __('Upload Bukti Transfer Pembelian ') }}</label>
                                 <div class="col-md-7">
                                    <input id="url_Business" type="file" class="form-control{{ $errors->has('url_Business') ? ' is-invalid' : '' }}" name="url_Business" value="{{ old('url_Business') }}" required autofocus>
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                    Format harus jpg,png,jpeg,pdf dan ukuran maksimal 2 mb
                                    </small> 
                                    @if ($errors->has('url_Business'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('url_Business') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="url_cv" class="col-md-4 col-form-label text-md-right">{{ __('Upload CV') }}</label>
                                 <div class="col-md-7">
                                    <input id="url_cv" type="file" class="form-control{{ $errors->has('url_cv') ? ' is-invalid' : '' }}" name="url_cv" value="{{ old('url_cv') }}" required autofocus>
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                    Format harus pdf dan ukuran maksimal 10mb
                                    </small> 
                                    @if ($errors->has('url_cv'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('url_cv') }}</strong>
                                    </span>
                                    @endif
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
                                 @if ($errors->has('mentoring_rutin'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('mentoring_rutin') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="futur" class="col-md-4 col-form-label text-md-right">{{ __('Apa yang kamu lakukan ketika sedang futur (ketika malas beribadah dan melakukan kebaikan) ? ') }}</label>
                              <div class="col-md-6">
                                 <textarea id="futur" type="text" class="form-control{{ $errors->has('futur') ? ' is-invalid' : '' }}" name="futur" value="{{ old('futur') }}" rows="3" required autofocus></textarea>
                                 @if ($errors->has('futur'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('futur') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="faith" class="col-md-4 col-form-label text-md-right">{{ __('Apa yang kamu pahami tentang "Faith" (Keyakinan) ? ') }}</label>
                              <div class="col-md-6">
                                 <textarea id="faith" type="text" class="form-control{{ $errors->has('faith') ? ' is-invalid' : '' }}" name="faith" value="{{ old('faith') }}" rows="3" required autofocus></textarea>
                                 @if ($errors->has('faith'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('faith') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="ethic" class="col-md-4 col-form-label text-md-right">{{ __('Apa yang kamu pahami tentang "Ethic" (Etika) ?') }}</label>
                              <div class="col-md-6">
                                 <textarea id="ethic" type="text" class="form-control{{ $errors->has('ethic') ? ' is-invalid' : '' }}" name="ethic" value="{{ old('ethic') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('ethic'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('ethic') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="question1" class="col-md-4 col-form-label text-md-right">{{ __('Bagaimana tanggapanmu jika melihat atau mengenal orang yang memiliki kemampuan lebih baik dibandingkan dirimu ?') }}</label>
                              <div class="col-md-6">
                                 <textarea id="question1" type="text" class="form-control{{ $errors->has('question1') ? ' is-invalid' : '' }}" name="question1" value="{{ old('question1') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('question1'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('question1') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="question2" class="col-md-4 col-form-label text-md-right">{{ __('Menurutmu apa perbedaan antara etika, moral, dan akhlak ?') }}</label>
                              <div class="col-md-6">
                                 <textarea id="question2" type="text" class="form-control{{ $errors->has('question2') ? ' is-invalid' : '' }}" name="question2" value="{{ old('question2') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('question2'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('question2') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="question3" class="col-md-4 col-form-label text-md-right">{{ __('Bagaimana caramu agar dapat konsisten beretika dan berakhlak baik ? Berikan contohnya ! ') }}</label>
                              <div class="col-md-6">
                                 <textarea id="question3" type="text" class="form-control{{ $errors->has('question3') ? ' is-invalid' : '' }}" name="question3" value="{{ old('question3') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('question3'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('question3') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="question4" class="col-md-4 col-form-label text-md-right">{{ __('Apa yang kamu pahami tentang "Leadership"  ') }}</label>
                              <div class="col-md-6">
                                 <textarea id="question4" type="text" class="form-control{{ $errors->has('question4') ? ' is-invalid' : '' }}" name="question4" value="{{ old('question4') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('question4'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('question4') }}</strong>
                                 </span>
                                 @endif
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
                                 @if ($errors->has('aktif_organisasi'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('aktif_organisasi') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="question5" class="col-md-4 col-form-label text-md-right">{{ __('Sebagai seorang pemimpin, apa yang kamu lakukan jika anggota kelompokmu melakukan kesalahan ?') }}</label>
                              <div class="col-md-6">
                                 <textarea id="question5" type="text" class="form-control{{ $errors->has('question5') ? ' is-invalid' : '' }}" name="question5" value="{{ old('question5') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('question5'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('question5') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="question6" class="col-md-4 col-form-label text-md-right">{{ __('Sebagai seorang anggota, apa yang kamu lakukan jika mengetahui pemimpinmu melakukan kesalahan ?') }}</label>
                              <div class="col-md-6">
                                 <textarea id="question6" type="text" class="form-control{{ $errors->has('question6') ? ' is-invalid' : '' }}" name="question6" value="{{ old('question6') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('question6'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('question6') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="entrepreneurship" class="col-md-4 col-form-label text-md-right">{{ __('Apa yang kamu pahami tentang "Entrepreneurship" ?Jelaskan !') }}</label>
                              <div class="col-md-6">
                                 <textarea id="entrepreneurship" type="text" class="form-control{{ $errors->has('entrepreneurship') ? ' is-invalid' : '' }}" name="entrepreneurship" value="{{ old('entrepreneurship') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('entrepreneurship'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('entrepreneurship') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="alasan_wirausaha" class="col-md-4 col-form-label text-md-right">{{ __('Kenapa kamu ingin berwirausaha? Jelaskan alasan terbesarmu ! ') }}</label>
                              <div class="col-md-6">
                                 <textarea id="alasan_wirausaha" type="text" class="form-control{{ $errors->has('alasan_wirausaha') ? ' is-invalid' : '' }}" name="alasan_wirausaha" value="{{ old('alasan_wirausaha') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('alasan_wirausaha'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('alasan_wirausaha') }}</strong>
                                 </span>
                                 @endif
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
                                 @if ($errors->has('exp_wirausaha'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('exp_wirausaha') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="omset" class="col-md-4 col-form-label text-md-right">{{ __('Berapa omset terbesar yang pernah kamu raih dalam berwirausaha ?') }}</label>
                              <div class="col-md-6">
                                 <textarea id="omset" type="text" class="form-control{{ $errors->has('omset') ? ' is-invalid' : '' }}" name="omset" value="{{ old('omset') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('omset'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('omset') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                     <!-- /.card-body -->
                     @if ($seleksi_pertama == 1)
                     <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        
                        </div> 
                     </div>
                     @endif
                     </form>
                  </div>
                  <!-- /.card -->
               </div>
               <!-- /.container-fluid -->
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
