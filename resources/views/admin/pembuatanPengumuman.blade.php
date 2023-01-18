@extends('topnav.topnavAdmin')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Pembuatan Pengumuman</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Pembuatan-Pengumuman</li>
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
                           <h3 class="card-title">Form Pengumuman</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="formTarget" enctype="multipart/form-data" >
                        @csrf  
                           <div class="card-body">
                              <div class="form-group row">
                                 <label for="Judul" class="col-md-4 col-form-label text-md-right">{{ __('Judul Kegiatan') }}</label>
                                 <div class="col-md-6">
                                    <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}"required autofocus />
                                    @if ($errors->has('judul'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Diumumkan') }}</label>
                                 <div class="col-md-4">
                                    <div class="input-group date">
                                       <div class="input-group-addon">
                                          <span class="glyphicon glyphicon-th"></span>
                                       </div>
                                       <input placeholder="Tanggal Kegiatan" type="text" class="form-control datepicker" name="date"   />
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="tipe_kegiatan" class="col-md-4 col-form-label text-md-right">{{ __('Penerima Pengumuman') }}</label>
                                 <div class="col-md-6">
                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                       <input type="radio" id="customRadioInline3" name="level" class="custom-control-input" value="1" >
                                       <label class="custom-control-label" for="customRadioInline3">Pendaftar</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input type="radio" id="customRadioInline4" name="level" class="custom-control-input" value="4">
                                       <label class="custom-control-label" for="customRadioInline4">Peserta</label>
                                    </div>
                                    @if ($errors->has('level'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                    <label for="keterangan" class="col-md-4 col-form-label text-md-right">{{ __('keterangan') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="summernote"  class="form-control{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" name="keterangan"   required autofocus></textarea>
                                            <small id="passwordHelpBlock" class="form-text text-sucess">tolong hindari dari penggunaan " (petik 2)</small> 
                                            @if ($errors->has('keterangan'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('keterangan') }}</strong>
                                            </span>
                                            @endif
                                    </div>
                                </div>
                              <div class="form-group row">
                                 <label for="note" class="col-md-4 col-form-label text-md-right">{{ __('pesan pendek') }}</label>
                                 <div class="col-md-6">
                                    <input id="note" type="text" class="form-control" name="note" value="{{ old('note') }}" autofocus />
                                    <small id="passwordHelpBlock" class="form-text text-sucess">note dari admin</small> 
                                    @if ($errors->has('note'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('note') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-body -->
                           <div class="card-footer">
                              <!-- /.card-body -->
                              <div class="text-center">
                              <button class="btn btn-success btn-submit" id="simpanBTN">Submit</button>
                              <div id="load" class="spinner-border text-primary"></div>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- /.card -->
                  </div>
                  <div class="col-12">
                              <div class="card">
                                 <div class="card-header">
                                       <h3 class="card-title">List Pengumuman</h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body">
                                       <table id="example1" class="table table-bordered table-striped">
                                          <thead>
                                             <tr>
                                                   <th>no</th>
                                                   <th>Judul</th>
                                                   <th>Tanggal Diumumkan</th>
                                                   <th>Penerima</th>
                                                   <th>Angkatan</th>
                                                   <th>action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                          <tfoot>
                                             <tr>
                                                    <th>no</th>
                                                   <th>Judul</th>
                                                   <th>Tanggal Diumumkan</th>
                                                   <th>Penerima</th>
                                                   <th>Angkatan</th>
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
                        url : "{{route('admin.PembuatanPengumuman')}}",
                        type : 'GET'
                     },
                     columns:[
                        {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        {data:'judul',name:'judul',orderable: true,searchable: true},
                        {data: 'tanggal_diumumkan', name: 'tanggal_diumumkan', orderable: true, searchable: true},
                        {data: 'Penerima', name: 'Penerima', orderable: true, searchable: true},
                        {data: 'gen', name: 'gen', orderable: true, searchable: true},
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
         $('#load').hide();
         $(function () {
            $(".datepicker").datepicker({
              format: 'yyyy-mm-dd',
              autoclose: true,
              todayHighlight: true,
          });
            // Summernote
            $('#summernote').summernote()

         })     
         $(document).ready(function() {
            $('body').on('click', '.deleteItem', function() {
            var Item_id = $(this).data("id");
            var url = '{{ route("admin.DeletePengumuman",[":id"]) }}';
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
               if ($("#formTarget").length > 0) {
                  $("#formTarget").validate({
                        rules: {
                           judul: {
                              required: true
                              
                           },
                           date: {
                              required: true,
                              
                           },
                     
                           level: {
                              required: true,
                              
                           },
                           keterangan: {
                              required: true,
                              
                           },
                    
                           
                        },
                        messages: {
                           judul: {
                              required: 'Tolong Diisi'
                           },
                           date: {
                              required: 'Tolong Diisi',
                              
                             
                           },
                           keterangan: {
                              required: 'Tolong Diisi',
                              
                           },
                           level: {
                              required: 'Tolong Diisi',
                              
                           },

                           
                        },
                        submitHandler: function(form) {
                           var actionType = $('#simpanBTN').val();
                           $('#simpanBTN').html('Sending..');
                           $('#load').show();
                           var form = $("#formTarget").closest("form");
                           var formData = new FormData(form[0]);
                           $.ajax({
                              xhr: function() {
                                       var xhr = new window.XMLHttpRequest();
                                       xhr.upload.addEventListener("progress", function(evt) {
                                          if (evt.lengthComputable) {
                                                var percentComplete = Math.round(((evt.loaded / evt.total) * 100));
                                                $(".progress-bar").width(percentComplete + '%');
                                                $(".progress-bar").html(percentComplete+'%');
                                          }
                                       }, false);
                                       return xhr;
                                    },
                              data: formData,
                              url: "{{ route('admin.AddPengumuman') }}", //url simpan data
                              type: "POST", //karena simpan kita pakai method POST
                              dataType: 'json', //data tipe kita kirim berupa JSON
                              processData: false,
                              contentType: false,
                              success: function(data) { //jika berhasil
                                 switch(data.status){
                                    case 0 :
                                          $('#load').hide();
                                          $('#simpanBTN').html('Submit');
                                          $('#simpanBTN').show();
                                          var oTable = $('#example1').dataTable(); //inialisasi datatable
                                          oTable.fnDraw(false); //reset datatable
                                          iziToast.error({
                                             title: 'Error',
                                             message: data.error,
                                          });
                                          console.log('Error:', "periksa");
                                          break;
                                       case 1 :
                                          $('#load').hide();
                                          $('#simpanBTN').html('Submit'); //tombol simpan
                                          $('#simpanBTN').show();
                                          document.getElementById("formTarget").reset();
                                          $('#summernote').summernote('code', ''); 
                                          var oTable = $('#example1').dataTable(); //inialisasi datatable
                                          oTable.fnDraw(false); //reset datatable
                                          //$('#uploadStatus').html('<p style="color:#28A74B;">File Berhasil diupload!</p>');
                                          iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                             title: 'Data Berhasil Disimpan',
                                             message: '{{ Session('
                                             success ')}}',
                                             position: 'bottomRight'
                                          });
                                          break;
                                       default:
                                    // code block
            
                                 } 
                                    
                              },
                              error: function(data) { //jika error tampilkan error pada console
                                    $('#load').hide();
                                 
                                    
                                    $('#simpanBTN').html('Submit'); //tombol simpan
                                    iziToast.error({
                                       title: 'Error',
                                       message: 'Illegal operation',
                                    });
                                    console.log('Error:', "Data kosong");
            
                              }
                           });
                        }
                  })
               }
            
               function printErrorMsg(msg) {
            
                  $(".print-error-msg").find("ul").html('');
            
                  $(".print-error-msg").css('display', 'block');
            
                  $.each(msg, function(key, value) {
            
                        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            
                  });
            
               }
   
   });
      </script>
@endsection
