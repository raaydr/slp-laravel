@extends('topnav.topnavAdmin')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Seleksi</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Tahap-Challenge</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header">
                           <h3 class="card-title">List Pendaftar Tahap Challenge</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           @if(session('berhasil'))
                           <div class="alert alert-success alert-dismissable md-5">
                              <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check"></i>Penilaian</h5>
                              {{session('berhasil')}}.
                           </div>
                           @endif
                           @if(session('pesan'))
                           <div class="alert alert-warning alert-dismissable md-5">
                              <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-info"></i>Penilaian</h5>
                              {{session('pesan')}}.
                           </div>
                           @endif
                           @if(session('challenge'))
                           <div class="alert alert-danger alert-dismissable md-5">
                              <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check"></i>Seleksi Challenge</h5>
                              {{session('challenge')}}.
                           </div>
                           @endif
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>nama</th>
                                    <th>CV</th>
                                    <th>Writing</th>
                                    <th>Video</th>
                                    <th>Business</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php $i = 0; ?>
                                 @foreach ($challenge as $check)
                                 <?php $i++ ;?>
                                 <div class="modal fade" id="modal-penilaian">
                                    <div class="modal-dialog">
                                       <div class="modal-content bg-primary">
                                          <div class="modal-header">
                                             <h4 class="modal-title">Penilaian</h4>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <form method="POST" action="{{route('admin.challenge.penilaian')}}" enctype="multipart/form-data" class="was-validated">
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
                                                      <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama"   readonly/>
                                                      @if ($errors->has('nama'))
                                                      <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('nama') }}</strong>
                                                      </span>
                                                      @endif
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label for="writing" class="col-md-4 col-form-label text-md-right">{{ __('writing') }}</label>
                                                   <div class="col-md-7">
                                                      <input id="writing" type="text" class="form-control{{ $errors->has('writing') ? ' is-invalid' : '' }}" name="writing" value="{{ old('writing') }}" required autofocus />
                                                      @if ($errors->has('writing'))
                                                      <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('writing') }}</strong>
                                                      </span>
                                                      @endif
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('video') }}</label>
                                                   <div class="col-md-7">
                                                      <input id="video" type="text" class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}" name="video" value="{{ old('video') }}" required autofocus />
                                                      @if ($errors->has('video'))
                                                      <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('video') }}</strong>
                                                      </span>
                                                      @endif
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label for="penjualan" class="col-md-4 col-form-label text-md-right">{{ __('penjualan') }}</label>
                                                   <div class="col-md-7">
                                                      <input id="penjualan" type="text" class="form-control{{ $errors->has('penjualan') ? ' is-invalid' : '' }}" name="penjualan" value="{{ old('penjualan') }}" required autofocus />
                                                      @if ($errors->has('penjualan'))
                                                      <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('penjualan') }}</strong>
                                                      </span>
                                                      @endif
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label for="point" class="col-md-4 col-form-label text-md-right">{{ __('point') }}</label>
                                                   <div class="col-md-7">
                                                      <input id="point" type="text" class="form-control{{ $errors->has('point') ? ' is-invalid' : '' }}" name="point" value="{{ old('point') }}" required autofocus />
                                                      @if(!empty($penilaian->user_id))
                                                      <small id="passwordHelpBlock" class="form-text text-sucess">nilai sebelumnya {{$penilaian->point}}</small>
                                                      @endif @if ($errors->has('point'))
                                                      <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('point') }}</strong>
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
                                 <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $check->nama }}</td>
                                    <td>
                                       @if(($check->url_cv)== '#')
                                       <p class="text-danger" >kosong</p>
                                       @else
                                       <a type="text" href="{{asset('cvPDF')}}/{{$check->url_cv}}" target="_blank">check</a>
                                       @endif
                                    </td>
                                    <td>
                                       @if(($check->url_writing)== '#')
                                       <p class="text-danger" >kosong</p>
                                       @else
                                       <a type="text" href="{{$check->url_writing}}" target="_blank">check</a>
                                       @endif
                                    </td>
                                    <td>
                                       @if(($check->url_video)== '#')
                                       <p class="text-danger" >kosong</p>
                                       @else
                                       <a type="text" href="{{$check->url_video}}" target="_blank">check</a>
                                       @endif
                                    </td>
                                    <td>
                                       @if(($check->url_Business)== '#')
                                       <p class="text-danger" >kosong</p>
                                       @else
                                       <a type="text" href="{{asset('imgPembelian')}}/{{$check->url_Business}}" target="_blank">check</a>
                                       @endif
                                    </td>
                                    <td class="project-actions text-right">
                                       <button class="btn btn-success btn-sm" data-toggle="modal" data-myid="{{$check->user_id}}" data-myname="{{$check->nama}}" data-target="#modal-penilaian"href="{{ route('admin.userprofile', $check->user_id) }}" target="_blank">
                                       <i class="fas fa-check"> </i>
                                       Penilaian
                                       </button>
                                       <a class="btn btn-primary btn-sm" href="{{ route('admin.userprofile', $check->user_id) }}" target="_blank">
                                       <i class="fas fa-folder"> </i>
                                       Detail
                                       </a>
                                       @if(((($check->url_Business)== '#')||(($check->url_video)== '#')||(($check->url_writing)== '#'))== true)
                                       <a class="btn btn-danger btn-sm" href="{{ route('admin.challenge.gagal', [$check->user_id,$r]) }}">
                                       <i class="fas fa-info"> </i>
                                       Gagal
                                       </a>
                                       @endif
                                    </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th>No</th>
                                    <th>nama</th>
                                    <th>CV</th>
                                    <th>Writing</th>
                                    <th>Video</th>
                                    <th>Business</th>
                                    <th></th>
                                 </tr>
                              </tfoot>
                           </table>
                        </div>
                        <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </section>
            <!-- /.content -->
@endsection
@section('script')
      <script>
         $(function () {
             $("#example1")
                 .DataTable({
                     responsive: true,
                     lengthChange: false,
                     autoWidth: false,
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
         $('#modal-penilaian').on('show.bs.modal', function (event) {
             
             var button = $(event.relatedTarget) // Button that triggered the modal
             var id = button.data('myid')
             var nama = button.data('myname') // Extract info from data-* attributes
             // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
             // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
             console.log('modal kebuka');
             console.log(nama);
             console.log(id);
             var modal = $(this)
             modal.find('.modal-body #user_id').val(id)
             modal.find('.modal-body #nama').val(nama)
         });
      </script>
@endsection
