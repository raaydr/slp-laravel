@extends('topnav.topnavAdmin')
@section('head')
<link href="{{asset('colorlib-reg')}}/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">


    <!-- Main CSS-->
    
@endsection
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
                  @if(session('error'))
                  <div class="alert alert-danger alert-dismissable">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h4><i class="icon fa fa-info"></i>Error</h4>
                     {{session('error')}}.
                  </div>
                  @endif
                  <div class="row">
                     <div class="col-md-6">
                        
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Pendaftaran</h3>
                           </div>
                           <div class="card-body">
                           @foreach($pendaftaran as $control)
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
                                 <div class="form-group row mb-2">
                                    <div class="col-md-6 offset-md-4">
                                       <button type="submit" class="btn btn-primary">
                                       {{ __('Ubah') }}
                                       </button>
                                    </div>
                                 </div>
                              </form>
                              @endforeach
                              @foreach($gen as $control)
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
                                 <a type="button" href="{{route('admin.NewGate')}}" class="btn btn-outline-dark" ><i class="fa fa-user"></i>Angkatan Baru</a>
                                 </div>
                              </div>
                           
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
                              <h3 class="card-title">Seleksi Pertama</h3>
                           </div>
                           <div class="card-body">
                              <form method="POST" action="{{ route('admin.ubah.challenge') }}" enctype="multipart/form-data">
                                 {{csrf_field()}}
                                 <div class="form-group row">
                                    <label for="seleksiPertama" class="col-md-4 col-form-label text-md-right">{{ __('Seleksi Pertama') }}</label>
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
                        <!-- /.col (left) -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        
                        <div class="card card-success">
                           <div class="card-header">
                              <h3 class="card-title">Peraturan Challenge</h3>
                           </div>
                           <div class="card-body">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                        <h3 class="card-title">Pembuatan Peraturan</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                        <form id="formChallenge" enctype="multipart/form-data" class="was-validated">
                                          @csrf
                                          <div class="form-group row">
                                                <label for="judul" class="col-md-2 col-form-label text-md-left">{{ __('Judul') }}</label>
                                                <div class="col-md-10">
                                                    <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" required autofocus >
                                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                                    </small>
                                                    @if ($errors->has('judul'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('judul') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="judul" class="col-md-4 col-form-label text-md-left">{{ __('Peraturan Challenge') }}</label>
                                            </div>
                                            <textarea id="summernote2"  class="form-control{{ $errors->has('rule') ? ' is-invalid' : '' }}" name="rule"    required autofocus></textarea>
                                            <small id="rule" class="form-text text-sucess"></small> 
                                            @if ($errors->has('rule'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('rule') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="modal-footer justify-content-center">
                                             <button class="btn btn-outline-primary btn-b" type="addBTN">Submit</button>
                                          </div>
                                       </form>
                                    </div>
                                    <!-- /.card -->

                                </div>
                                <div class="modal fade" id="modal-edit-challenge">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                <h4 class="modal-title">Edit Jadwal Interview</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <form id="formEditChallenge" enctype="multipart/form-data" class="was-validated">
                                                @csrf     
                                                
                                                <div class="modal-body">
                                                <input type="hidden" id="id" name="id" >
                                                <div class="form-group row m-1">
                                                            <label for="judul" class="col-md-4 col-form-label text-md-left">{{ __('Judul') }}</label>
                                                            <div class="col-md-8">
                                                                <input
                                                                id="judul"
                                                                type="text"
                                                                class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}"
                                                                name="judul"
                                                                value="{{ old('judul') }}"
                                                                required
                                                                autofocus
                                                                /></input>
                                                                @if ($errors->has('judul'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('judul') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    <div class="form-group row m-1">
                                                                <label for="rule" class="col-md-4 col-form-label text-md-left">{{ __('Peraturan') }}</label>
                                                                <div class="col-md-12">
                                                                <textarea id="summernote3"  class="form-control{{ $errors->has('rule') ? ' is-invalid' : '' }}" name="rule"    required autofocus></textarea>
                                                                    @if ($errors->has('rule'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('rule') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                </div>
                                                <div class="modal-footer justify-content-between ">
                                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-outline-primary btn-submit" id="simpan1BTN">Submit</button>
                                                </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                <div class="col-md-12">
                                 <div class="card">
                                    <div class="card-header">
                                       <h3 class="card-title">List Challenge</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                       <table id="example2" class="table table-bordered table-striped">
                                          <thead>
                                             <tr>
                                                <th>Judul</th>
                                                <th>Rule</th>
                                                <th></th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                          <tfoot>
                                             <tr>
                                             <th>Judul</th>
                                                <th>Rule</th>
                                                <th></th>
                                             </tr>
                                          </tfoot>
                                       </table>
                                    </div>
                                    <!-- /.card-body -->
                                 </div>
                                 <!-- /.card -->
                              </div>
                              <!-- /.col -->
                        </div>
                        <!-- /.card -->
                     </div>
                    </div>
                    <div class="row">
                     <div class="col-md-5">
                        <!-- iCheck -->
                        <div class="card card-warning">
                           <div class="card-header">
                              <h3 class="card-title">Antrian Interview</h3>
                           </div>
                           <div class="card-body">
                              <div class="form-group row">
                                 <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Generate Antrian') }}</label>
                                 <div class="col-md-7">
                                 <a type="button" href="{{ route('admin.generate.antrian') }}" class="btn d-md-block btn-outline-primary" >{{ __(' Buat') }}</a>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Lokasi Interview') }}</label>
                                 <div class="col-md-8">
                                 {!! $wawancara->lokasi !!}
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Psikotes') }}</label>
                                 <div class="col-md-8">
                                 {!! $wawancara->psikotes !!}
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-md-6 offset-md-4">
                                 <a class="btn btn-outline-dark" data-toggle="modal" 
                                    data-target="#modal-interview"  target="_blank"><i class="fa fa-user"></i>Ubah Interivew</a>
                                 </div>
                              </div>
                              <div class="modal fade" id="modal-interview">
                                 <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                       <div class="modal-header bg-primary">
                                          <h4 class="modal-title">Interview</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <form method="POST" action="{{ route('admin.AddInterview') }}" enctype="multipart/form-data"class="was-validated">
                                          @csrf
                                          <div class="modal-body">
                                             <div class="form-group row">
                                                <label for="lokasi" class="col-md-4 col-form-label text-md-left">Lokasi</label>
                                                <div class="col-md-12">
                                                <textarea id="summernote"  class="form-control{{ $errors->has('lokasi') ? ' is-invalid' : '' }}" name="lokasi"   required autofocus></textarea>
                                                <small id="passwordHelpBlock" class="form-text text-sucess">Penjelasan tentang Lokasi Interview</small> 
                                                @if ($errors->has('lokasi'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('lokasi') }}</strong>
                                                </span>
                                                @endif
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label for="psikotes" class="col-md-4 col-form-label text-md-left">Psikotes</label>
                                                <div class="col-md-12">
                                                <textarea id="summernote1"  class="form-control{{ $errors->has('psikotes') ? ' is-invalid' : '' }}" name="psikotes"   required autofocus></textarea>
                                                <small id="passwordHelpBlock" class="form-text text-sucess">Penjelasan Tes Psikotes</small> 
                                                @if ($errors->has('psikotes'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('psikotes') }}</strong>
                                                </span>
                                                @endif
                                                </div>
                                             </div>
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                             <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                             <button class="btn btn-outline-primary btn-submit" type="submit">Submit</button>
                                          </div>
                                       </form>
                                    </div>
                                    <!-- /.modal-content -->
                                 </div>
                                 <!-- /.modal-dialog -->
                              </div>
                           </div>
                           <!-- /.card-body -->
                           <div class="card-footer"></div>
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col (right) -->
                     <div class="col-md-7">
                        @foreach($gen as $control)
                        <div class="card card-orange">
                           <div class="card-header">
                              <h3 class="card-title text-light">Jadwal Antrian</h3>
                           </div>
                           <div class="card-body">
                              <div class="form-group row">
                                 <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Banyak Antrian ') }}</label>
                                 <div class="col-md-7">
                                    <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{$antrian}}"  readonly />
                                    @if ($errors->has('user_id'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row mb-0">
                                 <div class="col-md-6 offset-md-4">
                                 <a class="btn btn-outline-primary" data-toggle="modal" 
                                    data-target="#modal-jadwal"  target="_blank"><i class="fa fa-info"></i> Tambah Jadwal Antrian</a>
                                 <div class="modal fade" id="modal-jadwal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                <h4 class="modal-title">Jadwal Interview</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <form id="formJadwal" enctype="multipart/form-data" class="was-validated">
                                                @csrf     
                                                <div class="modal-body bg-info">
                                                <div class="form-group row m-1">
                                                            <label for="awal" class="col-md-4 col-form-label text-md-left">{{ __('Antrian Awal') }}</label>
                                                            <div class="col-md-8">
                                                                <input
                                                                id="awal"
                                                                type="text"
                                                                class="form-control{{ $errors->has('awal') ? ' is-invalid' : '' }}"
                                                                name="awal"
                                                                value="{{ old('awal') }}"
                                                                required
                                                                autofocus
                                                                /></input>
                                                                @if ($errors->has('awal'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('awal') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-1">
                                                            <label for="akhir" class="col-md-4 col-form-label text-md-left">{{ __('Antrian Akhir') }}</label>
                                                            <div class="col-md-8">
                                                                <input
                                                                id="akhir"
                                                                type="text"
                                                                class="form-control{{ $errors->has('akhir') ? ' is-invalid' : '' }}"
                                                                name="akhir"
                                                                value="{{ old('akhir') }}"
                                                                required
                                                                autofocus
                                                                /></input>
                                                                @if ($errors->has('akhir'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('akhir') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    <div class="form-group row m-1">
                                                            <label for="tanggal" class="col-md-4 col-form-label text-md-left">{{ __('Tanggal Interview') }}</label>
                                                            <div class="col-md-8">
                                                                <div class="input-group date">
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-th"></span>
                                                                    </div>
                                                                    <input class="form-control js-datepicker" type="text"  name="tanggal" required autofocus />
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row m-1">
                                                            <label for="time_start" class="col-md-4 col-form-label text-md-left">{{ __('Jam Awal') }}</label>
                                                            <div class="col-md-8">
                                                                <input
                                                                id="time_start"
                                                                type="time"
                                                                
                                                                class="form-control{{ $errors->has('time_start') ? ' is-invalid' : '' }}"
                                                                name="time_start"
                                                                value="{{ old('time_start') }}"
                                                                required
                                                                autofocus
                                                                /></input>
                                                                @if ($errors->has('time_start'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('time_start') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    <div class="form-group row m-1">
                                                                <label for="time_end" class="col-md-4 col-form-label text-md-left">{{ __('Jam Akhir') }}</label>
                                                                <div class="col-md-8">
                                                                    <input
                                                                    id="time_end"
                                                                    type="time"
                                                                    class="form-control{{ $errors->has('time_end') ? ' is-invalid' : '' }}"
                                                                    name="time_end"
                                                                    value="{{ old('time_end') }}"
                                                                    required
                                                                    autofocus
                                                                    /></input>
                                                                    @if ($errors->has('time_end'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('time_end') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                </div>
                                                <div class="modal-footer justify-content-between ">
                                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-outline-primary btn-submit" id="simpanBTN">Submit</button>
                                                </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                 </div>
                              </div>
                              <div class="modal fade" id="modal-edit-jadwal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                <h4 class="modal-title">Edit Jadwal Interview</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <form id="formEditJadwal" enctype="multipart/form-data" class="was-validated">
                                                @csrf     
                                                
                                                <div class="modal-body bg-info">
                                                <input type="hidden" id="id" name="id" >
                                                <div class="form-group row m-1">
                                                            <label for="awal" class="col-md-4 col-form-label text-md-left">{{ __('Antrian Awal') }}</label>
                                                            <div class="col-md-8">
                                                                <input
                                                                id="awal"
                                                                type="text"
                                                                class="form-control{{ $errors->has('awal') ? ' is-invalid' : '' }}"
                                                                name="awal"
                                                                value="{{ old('awal') }}"
                                                                required
                                                                autofocus
                                                                /></input>
                                                                @if ($errors->has('awal'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('awal') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-1">
                                                            <label for="akhir" class="col-md-4 col-form-label text-md-left">{{ __('Antrian Akhir') }}</label>
                                                            <div class="col-md-8">
                                                                <input
                                                                id="akhir"
                                                                type="text"
                                                                class="form-control{{ $errors->has('akhir') ? ' is-invalid' : '' }}"
                                                                name="akhir"
                                                                value="{{ old('akhir') }}"
                                                                required
                                                                autofocus
                                                                /></input>
                                                                @if ($errors->has('akhir'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('akhir') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    <div class="form-group row m-1">
                                                            <label for="tanggal" class="col-md-4 col-form-label text-md-left">{{ __('Tanggal Interview') }}</label>
                                                            <div class="col-md-8">
                                                                <div class="input-group date">
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-th"></span>
                                                                    </div>
                                                                    <input class="form-control js-datepicker" type="text" id="tanggal" name="tanggal" required autofocus />
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row m-1">
                                                            <label for="time_start" class="col-md-4 col-form-label text-md-left">{{ __('Jam Awal') }}</label>
                                                            <div class="col-md-8">
                                                                <input
                                                                id="time_start"
                                                                type="time"
                                                                class="form-control{{ $errors->has('time_start') ? ' is-invalid' : '' }}"
                                                                name="time_start"
                                                                value="{{ old('time_start') }}"
                                                                required
                                                                autofocus
                                                                /></input>
                                                                @if ($errors->has('time_start'))
                                                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('time_start') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    <div class="form-group row m-1">
                                                                <label for="time_end" class="col-md-4 col-form-label text-md-left">{{ __('Jam Akhir') }}</label>
                                                                <div class="col-md-8">
                                                                    <input
                                                                    id="time_end"
                                                                    type="time"
                                                                    class="form-control{{ $errors->has('time_end') ? ' is-invalid' : '' }}"
                                                                    name="time_end"
                                                                    value="{{ old('time_end') }}"
                                                                    required
                                                                    autofocus
                                                                    /></input>
                                                                    @if ($errors->has('time_end'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('time_end') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                </div>
                                                <div class="modal-footer justify-content-between ">
                                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-outline-primary btn-submit" id="simpanBTN">Submit</button>
                                                </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                              <div class="col-md-12 mt-5">
                                 <div class="card">
                                    <div class="card-header">
                                       <h3 class="card-title">List Jadwal</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                       <table id="example1" class="table table-bordered table-striped">
                                          <thead>
                                             <tr>
                                                <th>Antrian</th>
                                                <th>Jam</th>
                                                <th>Tanggal</th>
                                                <th></th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                          <tfoot>
                                             <tr>
                                                
                                                <th>Antrian</th>
                                                <th>Jam</th>
                                                <th>Tanggal</th>
                                                <th></th>
                                             </tr>
                                          </tfoot>
                                       </table>
                                    </div>
                                    <!-- /.card-body -->
                                 </div>
                                 <!-- /.card -->
                              </div>
                              <!-- /.col -->
                           </div>
                           @endforeach
                        </div>
                     
                     <!-- /.card -->
                     </div>
                     
                  </div>
               
               </div>
            
            <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
@endsection
@section('script')
<script src="{{asset('colorlib-reg')}}/vendor/datepicker/moment.min.js"></script>
    <script src="{{asset('colorlib-reg')}}/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="{{asset('colorlib-reg')}}/js/global.js"></script>
<script>
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function() {
    $("#example1")
        .DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{route('admin.tabelJadwal')}}",
                type: 'GET'
            },
            columns: [

                        
                        {data: 'Antrian', name: 'Antrian', orderable: true, searchable: true},
                        {data: 'Jam', name: 'Jam', orderable: true, searchable: true},
                        {data: 'Tanggal', name: 'Tanggal', orderable: true, searchable: true},
                        {data: 'action', name: 'action'},



            ],
            order: [
                [0, 'asc']
            ],
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
            initComplete: function() {
                // Apply the search
                this.api()
                    .columns()
                    .every(function() {
                        var that = this;

                        $('input', this.footer()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
            },
        })
        .buttons()
        .container()
        .appendTo("#example1_wrapper .col-md-6:eq(0)");
});
$(function() {
$("#example2")
        .DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{route('admin.tabelChallenge')}}",
                type: 'GET'
            },
            columns: [

                        
                        {data: 'judul', name: 'judul', orderable: true, searchable: true},
                        {data: 'Rule', name: 'Rule', orderable: true, searchable: true},
                        {data: 'action', name: 'action'},



            ],
            order: [
                [0, 'asc']
            ],
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
            initComplete: function() {
                // Apply the search
                this.api()
                    .columns()
                    .every(function() {
                        var that = this;

                        $('input', this.footer()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
            },
        })
        .buttons()
        .container()
        .appendTo("#example2_wrapper .col-md-6:eq(0)");
});
$(function () {
             $('#time_start').datetimepicker({
                 format: 'LT'
             });
             $('#time_end').datetimepicker({
                 format: 'LT'
             });
         });
$(document).ready(function() {
    $('body').on('click', '.deleteChallenge', function() {
        var Item_id = $(this).data("id");
        var url = '{{ route("admin.DeleteChallenge",[":id"]) }}';
        url = url.replace(':id', Item_id);
        $.ajax({

            type: "GET",

            url: url,

            success: function(data) {

                iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                    title: 'Data Berhasil Disimpan',
                    message: '{{ Session('
                    success ')}}',
                    position: 'bottomRight'
                });
                var oTable = $('#example2').dataTable(); //inialisasi datatable
                oTable.fnDraw(false); //reset datatable

            },

            error: function(data) {

                console.log('Error:', data);

            }

        });



    });
    $('body').on('click', '.deleteJadwal', function() {
        var Item_id = $(this).data("id");
        var url = '{{ route("admin.DeleteJadwal",[":id"]) }}';
        url = url.replace(':id', Item_id);
        $.ajax({

            type: "GET",

            url: url,

            success: function(data) {

                iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                    title: 'Data Berhasil Disimpan',
                    message: '{{ Session('
                    success ')}}',
                    position: 'bottomRight'
                });
                var oTable = $('#example1').dataTable(); //inialisasi datatable
                oTable.fnDraw(false); //reset datatable

            },

            error: function(data) {

                console.log('Error:', data);

            }

        });



    });
    $('#load').hide();
         $(function () {
            
            // Summernote
            
            var content = {!! json_encode($wawancara->lokasi) !!};
            var content1 = {!! json_encode($wawancara->psikotes) !!};
            //set the content to summernote using `code` attribute.
            $('#summernote').summernote('code', content);
            $('#summernote1').summernote('code', content1);
            $('#summernote2').summernote();

         }) 
    $('body').on('click', '.deletePersyaratan', function() {
        var Item_id = $(this).data("id");
        var url = '{{ route("admin.DeletePersyaratan",[":id"]) }}';
        url = url.replace(':id', Item_id);
        $.ajax({

            type: "GET",

            url: url,

            success: function(data) {

                iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                    title: 'Data Berhasil Disimpan',
                    message: '{{ Session('
                    success ')}}',
                    position: 'bottomRight'
                });
                var oTable = $('#example2').dataTable(); //inialisasi datatable
                oTable.fnDraw(false); //reset datatable

            },

            error: function(data) {

                console.log('Error:', data);

            }

        });



    });
    if ($("#formJadwal").length > 0) {
        $.validator.addMethod("validDate", function(value, element) {
            return this.optional(element) || moment(value,"YYYY-MM-DD").isValid();
            }, "Please enter a valid date in the format YYYY-MM-DD");
        $.validator.addMethod("greaterThan",
            function (value, element, param) {
                var $otherElement = $(param);
                return parseInt(value, 10) > parseInt($otherElement.val(), 10);
            });
        $("#formJadwal").validate({
            rules: {
                awal: {
                    required: true,
                    number:true,
                    min: 1

                },
                akhir: {
                    required: true,
                    number:true,
                    greaterThan: "#awal",
                    min: 2

                },
                tanggal: {
                    required: true,
                    validDate:true,

                },
                time_start: {
                    required: true,
                    

                },
                time_end: {
                    required: true,
                    

                },
            },
            messages: {
                awal: {
                    required: 'Tolong Diisi',
                    number: 'Tolong Diisi dengan angka',
                    min: 'minimal 1',
                },
                akhir: {
                    required: 'Tolong Diisi',
                    number: 'Tolong Diisi dengan angka',
                    min: 'minimal 2',
                    greaterThan: 'Harus lebih besar dari form "Antrian awal" ',
                },
                tanggal: {
                    required: 'Tolong Diisi',
                },
                time_start: {
                    required: 'Tolong Diisi',
                    
                },
                time_end: {
                    required: 'Tolong Diisi',
                    
                },

            },
            submitHandler: function(form) {
                var actionType = $('#simpanBTN').val();
                $('#simpanBTN').html('Sending..');
                var form = $("#formJadwal").closest("form");
                var formData = new FormData(form[0]);
                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = Math.round(((evt.loaded / evt.total) * 100));
                                $(".progress-bar").width(percentComplete + '%');
                                $(".progress-bar").html(percentComplete + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    data: formData,
                    url: "{{ route('admin.AddJadwal') }}", //url simpan data
                    type: "POST", //karena simpan kita pakai method POST
                    dataType: 'json', //data tipe kita kirim berupa JSON
                    processData: false,
                    contentType: false,
                    success: function(data) { //jika berhasil
                        switch (data.status) {
                            case 0:
                                $('#simpanBTN').html('Submit');
                                $('#simpanBTN').show();
                                var oTable = $('#example1').dataTable(); //inialisasi datatable
                                oTable.fnDraw(false); //reset datatable
                                iziToast.error({
                                    title: 'Error',
                                    message: data.error,
                                });
                                console.log('Error:', "periksa");
                                break;
                            case 1:

                                $('#simpanBTN').html('Submit'); //tombol simpan
                                $('#simpanBTN').show();
                                document.getElementById("formJadwal").reset();
                                $('#modal-jadwal').modal('hide'); //modal hide
                                var oTable = $('#example1').dataTable(); //inialisasi datatable
                                oTable.fnDraw(false); //reset datatable
                                //$('#uploadStatus').html('<p style="color:#28A74B;">File Berhasil diupload!</p>');
                                iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                    title: 'Data Berhasil Disimpan',
                                    message: '{{ Session('
                                    success ')}}',
                                    position: 'bottomRight'
                                });
                                break;
                            case 2:
                                $('#simpanBTN').html('Submit');
                                $('#simpanBTN').show();
                                iziToast.warning({
                                    title: 'Perhatian',
                                    message: 'Nomor Antrian Sudah Dijadwalkan',
                                    position: 'bottomRight'
                                });
                                console.log('Error:', "periksa");
                                break;
                            default:
                                // code block

                        }

                    },
                    error: function(data) { //jika error tampilkan error pada console

                        $('#manfaat').val("");


                        $('#simpanBTN').html('Submit'); //tombol simpan
                        iziToast.error({
                            title: 'Error',
                            message: 'Illegal operation',
                        });
                        console.log('Error:', "Data kosong");

                    }
                });
            }
        })
    }
    if ($("#formEditJadwal").length > 0) {
        $.validator.addMethod("validDate", function(value, element) {
            return this.optional(element) || moment(value,"YYYY-MM-DD").isValid();
            }, "Please enter a valid date in the format YYYY-MM-DD");
        $.validator.addMethod("greaterThan",
            function (value, element, param) {
                var $otherElement = $(param);
                return parseInt(value, 10) > parseInt($otherElement.val(), 10);
            });
        $("#formEditJadwal").validate({
            rules: {
                awal: {
                    
                    number:true,
                    min: 1

                },
                akhir: {
                    
                    number:true,

                    min: 2

                },
                tanggal: {
                    
                    validDate:true,

                },
                time_start: {
                    required: true,
                    

                },
                time_end: {
                    required: true,
                    

                },
            },
            messages: {
                awal: {
                    
                    number: 'Tolong Diisi dengan angka',
                    min: 'minimal 1',
                },
                akhir: {
                    
                    number: 'Tolong Diisi dengan angka',
                    min: 'minimal 2',
                    
                },

            },
            submitHandler: function(form) {
                var actionType = $('#simpanBTN').val();
                $('#simpanBTN').html('Sending..');
                var form = $("#formEditJadwal").closest("form");
                var formData = new FormData(form[0]);
                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = Math.round(((evt.loaded / evt.total) * 100));
                                $(".progress-bar").width(percentComplete + '%');
                                $(".progress-bar").html(percentComplete + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    data: formData,
                    url: "{{ route('admin.EditJadwal') }}", //url simpan data
                    type: "POST", //karena simpan kita pakai method POST
                    dataType: 'json', //data tipe kita kirim berupa JSON
                    processData: false,
                    contentType: false,
                    success: function(data) { //jika berhasil
                        switch (data.status) {
                            case 0:
                                $('#simpanBTN').html('Submit');
                                $('#simpanBTN').show();
                                var oTable = $('#example1').dataTable(); //inialisasi datatable
                                oTable.fnDraw(false); //reset datatable
                                iziToast.error({
                                    title: 'Error',
                                    message: data.error,
                                });
                                console.log('Error:', "periksa");
                                break;
                            case 1:

                                $('#simpanBTN').html('Submit'); //tombol simpan
                                $('#simpanBTN').show();
                                document.getElementById("formJadwal").reset();
                                $('#modal-edit-jadwal').modal('hide'); //modal hide
                                var oTable = $('#example1').dataTable(); //inialisasi datatable
                                oTable.fnDraw(false); //reset datatable
                                //$('#uploadStatus').html('<p style="color:#28A74B;">File Berhasil diupload!</p>');
                                iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                    title: 'Data Berhasil Disimpan',
                                    message: '{{ Session('
                                    success ')}}',
                                    position: 'bottomRight'
                                });
                                break;
                            case 2:
                                $('#simpanBTN').html('Submit');
                                $('#simpanBTN').show();
                                iziToast.warning({
                                    title: 'Perhatian',
                                    message: 'Nomor Antrian Sudah Dijadwalkan',
                                    position: 'bottomRight'
                                });
                                console.log('Error:', "periksa");
                                break;
                            default:
                                // code block

                        }

                    },
                    error: function(data) { //jika error tampilkan error pada console

                        $('#manfaat').val("");


                        $('#simpanBTN').html('Submit'); //tombol simpan
                        iziToast.error({
                            title: 'Error',
                            message: 'Illegal operation',
                        });
                        console.log('Error:', "Data kosong");

                    }
                });
            }
        })
    }

    if ($("#formChallenge").length > 0) {
        $("#formChallenge").validate({
            rules: {
                judul: {
                    required:true,
                    

                },
                rule: {
                    required: true,
                    

                },
            },
            messages: {
                Judul: {
                    
                    required: 'Judul tolong diisi',
                },
                rule: {
                    
                    required: 'tolong diisi',
                    
                },

            },
            submitHandler: function(form) {
                var actionType = $('#addBTN').val();
                $('#addBTN').html('Sending..');
                var form = $("#formChallenge").closest("form");
                var formData = new FormData(form[0]);
                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = Math.round(((evt.loaded / evt.total) * 100));
                                $(".progress-bar").width(percentComplete + '%');
                                $(".progress-bar").html(percentComplete + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    data: formData,
                    url: "{{ route('admin.AddRuleChallenge') }}", //url simpan data
                    type: "POST", //karena simpan kita pakai method POST
                    dataType: 'json', //data tipe kita kirim berupa JSON
                    processData: false,
                    contentType: false,
                    success: function(data) { //jika berhasil
                        switch (data.status) {
                            case 0:
                                $('#addBTN').html('Submit');
                                $('#addBTN').show();
                                var oTable = $('#example2').dataTable(); //inialisasi datatable
                                oTable.fnDraw(false); //reset datatable
                                iziToast.error({
                                    title: 'Error',
                                    message: data.error,
                                });
                                console.log('Error:', "periksa");
                                break;
                            case 1:

                                $('#addBTN').html('Submit'); //tombol simpan
                                $('#addBTN').show();
                                document.getElementById("formChallenge").reset();
                                $('#summernote2').summernote('code', '');
                                var oTable = $('#example2').dataTable(); //inialisasi datatable
                                oTable.fnDraw(false); //reset datatable
                                //$('#uploadStatus').html('<p style="color:#28A74B;">File Berhasil diupload!</p>');
                                iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                    title: 'Data Berhasil Disimpan',
                                    message: '{{ Session('
                                    success ')}}',
                                    position: 'bottomRight'
                                });
                                break;
                            default:
                                // code block

                        }

                    },
                    error: function(data) { //jika error tampilkan error pada console

                        $('#manfaat').val("");


                        $('#simpanBTN').html('Submit'); //tombol simpan
                        iziToast.error({
                            title: 'Error',
                            message: 'Illegal operation',
                        });
                        console.log('Error:', "Data kosong");

                    }
                });
            }
        })
    }
    if ($("#formEditChallenge").length > 0) {
    $("#formEditChallenge").validate({
        rules: {
            judul: {
                required:true,
                

            },
            rule: {
                required: true,
                

            },
        },
        messages: {
            Judul: {
                
                required: 'Judul tolong diisi',
            },
            rule: {
                
                required: 'tolong diisi',
                
            },

        },
        submitHandler: function(form) {
            var actionType = $('#simpan1BTN').val();
            $('#simpan1BTN').html('Sending..');
            var form = $("#formEditChallenge").closest("form");
            var formData = new FormData(form[0]);
            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = Math.round(((evt.loaded / evt.total) * 100));
                            $(".progress-bar").width(percentComplete + '%');
                            $(".progress-bar").html(percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                data: formData,
                url: "{{ route('admin.EditChallenge') }}", //url simpan data
                type: "POST", //karena simpan kita pakai method POST
                dataType: 'json', //data tipe kita kirim berupa JSON
                processData: false,
                contentType: false,
                success: function(data) { //jika berhasil
                    switch (data.status) {
                        case 0:
                            $('#simpan1BTN').html('Submit');
                            $('#simpan1BTN').show();
                            var oTable = $('#example2').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            iziToast.error({
                                title: 'Error',
                                message: data.error,
                            });
                            console.log('Error:', "periksa");
                            break;
                        case 1:

                            $('#simpan1BTN').html('Submit'); //tombol simpan
                            $('#simpan1BTN').show();
                            document.getElementById("formEditChallenge").reset();
                            $('#modal-edit-challenge').modal('hide'); //modal hide
                            $('#summernote2').summernote('code', '');
                            var oTable = $('#example2').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            //$('#uploadStatus').html('<p style="color:#28A74B;">File Berhasil diupload!</p>');
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('
                                success ')}}',
                                position: 'bottomRight'
                            });
                            break;
                        default:
                            // code block

                    }

                },
                error: function(data) { //jika error tampilkan error pada console

                    


                    $('#simpan1BTN').html('Submit'); //tombol simpan
                    iziToast.error({
                        title: 'Error',
                        message: 'Illegal operation',
                    });
                    console.log('Error:', "Data kosong");

                }
            });
        }
    })
}
    function printErrorMsg(msg) {

        $(".print-error-msg").find("ul").html('');

        $(".print-error-msg").css('display', 'block');

        $.each(msg, function(key, value) {

            $(".print-error-msg").find("ul").append('<li>' + value + '</li>');

        });

    }

});

$('#modal-edit-jadwal').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('myid')
    var awal = button.data('awal')
    var akhir = button.data('akhir')
    var tanggal = button.data('tanggal')
    var time_start = button.data('time_start')
    var time_end = button.data('time_end')
    var modal = $(this)
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #awal').val(awal)
    modal.find('.modal-body #akhir').val(akhir)
    modal.find('.modal-body #tanggal').val(tanggal)
    modal.find('.modal-body #time_start').val(time_start)
    modal.find('.modal-body #time_end').val(time_end)

});
$('#modal-edit-challenge').on('show.bs.modal', function(event) {

var button = $(event.relatedTarget) // Button that triggered the modal
var id = button.data('myid')
var judul = button.data('judul')
var rule = button.data('rule')
//var content1 = JSON.stringify(rule)
var modal = $(this)
modal.find('.modal-body #id').val(id)
modal.find('.modal-body #judul').val(judul)
$('#summernote3').summernote('code', rule);

});
</script>
@endsection
