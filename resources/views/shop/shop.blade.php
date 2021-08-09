<!doctype html>
<html lang="en">

<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>SLP Indoensia - Shop</title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('shop')}}/assets/images/slp.png" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('shop')}}/assets/css/bootstrap.min.css">
    
    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{asset('shop')}}/assets/css/animate.css">
    
    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{asset('shop')}}/assets/css/magnific-popup.css">
    
    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{asset('shop')}}/assets/css/slick.css">
    
    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{asset('shop')}}/assets/css/LineIcons.css">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{asset('shop')}}/assets/css/default.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('shop')}}/assets/css/style.css">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{asset('shop')}}/assets/css/responsive.css">
  
  
</head>

<body>
   
    <!--====== PRELOADER PART START ======-->
    
    <div class="preloader">
        <div class="spin">
            <div class="cube1"></div>
            <div class="cube2"></div>
        </div>
    </div>
    
    <!--====== PRELOADER PART START ======-->
    
    <!--====== HEADER PART START ======-->
    
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{asset('shop')}}/assets/images/logo.png" alt="Logo" width="100">
                        </a> <!-- Logo -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="bar-icon"></span>
                            <span class="bar-icon"></span>
                            <span class="bar-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a data-scroll-nav="0" href="#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="{{ route('shinebride') }}">Shine Bride</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="{{ route('susco') }}">Susco</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="{{ route('pempek') }}">Pempek</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="{{ route('canva') }}">Canva</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="#toko">Toko</a>
                                </li>
                            </ul> <!-- navbar nav -->
                        </div>
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    
    <!--====== HEADER PART ENDS ======-->
   
    <!--====== SLIDER PART START ======-->
    
    <section id="home" class="slider-area pt-100">
        <div class="container-fluid position-relative">
            <div class="slider-active">
                <div class="single-slider">
                    <div class="slider-bg">
                        <div class="row no-gutters align-items-center ">
                            <div class="col-lg-4 col-md-5">
                                <div class="slider-product-image d-none d-md-block">
                                    <img src="{{asset('shop')}}/assets/images/slider/2.jpg" alt="Slider">
                                    <div class="slider-discount-tag">
                                        <p>asli jambi 100%</p>
                                    </div>
                                </div> <!-- slider product image -->
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="slider-product-content">
                                    <h1 class="slider-title mb-10" data-animation="fadeInUp" data-delay="0.3s"><span>Pempek</span> <span>Asli</span> <span>Jambi</span></h1>
                                    <p class="mb-25" data-animation="fadeInUp" data-delay="0.9s">One day however a small line of blind text by the name of Lorem Ipsum <br> decided to leave for the far World of Grammar.</p>
                                    <a class="main-btn text-white" href="{{ route('pempek') }}" data-animation="fadeInUp" data-delay="1.5s">Explore More <i class="lni-chevron-right"></i></a>
                                </div> <!-- slider product content -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                </div> <!-- single slider -->

                <div class="single-slider">
                        <div class="slider-bg">
                            <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-md-5">
                                    <div class="slider-product-image d-none d-md-block">
                                        <img src="{{asset('shop')}}/assets/images/slider/susco.jpeg" alt="Slider">
                                        
                                    </div> <!-- slider product image
                                    
                                    <div class="slider-discount-tag">
                                            <p>-20% <br> OFF</p>
                                        </div>
                                    -->
                                </div>
                                <div class="col-lg-8 col-md-7">
                                    <div class="slider-product-content">
                                        <h1 class="slider-title mb-10" data-animation="fadeInUp" data-delay="0.3s"><span>Susco</span></h1>
                                        <p class="mb-25" data-animation="fadeInUp" data-delay="0.9s">One day however a small line of blind text by the name of Lorem Ipsum <br> decided to leave for the far World of Grammar.</p>
                                        <a class="main-btn text-white" href="{{ route('susco') }}" data-animation="fadeInUp" data-delay="1.5s">Explore More <i class="lni-chevron-right"></i></a>
                                    </div> <!-- slider product content -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                </div> <!-- single slider -->

                <div class="single-slider">
                        <div class="slider-bg">
                            <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-md-5">
                                    <div class="slider-product-image d-none d-md-block">
                                        <img src="{{asset('shop')}}/assets/images/slider/bride.jpeg" alt="Slider">
                                    </div> <!-- slider product image -->
                                </div>
                                <div class="col-lg-8 col-md-7">
                                    <div class="slider-product-content">
                                        <h1 class="slider-title mb-10" data-animation="fadeInUp" data-delay="0.3s"><span>Shine</span> <span>Bride</span></h1>
                                        <p class="mb-25" data-animation="fadeInUp" data-delay="0.9s">One day however a small line of blind text by the name of Lorem Ipsum <br> decided to leave for the far World of Grammar.</p>
                                        <a class="main-btn text-white" href="{{ route('shinebride') }}" data-animation="fadeInUp" data-delay="1.5s" >Explore More <i class="lni-chevron-right"></i></a>
                                    </div> <!-- slider product content -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                </div> <!-- single slider -->
                <div class="single-slider">
                        <div class="slider-bg">
                            <div class="row no-gutters align-items-center">
                                <div class="col-lg-4 col-md-5 mt-5">
                                    <div class="slider-product-image d-none d-md-block">
                                        <img src="{{asset('shop')}}/assets/images/slider/1.png" alt="Slider">
                                        <div class="slider-discount-tag">
                                        <p>Seumur Hidup</p>
                                    </div>
                                    </div> <!-- slider product image -->
                                </div>
                                <div class="col-lg-8 col-md-7">
                                    <div class="slider-product-content">
                                        <h1 class="slider-title mb-10" data-animation="fadeInUp" data-delay="0.3s"><span>Canva</span></h1>
                                        <p class="mb-25" data-animation="fadeInUp" data-delay="0.9s">Kapan Lagi bisa beli Canva Seumur Hidup<br> decided to leave for the far World of Grammar.</p>
                                        <a class="main-btn text-white" href="{{ route('canva') }}" data-animation="fadeInUp" data-delay="1.5s">Explore More<i class="lni-chevron-right"></i></a>
                                    </div> <!-- slider product content -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                </div> <!-- single slider -->
            </div> <!-- slider active -->
        </div> <!-- container fluid -->
    </section>
    
    <!--====== SLIDER PART ENDS ======-->

    <!--====== TEAM PART START ======-->
    
    <section id="toko" class="team-area pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-25">
                        <h3 class="title mb-15">Check Toko Kita Juga dibawah</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm od tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <a href="https://www.youtube.com/watch?v=1v7WXxLWSrk&list=RDGMEMYH9CUrFO7CfLJpaD7UR85w&index=15" target="_blank">
                    <div class="single-temp text-center mt-30">
                        <div class="team-image">
                            <img src="{{asset('shop')}}/assets/images/toko/1.jpg"
                             alt="Team"width="150">
                        </div>
                        <div class="team-content mt-30">
                            <h4 class="title mb-10"><a href="#">Celina Gomez</a></h4>
                            <span>Nama TOKO</span>
                            
                        </div>
                    </div> <!-- single temp -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <a href="https://www.youtube.com/watch?v=1v7WXxLWSrk&list=RDGMEMYH9CUrFO7CfLJpaD7UR85w&index=15" target="_blank">
                    <div class="single-temp text-center mt-30">
                        <div class="team-image">
                            <img src="{{asset('shop')}}/assets/images/toko/2.png"
                             alt="Team" width="100">
                        </div>
                        <div class="team-content mt-30">
                            <h4 class="title mb-10"><a href="#">Patric Green</a></h4>
                            <span>Nama TOKO</span>
                            
                        </div>
                    </div> <!-- single temp -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <a href="https://www.youtube.com/watch?v=1v7WXxLWSrk&list=RDGMEMYH9CUrFO7CfLJpaD7UR85w&index=15" target="_blank">
                    <div class="single-temp text-center mt-30">
                        <div class="team-image">
                            <img src="{{asset('shop')}}/assets/images/toko/3.jpg"
                             alt="Team"width="100">
                        </div>
                        <div class="team-content mt-30">
                            <h4 class="title mb-10"><a href="#">Mark Parker</a></h4>
                            <span>Nama TOKO</span>
                            
                        </div>
                    </div> <!-- single temp -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <a href="https://www.youtube.com/watch?v=1v7WXxLWSrk&list=RDGMEMYH9CUrFO7CfLJpaD7UR85w&index=15" target="_blank">
                        <div class="single-temp text-center mt-30">
                            <div class="team-image">
                                <img src="{{asset('shop')}}/assets/images/toko/1.jpg"
                                 alt="Team"width="150">
                            </div>
                            <div class="team-content mt-30">
                                <h4 class="title mb-10"><a href="#">Daryl Dixon</a></h4>
                                <span>Nama TOKO</span>
                                
                            </div>
                        </div> <!-- single temp -->
                    </a>
                    
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== TEAM PART ENDS ======-->


    
    <section id="footer" class="footer-area">
        <div class="container">
            <div class="footer-widget pt-75 pb-120">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="footer-logo mt-40">
                            <a href="#">
                                <img src="{{asset('shop')}}/assets/images/logo.png" alt="Logo">
                            </a>
                            <p class="mt-10">Smart Leader Preneur adalah beasiswa pembinaan yang diberikan oleh Youthcare Indonesia bagi para pemuda yang ingin meng-upgrade dirinya untuk menjadi lebih baik.</p>
                            <ul class="footer-social mt-25">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni-instagram"></i></a></li>
                            </ul>
                        </div> <!-- footer logo -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="footer-info mt-50">
                            <h5 class="f-title">Contact Info</h5>
                            <ul>
                                <li>
                                    <div class="single-footer-info mt-20">
                                        <span>Phone :</span>
                                        <div class="footer-info-content">
                                            <p>-</p>
                                            
                                        </div>
                                    </div> <!-- single footer info -->
                                </li>
                                <li>
                                    <div class="single-footer-info mt-20">
                                        <span>Email: </span>
                                        <div class="footer-info-content">
                                            <p>slpyouthcareid@gmail.com<br></p>
                                        </div>
                                    </div> <!-- single footer info -->
                                </li>
                                <li>
                                    <div class="single-footer-info mt-20">
                                        <span>Address :</span>
                                        <div class="footer-info-content">
                                            <p>
                                                Jl. Merdeka Raya No.7, RT.1/RW.7, Abadijaya,  <br>
                                                Kec. Sukmajaya, Kota Depok,<br>
                                                Jawa Barat 16417 <br>
                                                  
                                                </p>
                                        </div>
                                    </div> <!-- single footer info -->
                                </li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer widget -->
            <div class="footer-copyright pt-15 pb-15">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            &copy; <strong>SLP 2021</strong>. 
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!--  footer copyright -->
        </div> <!-- container -->
    </section>
    
    <!--====== FOOTER PART ENDS ======-->
    <!--====== BACK TO TOP PART START ======-->
    
    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>
    
    <!--====== BACK TO TOP PART ENDS ======-->
    
    
    
    
    
    
    
    
    
    
    <!--====== jquery js ======-->
    <script src="{{asset('shop')}}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{asset('shop')}}/assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{asset('shop')}}/assets/js/bootstrap.min.js"></script>
    
    
    <!--====== Slick js ======-->
    <script src="{{asset('shop')}}/assets/js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="{{asset('shop')}}/assets/js/jquery.magnific-popup.min.js"></script>

    
    <!--====== nav js ======-->
    <script src="{{asset('shop')}}/assets/js/jquery.nav.js"></script>
    
    <!--====== Nice Number js ======-->
    <script src="{{asset('shop')}}/assets/js/jquery.nice-number.min.js"></script>
    
    <!--====== Main js ======-->
    <script src="{{asset('shop')}}/assets/js/main.js"></script>

</body>

</html>
