@extends('topnav.topnavFasil')
@section('head')
<link rel="stylesheet" href="{{asset('template')}}/plugins/summernote/summernote-bs4.min.css">
@endsection
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Edit Biodata Fasil</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Fasil</a></li>
                           <li class="breadcrumb-item active">Edit Biodata</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  <!-- left column -->
                  @if(session('pesan'))
                  <div class="alert alert-success alert-dismissable">
                     <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h4><i class="icon fa fa-check"></i>Success</h4>
                     {{session('pesan')}}.
                  </div>
                  @endif
                  @if(session('error'))
                  <div class="alert alert-danger alert-dismissable">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h4><i class="icon fa fa-info"></i>Error</h4>
                     {{session('error')}}.
                  </div>
                  @endif
                  <div class="col-md-12">
                     <!-- general form elements -->
                     
                     <div class="card">
                           <div class="card-header">
                              
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div class="tab-content">
                                 <div class="active tab-pane" id="anggota">
                                    <div class="card">
                                       <div class="card-body register-card-body">
                                          <p class="login-box-msg"><b>Kosongkan bila tidak ingin diubah</b></p>
                                          <form method="POST" action="{{ route('fasil.edit.biodata') }}"  enctype="multipart/form-data">
                                             @csrf
                                             <div class="col-md-12">
                                                <label for="exampleInputEmail1">Nama</label>
                                                <div class="input-group mb-3">
                                                   <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="{{$user->nama}}"  autofocus></input>
                                                   <div class="input-group-append">
                                                      <div class="input-group-text">
                                                         <span class=""></span>
                                                      </div>
                                                   </div>
                                                   @error('nama')
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                   </span>
                                                   @enderror
                                                </div>
                                             </div>
                                             <div class="col-md-12">
                                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                                <div class="input-group mb-3">
                                                <div class="col-md-9">
                                                      <div class="custom-control custom-radio custom-control-inline mt-2">
                                                            <input type="radio" id="customRadioInline1" name="jenis_kelamin" class="custom-control-input" value="Pria"  />
                                                            <label class="custom-control-label" for="customRadioInline1">Pria</label>
                                                      </div>
                                                      <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline2" name="jenis_kelamin" class="custom-control-input" value="Wanita" />
                                                            <label class="custom-control-label" for="customRadioInline2">Wanita</label>
                                                      </div>
                                                   </div>
                                                   @error('jumlah_peserta')
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                   </span>
                                                   @enderror
                                                </div>
                                             </div>
                                             <div class="col-md-12">
                                                <label for="exampleInputEmail1">Nomor Telpon</label>
                                                <div class="input-group mb-3">
                                                   <input  type="text" class="form-control @error('phone') is-invalid @enderror" name="phonenumber" placeholder="{{$user->phonenumber}}" autocomplete="phone" autofocus></input>
                                                   <div class="input-group-append">
                                                      <div class="input-group-text">
                                                         <span class=""></span>
                                                      </div>
                                                   </div>
                                                   @error('phone')
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                   </span>
                                                   @enderror
                                                </div>
                                             </div>
                                             <div class="col-md-12">
                                                <label for="exampleInputEmail1">Instagram</label>
                                                <div class="input-group mb-3">
                                                   <input  type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" placeholder="{{$user->instagram}}" autocomplete="phone" autofocus></input>
                                                   <div class="input-group-append">
                                                      <div class="input-group-text">
                                                         <span class=""></span>
                                                      </div>
                                                   </div>
                                                   @error('instagram')
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                   </span>
                                                   @enderror
                                                </div>
                                             </div>
                                             <div class="col-md-12">
                                                <div class="form-group row">
                                                      <label for="keterangan" class="col-md-4 col-form-label ">{{ __('quotes') }}</label>
                                                      <div class="col-md-12">
                                                         <textarea  class="form-control{{ $errors->has('quotes') ? ' is-invalid' : '' }}" name="quotes" placeholder="{{$user->quotes}}" autofocus></textarea>
                                                            <small id="passwordHelpBlock" class="form-text text-sucess">quotes terbaikmu</small> 
                                                               @if ($errors->has('quotes'))
                                                               <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('keterangan') }}</strong>
                                                               </span>
                                                               @endif
                                                      </div>
                                                   </div>
                                             </div>
                                             <div class="col-md-12">
                                                <div class="form-group row">
                                                      <label for="keterangan" class="col-md-4 col-form-label ">{{ __('Prestasi Lama') }}</label>
                                                      <div class="col-md-12">
                                                      <?php
                                                         echo $user->prestasi ;
                                                         ?>
                                                      </div>
                                                   </div>
                                             </div>
                                             <div class="col-md-12">
                                                <div class="form-group row">
                                                      <label for="prestasi" class="col-md-4 col-form-label ">{{ __('Prestasi Baru') }}</label>
                                                      <div class="col-md-12">
                                                         <textarea id="summernote"  class="form-control{{ $errors->has('prestasi') ? ' is-invalid' : '' }}" name="prestasi" autofocus></textarea>
                                                            <small id="passwordHelpBlock" class="form-text text-sucess">Prestasi yang diraih</small> 
                                                               @if ($errors->has('keterangan'))
                                                               <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('keterangan') }}</strong>
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
      <script src="{{asset('template')}}/plugins/summernote/summernote-bs4.min.js"></script>
      <script>
         
         $(function () {
            // Summernote
            $('#summernote').summernote()

         })
      </script>
@endsection
