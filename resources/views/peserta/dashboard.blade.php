@extends('topnav.topnavPeserta')
@section('content')
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Dashboard</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/">Peserta</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
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
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i>Success</h4>
                            {{session('pesan')}}.
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-md-3">
                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <a class="btn btn-default" href="{{asset('imgdaftar')}}/{{$biodata->url_foto}}" target="_blank">
                                                <img class="profile-user-img img-fluid" src="{{asset('imgdaftar')}}/{{$biodata->url_foto}}" class="img-fluid" alt="Cinque Terre" />
                                            </a>
                                        </div>

                                        <h3 class="profile-username text-center">{{ $biodata->nama }}</h3>

                                        <p class="text-muted text-center">{{ $biodata->aktivitas}}</p>
                                        <div class="text-center">
                                            <a data-toggle="modal" data-target="#modal-foto" class="btn btn-primary btn-sm m-2">ubah foto</a>
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
                                                    <form method="POST" action="{{route('peserta.edit.foto')}}" enctype="multipart/form-data" class="was-validated">
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
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item"><b>Domisili</b> <a class="float-right">{{$biodata->domisili}}</a></li>
                                            <li class="list-group-item"><b>Jenis Kelamin</b> <a class="float-right">{{$biodata->jenis_kelamin}}</a></li>
                                            <li class="list-group-item"><b>Tanggal Lahir</b> <a class="float-right">{{$biodata->tanggal_lahir}}</a></li>
                                            <li class="list-group-item"><b>Kode Unik</b> <a class="float-right">{{$biodata->user_id}}</a></li>
                                            <li class="list-group-item"><b>Grup</b> <a class="float-right">{{$user->Peserta->grup}}</a></li>
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
                                        <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                                        <p class="text-muted">
                                            {{$biodata->email}}
                                        </p>

                                        <hr />
                                        <strong><i class="fas fa-book mr-1"></i> No.Handphone</strong>

                                        <p class="text-muted">
                                            {{$biodata->phonenumber}}
                                        </p>

                                        <hr />

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                                        <p class="text-muted">{{$biodata->alamat_domisili}}</p>

                                        <hr />

                                        <strong><i class="fas fa-pencil-alt mr-1"></i>Minat Program</strong>

                                        <p class="text-muted">
                                            <span class="tag tag-danger"> {{$biodata->minatprogram}}</span>
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
                                            <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#Pertama" data-toggle="tab">More about Me</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="timeline">
                                                <!-- The timeline -->
                                                <div class="timeline timeline-inverse">
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-orange">
                                                            5 Juni 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-comments bg-primary"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header"><a href="#">Stadium General</a></h3>

                                                            <div class="timeline-body">
                                                                Stadium General
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-success">
                                                            3 Juli 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-comments bg-orange"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header border-0"><a href="#">slp</a></h3>
                                                            <div class="timeline-body">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->

                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-primary">
                                                            7 Agustus 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-comments bg-success"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header border-0"><a href="#">slp</a></h3>
                                                            <div class="timeline-body">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-orange">
                                                            4 September 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-comments bg-primary"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header border-0"><a href="#">slp</a></h3>
                                                            <div class="timeline-body">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->

                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-success">
                                                            9 Oktober 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-comments bg-orange"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header border-0"><a href="#">slp</a></h3>
                                                            <div class="timeline-body">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-primary">
                                                            6 November 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-envelope bg-success"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header border-0"><a href="#">slp</a></h3>
                                                            <div class="timeline-body">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-danger">
                                                           Graduate
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-envelope bg-success"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header border-0"><a href="#">Graduate</a></h3>
                                                            <div class="timeline-body">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->

                                                    <div>
                                                        <i class="far fa-clock bg-gray"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="Pertama">
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Alasan Beasiswa</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$biodata->alasanbeasiswa}}
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
                                                        {{$biodata->five_pros}}
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
                                                        {{$biodata->five_cons}}
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
