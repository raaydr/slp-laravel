@extends('topnav.topnavPendaftar')
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
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
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
                                                    <form method="POST" action="{{route('pendaftar.edit.foto')}}" enctype="multipart/form-data" class="was-validated">
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
                                            @if (!empty($biodata->seleksi_berkas))
                                            <li class="list-group-item">
                                                <b>Tahap Pemberkasan</b> <a class="float-right"><strong>{{$biodata->seleksi_berkas}}</strong></a>
                                            </li>
                                            @endif 
                                            @if (!empty($biodata->seleksi_pertama))
                                            <li class="list-group-item">
                                                <b>Tahap Pertama</b> <a class="float-right"><strong>{{$biodata->seleksi_pertama}}</strong></a>
                                            </li>
                                            @endif
                                            @if (!empty($biodata->seleksi_kedua))
                                            <li class="list-group-item">
                                                <b>Tahap Kedua</b> <a class="float-right"><strong>{{$biodata->seleksi_kedua}}</strong></a>
                                            </li>
                                            @endif
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
                                            @if (!empty($biodata->seleksi_berkas))
                                            <li class="nav-item"><a class="nav-link" href="#Kedua" data-toggle="tab">Challenge</a></li>
                                            @endif
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
                                                        <span class="bg-danger">
                                                            15 April 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-envelope bg-primary"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header"><a href="#">Pembukaan Pendaftaran</a></h3>

                                                            <div class="timeline-body">
                                                                Mengisi Form Pendaftaran dengan benar dan sesuai. Setelah itu <b>LOGIN</b> dan <b>join link grup WA</b>
                                                                <a href="https://chat.whatsapp.com/GAZV0KBBI8T6a6kfYSnKWZ" target="”_blank”"><b>Join disini</b></a>
                                                                <br />
                                                                Jika Grup WA sudah penuh, join Grup WA lainnya <a href="https://chat.whatsapp.com/ElhCuc6irdn2HtGNnoJAMf" target="”_blank”"><b>Disini</b></a> dan
                                                                <a href="https://chat.whatsapp.com/KEM8zlDzYsZFG1BcGPW4ct" target="”_blank”"><b>Disini</b></a> <br />
                                                                Cukup join salah satu grup WA saja dari ketiga grup tersebut
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-success">
                                                            25 April 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-user bg-info"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header border-0"><a href="#">Seleksi Pertama</a></h3>
                                                            <div class="timeline-body">
                                                                Selanjutnya bagi yang lulus dari seleksi pendaftaran, akan masuk ke tahap selanjutnya yaitu melakukan semua challenge yang diberikan. Writing, Bussines, dan Video Challenge.
                                                                (Pengumuman dapat di check saat login di web ini).
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->

                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-success">
                                                            2 Mei 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-camera bg-purple"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header"><a href="#">Pengisian Form Challenge</a></h3>

                                                            <div class="timeline-body">
                                                                Jangan lupa untuk mengisi form sebagai laporan kamu telah menyelesaikan challenge sebelumnya.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-success">
                                                            22 Mei 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-comments bg-warning"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header"><a href="#">In Depth Interview</a></h3>

                                                            <div class="timeline-body">
                                                                Bagi yang lulus pada tahap challenge, akan lanjut ke tahap interview yang dilaksanakan secara offline.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->

                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-success">
                                                            23 Mei 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->

                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-danger">
                                                            28 Mei 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-envelope bg-green"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header"><a href="#">Pengumuman Tahap Akhir</a></h3>

                                                            <div class="timeline-body">
                                                                Setelah melewati semua tahapan seleksi, akan diumumkan hasil akhir penerima beasiswa SLP. Semoga mendapatkan hasil yang terbaik!
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END timeline item -->
                                                    <!-- timeline time label -->
                                                    <div class="time-label">
                                                        <span class="bg-success">
                                                            5 Juni 2021
                                                        </span>
                                                    </div>
                                                    <!-- /.timeline-label -->
                                                    <!-- timeline item -->
                                                    <div>
                                                        <i class="fas fa-envelope bg-primary"></i>

                                                        <div class="timeline-item">
                                                            <h3 class="timeline-header"><a href="#">Stadium General</a></h3>
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
                                            @if (!empty($biodata->seleksi_berkas))
                                            <div class="tab-pane" id="Kedua">
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Challenge</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <label for="exampleInputEmail1">Link Video Challenge :</label>
                                                    <a type="text" href="{{$seleksiPertama->url_video}}" target="_blank">{{$seleksiPertama->url_video}}</a>
                                                    <br />
                                                    <label for="exampleInputEmail1">Link Writing Challenge :</label>
                                                    <a type="text" href="{{$seleksiPertama->url_Writing}}" target="_blank">{{$seleksiPertama->url_writing}}</a>
                                                    <br />
                                                    <label for="exampleInputEmail1">Link Bussines Challenge :</label>
                                                    <a class="btn btn-success" href="{{asset('imgPembelian')}}/{{$seleksiPertama->url_Business}}" target="_blank">foto</a>
                                                    <br />
                                                    <label for="exampleInputEmail1">User CV :</label>
                                                    <a class="btn btn-warning" href="{{asset('cvPDF')}}/{{$seleksiPertama->url_cv}}" target="_blank">Lihat</a>
                                                    <br />
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Apakah kamu pernah mengikuti kegiatan mentoring keagamaan atau halaqoh?</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->mentoring}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Jika "Ya", seberapa sering kamu mengikuti kegiatan mentoring tersebut ? </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->mentoring_rutin}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Apa yang kamu lakukan ketika sedang futur (ketika malas beribadah dan melakukan kebaikan) ?</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->futur}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Apa yang kamu pahami tentang "Faith" (Keyakinan) ?</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->faith}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Apa yang kamu pahami tentang "ethic" (etika) ?</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->ethic}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Bagaimana tanggapanmu jika melihat atau mengenal orang yang memiliki kemampuan lebih baik dibandingkan dirimu ? </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->question1}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Menurutmu apa perbedaan antara etika, moral, dan akhlak ?</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->question2}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Bagaimana caramu agar dapat konsisten beretika dan berakhlak baik ? Berikan contohnya !</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->question3}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Apa yang kamu pahami tentang "Leadership" ? </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->question4}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Pernahkan kamu aktif terlibat dalam sebuah organisasi ? </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->organisasi}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Jika "Pernah", apa peranmu dalam organisasi tersebut ? Jelaskan aktivitas organisasi tersebut !</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->aktif_organisasi}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Sebagai seorang pemimpin, apa yang kamu lakukan jika anggota kelompokmu melakukan kesalahan ? </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->question5}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Sebagai seorang anggota, apa yang kamu lakukan jika mengetahui pemimpinmu melakukan kesalahan?</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->question6}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Apa yang kamu pahami tentang "Entrepreneurship" ?Jelaskan ! </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->entrepreneurship}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Kenapa kamu ingin berwirausaha? Jelaskan alasan terbesarmu ! </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->alasan_wirausaha}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Apakah kamu pernah berdagang atau berbisnis ? (selain challenge dari SLP) </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->pernah_wirausaha}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Jika pernah berdagang atau berbisnis, jelaskan pengalamanmu ! (selain challenge dari SLP)</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->exp_wirausaha}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->

                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Berapa omset terbesar yang pernah kamu raih dalam berwirausaha ? </a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        {{$seleksiPertama->omset}}
                                                    </p>
                                                </div>
                                                <!-- /.post -->
                                                <div class="input-group-append">
                                                    <a href="{{ route('pendaftar.seleksi1') }}" class="btn btn-primary m-2">Ubah</a>
                                                </div>                                                
                                            </div>
                                            <!-- /.tab-pane -->
                                            @endif
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