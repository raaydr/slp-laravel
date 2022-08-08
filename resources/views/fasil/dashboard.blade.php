@extends('topnav.topnavFasil')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Profile</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Fasil</a></li>
                           <li class="breadcrumb-item active">Profile</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  @if(session('pesan'))
                  <div class="alert alert-success alert-dismissable md-5">
                     <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h5><i class="icon fa fa-info"></i>Berhasil</h5>
                     {{session('pesan')}}.
                  </div>
                  @endif
                  <div class="row">
                     <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                           <div class="card-body box-profile">
                              <div class="text-center">
                                 <a class="btn btn-default" href="{{asset('imgfasil')}}/{{$user->Fasil->url_foto}}" target="_blank">
                                 <img class="profile-user-img img-fluid" src="{{asset('imgfasil')}}/{{$user->Fasil->url_foto}}" class="img-fluid" alt="Cinque Terre" />
                                 </a>
                              </div>
                              <h4 class="profile-username text-center">{{$user->Fasil->nama}}</h4>
                              <div class="text-center">
                                 <a data-toggle="modal" data-target="#modal-foto" class="btn btn-primary btn-sm m-2">ubah foto</a>
                                        </div>
                              <ul class="list-group list-group-unbordered mb-3">
                                 <li class="list-group-item"><b>Jenis Kelamin</b> <a class="float-right">{{$user->Fasil->jenis_kelamin}}</a></li>
                                 <li class="list-group-item"><b>No.Telp</b> <a class="float-right">{{$user->Fasil->phonenumber}}</a></li>
                                 <li class="list-group-item"><b>Instagram</b> <a class="float-right" href="https://www.instagram.com/{{$user->Fasil->instagram}}" target="_blank">lihat</a></li>
                              </ul>
                              <div class="text-center">
                                 
                                 <a data-toggle="modal" data-target="#modal-password" class="btn btn-success btn-sm m-2">ubah password</a>
                                 <a type="button" href="{{route('fasil.editBiodataView')}}" class="btn btn-outline-primary m-2"><i class="fa fa-edit"></i> Edit Bioada</a>
                                 
                              </div>
                              <div class="modal fade" id="modal-foto">
                                 <div class="modal-dialog">
                                    <div class="modal-content bg-primary">
                                       <div class="modal-header">
                                          <h4 class="modal-title">Ubah Foto</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <form method="POST" action="{{route('fasil.edit.foto')}}" enctype="multipart/form-data" class="was-validated">
                                          {{csrf_field()}}
                                          <div class="modal-body">
                                             <div class="row">
                                                <div class="form-group row">
                                                   <label for="url_foto" class="col-md-4 col-form-label text-md-right">{{ __('Upload Foto') }}</label>
                                                   <div class="col-md-7">
                                                      <input
                                                         id="url_foto"
                                                         type="file"
                                                         class="form-control{{ $errors->has('url_foto') ? ' is-invalid' : '' }}"
                                                         name="url_foto"
                                                         value="{{ old('url_foto') }}"
                                                         required
                                                         autofocus
                                                         />
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
                                             </div>
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                             <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-outline-light">Ubah</button>
                                          </div>
                                       </form>
                                    </div>
                                    <!-- /.modal-content -->
                                 </div>
                                 <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
                              <div class="modal fade" id="modal-biodata">
                                 <div class="modal-dialog">
                                    <div class="modal-content bg-warning">
                                       <div class="modal-header">
                                          <h4 class="modal-title">Ubah Biodata</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <form method="POST" action="{{route('fasil.edit.biodata')}}" enctype="multipart/form-data" class="was-validated">
                                          {{csrf_field()}}
                                          <div class="modal-body">
                                             <div class="form-group row">
                                                <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('id') }}</label>
                                                <div class="col-md-7">
                                                   <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id"  readonly />
                                                   @if ($errors->has('user_id'))
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('user_id') }}</strong>
                                                   </span>
                                                   @endif
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('nama') }}</label>
                                                <div class="col-md-7">
                                                   <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama"   required autofocus/>
                                                   @if ($errors->has('nama'))
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('nama') }}</strong>
                                                   </span>
                                                   @endif
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                                                <div class="col-md-7">
                                                   <div class="custom-control custom-radio custom-control-inline mt-2">
                                                      <input type="radio" id="customRadioInline1" name="jenis_kelamin" class="custom-control-input" value="Pria" {{ ($user->Fasil->jenis_kelamin== "Pria")? "checked" : "" }}>
                                                      <label class="custom-control-label" for="customRadioInline1">Pria</label>
                                                   </div>
                                                   <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="customRadioInline2" name="jenis_kelamin" class="custom-control-input" value="Wanita" {{ ($user->Fasil->jenis_kelamin== "Wanita")? "checked" : "" }}>
                                                      <label class="custom-control-label" for="customRadioInline2">Wanita</label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label for="phonenumber" class="col-md-4 col-form-label text-md-right">{{ __('No.Telp') }}</label>
                                                <div class="col-md-7">
                                                   <input id="phonenumber" type="text" class="form-control{{ $errors->has('phonenumber') ? ' is-invalid' : '' }}" name="phonenumber"   required autofocus/>
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
                                                <label for="instagram" class="col-md-4 col-form-label text-md-right">{{ __('Instagram') }}</label>
                                                <div class="col-md-7">
                                                   <input id="instagram" type="text" class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}" name="instagram"   required autofocus/>
                                                   <small id="passwordHelpBlock" class="form-text text-sucess">
                                                   contoh : https://www.instagram.com/slp.indonesia/
                                                   </small>
                                                   @if ($errors->has('instagram'))
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('instagram') }}</strong>
                                                   </span>
                                                   @endif
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label for="prestasi" class="col-md-4 col-form-label text-md-right">{{ __('Prestasi') }}</label>
                                                <div class="col-md-8">
                                                   <textarea id="summernote"  class="form-control{{ $errors->has('prestasi') ? ' is-invalid' : '' }}" name="prestasi" value="{{ old('prestasi') }}" weight= "500" required autofocus></textarea>
                                                   <small id="passwordHelpBlock" class="form-text text-sucess">
                                                   Tolong diperhatikan
                                                   </small>
                                                   @if ($errors->has('prestasi'))
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('prestasi') }}</strong>
                                                   </span>
                                                   @endif
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label for="quotes" class="col-md-4 col-form-label text-md-right">{{ __('Quotes') }}</label>
                                                <div class="col-md-7">
                                                   <input id="quotes" type="text" class="form-control{{ $errors->has('quotes') ? ' is-invalid' : '' }}" name="quotes"   required autofocus/>
                                                   @if ($errors->has('quotes'))
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('quotes') }}</strong>
                                                   </span>
                                                   @endif
                                                </div>
                                             </div>
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Save</button>
                                          </div>
                                       </form>
                                    </div>
                                    <!-- /.modal-content -->
                                 </div>
                                 <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
                              <div class="modal fade" id="modal-password">
                                 <div class="modal-dialog">
                                    <div class="modal-content bg-primary">
                                       <div class="modal-header">
                                          <h4 class="modal-title">Ubah Password</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <form method="POST" action="{{ route('fasil.change.password') }}">
                                          {{csrf_field()}}
                                          <div class="modal-body">
                                             @foreach ($errors->all() as $error)
                                             <p class="text-danger">{{ $error }}</p>
                                             @endforeach 
                                             <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
                                                <div class="col-md-6">
                                                   <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                                <div class="col-md-6">
                                                   <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
                                                <div class="col-md-6">
                                                   <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                                </div>
                                             </div>
                                             <div class="modal-footer justify-content-between">
                                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-success">Save</button>
                                          </div>
                                          </div>
                                       </form>
                                    </div>
                                    <!-- /.modal-content -->
                                 </div>
                                 <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->  
                           </div>
                           <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col -->
                     <div class="col-md-9">
                        <div class="card">
                           <div class="card-header p-2">
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div class="tab-content">
                                 <!-- Post -->
                                 <div class="post">
                                    <div class="user-block">
                                       <span class="username">
                                       <a href="#">Quotes</a>
                                       </span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                       {{$user->Fasil->quotes}}
                                    </p>
                                 </div>
                                 <!-- /.post -->
                                 <!-- Post -->
                                 <div class="post">
                                    <div class="user-block">
                                       <span class="username">
                                       <a href="#">Prestasi</a>
                                       </span>
                                    </div>
                                    <!-- /.user-block -->
                                    <?php
                                       echo $user->Fasil->prestasi ;
                                       ?>
                                 </div>
                                 <!-- /.post -->
                              </div>
                           </div>
                           <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            @endsection
@section('script')
@endsection