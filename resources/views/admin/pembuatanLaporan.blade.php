@extends('topnav.topnavAdmin')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Pembuatan Laporan</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Pembuatan-Laporan</li>
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
                           <h3 class="card-title">Form Laporan</h3>
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
                                 <label for="time_start" class="col-md-4 col-form-label text-md-right">{{ __('Mulai Kegiatan Jam :') }}</label>
                                 <div class="col-md-6">
                                    <input id="time_start" type="time" class="form-control" name="time_start" value="{{ old('time_start') }}"  />
                                    @if ($errors->has('time_start'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('time_start') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                              <label for="time_end" class="col-md-4 col-form-label text-md-right">{{ __('Kegiatan Berakhir Jam:') }}</label>
                                 <div class="col-md-6">
                                    <input id="time_end" type="time" class="form-control" name="time_end" value="{{ old('time_end') }}"  />
                                    @if ($errors->has('time_end'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('time_end') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Kegiatan') }}</label>
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
                                 <label for="tipe_kegiatan" class="col-md-4 col-form-label text-md-right">{{ __('Tipe Kegiatan') }}</label>
                                 <div class="col-md-6">
                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                       <input type="radio" id="customRadioInline3" name="tipe_kegiatan" class="custom-control-input" value="offline" >
                                       <label class="custom-control-label" for="customRadioInline3">Offline</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input type="radio" id="customRadioInline4" name="tipe_kegiatan" class="custom-control-input" value="online">
                                       <label class="custom-control-label" for="customRadioInline4">Online</label>
                                    </div>
                                    @if ($errors->has('tipe_kegiatan'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tipe_kegiatan') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="tempat" class="col-md-4 col-form-label text-md-right">{{ __('Tempat') }}</label>
                                 <div class="col-md-6">
                                 <textarea
                                                   id="tempat"
                                                   type="text"
                                                   class="form-control{{ $errors->has('tempat') ? ' is-invalid' : '' }}"
                                                   name="tempat"
                                                   value="{{ old('tempat') }}"
                                                   required
                                                   autofocus
                                                   ></textarea>
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                    Jika Kegiatan Offline maka isi dengan alamat, jika online isi dengan nama aplikasi yang dipakai : zoom atau gmeet
                                    </small>
                                    @if ($errors->has('tempat'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tempat') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="guest" class="col-md-4 col-form-label text-md-right">{{ __('Pengisi Kegiatan') }}</label>
                                 <div class="col-md-6">
                                    <input id="guest" type="text" class="form-control" name="guest" value="{{ old('guest') }}" required autofocus />
                                    @if ($errors->has('guest'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('guest') }}</strong>
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
                                       <h3 class="card-title">Target Tugas List</h3>
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
                                                   <th>Tanggal Kegiatan</th>
                                                   <th>Tipe Kegiatan</th>
                                                   <th>Guest</th>
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
                        url : "{{route('admin.PembuatanLaporan')}}",
                        type : 'GET'
                     },
                     columns:[
                        {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        {data:'judul',name:'judul',orderable: true,searchable: true},
                        {data: 'Tanggal', name: 'Tanggal', orderable: true, searchable: true},
                        {data: 'tipe_kegiatan', name: 'tipe_kegiatan', orderable: true, searchable: true},
                        {data: 'guest', name: 'guest', orderable: true, searchable: true},
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
            var url = '{{ route("admin.DeleteLaporan",[":id"]) }}';
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
                     
                           time_start: {
                              required: true,
                              
                           },
                           time_end: {
                              required: true,
                              
                           },
                           tipe_kegiatan: {
                              required: true,
                              
                           },
                           tempat: {
                              required: true,
                              
                           },
                           guest: {
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
                           
                           time_start: {
                              required: 'Tolong Diisi'
                           },
                           time_end: {
                              required: 'Tolong Diisi',
                              
                           },
                           tipe_kegiatan: {
                              required: 'Tolong Diisi',
                              
                           },
                           tempat: {
                              required: 'Tolong Diisi',
                              
                           },
                           guest: {
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
                              url: "{{ route('admin.AddLaporan') }}", //url simpan data
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
