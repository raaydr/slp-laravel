@extends('topnav.topnavAdmin')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Absensi Kegiatan</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Absensi-Kegiatan</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <section class="content">
               <div class="container-fluid">
                  @if(session('pesan'))
                  <div class="alert alert-success alert-dismissable">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h4><i class="icon fa fa-check"></i>Success</h4>
                     {{session('pesan')}}.
                  </div>
                  @endif
                  <div class="col-12">
                              <div class="card">
                                 <div class="card-header">
                                       <h3 class="card-title">List Kegiatan SLP</h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body">
                                       <table id="example1" class="table table-bordered table-striped">
                                          <thead>
                                             <tr>
                                                   <th>no</th>
                                                   <th>Judul</th>
                                                   <th>Tanggal Kegiatan</th>
                                                   <th>Tipe Kegiatan</th>
                                                   <th>Guest</th>
                                                   <th>action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                          <tfoot>
                                             <tr>
                                                   <th>no</th>
                                                   <th>Judul</th>
                                                   <th>Tanggal Kegiatan</th>
                                                   <th>Tipe Kegiatan</th>
                                                   <th>Guest</th>
                                                   <th>action</th>
                                             </tr>
                                          </tfoot>
                                       </table>
                                 </div>
                                 <!-- /.card-body -->
                              </div>
                              <!-- /.card -->
                           </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </section>
@endsection
@section('script')
<script>
          $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });
         $(function () {
            $("#example1")
                 .DataTable({
                     processing:true,
                     serverSide:true,
                     ajax : {
                        url : "{{route('admin.AbsensiKegiatan')}}",
                        type : 'GET'
                     },
                     columns:[
                        {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        {data:'judul',name:'judul',orderable: true,searchable: true},
                        {data: 'tanggal_kegiatan', name: 'tanggal_kegiatan', orderable: true, searchable: true},
                        {data: 'tipe_kegiatan', name: 'tipe_kegiatan', orderable: true, searchable: true},
                        {data: 'guest', name: 'guest', orderable: true, searchable: true},
                        
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
