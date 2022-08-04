@extends('topnav.topnavAdmin')
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
                           <button type="button" class="btn btn-outline-success m-2"><i class="fa fa-edit"></i> Keterangan Laporan</button>
                           <button type="button" class="btn btn-outline-danger m-2"><i class="fa fa-camera"></i> Dokumentasi Acara</button>
                           <button type="button" class="btn btn-outline-info m-2"><i class="fa fa-camera"></i> Dokumentasi Pembayaran</button>
                  
                
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
                        url : "{{route('admin.PembuatanLaporan')}}",
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
