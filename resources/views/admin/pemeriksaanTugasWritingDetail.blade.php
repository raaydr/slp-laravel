@extends('topnav.topnavAdmin')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Peserta</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Daily-Quest</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                        <div class="col-12" id="accordion">
                           <div class="card card-primary card-outline">
                              <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                 <div class="card-header">
                                    <h4 class="card-title w-100">
                                       <b>1. WRITING CHALLENGE!</b>
                                    </h4>
                                 </div>
                              </a>
                              <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                 <div class="card-body">
                                    <a>Ikuti tantangan ini sesuai ketentuan berikut!</a>
                                    <ol>
                                       <li>Setiap peserta wajib menulis sebuah tulisan dengan judul "Kontribusiku untuk Negeri" di upload ke instagram menggunakan foto pribadi.</li>
                                       <li>Jumlah kata pada tulisan minimal 200 kata.</li>
                                       <li>3.	Tag akun instagram @slp.indonesia dan gunakan hashtag #SmartLeaderPreneur, #WritingChallenge, dan #(kode unik) di postingan kalian.</li>
                                       <li>Akun instagram dilarang di <b>private.</b> Agar memudahkan kami dalam proses penilaian karya tulis yang kamu buat.</li>
                                       <li>Poin penilaian dari challenge ini dinilai dari jumlah kata, keaslian karya, dan kualitas isi.</li>
                                    </ol>
                                    <a>Periode challenge ini yaitu 26-29 April 2021. Mengerjakan lebih cepat lebih baik.</a>
                                    <br>
                                    <b>Note :</b>
                                    <ol>
                                       <li><b>Jika challenge ini belum selesai pada rentang waktu yang sudah ditentukan, maka otomatis gugur dalam seleksi.</b></li>
                                       <li><b>Kode Unik bisa di cek di profil pendaftaran.</b></li>
                                    </ol>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
               <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Pemeriksaan Quest Peserta hari ke - 2</h3>
                           </div>
                           <!-- /.card-header -->
                           <!-- form start -->
                           <div class="card-body">
                           <div class="form-group row">
                                 <label for="status" class="col-md-6 col-form-label text-md-right">{{ __('Status') }}</label>
                                 <div class="col-md-6 col-form-label ">
                                 <a class="text-danger"><b>Belum Valid</b></a>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">ID</label>
                                    <input type="text" class="form-control" name="id"  readonly>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputPassword1">Nama</label>
                                    <input type="text" class="form-control" name="nama" readonly>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="video" class="col-md-6 col-form-label text-md-right">{{ __('Link Video Challenge') }}</label>
                                 <div class="col-md-2 col-form-label text-md-left">
                                 <a class="text-danger"><b>Belum Valid</b></a>
                                 </div>
                              
                              </div>
                              <div class="form-group row">
                                 <label for="writing" class="col-md-6 col-form-label text-md-right">{{ __('Upload Writing Challenge ') }}</label>
                                 <div class="col-md-2 col-form-label text-md-left">
                                 
                                    
                                 </div>
                                 
                              </div>
                              <div class="form-group row">
                                 <label for="business" class="col-md-6 col-form-label text-md-right">{{ __('Upload Business Challenge') }}</label>
                                    <div class="col-md-2 col-form-label text-md-left">
                                       
                                       
                                    </div>
                                    
                              </div>
                           
                              <div class="form-group row">
                                 <label for="sumber_produk" class="col-md-6 col-form-label text-md-right">{{ __('Sumber Produk') }}</label>
                                 <div class="col-md-6 col-form-label ">
                                 <a class="text-danger"><b>Belum Valid</b></a>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="jenis_produk" class="col-md-6 col-form-label text-md-right">{{ __('Jenis Produk') }}</label>
                                 <div class="col-md-6 col-form-label ">
                                 <a class="text-danger"><b>Belum Valid</b></a>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="keterangan" class="col-md-6 col-form-label text-md-right">{{ __('Keterangan') }}</label>
                                 <div class="col-md-6 col-form-label ">
                                 <a class="text-danger"><b>Belum Valid</b></a>
                                 </div>
                              </div>
                              
                              <div class="form-group row">
                                 <label for="hasil" class="col-md-6 col-form-label text-md-right">{{ __('Profit Hari Ini') }}</label>
                                 <div class="col-md-2 col-form-label text-md-left">
                                    <hasil></hasil>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="note" class="col-md-6 col-form-label text-md-right">{{ __('Note untuk Peserta') }}</label>
                                 <div class="col-md-6 col-form-label ">
                                 
                                    <i class="fas fa-info"> </i>
                                    edit
                                    </button>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="notePeserta" class="col-md-6 col-form-label text-md-right">{{ __('Note Peserta') }}</label>
                                 <div class="col-md-6 col-form-label ">
                                 <a class="text-danger"><b>Belum Valid</b></a>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="status" class="col-md-6 col-form-label text-md-right"></label>
                                 <div class="col-md-6 col-form-label text-md-left">
                                 <a class="text-danger"><b>Belum Valid</b></a>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-body -->
                           <div class="modal fade" id="modal-note">
                              <div class="modal-dialog">
                                 <div class="modal-content bg-primary">
                                    <div class="modal-header">
                                       <h4 class="modal-title">Edit Writing Challenge</h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    
                                 </div>
                                 <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                           </div>
                           <!-- /.modal -->
                           <div class="card-footer">
                              
                              <!-- /.card-body -->
                           </div>
                        </div>
                        <!-- /.card -->
                        <div class="col-12">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Quest Peserta</h3>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
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
                           <div class="modal fade" id="modal-video">
                              <div class="modal-dialog">
                                 <div class="modal-content bg-primary">
                                    <div class="modal-header">
                                       <h4 class="modal-title">Periksa Video Challenge</h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    
                                 </div>
                                 <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                           </div>
                           <!-- /.modal -->
                           <div class="modal fade" id="modal-writing">
                              <div class="modal-dialog">
                                 <div class="modal-content bg-primary">
                                    <div class="modal-header">
                                       <h4 class="modal-title">Edit Writing Challenge</h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    
                                 </div>
                                 <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                           </div>
                           <!-- /.modal -->
                        </div>
                        <!-- /.card -->
                     </div>  
            </section>
            <!-- /.content -->
@endsection
@section('script')
