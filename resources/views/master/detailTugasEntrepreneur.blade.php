
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                     <a class="btn btn-info btn-sm mb-3" onclick="goBack()" >
                        <i class="fas fa-arrow-left"></i> kembali
                     </a>
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Detail Tugas Entrepreneur</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">{{getMyPermission(Auth::user()->level)}}</a></li>
                           <li class="breadcrumb-item active">Detail tugas entrepreneur</li>
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
                                    <b>{{$target->judul}}</b>
                                 </h4>
                                 <h4 class="card-title w-100">
                                    <b>Tanggal Mulai : {{$tanggal_mulai}}</b>
                                 </h4>
                              </div>
                           </a>
                           <div id="collapseOne" class="collapse show" data-parent="#accordion">
                              <div class="card-body">
                              <?php
                                       echo $target->keterangan ;
                                       ?>
                              </div>
                           </div>
                        </div>
                     </div>
                     </div>
               <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Tugas Entrepreneur</h3>
                           </div>
                           <!-- /.card-header -->
                           <!-- form start -->
                           @if(session('pesan'))
                           <div class="alert alert-success alert-dismissable mt-3">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h4><i class="icon fa fa-check"></i>Success</h4>
                              {{session('pesan')}}.
                           </div>
                              @endif
                           <div class="card-body">
                           <div class="form-group row">
                                 <label for="status" class="col-md-6 col-form-label text-md-right">{{ __('Status') }}</label>
                                 <div class="col-md-6 col-form-label ">
                                 @switch($tugas->valid)
                                 @case(0)
                                    <a class="text-warning"><b>belum diperiksa</b></a>
                                    @break
                                 @case(1)
                                    <a class="text-success"><b>valid</b></a>
                                    @break
                                 @case(2)
                                    <a class="text-danger"><b>invalid</b></a>
                                    @break                              
                                 @default
                                    Default case...
                                 @endswitch
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" value="{{$peserta->nama}}"readonly> 
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputPassword1">Grup</label>
                                    <input type="text" class="form-control" value="{{$peserta->grup}}"readonly> 
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="video" class="col-md-6 col-form-label text-md-right">{{ __('Target Tugas') }}</label>
                                 <div class="col-md-2 col-form-label text-md-left">
                                 <a class="text-primary"><b>{{$tugas->target_tugas}}</b></a>
                                 </div>
                              
                              </div>
                              <div class="form-group row">
                                 <label for="writing" class="col-md-6 col-form-label text-md-right">{{ __('Judul') }}</label>
                                 <div class="col-md-2 col-form-label text-md-left">
                                 <a class="text-primary"><b>{{$tugas->judul}}</b></a>
                                 </div>
                                 
                              </div>
                              <div class="form-group row">
                                 <label for="writing" class="col-md-6 col-form-label text-md-right">{{ __('Sumber Produk') }}</label>
                                 <div class="col-md-2 col-form-label text-md-left">
                                 <a class="text-primary"><b>{{$tugas->sumber_produk}}</b></a>
                                 </div>
                                 
                              </div>
                              <div class="form-group row">
                                 <label for="writing" class="col-md-6 col-form-label text-md-right">{{ __('Jenis Produk') }}</label>
                                 <div class="col-md-2 col-form-label text-md-left">
                                 <a class="text-primary"><b>{{$tugas->jenis_produk}}</b></a>
                                 </div>
                                 
                              </div>
                              <div class="form-group row">
                                 <label for="writing" class="col-md-6 col-form-label text-md-right">{{ __('Profit') }}</label>
                                 <div class="col-md-2 col-form-label text-md-left">
                                 <a class="text-primary"><b><omset  id="penjualan"></omset></b></a>
                                 </div>
                                 
                              </div>
                              
                              <div class="form-group row">
                                 <label for="business" class="col-md-6 col-form-label text-md-right">{{ __('Tugas Entrepreneur') }}</label>
                                    <div class="col-md-6 col-form-label text-md-left">
                                       <div class="col-12">
                                          @if($boolean == 2)
                                          <a class="text-danger"><b>Kosong</b></a>
                                          @else
                                             <div class="card card-primary">
                                                <div class="card-header">
                                                   <h4 class="card-title">Bukti Entrepreneur</h4>
                                                </div>
                                                <div class="card-body">
                                                   <div class="row">
                                                      @foreach(json_decode($tugas->entrepreneur) as $image)
                                                         <div class="col-sm-4">
                                                            <a href="{{ asset('/entrepreneur/'.$image) }}" data-toggle="lightbox" data-title="{{$tugas->judul}}" data-gallery="gallery">
                                                               <img src="{{ asset('/entrepreneur/'.$image) }}" class="img-fluid mb-2" alt="white sample"/>
                                                            </a>
                                                         
                                                         </div>
                                                      @endforeach
                                                   </div>
                                                </div>
                                          
                                             </div>
                                          @endif
                                       </div>
                                    </div>
                                    
                              </div>
                              <div class="form-group row">
                                 <label for="jenis_produk" class="col-md-6 col-form-label text-md-right">{{ __('Keterangan') }}</label>
                                 <div class="col-md-6 col-form-label ">
                                 <?php
                                       echo $tugas->keterangan ;
                                       ?>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="keterangan" class="col-md-6 col-form-label text-md-right">{{ __('Komentar') }}</label>
                                 <div class="col-md-6 col-form-label ">
                                 @if($tugas->note == NULL)
                                 <a class="text"><b>Belum ada</b></a>
                                 @else
                                       <?php
                                       echo $tugas->note ;
                                       ?>
                                 @endif
                                 </div>
                              </div>
                              @if ((Auth::user()->level) == 0)
                              <div class="form-group row">
                                 <label for="jenis_produk" class="col-md-6 col-form-label text-md-right">{{ __('Action') }}</label>
                                 <div class="col-md-6 col-form-label ">
                                 <button class="btn btn-warning btn-sm" data-toggle="modal" data-tugas_id="{{ Crypt::encrypt($tugas->id)}}" data-target_id="{{ Crypt::encrypt($target->id)}}" data-target="#modal-note"target="_blank">
                                 <i class="fas fa-info"> </i>Note</button>
                                 @if($tugas->valid != 2)
                                 <a data-toggle="modal" data-target="#modal-primary" class="btn btn-success btn-sm">Valid</a>
                                 <a data-toggle="modal" data-target="#modal-danger" class="btn btn-danger btn-sm">Invalid</a>
                                 @endif
                                 </div>
                              </div>
                              @endif
                                 <div class="modal fade" id="modal-primary">
                                       <div class="modal-dialog">
                                          <div class="modal-content bg-primary">
                                             <div class="modal-header">
                                                <h4 class="modal-title">Tugas Peserta</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body">
                                                <p>Anda yakin Tugas Peserta ini sudah benar ?</p>
                                             </div>
                                             <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                <a href="{{route(getMyPermission(Auth::user()->level) .'.checkTugas',[Crypt::encrypt($tugas->id), $target->id,1])}}" type="button" class="btn btn-outline-light">Valid</a>
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
                                             <h4 class="modal-title">Tugas Peserta</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body">
                                             <p>Anda yakin Tugas Peserta ini salah ?</p>
                                             <p>Jika salah maka file yang diupload akan dihapus juga</p>
                                             </div>
                                             <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                <a href="{{route(getMyPermission(Auth::user()->level) .'.checkTugas',[Crypt::encrypt($tugas->id), $target->id,2])}}" type="button" class="btn btn-outline-light">Invalid</a>
                                             </div>
                                          </div>
                                          <!-- /.modal-content -->
                                       </div>
                                       <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                 <div class="modal fade" id="modal-note">
                                    <div class="modal-dialog">
                                       <div class="modal-content bg-info">
                                          <div class="modal-header">
                                             <h4 class="modal-title">Note</h4>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <form method="POST" action="{{route(getMyPermission(Auth::user()->level) .'.noteTugas',[Crypt::encrypt($tugas->id), $target->id])}}" enctype="multipart/form-data" class="was-validated">
                                          @csrf  
                                             <div class="modal-body">
                                                <div class="form-group row">
                                                   <label for="note" class="col-md-4 col-form-label text-md-right">{{ __('note') }}</label>
                                                   <div class="col-md-7">
                                                      <textarea
                                                         id="note"
                                                         type="text"
                                                         class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}"
                                                         name="note"
                                                         value="{{ old('note') }}"
                                                         required
                                                         autofocus
                                                         ></textarea>
                                                      @if ($errors->has('writing'))
                                                      <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('writing') }}</strong>
                                                      </span>
                                                      @endif
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-light">Save</button>
                                             </div>
                                          </form>
                                       </div>
                                       <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                 </div>
                                 <!-- /.modal -->

                           <!-- /.card-body -->
                           <div class="card-footer">
                              
                              <!-- /.card-body -->
                           </div>
                        </div>
                        <!-- /.card -->                        
            </section>
            <!-- /.content -->
