<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="{{asset('colorlib-reg')}}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="{{asset('colorlib-reg')}}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('colorlib-reg')}}/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{asset('colorlib-reg')}}/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('colorlib-reg')}}/css/main.css" rel="stylesheet" media="all">
    <style>
        .bg { 
  /* The image used */
  background-image: url("{{asset('login-form')}}/images/bg.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.titles {
  display: block;
  font-family: Poppins-Bold;
  font-size: 39px;
  color: #333333;
  line-height: 1.2;
  text-align: center;
}
.text-danger{color:#dc3545!important}a.text-danger:focus,a.text-danger:hover{color:#bd2130!important}

    </style>
</head>

<body>
    <div class="page-wrapper p-t-130 p-b-100 font-poppins bg">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-header">
                <span class="titles">
                    <img src="{{asset('login-form')}}/images/logo.png" class="img-fluid " width="150" alt="">
                </span>
                <h2 class="title" style=" text-align: center;}">Form Pendaftaran</h2>
                </div>
                <div class="card-body">
                    <div class="text-center"></div>
                
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="was-validated">
                        {{csrf_field()}}
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nama Lengkap</label>
                                    <input class="input--style-4" id="nama" type="text"  name="nama" value="{{ old('nama') }}" required autofocus >
                                    @if ($errors->has('nama'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                                @endif
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus >
                                    @if ($errors->has('email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" id="password" type="password"  name="password" required autofocus>
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                    Minimal 8 karakter
                                </small>
                                    @if ($errors->has('password'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Konfirmasi Password</label>
                                    <input class="input--style-4" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autofocus >
                                    @if ($errors->has('password_confirmation'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Tanggal Lahir</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text"  name="tanggal_lahir" required autofocus  >
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                    @if ($errors->has('tanggal_lahir'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                </span>
                                @endif
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Pria
                                            <input type="radio" name="jenis_kelamin"  value="Pria" required autofocus >
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Wanita
                                            <input type="radio" name="jenis_kelamin"  value="Wanita" required autofocus >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                            <div class="input-group">
                            <label class="label">Aktivitas</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="aktivitas">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option value="Mahasiswa" required autofocus>Mahasiswa</option>
                                    <option value="Pelajar" required autofocus>Pelajar</option>
                                    <option value="Karyawan" required autofocus>Karyawan</option>
                                    <option value="Pengusaha" required autofocus>Pengusaha</option>
                                    <option value="Yang lain" required autofocus>Yang lain</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">No.Telepon</label>
                                    <input class="input--style-4" id="phonenumber" type="text" name="phonenumber" value="{{ old('phonenumber') }}" required autofocus >
                                    @if ($errors->has('phonenumber'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('phonenumber') }}</strong>
                                </span>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Minat Program</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="minatprogram">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option value="Public Speaking" required autofocus>Public Speaking</option>
                                    <option value="Creative Writing" required autofocus>Creative Writing</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Subject</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option>Subject 1</option>
                                    <option>Subject 2</option>
                                    <option>Subject 3</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{asset('colorlib-reg')}}/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="{{asset('colorlib-reg')}}/vendor/select2/select2.min.js"></script>
    <script src="{{asset('colorlib-reg')}}/vendor/datepicker/moment.min.js"></script>
    <script src="{{asset('colorlib-reg')}}/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="{{asset('colorlib-reg')}}/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->