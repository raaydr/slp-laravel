@extends('topnav.topnavAdmin')
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
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">User Profile</li>
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
                     <div class="col-md-3">
                        @if(!empty($Lulus))
                        <div class="alert alert-success alert-dismissable">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                           <h4><i class="icon fa fa-check"></i>Success</h4>
                           {{session('lulus')}}.
                        </div>
                        @endif @if(!empty($Gagal))
                        <div class="alert alert-danger alert-dismissable">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                           <h4><i class="icon fa fa-check"></i>Success</h4>
                           {{session('gagal')}}.
                        </div>
                        @endif
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                           <div class="card-body box-profile">
                              <div class="text-center">
                                 <a class="btn btn-default" href="{{asset('imgfasil')}}/{{$user->Fasil->url_foto}}" target="_blank">
                                 <img class="profile-user-img img-fluid" src="{{asset('imgfasil')}}/{{$user->Fasil->url_foto}}" class="img-fluid" alt="Cinque Terre" />
                                 </a>
                              </div>
                              <h4 class="profile-username text-center">{{$user->Fasil->nama}}</h4>
                              <ul class="list-group list-group-unbordered mb-3">
                                 <li class="list-group-item"><b>Jenis Kelamin</b> <a class="float-right">{{$user->Fasil->jenis_kelamin}}</a></li>
                                 <li class="list-group-item"><b>No.Telp</b> <a class="float-right">{{$user->Fasil->phonenumber}}</a></li>
                                 <li class="list-group-item"><b>Instagram</b><a class="float-right" href="{{$user->Fasil->instagram}}" target="_blank">lihat</a></li>
                              </ul>
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

