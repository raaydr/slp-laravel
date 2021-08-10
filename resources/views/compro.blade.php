<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Smart Leader Preneur </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Start Up Beasiswa" name="keywords">
  <meta content="Beasiswa pembinaan pemuda di bidang entrepreneurship, public speaking, creative writing,⁣& leadership⁣⁣⁣" name="description">

  <!-- Favicons -->
  
  <link href="{{asset('develop')}}/img/slp.png" rel="icon">
  <link href="{{asset('develop')}}/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('develop')}}/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('develop')}}/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{asset('develop')}}/lib/animate/animate.min.css" rel="stylesheet">
  <link href="{{asset('develop')}}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="{{asset('develop')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{asset('develop')}}/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('develop')}}/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <img src="{{asset('develop')}}/img/white.png" class="img-fluid" alt="Responsive image" >
        
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" class="img-fluid" alt="Responsive image"></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Pendaftaran</a></li>
          <li><a href="#portfolio">News</a></li>
          <li><a href="#blog">Blog</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="{{asset('develop')}}/img/intro-carousel/1.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Mau Jadi Pemimpin Teladan ?</h2>
                
                
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('develop')}}/img/intro-carousel/2.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Mau Jago Bicara dan Menginspirasi Banyak Orang ?</h2>
                
                
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('develop')}}/img/intro-carousel/3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Mau Jago Digital Marketing ?</h2>
                
                
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('develop')}}/img/intro-carousel/4.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Mau Jadi Penulis Terkenal ?</h2>
                
                
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('develop')}}/img/intro-carousel/5.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Mau Jadi Seorang Entrepreneur ?</h2>
                
                
              </div>
            </div>
          </div>

         

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">


    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>About Us</h3>
          <p>Smart Leader Preneur (SLP) merupakan beasiswa pembinaan pemuda di bidang entrepeneurship, digital marketing, creative writing, dan leadership yang akan didampingi mentor berpengalaman dalam menyelesaikan target challenge selama masa pembinaan.</p>
        </header>
        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" >
            <div class="about-col">
              <div class="img">
                <img src="{{asset('develop')}}/img/visi.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Visi Kami</a></h2>
              <p class="text-justify">
                <b>Terbentuknya generasi muda yang mandiri, produktif, dan berdaya guna.</b>
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
             
            </div>
          </div>
          

        </div>
        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="{{asset('develop')}}/img/misi.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Misi Kami</a></h2>
              <p class="text-justify">
                <b>Mengedukasi setiap pemuda tentang pentingnya berwirausaha agar memiliki jiwa entrepreneur sehingga tercipta generasi yang mandiri.</b>
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="{{asset('develop')}}/img/misi2.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Misi Kami</a></h2>
              <p class="text-justify">
                <b>Melakukan pendampingan dan pengarahan terkait potensi setiap pemuda terutama di bidang public speaking, kewirausahaan, dan kepenulisan.⁣</b>
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="{{asset('develop')}}/img/misi3.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Misi Kami</a></h2>
              <p class="text-justify">
                <b>Membimbing setiap pemuda untuk menghasilkan karya sesuai potensinya seperti merilis buku, melakukan roadshow training motivasi di berbagai sekolah atau instansi, dan mengikuti education trip ke luar negeri. ⁣</b>
              </p>
            </div>
          </div>

        </div>
        
        
      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Pendaftaran</h3>
          <p>Ikuti alur pendaftarannya ya teman - teman :D⁣
            ⁣
            Kamu harus akses link pendaftaran dan mengisi form pendaftaran dengan lengkap :)</p>
        </header>

        <div class="row">

          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
            <h4 class="title"><a href="">Langkah Pertama</a></h4>
            <p class="description"> Pendaftaran dan seleksi pemberkasan dimulai dari tanggal 15-25 April 2021. Akses Link pendaftaran <a href="/register" target="_blank"><b>disini</b></a>.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-body-outline"></i></div>
            <h4 class="title"><a href="">Langkah Kedua</a></h4>
            <p class="description">Bila Lolos maka akan lanjut ke Seleksi Tahap Pertama tanggal 25 April 2021. </p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-paper-outline"></i></div>
            <h4 class="title"><a href="">Langkah Ketiga </a></h4>
            <p class="description">Jangan lupa mengisi form Seleksi Tahap Pertama, batas akhir pengisian tanggal 2 Mei 2021.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-people-outline"></i></div>
            <h4 class="title"><a href="">Langkah Keempat</a></h4>
            <p class="description">Selanjutnya jika lolos akan masuk ke Seleksi Tahap Kedua yaitu in depth Interview. Pada tanggal 22-23 Mei 2021.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-heart-outline"></i></div>
            <h4 class="title"><a href="">Langkah Kelima</a></h4>
            <p class="description">Pengumuman akhir tanggal 28 Mei 2021.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-circle-outline"></i></div>
            <h4 class="title"><a href="">Langkah Terakhir</a></h4>
            <p class="description">Stadium General tanggal 5 Juni 2021.</p>
          </div>
          <div class="col-lg-2 col-md-2 box wow bounceInUp" data-wow-delay="0.6s" data-wow-duration="1.4s">
            
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.6s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-albums-outline"></i></div>
            <h4 class="title"><a href="">Persyaratan</a></h4>
            <p class="description ion-ios-albums"> <b>Muslim/Muslimah</b></p>
            <p class="description ion-ios-albums"> <b>Domisili Jabodetabek</b></p>
            <p class="description ion-ios-albums"> <b>Usia 17-22 tahun</b></p>
            <p class="description ion-ios-albums"> <b>Aktif Bersosial</b></p>
            <p class="description ion-ios-albums"> <b>Belum menikah</b></p>
            <p class="description ion-ios-albums"> <b>Bersedia mengikuti seleksi</b></p>
              
            
          </div>
          <div class="col-lg-6 col-md-6 box wow bounceInUp" data-wow-delay="0.6s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-plus-outline"></i></div>
            <h4 class="title"><a href="">Benefit</a></h4>
                <p class="description ion-ios-plus"> <b>Pembinaan selama 6 bulan</b></p>
                <p class="description ion-ios-plus"> <b>Education Trip Malaysia-Singapore</b></p>
                <p class="description ion-ios-plus"> <b>Dibimbing 11 Mentor Berpengalaman</b></p>
                <p class="description ion-ios-plus"> <b>Coaching Materi Self-Development, Creative Writing, Public Speaking, dan Digital Marketing</b></p>
                <p class="description ion-ios-plus"> <b>Pengalaman Merilis Buku</b></p>
              
            
          </div>
          
          

        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeIn">
      <div class="container text-center">
        <h3>Gabung di Smart Leader Preneur</h3>
        <p> Langsung daftar yuk!</p>
        <a class="cta-btn" href="{{ route('register') }}" target="_blank">Daftar Sekarang</a>
      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Facts Section
    ============================-->
    <section id="facts"  class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>Facts</h3>
          <p>Jumlah Pendaftar pada Beasiswa Batch Pertama</p>
        </header>

        <div class="row counters">

  				<div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1120</span>
            <p>Pendaftar</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">114</span>
            <p>Lolos seleksi</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">80</span>
            <p>Gugur</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">34</span>
            <p>Graduate</p>
  				</div>

  			</div>

        <div class="facts-img">
          <img src="{{asset('develop')}}/img/lolos.jpg" alt="" class="img-fluid">
        </div>

      </div>
    </section><!-- #facts -->

    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Our News Feed</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{asset('develop')}}/img/portfolio/agen.png" class="img-fluid" alt="">
                <a href="{{asset('develop')}}/img/portfolio/agen.png" data-lightbox="portfolio" data-title="https://www.instagram.com/p/B6ITqgHhr7S/" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Agen Perubahan </a></h4>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{asset('develop')}}/img/portfolio/creative.png" class="img-fluid" alt="">
                <a href="{{asset('develop')}}/img/portfolio/creative.png" class="link-preview" data-lightbox="portfolio" data-title="https://www.instagram.com/p/B5-MWjkBlf0/" title="Preview"><i class="ion ion-eye"></i></a>
                
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Creative Writing</a></h4>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{asset('develop')}}/img/portfolio/Leader.png" class="img-fluid" alt="">
                <a href="{{asset('develop')}}/img/portfolio/Leader.png" class="link-preview" data-lightbox="portfolio" data-title="Alasan Leadership" title="Preview"><i class="ion ion-eye"></i></a>
                
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Leadership</a></h4>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{asset('develop')}}/img/portfolio/dunia.png" class="img-fluid" alt="">
                <a href="{{asset('develop')}}/img/portfolio/dunia.png" data-lightbox="portfolio" data-title="https://www.instagram.com/p/B6ITqgHhr7S/" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Keliling Dunia </a></h4>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{asset('develop')}}/img/portfolio/mentor.png" class="img-fluid" alt="">
                <a href="{{asset('develop')}}/img/portfolio/mentor.png" class="link-preview" data-lightbox="portfolio" data-title="https://www.instagram.com/p/B5-MWjkBlf0/" title="Preview"><i class="ion ion-eye"></i></a>
                
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Mentor</a></h4>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{asset('develop')}}/img/portfolio/digital.png" class="img-fluid" alt="">
                <a href="{{asset('develop')}}/img/portfolio/digital.png" class="link-preview" data-lightbox="portfolio" data-title="Alasan Leadership" title="Preview"><i class="ion ion-eye"></i></a>
                
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Digital Marketing</a></h4>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{asset('develop')}}/img/portfolio/jiwa.png" class="img-fluid" alt="">
                <a href="{{asset('develop')}}/img/portfolio/jiwa.png" data-lightbox="portfolio" data-title="https://www.instagram.com/p/B6ITqgHhr7S/" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Jiwa Entrepreneur </a></h4>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{asset('develop')}}/img/portfolio/network.png" class="img-fluid" alt="">
                <a href="{{asset('develop')}}/img/portfolio/network.png" class="link-preview" data-lightbox="portfolio" data-title="https://www.instagram.com/p/B5-MWjkBlf0/" title="Preview"><i class="ion ion-eye"></i></a>
                
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Banyak Networking</a></h4>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{asset('develop')}}/img/portfolio/public.png" class="img-fluid" alt="">
                <a href="{{asset('develop')}}/img/portfolio/public.png" class="link-preview" data-lightbox="portfolio" data-title="Alasan Leadership" title="Preview"><i class="ion ion-eye"></i></a>
                
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Public Speaking</a></h4>
                
              </div>
            </div>
          </div>


          

      </div>
    </section><!-- #portfolio -->
    <!--==========================
      blog Section
    ============================-->
    <section id="blog"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Our Blog Feed</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
           
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
              <div class="card flex-md-row mb-4 ">
            <div class="card-body d-flex flex-column align-items-start">
              
              <h3 class="mb-0">
                <a class="text-dark" href="#">Menghilangkan Rasa Gugup</a>
              </h3>
              <div class="mb-1 text-muted">Nov 12</div>
              <p class="card-text mb-auto">Gugup yang biasa disebut juga sebagai grogi, nervous, tegang, adalah hal yang bisa dikendalikan oleh diri sendiri. </p>
              <a href="{{ route('post') }}">Continue reading</a>
                
              </figure>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
            <figure>
              <div class="card flex-md-row mb-4 ">
            <div class="card-body d-flex flex-column align-items-start">
              
              <h3 class="mb-0">
                <a class="text-dark" href="#">Featured post</a>
              </h3>
              <div class="mb-1 text-muted">Nov 12</div>
              <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="#">Continue reading</a>
                
              </figure>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
            <figure>
              <div class="card flex-md-row mb-4 ">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <a class="text-dark" href="#">Featured post</a>
              </h3>
              <div class="mb-1 text-muted">Nov 12</div>
              <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="#">Continue reading</a>
                
              </figure>
            </div>
          </div>

          


          

      </div>
    </section><!-- #blog -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Our Partners</h3>
        </header>
        <div class="container-fluid">
          <div class="row">
              <div class="col-sm">
                  <a href="#" target="_blank">
                      <img src="{{asset('develop')}}/img/Youth-Care-ID.jpg" class="img-fluid" alt="Responsive image">
                  </a>
              </div>
              <div class="col-sm">
                  <a href="#" target="_blank">
                      <img src="{{asset('develop')}}/img/shieraki.jpg" class="img-fluid" alt="Responsive image">
                  </a>
              </div>
              <div class="col-sm">
                  <a href="https://slpindonesia.com/" target="_blank">
                      <img src="{{asset('develop')}}/img/silmee.png" class="img-fluid" alt="Responsive image">
                  </a>
              </div>
          </div>
      </div>
      </div>
        <!-- #clients
        <div class="owl-carousel clients-carousel">
          <img src="img/Youth-Care-ID.jpg" class="img-fluid" alt="Responsive image">
          <img src="img/steam.jpg" class="img-fluid" alt="Responsive image">
          <img src="img/dota.ico" class="img-fluid" alt="Responsive image">
          
          <img src="img/clients/client-4.png" alt="">
          <img src="img/clients/client-5.png" alt="">
          <img src="img/clients/client-6.png" alt="">
          <img src="img/clients/client-7.png" alt="">
          <img src="img/clients/client-8.png" alt=""> 
         
        </div>-->

      </div>
    </section><!-- #clients -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="testimonials" class="section-bg wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="owl-carousel testimonials-carousel">

          <div class="testimonial-item">
            <img src="{{asset('develop')}}/img/tes1.png" class="testimonial-img" alt="">
            <h3>Hanifah Khoirunisa</h3>
            <h4>Founder komunitas @grubooks.id</h4>
            <p>
              <img src="{{asset('develop')}}/img/quote-sign-left.png" class="quote-sign-left" alt="">
              Menjadi bagian dari keluarga SLP adalah nikmat terbesar yang membuatku bisa bertemu dengan orang-orang hebat dan keren!<br>
              Selama 6 bulan ini, aku dapet banyak ilmu baru yang gk didapetin di bangku sekolah

              <img src="{{asset('develop')}}/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{asset('develop')}}/img/tes2.png" class="testimonial-img" alt="">
            <h3>Krisna Priyanto</h3>
            <h4>Founder @grubooks.id dan @ngajisantaiyuk.id</h4>
            <p>
              <img src="{{asset('develop')}}/img/quote-sign-left.png" class="quote-sign-left" alt="">
              6 bulan mengikuti SLP Alhamdulillah banget!<br>
              Nggak cuma teori, tapi langsung action buat mencapai target ditemani kakak fasil yang kece dan temen-temen yang menginsiprasi
              <img src="{{asset('develop')}}/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{asset('develop')}}/img/tes3.png" class="testimonial-img" alt="">
            <h3>Sarah Muthiah Widad</h3>
            <h4>Founder Komunitas Aksi Kebaikan #SmokeFreeCampus UIN Jakarta</h4>
            <p>
              <img src="{{asset('develop')}}/img/quote-sign-left.png" class="quote-sign-left" alt="">
              Quarter life crisis membuatku resah dan ngerasa gk punya kontribusi buat hidup.<br>
              Lalu bergabungnya aku di SLP, aku menemukan solusi besar kalau quarter life-ku bisa menjadi golden age
              <img src="{{asset('develop')}}/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{asset('develop')}}/img/tes4.png" class="testimonial-img" alt="">
            <h3>Adzkia</h3>
            <h4>Founder @mosafeer</h4>
            <p>
              <img src="{{asset('develop')}}/img/quote-sign-left.png" class="quote-sign-left" alt="">
              Kondisi pandemi membuat mayoritas pelajar tidak tahu cara mengisi waktu luang.<br>
              Namun dengan segala target dan pelatiah di SLP, Alhamdulillah menjadikanku lebih kreatif dan produktif meskipun ruang gerak terbatas
              <img src="{{asset('develop')}}/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

        </div>

      </div>
    </section><!-- #testimonials -->

    

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Alamat</h3>
              <address>Jl. Merdeka Raya No.7, RT.1/RW.7, Abadijaya, Kec. Sukmajaya, Kota Depok, Jawa Barat 16417</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="#">-</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="#">slpyouthcareid@gmail.com</a></p>
            </div>
          </div>

        </div>
      <!--  
        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>-->
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-info">
            <h3>SLP</h3>
            <p>Smart Leader Preneur adalah beasiswa pembinaan yang diberikan oleh Youthcare Indonesia bagi para pemuda yang ingin meng-upgrade dirinya untuk menjadi lebih baik. Youthcare Indonesia merupakan organisasi kepemudaan yang berdiri sejak 23 Januari 2011 yang hadir untuk membantu mengurangi degradasi moral pemuda Indonesia. Dalam rangkaian belajar di SLP, setiap awardee akan langsung dibimbing oleh mentor yang handal di bidang public speaking, entrepreneurship, dan creative writing.</p>
          </div>

          

          <div class="col-lg-6 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
            Jl. Merdeka Raya No.7, RT.1/RW.7, Abadijaya,  <br>
            Kec. Sukmajaya, Kota Depok,<br>
            Jawa Barat 16417 <br>
              <strong>Phone:</strong>-<br>
              <strong>Email:</strong> slpyouthcareid@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="https://twitter.com/SLP_Indonesia" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="https://www.facebook.com/smartleaderpreneur" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/slp.indonesia/" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="https://www.youtube.com/channel/UCuMFUy8ytO_Dlk6UkzXHOKA" class="youtube"><i class="fa fa-youtube-play"></i></a>
            </div>

          </div>

          

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; <strong>SLP 2021</strong>. 
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        -->
        
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="{{asset('develop')}}/lib/jquery/jquery.min.js"></script>
  <script src="{{asset('develop')}}/lib/jquery/jquery-migrate.min.js"></script>
  <script src="{{asset('develop')}}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('develop')}}/lib/easing/easing.min.js"></script>
  <script src="{{asset('develop')}}/lib/superfish/hoverIntent.js"></script>
  <script src="{{asset('develop')}}/lib/superfish/superfish.min.js"></script>
  <script src="{{asset('develop')}}/lib/wow/wow.min.js"></script>
  <script src="{{asset('develop')}}/lib/waypoints/waypoints.min.js"></script>
  <script src="{{asset('develop')}}/lib/counterup/counterup.min.js"></script>
  <script src="{{asset('develop')}}/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="{{asset('develop')}}/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="{{asset('develop')}}/lib/lightbox/js/lightbox.min.js"></script>
  <script src="{{asset('develop')}}/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{asset('develop')}}/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="{{asset('develop')}}/js/main.js"></script>

</body>
</html>
