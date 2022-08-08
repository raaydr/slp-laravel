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
                           <li class="breadcrumb-item active">Pengelompokkan-Peserta</li>
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
                           <div class="modal fade" id="modal-grup">
                                    <div class="modal-dialog">
                                       <div class="modal-content bg-success">
                                          <div class="modal-header">
                                             <h4 class="modal-title">Grup</h4>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <form id="form-grup"  enctype="multipart/form-data" class="was-validated">
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
                                                      
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-light" id="tombol-simpan">Save</button>
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
                        url : "{{route('admin.peserta.pengelompok')}}",
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
             $("#modal-grup").on("show.bs.modal", function (event) {
                 var button = $(event.relatedTarget); // Button that triggered the modal
                 var id = button.data("myid");
                 var nama = button.data("myname");
         
                 var modal = $(this);
                 modal.find(".modal-body #user_id").val(id);
                 modal.find(".modal-body #nama").val(nama);
             });
         });
         $('body').on('click', '.deleteItem', function() {
         var Item_id = $(this).data("id");
         
         var url = '{{ route("admin.peserta.status",":id") }}';
         url = url.replace(':id', Item_id);
         
         
         $.ajax({
         
            type: "GET",
         
            url: url,
         
            success: function(data) {
         
                iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                    title: 'Data Berhasil Disimpan',
                    message: '{{ Session('
                    success ')}}',
                    position: 'bottomRight'
                });
                var oTable = $('#example1').dataTable(); //inialisasi datatable
                oTable.fnDraw(false); //reset datatable
         
            },
         
            error: function(data) {
         
                console.log('Error:', data);
         
            }
         
         });
         
         });
         if ($("#form-grup").length > 0) {            
            $("#form-grup").validate({
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');

                    $.ajax({
                        data: $('#form-grup')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('admin.peserta.addgrup') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function (data) { //jika berhasil 
                            $('#form-grup').trigger("reset"); //form reset
                            $('#modal-grup').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#example1').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('
                                success ')}}',
                                position: 'bottomRight'
                            });
                        },
                        error: function (data) { //jika error tampilkan error pada console
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }
      </script>
@endsection
