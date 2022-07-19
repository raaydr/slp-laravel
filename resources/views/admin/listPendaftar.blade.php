@extends('topnav.topnavAdmin')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>List Pendaftar </h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">List Pendaftar</li>
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
                           <h3 class="card-title">List Pendaftar yang BELUM Tereliminasi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Domisili</th>
                                    <th>Gender</th>
                                    <th>Peminatan</th>
                                    <th>Seleksi Berkas</th>
                                    <th>Seleksi Challenge</th>
                                    <th>Seleksi Interview</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php $i = 0; ?>
                                 @foreach ($users as $user)
                                 <?php $i++ ;?>
                                 <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $user->Biodata->nama }}</td>
                                    <td>{{ $user->Biodata->tanggal_lahir }}</td>
                                    <td>{{ $user->Biodata->domisili }}</td>
                                    <td>{{ $user->Biodata->jenis_kelamin }}</td>
                                    <td>{{ $user->Biodata->minatprogram }}</td>
                                    <td>{{ $user->Biodata->seleksi_berkas }}</td>
                                    <td>{{ $user->Biodata->seleksi_pertama }}</td>
                                    <td>{{ $user->Biodata->seleksi_kedua }}</td>
                                    <td class="project-actions text-right">
                                       <a class="btn btn-primary btn-sm" href="{{ route('admin.userprofile', $user->Biodata->user_id) }}" target="_blank">
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
                                    <th>Tanggal Lahir</th>
                                    <th>Domisili</th>
                                    <th>Gender</th>
                                    <th>Peminatan</th>
                                    <th>Seleksi Berkas</th>
                                    <th>Seleksi Challenge</th>
                                    <th>Seleksi Interview</th>
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
                     buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                 })
                 .buttons()
                 .container()
                 .appendTo("#example1_wrapper .col-md-6:eq(0)");
         });
      </script>
@endsection
