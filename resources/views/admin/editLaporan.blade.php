@extends('topnav.topnavAdmin')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
               <a class="btn btn-info btn-sm mb-3" href="{{ route('admin.DetailLaporan', $laporan->id) }}" >
                        <i class="fas fa-arrow-left"></i> kembali
                     </a>
                     
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Edit Laporan</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Edit</a></li>
                           <li class="breadcrumb-item active">Laporan</li>
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
                                    <b>Form Laporan</b>
                                 </h4>
                              </div>
                           </a>
                           <div id="collapseOne" class="collapse show" data-parent="#accordion">
                              <div class="card-body">
                              <div class="form-group row">
                              <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('Judul Kegiatan') }}</label>
                                 <div class="col-md-8 col-form-label text-md-left">
                                 <a class="text-primary"><b>{{$laporan->judul}}</b></a>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Kegiatan') }}</label>
                                 <div class="col-md-8 col-form-label text-md-left">
                                 <b>{{$tanggal_mulai}}</b>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="time_start" class="col-md-4 col-form-label text-md-right">{{ __('Mulai Kegiatan') }}</label>
                                 <div class="col-md-8 col-form-label text-md-left">
                                 <b>{{$mulai}} WIB</b>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="time_end" class="col-md-4 col-form-label text-md-right">{{ __('Kegiatan Berakhir') }}</label>
                                 <div class="col-md-8 col-form-label text-md-left">
                                 <b>{{$akhir}} WIB</b>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="tipe_kegiatan" class="col-md-4 col-form-label text-md-right">{{ __('Tipe Kegiatan') }}</label>
                                 <div class="col-md-8 col-form-label text-md-left">
                                    <b>{{$laporan->tipe_kegiatan}}</b>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="tempat" class="col-md-4 col-form-label text-md-right">{{ __('Tempat') }}</label>
                                 <div class="col-md-8 col-form-label text-md-left">
                                 <b>{{$laporan->tempat}}</b>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="guest" class="col-md-4 col-form-label text-md-right">{{ __('Pengisi Kegiatan') }}</label>
                                 <div class="col-md-8 col-form-label text-md-left">
                                 <b>{{$laporan->guest}}</b>
                                 </div>
                              </div>
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
                     
                     <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Edit Laporan</h3>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div class="tab-content">
                                 <div class="active tab-pane" id="anggota">
                                    <div class="card">
                                       <div class="card-body register-card-body">
                                          
                                          <form method="POST" action="{{ route('admin.EditLaporan', $laporan->id) }}" enctype="multipart/form-data">
                                             @csrf
                                             <div class="card-body">
                              <div class="form-group row">
                                 <label for="Judul" class="col-md-4 col-form-label text-md-right">{{ __('Judul Kegiatan') }}</label>
                                 <div class="col-md-6">
                                    <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" />
                                    @if ($errors->has('judul'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Kegiatan') }}</label>
                                 <div class="col-md-4">
                                    <div class="input-group date">
                                       <div class="input-group-addon">
                                          <span class="glyphicon glyphicon-th"></span>
                                       </div>
                                       <input placeholder="Tanggal Kegiatan" type="text" class="form-control datepicker" name="date"   />
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="time_start" class="col-md-4 col-form-label text-md-right">{{ __('Mulai Kegiatan') }}</label>
                                 <div class="col-md-6">
                                    <input id="time_start" type="time" class="form-control" name="time_start" value="{{ old('time_start') }}"  />
                                    @if ($errors->has('time_start'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('time_start') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="time_end" class="col-md-4 col-form-label text-md-right">{{ __('Kegiatan Berakhir') }}</label>
                                 <div class="col-md-6">
                                    <input id="time_end" type="time" class="form-control" name="time_end" value="{{ old('time_end') }}"  />
                                    @if ($errors->has('time_end'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('time_end') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="tipe_kegiatan" class="col-md-4 col-form-label text-md-right">{{ __('Tipe Kegiatan') }}</label>
                                 <div class="col-md-6">
                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                       <input type="radio" id="customRadioInline3" name="tipe_kegiatan" class="custom-control-input" value="offline" >
                                       <label class="custom-control-label" for="customRadioInline3">Offline</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input type="radio" id="customRadioInline4" name="tipe_kegiatan" class="custom-control-input" value="online">
                                       <label class="custom-control-label" for="customRadioInline4">Online</label>
                                    </div>
                                    @if ($errors->has('tipe_kegiatan'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tipe_kegiatan') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="tempat" class="col-md-4 col-form-label text-md-right">{{ __('Tempat') }}</label>
                                 <div class="col-md-6">
                                 <textarea
                                                   id="tempat"
                                                   type="text"
                                                   class="form-control{{ $errors->has('tempat') ? ' is-invalid' : '' }}"
                                                   name="tempat"
                                                   value="{{ old('tempat') }}"
                                                   
                                                   ></textarea>
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                    Jika Kegiatan Offline maka isi dengan alamat, jika online isi dengan nama aplikasi yang dipakai : zoom atau gmeet
                                    </small>
                                    @if ($errors->has('tempat'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tempat') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="guest" class="col-md-4 col-form-label text-md-right">{{ __('Pengisi Kegiatan') }}</label>
                                 <div class="col-md-6">
                                    <input id="guest" type="text" class="form-control" name="guest" value="{{ old('guest') }}"  />
                                    @if ($errors->has('guest'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('guest') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                                          </div>
                                             
                                             
                                             <div class="row">
                                                <!-- /.col -->
                                                <div class="col-12 justify">
                                                  
                                                   <button type="submit" class="btn btn-primary btn-block">Input</button>
                                                  
                                                </div>
                                                <!-- /.col -->
                                             </div>
                                          </form>
                                       </div>
                                       <!-- /.form-box -->
                                    </div>
                                    <!-- /.card -->
                                 </div>
                                 <!-- /.tab-pane -->
                                 <!-- /.tab-content -->
                              </div>
                              <!-- /.card-body -->
                           </div>
                        </div>
                        <!-- /.card -->
                  </div>
                  <!-- /.card -->
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            @endsection
@section('script')
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
         $(function () {
            $(".datepicker").datepicker({
              format: 'mm/dd/yy',
              autoclose: true,
              todayHighlight: true,
          });
            // Summernote
            $('#summernote').summernote()

         })
      </script>
@endsection
