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
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header">
                           <h3 class="card-title">Daily Quest Peserta hari ke - <a class= "text-primary"><b>{{$hari}}</b></a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           @if(session('berhasil'))
                           <div class="alert alert-success alert-dismissable md-5">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check"></i>Tambah Grup</h5>
                              {{session('berhasil')}}.
                           </div>
                           @endif @if(session('pesan'))
                           <div class="alert alert-warning alert-dismissable md-5">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-info"></i>Ubah Grup</h5>
                              {{session('pesan')}}.
                           </div>
                           @endif @if(session('challenge'))
                           <div class="alert alert-danger alert-dismissable md-5">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check"></i>Grup</h5>
                              {{session('challenge')}}.
                           </div>
                           @endif
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Public Speaking</th>
                                    <th>Writing</th>
                                    <th>Business</th>
                                    <th>status</th>
                                    <th>grup</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php $i = 0; ?>
                                 @foreach ($daily_quest as $quest)
                                 <?php $i++ ;?>
                                 <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $quest->nama }}</td>
                                    <td>
                                       @if(($quest->video)== 'belum mengerjakan')
                                       <p class="text-purple">belum mengerjakan</p>
                                       @else 
                                       @if(($quest->video_check)== 0)
                                       <a type="text" href="{{$quest->video}}" target="_blank">check</a>
                                       <p class="text-orange">belum diperiksa</p>
                                       @endif
                                       @if(($quest->video_check)== 1)
                                       <a type="text" href="{{$quest->video}}" target="_blank">check</a>
                                       <p class="text-success">sudah diperiksa</p>
                                       @endif
                                       @if(($quest->video_check)== 2)
                                       <a type="text" href="{{$quest->video}}" target="_blank">check</a>
                                       <p class="text-danger">sudah diperiksa</p>
                                       @endif     
                                       @endif
                                    </td>
                                    <td>
                                       @if(($quest->writing)== 'belum mengerjakan')
                                       <p class="text-purple">belum mengerjakan</p>
                                       @else 
                                       @if(($quest->writing_check)== 0)
                                       <a type="text" href="{{ route('admin.download.writing', Crypt::encrypt($quest->id)) }}" >clear</a>
                                       <p class="text-orange">belum diperiksa</p>
                                       @endif
                                       @if(($quest->writing_check)== 1)
                                       <a type="text" href="{{ route('admin.download.writing', Crypt::encrypt($quest->id)) }}" >clear</a>
                                       <p class="text-success">sudah diperiksa</p>
                                       @endif
                                       @if(($quest->writing_check)== 2)
                                       <a type="text" href="{{ route('admin.download.writing', Crypt::encrypt($quest->id)) }}" >clear</a>
                                       <p class="text-danger">sudah diperiksa</p>
                                       @endif    
                                       @endif
                                    </td>
                                    <td>
                                       @if(($quest->business)== 'belum mengerjakan')
                                       <p class="text-purple">belum mengerjakan</p>
                                       @else 
                                       @if(($quest->business_check)== 0)
                                       <a class="text-primary">Mengerjakan</a>
                                       <p class="text-orange">belum diperiksa</p>
                                       @endif
                                       @if(($quest->business_check)== 1)
                                       <a class="text-primary">Mengerjakan</a>  
                                       <p class="text-success">sudah diperiksa</p>
                                       @endif 
                                       @if(($quest->business_check)== 2)
                                       <a class="text-primary">Mengerjakan</a>  
                                       <p class="text-danger">sudah diperiksa</p>
                                       @endif 
                                       @endif
                                    </td>
                                    <td> 
                                       @if (($quest->status) == 1)
                                       <a  class="nav-link">                       
                                       <span class="float-right badge bg-success">valid</span>
                                       </a>
                                       @elseif (($quest->status) == 0)                     
                                       <a  class="nav-link">                       
                                       <span class="float-right badge bg-danger">Belum Diperiksa</span>
                                       </a>
                                       @endif
                                    </td>
                                    <td>
                                       @if(empty($quest->grup))
                                       <p class="text-danger">Kosong</p>
                                       @endif 
                                       @if(!empty($quest->grup)) 
                                       @if(($quest->grup)== 1)
                                       <p class="text-primary"><b>Kel-1</b></p>
                                       @endif 
                                       @if(($quest->grup)== 2)
                                       <p class="text-success"><b>Kel-2</b></p>
                                       @endif 
                                       @if(($quest->grup)== 3)
                                       <p class="text-warning"><b>Kel-3</b></p>
                                       @endif 
                                       @endif
                                    </td>
                                    <td class="project-actions text-right">
                                       <a class="btn btn-primary btn-sm m-2" href="{{ route('admin.detail.quest',[$quest->user_id,$quest->id])}}"  >
                                       <i class="fas fa-folder"> </i>
                                       Quest
                                       </a>
                                       <a class="btn bg-orange btn-sm m-2" href="{{ route('admin.userprofile', $quest->user_id) }}" >
                                       <i class="fas ion-person"> </i>
                                       Profil
                                       </a>
                                    </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>L/P</th>
                                    <th>Domisili</th>
                                    <th>Peminatan</th>
                                    <th>grup</th>
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
                 ordering: false,
                 info: false,
                 autoWidth: false,
                 responsive: true,
             });
             $("#example3").DataTable({
                 paging: true,
                 lengthChange: false,
                 searching: false,
                 ordering: false,
                 info: false,
                 autoWidth: false,
                 responsive: true,
             });
             $("#example4").DataTable({
                 paging: true,
                 lengthChange: false,
                 searching: false,
                 ordering: false,
                 info: false,
                 autoWidth: false,
                 responsive: true,
             });
             $("#example5").DataTable({
                 paging: true,
                 lengthChange: false,
                 searching: false,
                 ordering: false,
                 info: false,
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