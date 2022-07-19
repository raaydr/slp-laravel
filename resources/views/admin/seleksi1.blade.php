@extends('topnav.topnavAdmin')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Seleksi </h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Pendaftar-Tereliminasi</li>
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
                           <h3 class="card-title">List Pendaftar yang Tereliminasi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    
                                    <th>Name</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Domisili</th>
                                    <th>Seleksi Berkas</th>
                                    <th>Seleksi Challenge</th>
                                    <th>Seleksi Interview</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              
                              <tfoot>
                                 <tr>
                                    
                                    <th>Name</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Domisili</th>
                                    <th>Seleksi Berkas</th>
                                    <th>Seleksi Challenge</th>
                                    <th>Seleksi Interview</th>
                                    <th>Action</th>
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
                     processing:true,
                     serverSide:true,
                     ajax : {
                        url : "{{route('admin.eliminasi')}}",
                        type : 'GET'
                     },
                     columns:[
                        {data:'nama',name:'nama'},
                        {data:'tanggal_lahir',name:'tanggal_lahir'},
                        {data:'alamat_domisili',name:'alamat_domisili'},
                        {data: 'Seleksi Berkas', name: 'Seleksi Berkas', orderable: true, searchable: true},
                        {data: 'Seleksi Challenge', name: 'Seleksi Challenge', orderable: true, searchable: true},
                        {data: 'Seleksi Interview', name: 'Seleksi Interview', orderable: true, searchable: true},
                        {data: 'action', name: 'action', orderable: true, searchable: true},
                        
                        
                     ],
                     order:[[0,'asc']],
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
      </script>
@endsection
