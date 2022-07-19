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
                           <li class="breadcrumb-item active">Create-Controller</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <section class="content">
               <div class="container-fluid">
                  @if(session('pesan'))
                  <div class="alert alert-success alert-dismissable">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h4><i class="icon fa fa-check"></i>Success</h4>
                     {{session('pesan')}}.
                  </div>
                  @endif
                  <div class="col-md-12">
                     <!-- general form elements -->
                     <div class="card card-primary">
                        <div class="card-header">
                           <h3 class="card-title">Create Controller</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.create.controller') }}" method="POST" enctype="multipart/form-data" >
                           @csrf
                           <div class="card-body">
                              <div class="form-group row">
                                 <label for="url_video" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                                 <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus />
                                    @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="string" class="col-md-4 col-form-label text-md-right">{{ __('string') }}</label>
                                 <div class="col-md-6">
                                    <input id="string" type="text" class="form-control" name="string" value="{{ old('string') }}"  />
                                    @if ($errors->has('string'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('string') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="integer" class="col-md-4 col-form-label text-md-right">{{ __('integer') }}</label>
                                 <div class="col-md-6">
                                    <input id="integer" type="text" class="form-control" name="integer" value="{{ old('integer') }}"  />
                                    @if ($errors->has('integer'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('integer') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="boolean" class="col-md-4 col-form-label text-md-right">{{ __('boolean') }}</label>
                                 <div class="col-md-6 was-validated">
                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                       <input type="radio" id="customRadioInline3" name="boolean" class="custom-control-input" value="1" >
                                       <label class="custom-control-label" for="customRadioInline3">true</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input type="radio" id="customRadioInline4" name="boolean" class="custom-control-input" value="0">
                                       <label class="custom-control-label" for="customRadioInline4">false</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>
                                 <div class="col-md-4">
                                    <div class="input-group date">
                                       <div class="input-group-addon">
                                          <span class="glyphicon glyphicon-th"></span>
                                       </div>
                                       <input placeholder="masukkan tanggal Lahir" type="text" class="form-control datepicker" name="date"   />
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-body -->
                           <div class="card-footer">
                              <!-- /.card-body -->
                              <div class="text-center">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- /.card -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </section>
@endsection
@section('script')
      <script>
         $(function(){
         $(".datepicker").datepicker({
             format: 'yyyy-mm-dd',
             autoclose: true,
             todayHighlight: true,
         });
         });
      </script>
@endsection
