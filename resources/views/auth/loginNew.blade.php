<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ config('SLP Indonesia', 'SLP Indonesia') }}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!--===============================================================================================-->	
    <link href="{{asset('develop')}}/img/slp.png" rel="icon">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('login-form')}}/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset('login-form')}}/images/bg.jpg');">
        
			<div class="wrap-login100 p-l-55 p-r-55 p-t-30 p-b-54">
			@if(session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif		
					<span class="login100-form-title p-b-49">
						<img src="{{asset('login-form')}}/images/logo.png" class="img-fluid" width="150" alt="">
					</span>
                    <form method="POST" action="{{ route('login') }}">
                    {{csrf_field()}}
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
						<span class="label-input100">Email</span>
						<input class="input100" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
                    @error('email')
                                    <span class="label-input100 text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" id="password" type="password" name="password" required autocomplete="current-password" placeholder="Type your password">
                       
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
                    @error('password')
                        <span class="label-input100 text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    @if ($displayCaptcha)
                        <div class="form-group row mt-3">
                            <div class="col-md-12">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}

                                @error('g-recaptcha-response')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @endif
					@if (Route::has('password.request'))
					<div class="text-right p-t-8 p-b-31">
						<a href="{{ route('password.request') }}">
							Forgot password?
						</a>
					</div>
					@endif
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button  type="submit"  class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
                    </form>
					<div class="flex-col-c p-t-50">
						<span class="txt1 p-b-17">
							Belum Mendaftar ?
						</span>

						<a href="{{ route('register') }}" class="txt2 text-primary">
							Daftar Sekarang
						</a>
					</div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{asset('login-form')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('login-form')}}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('login-form')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{asset('login-form')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('login-form')}}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('login-form')}}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{asset('login-form')}}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('login-form')}}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('login-form')}}/js/main.js"></script>

</body>
</html>