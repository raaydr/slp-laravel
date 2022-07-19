@extends('topnav.topnavAdmin')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Daftar Fasil</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Fasil</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header">
                           <h3 class="card-title">Pendaftaran Fasil</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           @if(session()->has('success'))
                           <div class="alert alert-success">{{ session()->get('success') }}</div>
                           @endif
                           <form method="POST" action="{{ route('admin.daftar.fasil') }}" enctype="multipart/form-data" class="was-validated">
                              {{csrf_field()}}
                              <div class="form-group row">
                                 <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>
                                 <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus />
                                    <div class="valid-feedback"></div>
                                    @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                 <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus />
                                    <div class="valid-feedback"></div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                 <div class="col-md-5">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}"  required autofocus />
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                    Minimal 8 karakter
                                    </small>
                                    <div class="valid-feedback"></div>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                 <div class="col-md-5">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password') }}"  required autofocus />
                                    <div class="valid-feedback"></div>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                                 <div class="col-md-7">
                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                       <input type="radio" id="customRadioInline1" name="jenis_kelamin" class="custom-control-input" value="Pria" required autofocus />
                                       <label class="custom-control-label" for="customRadioInline1">Pria</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input type="radio" id="customRadioInline2" name="jenis_kelamin" class="custom-control-input" value="Wanita" required autofocus />
                                       <label class="custom-control-label" for="customRadioInline2">Wanita</label>
                                    </div>
                                 </div>
                                 @if ($errors->has('jenis_kelamin'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                 </span>
                                 @endif
                              </div>
                              <div class="form-group row">
                                 <label for="phonenumber" class="col-md-4 col-form-label text-md-right">{{ __('No Handphone (terhubung dengan Whatsapp)') }}</label>
                                 <div class="col-md-4">
                                    <input id="phonenumber" type="text" class="form-control{{ $errors->has('phonenumber') ? ' is-invalid' : '' }}" name="phonenumber" value="{{ old('phonenumber') }}" required autofocus />
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                    contoh : 081234567890
                                    </small>
                                    @if ($errors->has('phonenumber'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="instagram" class="col-md-4 col-form-label text-md-right">{{ __('Akun Instagram') }}</label>
                                 <div class="col-md-6">
                                    <input id="instagram" type="text" class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}" name="instagram" value="{{ old('instagram') }}" required autofocus />
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                    contoh : https://www.instagram.com/slp.indonesia/
                                    </small>
                                    <div class="valid-feedback"></div>
                                    @if ($errors->has('instagram'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('instagram') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="prestasi" class="col-md-4 col-form-label text-md-right">{{ __('Prestasi') }}</label>
                                 <div class="col-md-6">
                                    <textarea id="summernote"  class="form-control{{ $errors->has('prestasi') ? ' is-invalid' : '' }}" name="prestasi" value="{{ old('prestasi') }}" height= "500" required autofocus></textarea>
                                    @if ($errors->has('prestasi'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('prestasi') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="quotes" class="col-md-4 col-form-label text-md-right">{{ __('Quotes') }}</label>
                                 <div class="col-md-6">
                                    <input id="quotes" type="text" class="form-control{{ $errors->has('quotes') ? ' is-invalid' : '' }}" name="quotes" value="{{ old('quotes') }}" required autofocus />
                                    <div class="valid-feedback"></div>
                                    @if ($errors->has('quotes'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('quotes') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="url_foto" class="col-md-4 col-form-label text-md-right">{{ __('Upload Foto') }}</label>
                                 <div class="col-md-7">
                                    <input id="url_foto" type="file" class="form-control{{ $errors->has('url_foto') ? ' is-invalid' : '' }}" name="url_foto" value="{{ old('url_foto') }}" required autofocus />
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
                              <!--  Error handle -->
                              @if($errors->any())
                              <div class="row collapse">
                                 <ul class="alert-box warning radius">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                 </ul>
                              </div>
                              @endif
                              <div class="form-group row mb-0">
                                 <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                    {{ __('Daftar') }}
                                    </button>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </section>
            <!-- /.content -->
@endsection
@section('script')
      <script>
         $(function () {
            // Summernote
            $('#summernote').summernote()
         })
      </script>
@endsection
