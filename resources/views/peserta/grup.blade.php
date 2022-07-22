@extends('topnav.topnavPeserta')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Grup Peserta</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Peserta</a></li>
                           <li class="breadcrumb-item active">Grup-Peserta</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title">Profil Fasil</h3>
                     <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-2"></div>
                        <div class="col-2">
                           <div class="text-center">
                              <a class="btn btn-default" href="{{asset('imgfasil')}}/{{$fasil->url_foto}}" target="_blank">
                              <img class="profile-user-img img-fluid" src="{{asset('imgfasil')}}/{{$fasil->url_foto}}" class="img-fluid" alt="Cinque Terre" />
                              </a>
                           </div>
                        </div>
                        <div class="col-6">
                           <ul class="list-group list-group-unbordered mb-3">
                              <li class="list-group-item">
                                 <b>Nama</b>
                                 <p class="float-right">{{$fasil->nama}}</p>
                              </li>
                              <li class="list-group-item">
                                 <b>Jenis Kelamin</b>
                                 <p class="float-right">{{$fasil->jenis_kelamin}}</p>
                              </li>
                              <li class="list-group-item">
                                 <b>No.Telp</b>
                                 <p class="float-right">{{$fasil->phonenumber}}</p>
                              </li>
                              <li class="list-group-item"><b>Instagram</b> <a class="float-right" href="{{$fasil->instagram}}" target="_blank">check</a></li>
                              <li class="list-group-item">
                                 <b>Quotes</b>
                                 <p class="float-right">{{$fasil->quotes}}</p>
                              </li>
                              <li class="list-group-item">
                                 <b>Prestasi</b>
                                 <?php
                                    echo $fasil->prestasi ; ?>
                              </li>
                           </ul>
                        </div>
                        <div class="col-2"></div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer"></div>
                  <!-- /.card-footer-->
               </div>
               <!-- /.card -->
               <div class="col-12">
                  <div class="card">
                     <div class="card-header">
                        <h3 class="card-title">Grup Peserta</h3>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>No</th>
                                 <th>Nama</th>
                                 <th>status</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $i = 0; ?>
                              @foreach ($peserta as $user)
                              <?php $i++ ;?>
                              <tr>
                                 <th scope="row">{{ $i }}</th>
                                 <td>{{ $user->nama }}</td>
                                 <td>
                                    @if(($user->aktif)== 0)
                                    <p class="text-danger">non-aktif</p>
                                    @endif @if(($user->aktif)== 1)
                                    <p class="text-success">aktif</p>
                                    @endif
                                 </td>
                                 <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="{{ route('peserta.userprofile', Crypt::encrypt($user->user_id)) }}" target="_blank">
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
      </script>
@endsection