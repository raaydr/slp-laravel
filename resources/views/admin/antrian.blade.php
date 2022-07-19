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
                           <li class="breadcrumb-item active">Antrian-Interview</li>
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
                           <h3 class="card-title">Daftar Antrian Interview</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           @if(session('berhasil'))
                           <div class="alert alert-success alert-dismissable md-5">
                              <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check"></i>Absensi</h5>
                              {{session('berhasil')}}.
                           </div>
                           @endif
                           @if(session('salah'))
                           <div class="alert alert-danger alert-dismissable md-5">
                              <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check"></i>Absensi</h5>
                              {{session('salah')}}.
                           </div>
                           @endif
                           <div class="modal fade" id="modal-note">
                              <div class="modal-dialog">
                                 <div class="modal-content bg-warning">
                                    <div class="modal-header">
                                       <h4 class="modal-title">Note</h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <form method="POST" action="{{route('admin.antrian.note')}}" enctype="multipart/form-data" class="was-validated">
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
                                                   /></textarea>
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
                                    <th>No.Antrian</th>
                                    <th>Nama</th>
                                    <th>note</th>
                                    <th>kepribadian</th>
                                    <th>Kehadiran</th>
                                    <th></th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php $i = 0; ?>
                                 @foreach ($antrian as $user)
                                 <?php $i++ ;?>
                                 <tr>
                                    <td>{{ $user->antrian }}</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->note }}</td>
                                    <td><a class="btn btn-primary" href="{{asset('teskepribadian')}}/{{$user->url_kepribadian}}" target="_blank">check</a></td>
                                    <td>
                                       @if(($user->absen)== 'Tidak Hadir')
                                       <p class="text-danger">Tidak Hadir</p>
                                       @endif
                                       @if(($user->absen)== 'Hadir')
                                       <p class="text-success">Hadir</p>
                                       @endif
                                    </td>
                                    <td class="project-actions text-right">
                                       <a class="btn btn-primary btn-sm" href="{{ route('admin.userprofile', $user->user_id) }}" target="_blank">
                                       <i class="fas fa-folder">
                                       </i>
                                       Detail
                                       </a>
                                       <button class="btn btn-warning btn-sm" data-toggle="modal" data-myid="{{$user->user_id}}" data-myname="{{$user->nama}}" data-target="#modal-note"href="{{ route('admin.antrian.note', $user->user_id) }}" target="_blank">
                                       <i class="fas fa-info"> </i>
                                       Note
                                       </button>
                                    </td>
                                    <td>@if(($user->absen)== 'Tidak Hadir')
                                       <a class="btn btn-success btn-sm" href="{{ route('admin.interview.hadir', $user->user_id) }}" >
                                       <i class="fas fa-check">
                                       </i>
                                       Hadir
                                       </a>
                                       @endif
                                       @if(($user->absen)== 'Hadir')
                                       <a class="btn btn-danger btn-sm" href="{{ route('admin.interview.hadir', $user->user_id) }}" >
                                       <i class="fas fa-exclamation">
                                       </i>
                                       Tidak Hadir
                                       </a>
                                       @endif
                                    </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th>No.Antrian</th>
                                    <th>Nama</th>
                                    <th>note</th>
                                    <th>kepribadian</th>
                                    <th>Kehadiran</th>
                                    <th></th>
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
         $('#modal-note').on('show.bs.modal', function (event) {
             
             var button = $(event.relatedTarget) // Button that triggered the modal
             var id = button.data('myid')
             var nama = button.data('myname')
         
             console.log('modal kebuka');
          
             var modal = $(this)
             modal.find('.modal-body #user_id').val(id)
             modal.find('.modal-body #nama').val(nama)
           
         });
      </script>
@endsection
