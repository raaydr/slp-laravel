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
                                    
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Domisili</th>
                                    <th>Gender</th>
                                    <th>Peminatan</th>
                                    <th>Seleksi Berkas</th>
                                    <th>Seleksi Challenge</th>
                                    <th>Seleksi Interview</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tfoot>
                                 <tr>
                                    
                                    <th><input type="text" placeholder="Search"  style="width: 100%"  /></th>
                                    <th><input type="text" style="width: 30%" /></th>
                                    <th><input type="text" placeholder="Search"  style="width: 70%"/></th>
                                    <th><input type="text" style="width: 50%"/></th>
                                    <th><input type="text" placeholder="Search"  style="width: 60%"/></th>
                                    <th><input type="text" placeholder="Search"  style="width: 70%"/></th>
                                    <th><input type="text" placeholder="Search"  style="width: 70%"/></th>
                                    <th><input type="text" placeholder="Search"  style="width: 70%"/></th>
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
                     processing:true,
                     serverSide:true,
                     ajax : {
                        url : "{{route('admin.listPendaftar')}}",
                        type : 'GET'
                     },
                     columns:[
                        
                        {data:'nama',name:'nama',searchable: true},
                        {data: 'Umur', name: 'Umur', orderable: true, searchable: true},
                        {data: 'domisili', name: 'domisili', orderable: true, searchable: true},
                        {data: 'jenis_kelamin', name: 'jenis_kelamin', orderable: true, searchable: true},
                        {data: 'minatprogram', name: 'minatprogram', orderable: true, searchable: true},
                        {data: 'Seleksi Berkas', name: 'Seleksi Berkas', orderable: true, searchable: true},
                        {data: 'Seleksi Challenge', name: 'Seleksi Challenge', orderable: true, searchable: true},
                        {data: 'Seleksi Interview', name: 'Seleksi Interview', orderable: true, searchable: true},
                        {data: 'action', name: 'action'},
                        
                        
                     ],
                     order:[[0,'asc']],
                     responsive: true,
                     lengthChange: false,
                     autoWidth: false,
                     buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                     initComplete: function () {
                           // Apply the search
                           this.api()
                              .columns()
                              .every(function () {
                                 var that = this;
               
                                 $('input', this.footer()).on('keyup change clear', function () {
                                       if (that.search() !== this.value) {
                                          that.search(this.value).draw();
                                       }
                                 });
                              });
                     },
                 })
                 .buttons()
                 .container()
                 .appendTo("#example1_wrapper .col-md-6:eq(0)");
         });
      </script>
@endsection
