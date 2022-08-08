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
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Angkatan</th>
                                    <th>Seleksi Berkas</th>
                                    <th>Seleksi Challenge</th>
                                    <th>Seleksi Interview</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              
                              <tfoot>
                                 <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Angkatan</th>
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
                        url : "{{route('admin.ListSemuaPendaftar')}}",
                        type : 'GET'
                     },
                     columns:[
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        {data:'nama',name:'nama',orderable: true, searchable: true},
                        {data:'Gender',name:'Gender',orderable: true, searchable: true},
                        {data:'gen',name:'gen',orderable: true, searchable: true},
                        {data: 'Seleksi Berkas', name: 'Seleksi Berkas', orderable: true, searchable: true},
                        {data: 'Seleksi Challenge', name: 'Seleksi Challenge', orderable: true, searchable: true},
                        {data: 'Seleksi Interview', name: 'Seleksi Interview', orderable: true, searchable: true},
                        {data: 'action', name: 'action', },
                        
                        
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
