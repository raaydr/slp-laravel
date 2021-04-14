<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Smart Leader Preneur </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Start Up Beasiswa" name="keywords">
  <meta content="Beasiswa pembinaan pemuda di bidang entrepreneurship, public speaking, creative writing,⁣& leadership⁣⁣⁣" name="description">

  <!-- Favicons -->
  
  <link href="{{asset('develop/img/a.png')}}" rel="icon">
  <link href="{{asset('develop/img/logo.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('develop/lib/bootstrap/css/bootstrap.min.css')}}" rel="apple-touch-icon" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('develop/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('develop/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('develop/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('develop/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('develop/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('develop/css/style.css')}}" rel="stylesheet">

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
        <img src="{{asset('develop/img/white.png')}}" class="img-fluid" alt="Responsive image" >
        
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" class="img-fluid" alt="Responsive image"></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Pendaftaran</a></li>
          <li><a href="#portfolio">News</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#contact">Contact</a></li>
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
            <div class="carousel-background"><img src="{{asset('develop/img/intro-carousel/1.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Mau Jadi Pemimpin Teladan ?</h2>
                <p>Pemimpin adalah orang yang paling di depan serta memiliki pengikut dibelakangnya</p>
                <a href="#featured-services" class="btn-get-started scrollto">kuy saja !!!</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('develop/img/intro-carousel/2.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Mau Jago Bicara dan Menginspirasi Banyak Orang ?</h2>
                <p>Ampun bang jago tapi gk asal bicara dan cuma marah-marah</p>
                <a href="#featured-services" class="btn-get-started scrollto">Jangan diam, join sini</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('develop/img/intro-carousel/3.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Mau Jago Digital Marketing ?</h2>
                <p>Maksudnya pedagang online, bukan jadi Digimon</p>
                <a href="#featured-services" class="btn-get-started scrollto">Pengen ikut dund</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('develop/img/intro-carousel/4.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Mau Jadi Penulis Terkenal ?</h2>
                <p>Menjadi penulis terkenal akan membuat tulisan yang anda buat walaupun cuma 1 kata orang-orang akan tahu bahwa itu ditulis oleh tangan anda</p>
                <a href="#featured-services" class="btn-get-started scrollto">Mau dong tulisannya</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('develop/img/intro-carousel/5.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Mau Jadi Entrepreneur ?</h2>
                <p>Menurut Thomberry (2006), penciptaan bisnis baru oleh seseorang yang memiliki ketidakpastian dan resiko sebagai tujuan mendapatkan keuntungan dan pertumbuhan dengan mencari peluang lalu mengumpulkan sumberdaya sebagai modal utama</p>
                <a href="#featured-services" class="btn-get-started scrollto">Kagak ngerti yang penting pengen belajar</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('develop/img/LC.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Mau Punya Mentor yang Jago?</h2>
                <p>Bisa ngajarin cara yang benar memakai LC</p>
                <a href="#featured-services" class="btn-get-started scrollto">Kalau diajarin jangan Ngambek</a>
              </div>
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
      Featured Services Section
    ============================-->
    <section id="featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 box">
            <i class="ion-ios-bookmarks-outline"></i>
            <h4 class="title"><a href="">Smart</a></h4>
            <p class="description">Smart adalah pintar</p>
          </div>

          <div class="col-lg-4 box">
            <i class="ion-ios-heart-outline"></i>
            <h4 class="title"><a href="">Leader</a></h4>
            <p class="description">Leader adalah pemimpin</p>
          </div>

          <div class="col-lg-4 box box-bg">
            <i class="ion-ios-stopwatch-outline"></i>
            <h4 class="title"><a href="">Preneur</a></h4>
            <p class="description">Preneur adalah pengusaha kan ya ?</p>
          </div>

          
        </div>
        <h2 class="text-center">Terserah bagian ini hapus aja kali ya ? atau ada ide lain</h2>
      </div>
    </section><!-- #featured-services -->

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
              <div class="img">
                <img src="{{asset('develop/img/yk.jpg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Misi Kami</a></h2>
              <p>
                Mengedukasi setiap pemuda tentang pentingnya berwirausaha agar memiliki jiwa entrepreneur sehingga tercipta generasi yang mandiri.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="{{asset('develop/img/yk2.jpg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Misi Bang</a></h2>
              <p>
                Melakukan pendampingan dan pengarahan terkait potensi setiap pemuda terutama di bidang public speaking, kewirausahaan, dan kepenulisan.⁣
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="{{asset('develop/img/yk3.jpg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Misi Kami</a></h2>
              <p>
                Membimbing setiap pemuda untuk menghasilkan karya sesuai potensinya seperti merilis buku, melakukan roadshow training motivasi di berbagai sekolah atau instansi, dan mengikuti education trip ke luar negeri. ⁣
              </p>
            </div>
          </div>

        </div>
        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="{{asset('develop/img/about-vision.jpg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Visi Kami</a></h2>
              <p>
                Terbentuknya generasi muda yang mandiri, produktif, dan berdaya guna.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
             
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
            Kamu harus akses link pendaftaran, dan mengisi form pendaftaran dengan lengkap :)</p>
        </header>

        <div class="row">

          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
            <h4 class="title"><a href="">Langkah Pertama</a></h4>
            <p class="description">Akses Link pendaftaran di lms.slpindonesia.com</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-paper-outline"></i></div>
            <h4 class="title"><a href="">Langkah Kedua</a></h4>
            <p class="description">Pastikan mengisi seluruh data pendaftaran dengan benar</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-people-outline"></i></div>
            <h4 class="title"><a href="">Langkah Ketiga </a></h4>
            <p class="description">Gabung di Learning Management System kita</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-body-outline"></i></div>
            <h4 class="title"><a href="">Langkah Keempat</a></h4>
            <p class="description">Ikuti proses seleksi dengan baik dan benar</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-heart-outline"></i></div>
            <h4 class="title"><a href="">Langkah Kelima</a></h4>
            <p class="description">Berdoa bukan berdota</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-circle-outline"></i></div>
            <h4 class="title"><a href="">Langkah Terakhir</a></h4>
            <p class="description">Check tanggal, udah dalam masa pendaftaran apa belum.</p>
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
        <p> Langsung join di grup kita.</p>
        <a class="cta-btn" href="https://lms.slpindonesia.com/">Meluncur Gan !!!</a>
      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Skills Section
    ============================-->
    <section id="skills">
      <div class="container">

        <header class="section-header">
          <h3>Skills</h3>
          <p>Skill yang bakalan didapat.</p>
        </header>

        <div class="skills-content">

          <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Leadership<i class="val">99%</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Entrepreneur <i class="val">99%</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Public Speaking <i class="val">99%</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Creative Writing <i class="val">99%</i></span>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!--==========================
      Facts Section
    ============================-->
    <section id="facts"  class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>Facts</h3>
          <p>Jumlah yang daftar kemarin</p>
        </header>

        <div class="row counters">

  				<div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1000</span>
            <p>Pendaftar</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">500</span>
            <p>Lolos seleksi</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">250</span>
            <p>Gugur</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">250</span>
            <p>Graduate</p>
  				</div>

  			</div>

        <div class="facts-img">
          <img src="{{asset('develop/img/lolos.jpg')}}" alt="" class="img-fluid">
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
              <li data-filter=".filter-app">Instagram</li>
              <li data-filter=".filter-card">Twitter</li>
              <li data-filter=".filter-web">LMS</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{asset('develop/img/portfolio/agen.png')}}" class="img-fluid" alt="">
                <a href="{{asset('develop/img/portfolio/agen.png')}}" data-lightbox="portfolio" data-title="https://www.instagram.com/p/B6ITqgHhr7S/" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="https://www.instagram.com/p/B6ITqgHhr7S/" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Agen Perubahan </a></h4>
                <p>Instagram</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{asset('develop/img/portfolio/creative.png')}}" class="img-fluid" alt="">
                <a href="{{asset('develop/img/portfolio/creative.png')}}" class="link-preview" data-lightbox="portfolio" data-title="https://www.instagram.com/p/B5-MWjkBlf0/" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="https://www.instagram.com/p/B5-MWjkBlf0/" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Creative Writing</a></h4>
                <p>Instagram</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{asset('develop/img/portfolio/Leader.png')}}" class="img-fluid" alt="">
                <a href="{{asset('develop/img/portfolio/Leader.png')}}" class="link-preview" data-lightbox="portfolio" data-title="Alasan Leadership" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="https://www.instagram.com/p/B52r2TOhRZe/" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Leadership</a></h4>
                <p>Instagram</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{asset('develop/img/portfolio/bagja.jpg')}}" class="img-fluid" alt="">
                <a href="{{asset('develop/img/portfolio/bagja.jpg')}}" class="link-preview" data-lightbox="portfolio" data-title="Nonton kuy" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="https://twitter.com/SLP_Indonesia/status/1307642383635369984/photo/1" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Muda Berdaya</a></h4>
                <p>Twitter</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="{{asset('develop/img/portfolio/lms.png')}}" class="img-fluid" alt="">
                <a href="{{asset('develop/img/portfolio/lms.png')}}" class="link-preview" data-lightbox="portfolio" data-title="LMS" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="https://lms.slpindonesia.com/" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Belom Jadi</a></h4>
                <p>LMS</p>
              </div>
            </div>
          </div>

          

      </div>
    </section><!-- #portfolio -->

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
                  <a href="https://www.dotabuff.com/players/354766304" target="_blank">
                      <img src="{{asset('develop/img/dota.ico')}}" class="img-fluid" alt="Responsive image">
                  </a>
              </div>
              <div class="col-sm">
                  <a href="#" target="_blank">
                      <img src="{{asset('develop/img/Youth-Care-ID.jpg')}}" class="img-fluid" alt="Responsive image">
                  </a>
              </div>
              <div class="col-sm">
                  <a href="#" target="_blank">
                      <img src="{{asset('develop/img/steam.jpg')}}" class="img-fluid" alt="Responsive image">
                  </a>
              </div>
              <div class="col-sm">
                  <a href="https://slpindonesia.com/" target="_blank">
                      <img src="{{asset('develop/img/logo.png')}}" class="img-fluid" alt="Responsive image">
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
            <img src="{{asset('develop/img/farly.png')}}" class="testimonial-img" alt="">
            <h3>Farly</h3>
            <h4>Sudah Lulus</h4>
            <p>
              <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
              Hindarkan diri dari berpangku tangan dan merasa nyaman. Perbanyak amalan daripada ucapan.
              <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{asset('develop/img/azkia.png')}}" class="testimonial-img" alt="">
            <h3>Adzkia</h3>
            <h4>Pelaut</h4>
            <p>
              <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
              Pelaut hebat tidak pernah lahir di laut yang santuy.
              <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{asset('develop/img/salsa.png')}}" class="testimonial-img" alt="">
            <h3>Salsa</h3>
            <h4>Penemu @infokajiandepok</h4>
            <p>
              <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
              Peradaban yang hancur tidak lahir dari generasi yang tidak rebahan, namun lahir dari mereka yang tidak sadar tentang sebuah peran. 
              <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          

        </div>

      </div>
    </section><!-- #testimonials -->

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Team</h3>
          <p>Kgk tau isinya apaan jadi nanti tolong kasih tau siapa aja</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="{{asset('develop/img/adhe.JPG')}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Adhe Kalem Gaming</h4>
                  <span>Chief Executive Officer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="{{asset('develop/img/farly2.JPG')}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Farly</h4>
                  <span>Beneran udah lulus</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="{{asset('develop/img/akhwat.JPG')}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Akhwat</h4>
                  <span>Team Akhwat</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="{{asset('develop/img/full.JPG')}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Semua</h4>
                  <span>Member</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contact Us</h3>
          <p>Maaf Kalau ada kesalahan ini masih nyoba2 cuma buat hiburan, karena klo gk dibuat hiburan males ngerjainnya</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Alamat</h3>
              <address>Emang ada kantornya ?</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="#">+62 812-2015-8656</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="#">slpindonesia@gmail.com</a></p>
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
            <p>Beasiswa pembinaan pemuda di bidang entrepreneurship, public speaking, creative writing,⁣⁣ & leadership⁣⁣⁣.</p>
          </div>

          

          <div class="col-lg-6 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Kantornya <br>
              Belum<br>
              ada <br>
              <strong>Phone:</strong> +62 812-2015-8656<br>
              <strong>Email:</strong> slpindonesia@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="https://twitter.com/SLP_Indonesia" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="https://www.facebook.com/smartleaderpreneur" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/slp.indonesia/" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="https://www.youtube.com/channel/UCuMFUy8ytO_Dlk6UkzXHOKA" class="youtube"><i class="fa fa-youtube-play"></i></a>
              <a href="https://www.tiktok.com/" class="tiktok"><i class="fa fa-film"></i></a>
            </div>

          </div>

          

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Coba</strong>. 
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
  <script src="{{asset('develop/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('develop/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('develop/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('develop/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('develop/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{asset('develop/lib/superfish/superfish.min.js')}}"></script>
  <script src="{{asset('develop/lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('develop/lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('develop/lib/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('develop/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('develop/lib/isotope/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('develop/lib/lightbox/js/lightbox.min.js')}}"></script>
  <script src="{{asset('develop/lib/touchSwipe/jquery.touchSwipe.min.js')}}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{asset('develop/contactform/contactform.js')}}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{asset('develop/js/main.js')}}"></script>

</body>
</html>
