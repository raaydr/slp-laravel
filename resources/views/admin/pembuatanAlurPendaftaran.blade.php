@extends('topnav.topnavAdmin')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Pembuatan Alur Pendaftaran</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Pembuatan-Alur-Pendaftaran</li>
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
                           <h3 class="card-title">Form Alur Pendaftaran</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="formTarget" enctype="multipart/form-data" >
                        @csrf  
                           <div class="card-body">
                           <div class="form-group row">
                                 <label for="Judul" class="col-md-4 col-form-label text-md-right">{{ __('Judul') }}</label>
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
                                 <label for="Urutan" class="col-md-4 col-form-label text-md-right">{{ __('Urutan') }}</label>
                                 <div class="col-md-6">
                                    <input id="urutan" type="text" class="form-control" name="urutan" value='{{$urut}}'readonly />
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                       Refresh Page jika urutan tidak sesuai</small>
                                    @if ($errors->has('urutan'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('urutan') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="isi" class="col-md-4 col-form-label text-md-right">{{ __('Isi') }}</label>
                                 <div class="col-md-6">
                                 <textarea
                                                   id="isi"
                                                   type="text"
                                                   class="form-control{{ $errors->has('isi') ? ' is-invalid' : '' }}"
                                                   name="isi"
                                                   value="{{ old('isi') }}"
                                                   required
                                                   autofocus
                                                   ></textarea>
                                    @if ($errors->has('isi'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('isi') }}</strong>
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
                  <div class="modal fade" id="modal-edit">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-primary">
               <h4 class="modal-title">Edit Alur</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form id="formEdit" enctype="multipart/form-data" class="was-validated">
               @csrf
               <div class="modal-body">
                  <div class="form-group row">
                     <label for="judul" class="col-md-4 col-form-label text-md-left">Judul</label>
                     <div class="col-md-12">
                        <input
                           id="judul"
                           type="text"
                           class="form-control"
                           name="judul"
                           required
                           autofocus
                           /></input>
                           <input type="hidden" id="id" name="id" >
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="urutan" class="col-md-4 col-form-label text-md-left">Urutan</label>
                     <div class="col-md-12">
                        <input
                           id="urutan"
                           type="text"
                           class="form-control"
                           name="urutan"
                           readonly
                           
                           /></input>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="isi" class="col-md-4 col-form-label text-md-left">Isi</label>
                     <div class="col-md-12">
                        <textarea
                           id="isi"
                           type="file"
                           class="form-control"
                           name="isi"
                           required
                           autofocus
                           /></textarea>
                     </div>
                  </div>
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                  <button class="btn btn-outline-primary btn-submit" id="saveBTN">Submit</button>
               </div>
            </form>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
                  <div class="col-12">
                              <div class="card">
                                 <div class="card-header">
                                       <h3 class="card-title">Alur Pendaftaran</h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body">
                                       <table id="example1" class="table table-bordered table-striped">
                                          <thead>
                                             <tr>
                                                   <th>Urutan</th>
                                                   <th>Judul</th>
                                                   <th>Isi</th>
                                                   <th>action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                          <tfoot>
                                             <tr>
                                                <th>Urutan</th>
                                                   <th>Judul</th>
                                                   <th>Isi</th>
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
$(function() {
    $("#example1")
        .DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{route('admin.PembuatanAlurPendaftaran')}}",
                type: 'GET'
            },
            columns: [{
                    data: 'urutan',
                    name: 'urutan',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'judul',
                    name: 'judul',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'isi',
                    name: 'isi',
                    orderable: true,
                    searchable: true
                },

                {
                    data: 'action',
                    name: 'action'
                },


            ],
            order: [
                [0, 'asc']
            ],
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
            initComplete: function() {
                // Apply the search
                this.api()
                    .columns()
                    .every(function() {
                        var that = this;

                        $('input', this.footer()).on('keyup change clear', function() {
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
$(function() {
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
        var urutan = $(this).data("urutan");
        var url = '{{ route("admin.DeleteAlur",[":id"]) }}';
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
                var j = 2;
                var length = oTable.fnSettings().fnRecordsTotal();
                var sum = Number(length) + Number(j);
                if (Number(urutan)>=Number(sum)){
                  document.getElementById("urutan").value = sum;
                } else {
                  document.getElementById("urutan").value = urutan;
                }

                location.reload(true);

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
                urutan: {
                    required: true,
                    number: true,


                },
                isi: {
                    required: true,

                },

            },
            messages: {
                judul: {
                    required: 'Tolong Diisi'
                },
                urutan: {
                    required: 'Tolong Diisi',
                    number: 'Tolong isi dengan angka',

                },
                isi: {
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
                                $(".progress-bar").html(percentComplete + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    data: formData,
                    url: "{{ route('admin.AddAlurPendaftaran') }}", //url simpan data
                    type: "POST", //karena simpan kita pakai method POST
                    dataType: 'json', //data tipe kita kirim berupa JSON
                    processData: false,
                    contentType: false,
                    success: function(data) { //jika berhasil
                        switch (data.status) {
                            case 0:
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
                            case 1:
                                $('#load').hide();
                                $('#simpanBTN').html('Submit'); //tombol simpan
                                $('#simpanBTN').show();
                                
                                document.getElementById("formTarget").reset();
                                
                                $('#summernote').summernote('code', '');
                                var oTable = $('#example1').dataTable(); //inialisasi datatable
                                oTable.fnDraw(false); //reset datatable
                                var j = 2;
                                var length = oTable.fnSettings().fnRecordsTotal();
                                 var sum = Number(length) + Number(j);
                                 console.log(Number(length));
                                document.getElementById("urutan").value = sum;
                                console.log(sum);
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
    if ($("#formEdit").length > 0) {
        $("#formEdit").validate({
            rules: {
                judul: {
                    required: true

                },
                isi: {
                    required: true,

                },

            },
            messages: {
                judul: {
                    required: 'Tolong Diisi'
                },
                isi: {
                    required: 'Tolong Diisi',

                },


            },
            submitHandler: function(form) {
                var actionType = $('#saveBTN').val();
                $('#saveBTN').html('Sending..');
                var form = $("#formEdit").closest("form");
                var formData = new FormData(form[0]);
                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = Math.round(((evt.loaded / evt.total) * 100));
                                $(".progress-bar").width(percentComplete + '%');
                                $(".progress-bar").html(percentComplete + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    data: formData,
                    url: "{{ route('admin.EditAlur') }}", //url simpan data
                    type: "POST", //karena simpan kita pakai method POST
                    dataType: 'json', //data tipe kita kirim berupa JSON
                    processData: false,
                    contentType: false,
                    success: function(data) { //jika berhasil
                        switch (data.status) {
                            case 0:
                                $('#load').hide();
                                $('#saveBTN').html('Submit');
                                $('#savenBTN').show();
                                var oTable = $('#example1').dataTable(); //inialisasi datatable
                                oTable.fnDraw(false); //reset datatable
                                iziToast.error({
                                    title: 'Error',
                                    message: data.error,
                                });
                                console.log('Error:', "periksa");
                                break;
                            case 1:
                                $('#saveBTN').html('Submit'); //tombol simpan
                                $('#saveBTN').show();
                                $('#modal-edit').modal('hide')
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
$('#modal-edit').on('show.bs.modal', function (event) {
             
             var button = $(event.relatedTarget) // Button that triggered the modal
             var id = button.data('myid')
             var judul = button.data('judul') 
             var urutan = button.data('urutan') 
             var isi = button.data('isi') 
             var modal = $(this)
             modal.find('.modal-body #id').val(id)
             modal.find('.modal-body #judul').val(judul)
             modal.find('.modal-body #urutan').val(urutan)
             modal.find('.modal-body #isi').val(isi)
}); 
</script>
@endsection
