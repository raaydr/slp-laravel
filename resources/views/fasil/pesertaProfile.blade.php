@extends('topnav.topnavFasil')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Profil Peserta</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Fasil</a></li>
                           <li class="breadcrumb-item active">Profile-Peserta</li>
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
                                 <a class="btn btn-default" href="{{asset('imgdaftar')}}/{{$user->Biodata->url_foto}}" target="_blank">
                                 <img class="profile-user-img img-fluid" src="{{asset('imgdaftar')}}/{{$user->Biodata->url_foto}}" class="img-fluid" alt="Cinque Terre" />
                                 </a>
                              </div>
                              <h3 class="profile-username text-center">{{ $user->Biodata->nama }}</h3>
                              <p class="text-muted text-center">{{ $user->Biodata->aktivitas}}</p>
                              <ul class="list-group list-group-unbordered mb-3">
                                 <li class="list-group-item"><b>Domisili</b> <a class="float-right">{{$user->Biodata->domisili}}</a></li>
                                 <li class="list-group-item"><b>Jenis Kelamin</b> <a class="float-right">{{$user->Biodata->jenis_kelamin}}</a></li>
                                 <li class="list-group-item"><b>Tanggal Lahir</b> <a class="float-right">{{$user->Biodata->tanggal_lahir}}</a></li>
                              </ul>
                           </div>
                           <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- About Me Box -->
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">About Me</h3>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <strong><i class="fas fa-book mr-1"></i> No.Handphone</strong>
                              <p class="text-muted">
                                 {{$user->Biodata->phonenumber}}
                              </p>
                              <hr />
                              <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                              <p class="text-muted">{{$user->Biodata->alamat_domisili}}</p>
                              <hr />
                              <strong><i class="fas fa-pencil-alt mr-1"></i>Minat Program</strong>
                              <p class="text-muted">
                                 <span class="tag tag-danger"> {{$user->Biodata->minatprogram}}</span>
                              </p>
                              <hr />
                           </div>
                           <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col -->
                     <div class="col-md-9">
                        <div class="card">
                           <div class="card-header p-2">
                              <ul class="nav nav-pills">
                                 <li class="nav-item"><a class="nav-link active" href="#Pertama" data-toggle="tab">More about Me</a></li>
                                 
                              </ul>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div class="tab-content">
                                 <div class="tab-pane active" id="Pertama">
                                    <!-- Post -->
                                    <div class="post">
                                       <div class="user-block">
                                          <span class="username">
                                          <a href="#">Alasan Beasiswa</a>
                                          </span>
                                       </div>
                                       <!-- /.user-block -->
                                       <p>
                                          {{$user->Biodata->alasanbeasiswa}}
                                       </p>
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                       <div class="user-block">
                                          <span class="username">
                                          <a href="#">5 Kelebihan</a>
                                          </span>
                                       </div>
                                       <!-- /.user-block -->
                                       <p>
                                          {{$user->Biodata->five_pros}}
                                       </p>
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                       <div class="user-block">
                                          <span class="username">
                                          <a href="#">5 Kekurangan</a>
                                          </span>
                                       </div>
                                       <!-- /.user-block -->
                                       <p>
                                          {{$user->Biodata->five_cons}}
                                       </p>
                                    </div>
                                    <!-- /.post -->
                                 </div>
                                 <!-- /.tab-pane -->
                              </div>
                              <!-- /.tab-content -->
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