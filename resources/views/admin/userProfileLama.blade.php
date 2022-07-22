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
                                 <a class="btn btn-default" href="{{asset('imgdaftar')}}/{{$user->Biodata->url_foto}}" target="_blank">
                                 <img class="profile-user-img img-fluid" src="{{asset('imgdaftar')}}/{{$user->Biodata->url_foto}}" class="img-fluid" alt="Cinque Terre" />
                                 </a>
                              </div>
                              <h4 class="profile-username text-center">{{$user->Biodata->nama}}</h4>
                              <p class="text-muted text-center">{{$user->Biodata->aktivitas}}</p>
                              <ul class="list-group list-group-unbordered mb-3">
                                 <li class="list-group-item"><b>Domisili</b> <a class="float-right">{{$user->Biodata->domisili}}</a></li>
                                 <li class="list-group-item"><b>Jenis Kelamin</b> <a class="float-right">{{$user->Biodata->jenis_kelamin}}</a></li>
                                 <li class="list-group-item"><b>Tanggal Lahir</b> <a class="float-right">{{$user->Biodata->tanggal_lahir}}</a></li>
                                 @if(!empty($user->Biodata->seleksi_berkas))
                                 <lsi class="list-group-item"><b>Seleksi Berkas</b> <a class="float-right">{{$user->Biodata->seleksi_berkas}}</a></lsi>
                                 @endif
                                 @if(!empty($user->Biodata->seleksi_pertama))
                                 <li class="list-group-item"><b>Seleksi Pertama</b> <a class="float-right">{{$user->Biodata->seleksi_pertama}}</a></li>
                                 @endif
                                 @if(!empty($user->Biodata->seleksi_kedua))
                                 <li class="list-group-item"><b>Seleksi Kedua</b> <a class="float-right">{{$user->Biodata->seleksi_kedua}}</a></li>
                                 @endif
                                 @if((($user->Biodata->seleksi_kedua)=="BERHASIL")&&(($user->level)==1)== 1)
                                 <div class="form-group row">
                                    <label  class="col-md-12 col-form-label text-md-center">Stadium general </label>
                                    <div class="offset-sm-2 col-sm-10">
                                       <a  data-toggle="modal" data-target="#modal-primary3" class="btn btn-primary" >Lulus</a>
                                       <a data-toggle="modal" data-target="#modal-danger3" class="btn btn-danger">Gagal</a>
                                    </div>
                                 </div>
                                 @endif
                                 <div class="modal fade" id="modal-danger3">
                                    <div class="modal-dialog">
                                       <div class="modal-content bg-danger">
                                          <div class="modal-header">
                                             <h4 class="modal-title">Stadium General</h4>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <p>Anda yakin ingin mengeliminasi pendaftar ?</p>
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                             <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                             <a href="{{ route('admin.stadiumgeneral', [$user->Biodata->user_id,0]) }}" type="button" class="btn btn-outline-light">Gagal</a>
                                          </div>
                                       </div>
                                       <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                 </div>
                                 <!-- /.modal -->
                                 <!-- /.modal -->
                                 <div class="modal fade" id="modal-primary3">
                                    <div class="modal-dialog">
                                       <div class="modal-content bg-primary">
                                          <div class="modal-header">
                                             <h4 class="modal-title">Stadium General</h4>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <p>Anda yakin ingin meluluskan peserta ?</p>
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                             <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                             <a href="{{ route('admin.stadiumgeneral', [$user->Biodata->user_id,1]) }}" type="button" class="btn btn-outline-light">Lulus</a>
                                          </div>
                                       </div>
                                       <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                 </div>
                                 <!-- /.modal -->
                              </ul>
                           </div>
                           <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- About Me Box -->
                        <div class="card card-primary">
                           <div class="card-header">
                              <h4 class="card-title">About Me</h4>
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
                              @if(session('berhasil'))
                              <div class="alert alert-success alert-dismissable md-5">
                                 <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                 <h5><i class="icon fa fa-check"></i>Seleksi</h5>
                                 {{session('berhasil')}}.
                              </div>
                              @endif
                              @if(session('pesan'))
                              <div class="alert alert-warning alert-dismissable md-5">
                                 <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                 <h5><i class="icon fa fa-info"></i>Berhasil</h5>
                                 {{session('pesan')}}.
                              </div>
                              @endif
                              @if(session('challenge'))
                              <div class="alert alert-primary alert-dismissable md-5">
                                 <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                 <h5><i class="icon fa fa-check"></i>Seleksi Challenge</h5>
                                 {{session('challenge')}}.
                              </div>
                              @endif
                              @if(session('challengeerror'))
                              <div class="alert alert-danger alert-dismissable md-5">
                                 <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                 <h5><i class="icon fa fa-info"></i>Seleksi Challenge</h5>
                                 {{session('challengeerror')}}.
                              </div>
                              @endif
                              <ul class="nav nav-pills">
                                 <li class="nav-item"><a class="nav-link active" href="#Pertama" data-toggle="tab">Seleksi Berkas</a></li>
                                 @if(!empty($user->Biodata->seleksi_berkas))
                                 <li class="nav-item"><a class="nav-link" href="#Kedua" data-toggle="tab">Seleksi Pertama</a></li>
                                 @endif
                                 @if(!empty($user->Antrian->antrian))
                                 <li class="nav-item"><a class="nav-link" href="#Ketiga" data-toggle="tab">Seleksi Kedua</a></li>
                                 @endif
                                 @if(!empty($user->Peserta->id))
                                 <li class="nav-item"><a class="nav-link" href="#Keempat" data-toggle="tab">Quest</a></li>
                                 @endif
                              </ul>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div class="tab-content">
                                 <div class="active tab-pane" id="Pertama">
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
                                    <div class="input-group-append">
                                    @if ((!empty($user->Biodata->seleksi_berkas)) && (empty($user->Biodata->seleksi_pertama)))
                                       <a data-toggle="modal" data-target="#modal-primary" class="btn btn-primary m-2">Lulus</a>
                                       <a data-toggle="modal" data-target="#modal-danger" class="btn btn-danger m-2">Gagal</a>
                                    @endif
                                    </div>
                                    <div class="modal fade" id="modal-primary">
                                       <div class="modal-dialog">
                                          <div class="modal-content bg-primary">
                                             <div class="modal-header">
                                                <h4 class="modal-title">Tahap Seleksi Berkas</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body">
                                                <p>Anda yakin ingin meloloskan peserta ?</p>
                                             </div>
                                             <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                <a href="{{ route('admin.seleksi1.lulus', $user->Biodata->user_id) }}" type="button" class="btn btn-outline-light">Lulus</a>
                                             </div>
                                          </div>
                                          <!-- /.modal-content -->
                                       </div>
                                       <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <div class="modal fade" id="modal-danger">
                                       <div class="modal-dialog">
                                          <div class="modal-content bg-danger">
                                             <div class="modal-header">
                                                <h4 class="modal-title">Tahap Seleksi Berkas</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body">
                                                <p>Anda yakin ingin mengeliminasi peserta ?</p>
                                             </div>
                                             <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                <a href="{{ route('admin.seleksi1.gagal', $user->Biodata->user_id) }}" type="button" class="btn btn-outline-light">Gagal</a>
                                             </div>
                                          </div>
                                          <!-- /.modal-content -->
                                       </div>
                                       <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                 </div>
                                 <!-- /.tab-pane -->
                                 @if (!empty($user->Biodata->seleksi_berkas))
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
                                       <a type="text" href="{{$user->seleksiPertama->url_video}}" target="_blank">{{$user->seleksiPertama->url_video}}</a>
                                       <br />
                                       <label for="exampleInputEmail1">Link Writing Challenge :</label>
                                       <a type="text" href="{{$user->seleksiPertama->url_Writing}}" target="_blank">{{$user->seleksiPertama->url_writing}}</a>
                                       <br />
                                       <label for="exampleInputEmail1">Link Bussines Challenge :</label>
                                       <a class="btn btn-default" href="{{asset('imgPembelian')}}/{{$user->seleksiPertama->url_Business}}" target="_blank">foto</a>
                                       <br />
                                       <label for="exampleInputEmail1">User CV :</label>
                                       <a class="btn btn-primary" href="{{asset('cvPDF')}}/{{$user->seleksiPertama->url_cv}}" target="_blank">Lihat</a>
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
                                          {{$user->seleksiPertama->mentoring}}
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
                                          {{$user->seleksiPertama->mentoring_rutin}}
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
                                          {{$user->seleksiPertama->futur}}
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
                                          {{$user->seleksiPertama->faith}}
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
                                          {{$user->seleksiPertama->ethic}}
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
                                          {{$user->seleksiPertama->question1}}
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
                                          {{$user->seleksiPertama->question2}}
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
                                          {{$user->seleksiPertama->question3}}
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
                                          {{$user->seleksiPertama->question4}}
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
                                          {{$user->seleksiPertama->organisasi}}
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
                                          {{$user->seleksiPertama->aktif_organisasi}}
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
                                          {{$user->seleksiPertama->question5}}
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
                                          {{$user->seleksiPertama->question6}}
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
                                          {{$user->seleksiPertama->entrepreneurship}}
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
                                          {{$user->seleksiPertama->alasan_wirausaha}}
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
                                          {{$user->seleksiPertama->pernah_wirausaha}}
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
                                          {{$user->seleksiPertama->exp_wirausaha}}
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
                                          {{$user->seleksiPertama->omset}}
                                       </p>
                                    </div>
                                    <!-- /.post -->
                                    
                                 </div>
                                 <!-- /.tab-pane -->
                                 @endif
                                 @if(!empty($user->Antrian->antrian))
                                 <div class="tab-pane" id="Ketiga">
                                    <div class="row">
                                       <div class="col-12">
                                          <div class="card card-danger">
                                             <div class="card-header">
                                                <h4 class="card-title">
                                                   <i class="far fa-chart-bar"></i>
                                                   Hasil Seleksi Challenge
                                                </h4>
                                                <div class="card-tools">
                                                   <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                   <i class="fas fa-minus"></i>
                                                   </button>
                                                </div>
                                             </div>
                                             <!-- /.card-header -->
                                             <div class="card-body">
                                                <div class="row">
                                                   <div class="col-6 col-md-3 text-center">
                                                      <input type="text" class="knob" value="{{$user->Penilaian->writing}}" data-skin="tron" data-thickness="0.2" data-width="90"
                                                         data-height="90" data-fgColor="#3c8dbc" data-readonly="true">
                                                      <div class="knob-label">Nilai Writing</div>
                                                      <a href="{{$user->seleksiPertama->url_writing}}" target="_blank">check</a>
                                                   </div>
                                                   <!-- ./col -->
                                                   <div class="col-6 col-md-3 text-center">
                                                      <input type="text" class="knob" value="{{$user->Penilaian->video}}" data-skin="tron" data-thickness="0.2" data-width="90"
                                                         data-height="90" data-fgColor="#f56954" data-readonly="true">
                                                      <div class="knob-label">Nilai Video</div>
                                                      <a href="{{$user->seleksiPertama->url_video}}" target="_blank">check</a>
                                                   </div>
                                                   <!-- ./col -->
                                                   <div class="col-lg-6 col-6">
                                                      <!-- small card -->
                                                      <div class="small-box bg-info">
                                                         <div class="inner" >
                                                            <p>Total Penjualan</p>
                                                            <omset  id="penjualan"></omset>
                                                         </div>
                                                         <div class="icon">
                                                            <i class="fas fa-shopping-cart"></i>
                                                         </div>
                                                         <a class="small-box-footer" href="{{asset('imgPembelian')}}/{{$user->seleksiPertama->url_Business}}" target="_blank">
                                                         Nilali Business : {{$user->Penilaian->business}}
                                                         </a>
                                                      </div>
                                                   </div>
                                                   <!-- ./col -->
                                                </div>
                                                <!-- /.row -->
                                             </div>
                                             <!-- /.card-body -->
                                          </div>
                                          <!-- /.card -->
                                       </div>
                                       <!-- /.col -->
                                       <div class="col-12">
                                          <div class="card card-primary">
                                             <div class="card-header">
                                                <h4 class="card-title">
                                                   <i class="fas fa-book mr-1"></i>
                                                   Seleksi Interview
                                                </h4>
                                                <div class="card-tools">
                                                   <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                   <i class="fas fa-minus"></i>
                                                   </button>
                                                </div>
                                             </div>
                                             <!-- /.card-header -->
                                             <div class="card-body">
                                                <form class="form-horizontal">
                                                   <div class="form-group row">
                                                      <label for="inputName" class="col-sm-4 col-form-label">No Antrian</label>
                                                      <div class="col-sm-8">
                                                         <input type="email" class="form-control" id="inputName" value="{{$user->Antrian->antrian}}" readyonly/>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label for="inputEmail" class="col-sm-4 col-form-label">Absensi</label>
                                                      <div class="col-sm-8">
                                                         <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{$user->Antrian->absen}}"  readyonly/>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <label for="inputName" class="col-sm-4 col-form-label">Waktu</label>
                                                      <div class="col-sm-8">
                                                         <input type="email" class="form-control" id="inputName" value="{{$user->Antrian->updated_at}}" readyonly/>
                                                      </div>
                                                   </div>
                                                   @if(!empty($user->Kepribadian->url_kepribadian))
                                                   <div class="form-group row">
                                                      <label for="inputName2" class="col-sm-4 col-form-label">Tes Kepribadian</label>
                                                      <div class="col-sm-8">
                                                         <a  class="btn btn-success" href="{{asset('teskepribadian')}}/{{$user->Kepribadian->url_kepribadian}}" target="_blank">check</a>
                                                      </div>
                                                   </div>
                                                   @endif
                                                   <div class="form-group row">
                                                      <label for="inputExperience" class="col-sm-4 col-form-label">Note</label>
                                                      <div class="col-sm-8">
                                                         <h7 >{{$user->Antrian->note}}</h7>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <div class="offset-sm-2 col-sm-10">
                                                         <a  data-toggle="modal" data-target="#modal-primary2" class="btn btn-primary" >Lulus</a>
                                                         <a data-toggle="modal" data-target="#modal-danger2" class="btn btn-danger">Gagal</a>
                                                      </div>
                                                   </div>
                                                   <div class="modal fade" id="modal-danger2">
                                                      <div class="modal-dialog">
                                                         <div class="modal-content bg-danger">
                                                            <div class="modal-header">
                                                               <h4 class="modal-title">Tahap Seleksi Kedua</h4>
                                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                               <span aria-hidden="true">&times;</span>
                                                               </button>
                                                            </div>
                                                            <div class="modal-body">
                                                               <p>Anda yakin ingin mengeliminasi peserta ?</p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                               <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                               <a href="{{ route('admin.seleksi.interview', [$user->Biodata->user_id,0]) }}" type="button" class="btn btn-outline-light">Gagal</a>
                                                            </div>
                                                         </div>
                                                         <!-- /.modal-content -->
                                                      </div>
                                                      <!-- /.modal-dialog -->
                                                   </div>
                                                   <!-- /.modal -->
                                                   <!-- /.modal -->
                                                   <div class="modal fade" id="modal-primary2">
                                                      <div class="modal-dialog">
                                                         <div class="modal-content bg-primary">
                                                            <div class="modal-header">
                                                               <h4 class="modal-title">Tahap Seleksi Kedua</h4>
                                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                               <span aria-hidden="true">&times;</span>
                                                               </button>
                                                            </div>
                                                            <div class="modal-body">
                                                               <p>Anda yakin ingin meluluskan peserta ?</p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                               <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                               <a href="{{ route('admin.seleksi.interview', [$user->Biodata->user_id,1]) }}" type="button" class="btn btn-outline-light">Lulus</a>
                                                            </div>
                                                         </div>
                                                         <!-- /.modal-content -->
                                                      </div>
                                                      <!-- /.modal-dialog -->
                                                   </div>
                                                   <!-- /.modal -->
                                                </form>
                                             </div>
                                             <!-- /.card-body -->
                                          </div>
                                          <!-- /.card -->
                                       </div>
                                       <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                 </div>
                                 <!-- /.tab-pane -->
                                 @endif
                                 @if(!empty($user->Peserta->id))
                                 <div class="tab-pane " id="Keempat">
                                    <div class="row">
                                       <div class="col-md-4 col-sm-8 col-12">
                                          <div class="info-box bg-gradient-info">
                                             <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                                             <div class="info-box-content">
                                                <span class="info-box-text">Writing Rate</span>
                                                <span class="info-box-number">{{$writing_challenge}}x passed challenge</span>
                                                <div class="progress">
                                                   <div class="progress-bar" style="width: {{$rate_writing}}%"></div>
                                                </div>
                                                <span class="progress-description">
                                                {{$rate_writing}}% until {{$quest}} days
                                                </span>
                                             </div>
                                             <!-- /.info-box-content -->
                                          </div>
                                          <!-- /.info-box -->
                                       </div>
                                       <!-- /.col -->
                                       <div class="col-md-4 col-sm-8 col-12">
                                          <div class="info-box bg-gradient-success">
                                             <span class="info-box-icon"><i class="fas fa-shopping-cart"></i></span>
                                             <div class="info-box-content">
                                                <span class="info-box-text">Business Rate</span>
                                                <span class="info-box-number">{{$business_challenge}}x passed challenge</span>
                                                <div class="progress">
                                                   <div class="progress-bar" style="width: {{$rate_business}}%"></div>
                                                </div>
                                                <span class="progress-description">
                                                {{$rate_business}}% until {{$quest}} days
                                                </span>
                                             </div>
                                             <!-- /.info-box-content -->
                                          </div>
                                          <!-- /.info-box -->
                                       </div>
                                       <!-- /.col -->
                                       <div class="col-md-4 col-sm-8 col-12">
                                          <div class="info-box bg-gradient-danger">
                                             <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                                             <div class="info-box-content">
                                                <span class="info-box-text">Video Rate</span>
                                                <span class="info-box-number">{{$video_challenge}}x passed challenge</span>
                                                <div class="progress">
                                                   <div class="progress-bar" style="width: {{$rate_video}}%"></div>
                                                </div>
                                                <span class="progress-description">
                                                {{$rate_video}}% until {{$quest}} days
                                                </span>
                                             </div>
                                             <!-- /.info-box-content -->
                                          </div>
                                          <!-- /.info-box -->
                                       </div>
                                       <!-- /.col -->
                                       <div class="col-md-4 col-sm-8 col-12">
                                          <div class="info-box bg-gradient-orange">
                                             <span class="info-box-icon"><i class="ion ion-stats-bars"></i></span>
                                             <div class="info-box-content">
                                                <span class="info-box-text">Profit</span>
                                                <span class="info-box-number">
                                                   <earn></earn>
                                                </span>
                                                <div class="progress">
                                                   <div class="progress-bar" style="width: {{$rate_hasil}}%"></div>
                                                </div>
                                                <span class="progress-description">
                                                {{$rate_hasil}}% until Rp 2.000.000
                                                </span>
                                             </div>
                                             <!-- /.info-box-content -->
                                          </div>
                                          <!-- /.info-box -->
                                       </div>
                                       <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                    <div class="row">
                                       <div class="col-12">
                                          <div class="card">
                                             <div class="card-header">
                                                <h3 class="card-title">List Daily Quest</h3>
                                             </div>
                                             <!-- /.card-header -->
                                             <div class="card-body">
                                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                                   <thead>
                                                      <tr>
                                                         <th>Hari</th>
                                                         <th>Public Speaking</th>
                                                         <th>Writing</th>
                                                         <th>Business</th>
                                                         <th>status</th>
                                                         <th></th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                      @foreach ($daily_quest as $data)
                                                      <tr>
                                                         <td>{{ $data->day }}</td>
                                                         <td>
                                                            @if(($data->video)== 'belum mengerjakan')
                                                            <a class="text-danger" type="text" >kosong</a>
                                                            @else    
                                                            <a type="text" href="{{$data->video}}" target="_blank">link video</a>
                                                            @if(($data->video_check)== 0)
                                                            <p class="text-orange">dalam pemeriksaan</p>
                                                            @endif 
                                                            @if(($data->video_check)== 1)
                                                            <p class="text-primary"><b>Quest Done</b></p>
                                                            <p >topik : {{ $data->topik_video }}</p>
                                                            <p >note : {{ $data->komentar_video }}</p>
                                                            @endif
                                                            @if(($data->video_check)== 2)
                                                            <p class="text-danger"><b>Quest Fail</b></p>
                                                            <p >topik : {{ $data->topik_video }}</p>
                                                            <p >note : {{ $data->komentar_video }}</p>
                                                            @endif
                                                            @endif
                                                         </td>
                                                         <td>
                                                            @if(($data->writing)== 'belum mengerjakan')
                                                            <a class="text-danger" type="text" >kosong</a>
                                                            @else    
                                                            <a type="text" href="{{ route('admin.download.writing', Crypt::encrypt($data->id)) }}" >file</a>
                                                            @if(($data->writing_check)== 0)
                                                            <p class="text-orange">sedang diperiksa</p>
                                                            @endif 
                                                            @if(($data->writing_check)== 1)
                                                            <p class="text-primary"><b>Quest Clear</b></p>
                                                            <p >topik : {{ $data->topik_writing }}</p>
                                                            <p >note : {{ $data->komentar_writing }}</p>
                                                            @endif
                                                            @if(($data->writing_check)== 2)
                                                            <p class="text-danger"><b>Quest Gagal</b></p>
                                                            <p >topik : {{ $data->topik_writing }}</p>
                                                            <p >note : {{ $data->komentar_writing }}</p>
                                                            @endif
                                                            @endif
                                                         </td>
                                                         <td>
                                                            @if(($data->business)== 'belum mengerjakan')
                                                            <a class="text-danger" type="text" >kosong</a>
                                                            @else    
                                                            @if(($data->business_check)== 0)
                                                            <p class="text-orange">lagi diperiksa</p>
                                                            @endif 
                                                            @if(($data->business_check)== 1)
                                                            <p class="text-success"><b>Quest Complete</b></p>
                                                            @endif
                                                            @if(($data->business_check)== 2)
                                                            <p class="text-danger"><b>Quest Kandas</b></p>
                                                            @endif
                                                            @endif
                                                         </td>
                                                         <td>
                                                            @if(($data->status)== 0)
                                                            <p class="text-danger"><b>BELUM VALID</b></p>
                                                            @endif @if(($data->status)== 1)
                                                            <p class="text-success"><b>VALID</b></p>
                                                            @endif
                                                         </td>
                                                         <td class="project-actions text-right">
                                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.detail.quest', [$user->id,$data->id])}}" target="_blank">
                                                            <i class="fas fa-folder"> </i>
                                                            Detail
                                                            </a>
                                                         </td>
                                                      </tr>
                                                      @endforeach
                                                   </tbody>
                                                   <tfoot>
                                                      <tr>
                                                         <th>Hari</th>
                                                         <th>Public Speaking</th>
                                                         <th>Writing</th>
                                                         <th>Business</th>
                                                         <th>status</th>
                                                         <th></th>
                                                      </tr>
                                                   </tfoot>
                                                </table>
                                             </div>
                                             <!-- /.card-body -->
                                          </div>
                                          <!-- /.card -->
                                       </div>
                                    </div>
                                 </div>
                                 <!-- /.row -->
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
@section('script')
      <!-- jQuery Knob -->
      <script src="{{asset('template')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
      <!-- Sparkline -->
      <script src="{{asset('template')}}/plugins/sparklines/sparkline.js"></script>
      <script>
         function rupiah(){
               var bilangan = {{$penjualan}};
               var	number_string = bilangan.toString(),
               sisa 	= number_string.length % 3,
               rupiah 	= number_string.substr(0, sisa),
               ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
               
               if (ribuan) {
                  separator = sisa ? '.' : '';
                  rupiah += separator + ribuan.join('.');
               }
               
               // Cetak hasil
               
                  
               
               $("omset").text("Rp "+rupiah)
         
         //the function body is the same as you have defined sue the textbox object to set the value
         }
         rupiah();
         
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
         /* jQueryKnob */
         
         $('.knob').knob({
         /*change : function (value) {
         //console.log("change : " + value);
         },
         release : function (value) {
         console.log("release : " + value);
         },
         cancel : function () {
         console.log("cancel : " + this.value);
         },*/
         draw: function () {
         
         // "tron" case
         if (this.$.data('skin') == 'tron') {
         
           var a   = this.angle(this.cv)  // Angle
             ,
               sa  = this.startAngle          // Previous start angle
             ,
               sat = this.startAngle         // Start angle
             ,
               ea                            // Previous end angle
             ,
               eat = sat + a                 // End angle
             ,
               r   = true
         
           this.g.lineWidth = this.lineWidth
         
           this.o.cursor
           && (sat = eat - 0.3)
           && (eat = eat + 0.3)
         
           if (this.o.displayPrevious) {
             ea = this.startAngle + this.angle(this.value)
             this.o.cursor
             && (sa = ea - 0.3)
             && (ea = ea + 0.3)
             this.g.beginPath()
             this.g.strokeStyle = this.previousColor
             this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
             this.g.stroke()
           }
         
           this.g.beginPath()
           this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
           this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
           this.g.stroke()
         
           this.g.lineWidth = 2
           this.g.beginPath()
           this.g.strokeStyle = this.o.fgColor
           this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
           this.g.stroke()
         
           return false
         }
         }
         })
         /* END JQUERY KNOB */
         
         //INITIALIZE SPARKLINE CHARTS
         var sparkline1 = new Sparkline($('#sparkline-1')[0], { width: 240, height: 70, lineColor: '#92c1dc', endColor: '#92c1dc' })
         var sparkline2 = new Sparkline($('#sparkline-2')[0], { width: 240, height: 70, lineColor: '#f56954', endColor: '#f56954' })
         var sparkline3 = new Sparkline($('#sparkline-3')[0], { width: 240, height: 70, lineColor: '#3af221', endColor: '#3af221' })
         
         sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021])
         sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921])
         sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21])
         
         })
      </script>
   
@endsection

