@extends('topnav.topnavAdmin')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Admin Control</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Controller</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  @if(session('berhasil'))
                  <div class="alert alert-success alert-dismissable md-5">
                     <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h5><i class="icon fa fa-info"></i>Berhasil</h5>
                     {{session('berhasil')}}.
                  </div>
                  @endif
                  <div class="row">
                     <div class="col-md-6">
                        @foreach($pendaftaran as $control)
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Pendaftaran</h3>
                           </div>
                           <div class="card-body">
                              <form method="POST" action="{{ route('admin.tutup.pendaftaran') }}" enctype="multipart/form-data">
                                 {{csrf_field()}}
                                 <div class="form-group row">
                                    <label for="pendaftaran" class="col-md-4 col-form-label text-md-right">{{ __('Pendaftaran') }}</label>
                                    <div class="col-md-7">
                                       <div class="custom-control custom-radio custom-control-inline mt-2">
                                          <input type="radio" id="customRadioInline1" name="pendaftaran" class="custom-control-input" value="1" {{ ($control->boolean== True)? "checked" : "" }}>
                                          <label class="custom-control-label" for="customRadioInline1">BUKA</label>
                                       </div>
                                       <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="customRadioInline2" name="pendaftaran" class="custom-control-input" value="0" {{ ($control->boolean== False)? "checked" : "" }}>
                                          <label class="custom-control-label" for="customRadioInline2">TUTUP</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                       <button type="submit" class="btn btn-primary">
                                       {{ __('Ubah') }}
                                       </button>
                                    </div>
                                 </div>
                              </form>
                              @endforeach
                           </div>
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col (left) -->
                     <div class="col-md-6">
                        <!-- iCheck -->
                        <div class="card card-warning">
                           <div class="card-header">
                              <h3 class="card-title">Tombol</h3>
                           </div>
                           <div class="card-body">
                              <!-- Minimal style -->
                              <div class="row">
                                 <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.all.gagal') }}"> <i class="fas fa-info"> </i>Gagal </a>
                                    <label for="radioSuccess1"> tidak mengerjakan challenge </label>
                                 </div>
                                 <div class="col-sm-6">
                                    <!-- radio -->
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.generate.antrian') }}">
                                    <i class="fas fa-check"> </i>
                                    antrian
                                    </a>
                                    <label for="radioSuccess1"> Membuat antrian kalau udah di lulusin </label>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-body -->
                           <div class="card-footer"></div>
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col (right) -->
                     <div class="col-md-6">
                        @foreach($quest as $control)
                        <div class="card card-danger">
                           <div class="card-header">
                              <h3 class="card-title">Daily Quest</h3>
                           </div>
                           <div class="card-body">
                              <form method="POST" action="{{ route('admin.gate.quest') }}" enctype="multipart/form-data">
                                 {{csrf_field()}}
                                 <div class="form-group row">
                                    <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Hari ke - ') }}</label>
                                    <div class="col-md-7">
                                       <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{$control->integer}}"  readonly />
                                       @if ($errors->has('user_id'))
                                       <span class="invalid-feedback" role="alert">
                                       <strong>{{ $errors->first('user_id') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label for="quest" class="col-md-4 col-form-label text-md-right">{{ __('Daily Quest') }}</label>
                                    <div class="col-md-7">
                                       <div class="custom-control custom-radio custom-control-inline mt-2">
                                          <input type="radio" id="customRadioInline3" name="quest" class="custom-control-input" value="1" {{ ($control->boolean== True)? "checked" : "" }}>
                                          <label class="custom-control-label" for="customRadioInline3">BUKA</label>
                                       </div>
                                       <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="customRadioInline4" name="quest" class="custom-control-input" value="0" {{ ($control->boolean== False)? "checked" : "" }}>
                                          <label class="custom-control-label" for="customRadioInline4">TUTUP</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                       <button type="submit" class="btn btn-primary">
                                       {{ __('Ubah') }}
                                       </button>
                                       <a type="button" class="btn btn-primary" href="{{ route('admin.reset.quest') }}">
                                       {{ __('Reset') }}
                                       </a>
                                    </div>
                                 </div>
                              </form>
                              @endforeach
                           </div>
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col (left) -->
                     <div class="col-md-6">
                        @foreach($seleksiPertama as $control)
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Tahap Challenge</h3>
                           </div>
                           <div class="card-body">
                              <form method="POST" action="{{ route('admin.ubah.challenge') }}" enctype="multipart/form-data">
                                 {{csrf_field()}}
                                 <div class="form-group row">
                                    <label for="seleksiPertama" class="col-md-4 col-form-label text-md-right">{{ __('Tahap Challenge') }}</label>
                                    <div class="col-md-7">
                                       <div class="custom-control custom-radio custom-control-inline mt-2">
                                          <input type="radio" id="customRadioInline5" name="seleksiPertama" class="custom-control-input" value="1" {{ ($control->boolean== True)? "checked" : "" }}>
                                          <label class="custom-control-label" for="customRadioInline5">BUKA</label>
                                       </div>
                                       <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="customRadioInline6" name="seleksiPertama" class="custom-control-input" value="0" {{ ($control->boolean== False)? "checked" : "" }}>
                                          <label class="custom-control-label" for="customRadioInline6">TUTUP</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                       <button type="submit" class="btn btn-primary">
                                       {{ __('Ubah') }}
                                       </button>
                                    </div>
                                 </div>
                              </form>
                              @endforeach
                           </div>
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col (right) -->
                     <div class="col-md-6">
                        @foreach($gen as $control)
                        <div class="card card-warning">
                           <div class="card-header">
                              <h3 class="card-title">Generasi</h3>
                           </div>
                           <div class="card-body">
                              <div class="form-group row">
                                 <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Generasi ke - ') }}</label>
                                 <div class="col-md-7">
                                    <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{$control->integer}}"  readonly />
                                    @if ($errors->has('user_id'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row mb-0">
                                 <div class="col-md-6 offset-md-4">
                                    <a type="button" class="btn btn-primary" href="{{ route('admin.pre.gen') }}">
                                    {{ __('Before') }}
                                    </a>
                                    <a type="button" class="btn btn-primary" href="{{ route('admin.next.gen') }}">
                                    {{ __('Next') }}
                                    </a>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                        </div>
                     
                     <!-- /.card -->
                     </div>
                     <!-- /.col (left) -->
                     <div class="col-md-6">
                        @foreach($interview as $control)
                        <div class="card card-success">
                           <div class="card-header">
                              <h3 class="card-title">Antrian Interview</h3>
                           </div>
                           <div class="card-body">
                              <div class="form-group row">
                                 <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Antrian ke - ') }}</label>
                                 <div class="col-md-7">
                                    <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{$control->integer}}"  readonly />
                                    @if ($errors->has('user_id'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row mb-0">
                                 <div class="col-md-6 offset-md-4">
                                    <a type="button" class="btn btn-primary" href="{{ route('admin.reset.interview') }}">
                                    {{ __('Reset') }}
                                    </a>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                        </div>
                     </div>
                     <!-- /.card -->
                  </div>
               
               </div>
            
            <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
@endsection
