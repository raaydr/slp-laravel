@extends('topnav.topnavFasil')
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
                           <li class="breadcrumb-item"><a href="/">Fasil</a></li>
                           <li class="breadcrumb-item active">Grup-Peserta</li>
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
                           <h3 class="card-title">List Peserta</h3>
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
                                    <th>Gender</th>
                                    <th>Domisili</th>
                                    <th>Peminatan</th>
                                    <th>Grup</th>
                                    <th>status</th>
                                    <th>Rapor</th>
                                    <th>action</th>
                                 </tr>
                              </thead>
                              <tfoot>
                                 <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Gender</th>
                                    <th>Domisili</th>
                                    <th>Peminatan</th>
                                    <th>Grup</th>
                                    <th>status</th>
                                    <th>Rapor</th>
                                    <th>action</th>
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
                        url : "{{route('fasil.grup')}}",
                        type : 'GET'
                     },
                     columns:[            
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        {data:'nama',name:'nama'},
                        {data:'Gender',name:'Gender'},
                        {data:'domisili',name:'Domisili'},
                        {data:'minatprogram',name:'Peminatan'},
                        {data:'Grup',name:'Grup'},
                        {data:'Status',name:'Status'},
                        {data:'Rapor',name:'Rapor'},
                        {data: 'action', name: 'action'},
                        
                     ],
                     responsive: true,
                     lengthChange: false,
                     autoWidth: false,
                 })
                 .buttons()
                 .container()
                 .appendTo("#example1_wrapper .col-md-6:eq(0)");
         });
      </script>
@endsection
