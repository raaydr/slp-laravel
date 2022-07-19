@extends('topnav.topnavAdmin')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>List Fasil</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Fasil</li>
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
                           <h3 class="card-title">Kumpulan Fasil yang telah terdaftar</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           @if(session('berhasil'))
                           <div class="alert alert-success alert-dismissable md-5">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check"></i>Fasil</h5>
                              {{session('berhasil')}}.
                           </div>
                           @endif @if(session('pesan'))
                           <div class="alert alert-warning alert-dismissable md-5">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-info"></i>Fasil</h5>
                              {{session('pesan')}}.
                           </div>
                           @endif @if(session('challenge'))
                           <div class="alert alert-danger alert-dismissable md-5">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check"></i>Fasil</h5>
                              {{session('challenge')}}.
                           </div>
                           @endif
                           <div class="modal fade" id="modal-grup">
                              <div class="modal-dialog">
                                 <div class="modal-content bg-success">
                                    <div class="modal-header">
                                       <h4 class="modal-title">Grup</h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <form method="POST" action="{{route('admin.fasil.addgrup')}}" enctype="multipart/form-data">
                                       {{csrf_field()}}
                                       <div class="modal-body">
                                          <div class="form-group row">
                                             <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('id') }}</label>
                                             <div class="col-md-7">
                                                <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" readonly />
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
                                                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" readonly />
                                                @if ($errors->has('nama'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nama') }}</strong>
                                                </span>
                                                @endif
                                             </div>
                                          </div>
                                          <div class="form-group row">
                                             <label for="grup" class="col-md-4 col-form-label text-md-right">{{ __('Grup') }}</label>
                                             <div class="col-md-7">
                                                <div class="form-group">
                                                   <select class="custom-select form-control-border" id="grup" name="grup">
                                                      <option value="1">Grup 1</option>
                                                      <option value="2">Grup 2</option>
                                                      <option value="3">Grup 3</option>
                                                   </select>
                                                </div>
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
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Gender</th>
                                    <th>Grup</th>
                                    <th>status</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php $i = 0; ?>
                                 @foreach ($users as $user)
                                 <?php $i++ ;?>
                                 <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $user->Fasil->nama }}</td>
                                    <td>{{ $user->Fasil->jenis_kelamin }}</td>
                                    <td>
                                       @if(empty($user->Fasil->grup))
                                       <p class="text-danger">Kosong</p>
                                       @endif @if(!empty($user->Fasil->grup)) @if(($user->Fasil->grup)== 1)
                                       <p class="text-primary"><b>Kel-1</b></p>
                                       @endif @if(($user->Fasil->grup)== 2)
                                       <p class="text-success"><b>Kel-2</b></p>
                                       @endif @if(($user->Fasil->grup)== 3)
                                       <p class="text-warning"><b>Kel-3</b></p>
                                       @endif @endif
                                    </td>
                                    <td>
                                       @if(($user->Fasil->status)== 0)
                                       <p class="text-danger">non-aktif</p>
                                       @endif @if(($user->Fasil->status)== 1)
                                       <p class="text-success">aktif</p>
                                       @endif
                                    </td>
                                    <td class="project-actions text-right">
                                    @if ((($user->Fasil->status)== 1)&&(($user->Fasil->grup)==0)==1)
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.fasil.aktivasi', [$user->id,0]) }}">
                                       <i class="fas fa-exclamation"> </i>
                                       non-aktif
                                       </a>
                                    @endif
                                    @if ((($user->Fasil->status)== 0)&&(($user->Fasil->grup)==0)==1)
                                    <a class="btn btn-success btn-sm" href="{{ route('admin.fasil.aktivasi', [$user->id,1]) }}">
                                       <i class="fas fa-exclamation"> </i>
                                       aktif
                                       </a>
                                    @endif
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.fasil.deletegrup', $user->id) }}">
                                       <i class="fas fa-exclamation"> </i>
                                       hapus
                                       </a>
                                       <button class="btn btn-success btn-sm" data-toggle="modal" data-myid="{{$user->Fasil->user_id}}" data-myname="{{$user->Fasil->nama}}" data-target="#modal-grup" target="_blank">
                                       <i class="fas fa-info"> </i>
                                       grup
                                       </button>
                                       <a class="btn btn-primary btn-sm" href="{{ route('admin.fasilprofile', $user->Fasil->user_id) }}" target="_blank">
                                       <i class="fas fa-folder"> </i>
                                       Detail
                                       </a>
                                    </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Gender</th>
                                    <th>Grup</th>
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
             $("#modal-grup").on("show.bs.modal", function (event) {
                 var button = $(event.relatedTarget); // Button that triggered the modal
                 var id = button.data("myid");
                 var nama = button.data("myname");
         
                 var modal = $(this);
                 modal.find(".modal-body #user_id").val(id);
                 modal.find(".modal-body #nama").val(nama);
             });
         });
      </script>
@endsection