@extends('topnav.topnavAdmin')
@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
@endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Detail Laporan</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="/">Admin</a></li>
               <li class="breadcrumb-item active">Detail-Laporan</li>
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
   @if(session('error'))
   <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-info"></i>Error</h4>
      {{session('error')}}.
   </div>
   @endif
   <div class="row">
      <div class="col-6">
         <!-- general form elements -->
         <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-title">Form Laporan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
               <div class="form-group row">
                  <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('Judul Kegiatan') }}</label>
                  <div class="col-md-8 col-form-label text-md-left">
                     <a class="text-primary"><b>{{$laporan->judul}}</b></a>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Kegiatan') }}</label>
                  <div class="col-md-8 col-form-label text-md-left">
                     <b>{{$tanggal_mulai}}</b>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="time_start" class="col-md-4 col-form-label text-md-right">{{ __('Mulai Kegiatan') }}</label>
                  <div class="col-md-8 col-form-label text-md-left">
                     <b>{{$mulai}} WIB</b>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="time_end" class="col-md-4 col-form-label text-md-right">{{ __('Kegiatan Berakhir') }}</label>
                  <div class="col-md-8 col-form-label text-md-left">
                     <b>{{$akhir}} WIB</b>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="tipe_kegiatan" class="col-md-4 col-form-label text-md-right">{{ __('Tipe Kegiatan') }}</label>
                  <div class="col-md-8 col-form-label text-md-left">
                     <b>{{$laporan->tipe_kegiatan}}</b>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="tempat" class="col-md-4 col-form-label text-md-right">{{ __('Tempat') }}</label>
                  <div class="col-md-8 col-form-label text-md-left">
                     <b>{{$laporan->tempat}}</b>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="guest" class="col-md-4 col-form-label text-md-right">{{ __('Pengisi Kegiatan') }}</label>
                  <div class="col-md-8 col-form-label text-md-left">
                     <b>{{$laporan->guest}}</b>
                  </div>
               </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
               <!-- /.card-body -->
               <a type="button" href="{{route('admin.EditLaporanForm',$laporan->id)}}" class="btn btn-outline-primary m-2"><i class="fa fa-edit"></i> Edit Laporan</a>
               <button  class="btn btn-outline-success m-2" data-toggle="modal" data-tugas_id="{{ $laporan->id}}" data-target="#modal-note"target="_blank"><i class="fa fa-edit"></i> Keterangan Laporan</button>
               <a data-toggle="modal" data-target="#modal-foto" class="btn btn-outline-danger m-2"><i class="fa fa-camera"></i> Dokumentasi Acara</a>
               <a data-toggle="modal" data-target="#modal-bukti" class="btn btn-outline-info m-2"><i class="fa fa-camera"></i> Dokumentasi Pembayaran</a>
               <a type="button" href="{{route('admin.DetailAbsensi',$laporan->id)}}" class="btn btn-outline-warning m-2"><i class="fa fa-user"></i> Absensi Kegiatan</a>
               <a type="button" href="{{route('admin.downloadLaporan',$laporan->id)}}" class="btn btn-outline-dark m-2" target="_blank"><i class="fa fa-edit"></i> Cetak Laporan</a>
               
            </div>
            </form>
         </div>
         <!-- /.card -->
      </div>
      <div class="col-6" id="accordion">
         <div class="card card-primary card-outline">
            <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
               <div class="card-header">
                  <h4 class="card-title w-100">
                     <b>Keterangan Laporan</b>
                  </h4>
                  <h4 class="card-title w-100">
                  </h4>
               </div>
            </a>
            <div id="collapseOne" class="collapse show" data-parent="#accordion">
               <div class="card-body">
                  <?php
                     echo $laporan->keterangan ;
                     ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Bukti Pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>no</th>
                        <th>Judul</th>
                        <th>Pembayaran</th>
                        <th>image</th>
                        <th>action</th>
                     </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                     <tr>
                        <th>no</th>
                        <th>Judul</th>
                        <th>Pembayaran</th>
                        <th>image</th>
                        <th>action</th>
                     </tr>
                  </tfoot>
               </table>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <div class="col-12">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Dokumentasi Kegiatan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example2" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>no</th>
                        <th>image</th>
                        <th>action</th>
                     </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                     <tr>
                        <th>no</th>
                        <th>image</th>
                        <th>action</th>
                     </tr>
                  </tfoot>
               </table>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
   </div>
   <!-- /.row -->
   <div class="modal fade" id="modal-note">
      <div class="modal-dialog">
         <div class="modal-content ">
            <div class="modal-header bg-info">
               <h4 class="modal-title">Laporan Kegiatan</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="POST" action="{{route('admin.noteLaporan',$laporan->id)}}" enctype="multipart/form-data" class="was-validated">
               @csrf  
               <div class="modal-body">
                  <div class="col-md-12">
                     <div class="form-group row">
                        <label for="keterangan" class="col-md-4 col-form-label ">{{ __('keterangan') }}</label>
                        <div class="col-md-12">
                           <textarea id="summernote"  class="form-control{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" name="keterangan"    autofocus></textarea>
                           <small id="passwordHelpBlock" class="form-text text-sucess">Laporan saat kegiatan berlangsung</small> 
                           @if ($errors->has('keterangan'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('keterangan') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer  justify-content-between">
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-outline-success">Save</button>
               </div>
            </form>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <div class="modal fade" id="modal-foto">
      <div class="modal-dialog">
         <div class="modal-content bg-info">
            <div class="modal-header">
               <h4 class="modal-title">Dokumentasi Kegiatan</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
                  <div class="col-md-12">
                     <div class="form-group row">
                        <label for="keterangan" class="col-md-4 col-form-label ">{{ __('Upload Foto') }}</label>
                        <div class="col-md-12">
                        <form method="post" action="{{route('admin.dokumentasiKegiatanLaporan',$laporan->id)}}" enctype="multipart/form-data" 
                              class="dropzone" id="dropzone">
                              @csrf
                        </form>
                        <small id="passwordHelpBlock" class="form-text text-sucess"><a>Drag file atau Klik Kolom diatas</a></small>
                        <small id="passwordHelpBlock" class="form-text text-sucess">Format harus jpg,png,jpeg dan ukuran 5 mb</small>   
                        </div>
                     </div>
                  </div>
               </div>
               
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
   </div>
   <div class="modal fade" id="modal-bukti">
      <div class="modal-dialog">
         <div class="modal-content bg-primary">
            <div class="modal-header">
               <h4 class="modal-title">Dokumentasi Pembayaran</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form id="formMedia" enctype="multipart/form-data" class="was-validated">
               @csrf     
               <div class="modal-body">
                  <div class="form-group row">
                     <label for="judul" class="col-md-4 col-form-label text-md-right">{{ __('Judul Pembayaran') }}</label>
                     <div class="col-md-8">
                        <input
                           id="judul"
                           type="text"
                           class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}"
                           name="judul"
                           value="{{ old('judul') }}"
                           required
                           autofocus
                           /></input>
                        @if ($errors->has('judul'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('judul') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="pembayaran" class="col-md-4 col-form-label text-md-right">{{ __('Pembayaran') }}</label>
                     <div class="col-md-8">
                        <input
                           id="pembayaran"
                           type="text"
                           class="form-control{{ $errors->has('pembayaran') ? ' is-invalid' : '' }}"
                           name="pembayaran"
                           value="{{ old('pembayaran') }}"
                           required
                           autofocus
                           /></input>
                        @if ($errors->has('pembayaran'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('pembayaran') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="url_foto" class="col-md-4 col-form-label text-md-right">{{ __('Upload Foto') }}</label>
                     <div class="col-md-8">
                        <input
                           id="url_foto"
                           type="file"
                           class="form-control{{ $errors->has('url_foto') ? ' is-invalid' : '' }}"
                           name="url_foto"
                           value="{{ old('url_foto') }}"
                           required
                           autofocus
                           /></input>
                        <small id="passwordHelpBlock" class="form-text text-sucess">
                        Format harus jpg,png,jpeg dan ukuran 5 mb
                        </small>
                        @if ($errors->has('url_foto'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('url_foto') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                  <button class="btn btn-outline-light btn-submit" id="simpanBTN">Submit</button>
                  <div id="load" class="spinner-border text-primary"></div>
               </div>
            </form>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- /.container-fluid -->
</section>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
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
                 url : "{{route('admin.tabelDokumentasiPembayaran',$laporan->id)}}",
                 type : 'GET'
              },
              columns:[
                 {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                 {data:'judul',name:'judul',orderable: true,searchable: true},
                 {data: 'Pembayaran', name: 'Pembayaran', orderable: true, searchable: true},
                 {data: 'image', name: 'image'},
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
   $(function () {
            $("#example2")
                 .DataTable({
                     processing:true,
                     serverSide:true,
                     ajax : {
                        url : "{{route('admin.tabelDokumentasiKegiatan',$laporan->id)}}",
                        type : 'GET'
                     },
                     columns:[
                        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'image', name: 'image'},
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
   var rupiah = document.getElementById("pembayaran");
         pembayaran.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, "Rp. ");
         });
         
         /* Fungsi formatRupiah */
         function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
            }
            
            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
         }
     // Summernote
     $('#summernote').summernote()
   
   })     
   $(document).ready(function() {
     $('body').on('click', '.deleteItem', function() {
     var Item_id = $(this).data("id");
     var url = '{{ route("admin.DeleteDokumentasiPembayaran",[":id"]) }}';
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
     $('body').on('click', '.deleteFoto', function() {
     var Item_id = $(this).data("id");
     var url = '{{ route("admin.DeleteDokumentasiKegiatan",[":id"]) }}';
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
                    var oTable = $('#example2').dataTable(); //inialisasi datatable
                    oTable.fnDraw(false); //reset datatable
              
                 },
              
                 error: function(data) {
              
                    console.log('Error:', data);
              
                 }
              
        });
              
     });
     if ($("#formMedia").length > 0) {
            $.validator.addMethod("alphanumeric", function(value, element) {
               //test user value with the regex
               return this.optional(element) || /^[\w ]+$/i.test(value);
            }, "Mohon untuk menginput hanya huruf dan angka");
            $.validator.addMethod('filesize', function (value, element, param) {
               return this.optional(element) || (element.files[0].size <= param * 1000000)
            }, 'File size must be less than {0} MB');
   
            $("#formMedia").validate({
                  rules: {
                    judul: {
                        required: true,
                     },
                     pembayaran: {
                        required: true,
                        
                     },
                     url_foto: {
                        required: true,
                        extension: "jpeg|jpg|png|pdf",
                        filesize : 10, // here we are working with MB
                        
                     }
                     
                  },
                  messages: {
                     judul: {
                        required: 'Tolong Diisi',
                     },
                     pembayaran: {
                        required: 'Tolong Diisi',
                        
                     },
                     url_foto: {
                        extension: 'Harap mengupload file dengan format jpeg,jpg,png,pdf',
                        filesize: 'ukuran file terlalu besar, harap upload file dibawah 10 mb',
                     }
                     
                  },
                  submitHandler: function(form) {
                     var actionType = $('#simpanBTN').val();
                     $('#simpanBTN').hide();
                     $('#load').show();
                     var form = $("#formMedia").closest("form");
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
                        url: "{{route('admin.dokumentasiPembayaran',$laporan->id)}}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        processData: false,
                        contentType: false,
                        beforeSend: function(){
                           $(".progress-bar").width('0%');
                        },
                        success: function(data) { //jika berhasil
                           switch(data.status){
                              case 0 :
                                 $('#load').hide();
                                 $('#simpanBTN').show();
                                 $(".progress-bar").width('0%');
                                 iziToast.error({
                                    title: 'Error',
                                    message: 'Perhatikan validatornya',
                                 });
                                 console.log('Error:', "Perhatikan validatornya");
                                 break;
                              case 1 :
                                 $('#load').hide();
                                 $('#simpanBTN').show();
                                 document.getElementById("formMedia").reset(); 
                                 $(".progress-bar").width('0%');
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
                              $('#simpanBTN').show();
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
   $(function () {
                $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
                });
   
                $('.filter-container').filterizr({gutterPixels: 3});
                $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
                });
            })
   Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000,
            success: function(file, response) 
            {
               console.log('Error:', response);
               var oTable = $('#example2').dataTable(); //inialisasi datatable
                    oTable.fnDraw(false); //reset datatable
               iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data Berhasil Disimpan',
                                message: response.success,
                                position: 'bottomRight'
                            });
            },
            error: function(file, response)
            {
               console.log('Error:', response);
               iziToast.error({
                                       title: 'Error',
                                       message: response,
                                    });
                                    
               return false;
            }
};
</script>
@endsection
