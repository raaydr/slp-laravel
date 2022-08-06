@extends('topnav.topnavAdmin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
   <div class="container-fluid">
   <a class="btn btn-info btn-sm mb-3" onclick="goBack()" >
                        <i class="fas fa-arrow-left"></i> kembali
                     </a>
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Detail Absensi</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="/">Admin</a></li>
               <li class="breadcrumb-item active">Detail-Absensi</li>
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
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-title">Detail Kegiatan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            
               
               <div class="card-body">
                  <div class="form-group row">
                     <label for="video" class="col-md-6 col-form-label text-md-right">{{ __('Judul Kegiatan') }}</label>
                     <div class="col-md-6 col-form-label text-md-left">
                        <a class="text-primary"><b>{{$laporan->judul}}</b></a>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="date" class="col-md-6 col-form-label text-md-right">{{ __('Tanggal Kegiatan') }}</label>
                     <div class="col-md-6 col-form-label text-md-left">
                        <b>{{$tanggal_mulai}}</b>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="time_start" class="col-md-6 col-form-label text-md-right">{{ __('Mulai Kegiatan') }}</label>
                     <div class="col-md-6 col-form-label text-md-left">
                        <b>{{$mulai}} WIB</b>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="time_end" class="col-md-6 col-form-label text-md-right">{{ __('Kegiatan Berakhir') }}</label>
                     <div class="col-md-6 col-form-label text-md-left">
                        <b>{{$akhir}} WIB</b>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="tipe_kegiatan" class="col-md-6 col-form-label text-md-right">{{ __('Tipe Kegiatan') }}</label>
                     <div class="col-md-6 col-form-label text-md-left">
                        <b>{{$laporan->tipe_kegiatan}}</b>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="tempat" class="col-md-6 col-form-label text-md-right">{{ __('Tempat') }}</label>
                     <div class="col-md-6 col-form-label text-md-left">
                        <b>{{$laporan->tempat}}</b>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="guest" class="col-md-6 col-form-label text-md-right">{{ __('Pengisi Kegiatan') }}</label>
                     <div class="col-md-6 col-form-label text-md-left">
                        <b>{{$laporan->guest}}</b>
                     </div>
                  </div>
               </div>
               <!-- /.card-body -->
               <div class="card-footer">
                  <!-- /.card-body -->
                  <div class="text-center">
                     
                  </div>
               </div>
            
         </div>
         <!-- /.card -->
      </div>
      <div class="col-12">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">List Absensi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>no</th>
                        <th>Nama</th>
                        <th>Grup</th>
                        <th>Absensi</th>
                        <th>Note</th>
                        <th>action</th>
                     </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                     <tr>
                        <th>no</th>
                        <th>Nama</th>
                        <th>Grup</th>
                        <th>Absensi</th>
                        <th>Note</th>
                        <th>action</th>
                     </tr>
                  </tfoot>
               </table>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <div class="modal fade" id="modal-note">
         <div class="modal-dialog">
            <div class="modal-content bg-info">
               <div class="modal-header">
                  <h4 class="modal-title">Note</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <form id="formTarget" enctype="multipart/form-data" >
                  @csrf  
                  <div class="modal-body">
                     <div class="form-group row">
                        <label for="note" class="col-md-4 col-form-label text-md-right">{{ __('note') }}</label>
                        <div class="col-md-7">
                           <input type="hidden" id="id" name="id" >
                           <textarea
                              id="note"
                              type="text"
                              class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}"
                              name="note"
                              value="{{ old('note') }}"
                              required
                              autofocus
                              ></textarea>
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
                     <button type="submit" class="btn btn-outline-light" id="tombol-simpan"value="create">Simpan</button>
                  </div>
               </form>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</section>
@endsection
@section('script')
<script>
   $('#load').hide();
   function goBack() {
        window.history.back();
        }
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
                 url : "{{route('admin.TabelAbsensi', $laporan->id)}}",
                 type : 'GET'
              },
              columns:[
                 {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                 {data:'nama',name:'nama',orderable: true,searchable: true},
                 {data: 'Grup', name: 'Grup', orderable: true, searchable: true},
                 {data: 'Kehadiran', name: 'Kehadiran', orderable: true, searchable: true},
                 {data: 'note', name: 'note', orderable: false, searchable: false},
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
        
   $(document).ready(function() {
     $('body').on('click', '.deleteItem', function() {
     var Item_id = $(this).data("id");
     var val = $(this).data("val");
     var url = '{{ route("admin.checkAbsensi",[":id",":val"])}}';
     url = url.replace(':id', Item_id);
     url = url.replace(':val', val);
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
             
     if ($("#formTarget").length > 0) {
            $.validator.addMethod('minStrict', function (value, el, param) {
               return value < param;
            });
            $("#formTarget").validate({
               rules: {
                  note: {
                     required: true,
                

                  },
                  
               },
               messages: {
                  noto: {
                     required: 'Tolong Diisi',
                    
                  },
               },
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');

                    $.ajax({
                        data: $('#formTarget')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('admin.noteAbsensi') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function (data) { //jika berhasil 
                            $('#formTarget').trigger("reset"); //form reset
                            $('#modal-note').modal('hide'); //modal hide
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
   });
   $('#modal-note').on('show.bs.modal', function (event) {
             
             var button = $(event.relatedTarget) // Button that triggered the modal
             var id = button.data('myid')
             var modal = $(this)
             modal.find('.modal-body #id').val(id)
             
   });
</script>
@endsection
