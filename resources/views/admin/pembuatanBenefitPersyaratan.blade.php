@extends('topnav.topnavAdmin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Pembuatan Benefit dan Persyaratan</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="/">Admin</a></li>
               <li class="breadcrumb-item active">Benefit-Persyaratan</li>
            </ol>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      @if(session('pesan'))
      <div class="alert alert-success alert-dismissable">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <h4><i class="icon fa fa-check"></i>Success</h4>
         {{session('pesan')}}.
      </div>
      @endif
      <div class="modal fade" id="modal-edit-benefit">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header bg-primary">
                  <h4 class="modal-title">Edit Benefit</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <form id="formEditBenefit" enctype="multipart/form-data" class="was-validated">
                  @csrf
                  <div class="modal-body">
                     <div class="form-group row">
                        <label for="manfaat" class="col-md-4 col-form-label text-md-left">Benefit</label>
                        <div class="col-md-12">
                           <input type="hidden" id="id" name="id" >
                           <textarea
                              id="manfaat"
                              type="text"
                              class="form-control"
                              name="manfaat"
                              required
                              autofocus
                              /></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                     <button class="btn btn-outline-primary btn-submit" id="editBTN">Submit</button>
                  </div>
               </form>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="modal-edit-persyaratan">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header bg-primary">
                  <h4 class="modal-title">Edit Persyaratan</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <form id="formEditPersyaratan" enctype="multipart/form-data" class="was-validated">
                  @csrf
                  <div class="modal-body">
                     <div class="form-group row">
                        <label for="syarat" class="col-md-4 col-form-label text-md-left">Persyaratan</label>
                        <div class="col-md-12">
                           <input type="hidden" id="id" name="id" >
                           <textarea
                              id="syarat"
                              type="text"
                              class="form-control"
                              name="syarat"
                              required
                              autofocus
                              /></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                     <button class="btn btn-outline-primary btn-submit" id="ubahBTN">Submit</button>
                  </div>
               </form>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <div class="row">
         <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">Tambah Benefit</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form id="formBenefit" enctype="multipart/form-data" >
                  @csrf  
                  <div class="card-body">
                     <div class="form-group row">
                        <label for="manfaat" class="col-md-12 col-form-label text-md-center">{{ __('Benefit') }}</label>
                        <div class="col-md-12">
                           <textarea id="manfaat" type="text" class="form-control" name="manfaat" value="{{ old('manfaat') }}"></textarea>
                           @if ($errors->has('manfaat'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('manfaat') }}</strong>
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
                     </div>
                  </div>
               </form>
            </div>
            <!-- /.card -->
         </div>
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">List Benefit</h3>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>Benefit</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>Benefit</th>
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
         <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">Tambah Persyaratan</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form id="formPersyaratan" enctype="multipart/form-data" >
                  @csrf  
                  <div class="card-body">
                     <div class="form-group row">
                        <label for="syarat" class="col-md-12 col-form-label text-md-center">{{ __('Persyaratan') }}</label>
                        <div class="col-md-12">
                           <textarea id="syarat" type="text" class="form-control" name="syarat" value="{{ old('syarat') }}"></textarea>
                           @if ($errors->has('syarat'))
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('syarat') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <!-- /.card-body -->
                     <div class="text-center">
                        <button class="btn btn-success btn-submit" id="saveBTN">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
            <!-- /.card -->
         </div>
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">List Persyaratan</h3>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <table id="example2" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>Persyaratan</th>
                           <th>action</th>
                        </tr>
                     </thead>
                     <tbody>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>Persyaratan</th>
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
                url: "{{route('admin.tabelBenefit')}}",
                type: 'GET'
            },
            columns: [

                {
                    data: 'manfaat',
                    name: 'manfaat',
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
$(function() {
    $("#example2")
        .DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{route('admin.tabelPersyaratan')}}",
                type: 'GET'
            },
            columns: [

                {
                    data: 'syarat',
                    name: 'syarat',
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

$(document).ready(function() {
    $('body').on('click', '.deleteBenefit', function() {
        var Item_id = $(this).data("id");
        var url = '{{ route("admin.DeleteBenefit",[":id"]) }}';
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
    $('body').on('click', '.deletePersyaratan', function() {
        var Item_id = $(this).data("id");
        var url = '{{ route("admin.DeletePersyaratan",[":id"]) }}';
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
    if ($("#formBenefit").length > 0) {
        $("#formBenefit").validate({
            rules: {
                manfaat: {
                    required: true

                },
            },
            messages: {
                manfaat: {
                    required: 'Tolong Diisi'
                },

            },
            submitHandler: function(form) {
                var actionType = $('#simpanBTN').val();
                $('#simpanBTN').html('Sending..');
                var form = $("#formBenefit").closest("form");
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
                    url: "{{ route('admin.AddBenefit') }}", //url simpan data
                    type: "POST", //karena simpan kita pakai method POST
                    dataType: 'json', //data tipe kita kirim berupa JSON
                    processData: false,
                    contentType: false,
                    success: function(data) { //jika berhasil
                        switch (data.status) {
                            case 0:
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

                                $('#simpanBTN').html('Submit'); //tombol simpan
                                $('#simpanBTN').show();
                                document.getElementById("formBenefit").reset();
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

                        $('#manfaat').val("");


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
    if ($("#formPersyaratan").length > 0) {
        $("#formPersyaratan").validate({
            rules: {
                syarat: {
                    required: true

                },
            },
            messages: {
                syarat: {
                    required: 'Tolong Diisi'
                },

            },
            submitHandler: function(form) {
                var actionType = $('#simpanBTN').val();
                $('#simpanBTN').html('Sending..');
                var form = $("#formPersyaratan").closest("form");
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
                    url: "{{ route('admin.AddPersyaratan') }}", //url simpan data
                    type: "POST", //karena simpan kita pakai method POST
                    dataType: 'json', //data tipe kita kirim berupa JSON
                    processData: false,
                    contentType: false,
                    success: function(data) { //jika berhasil
                        switch (data.status) {
                            case 0:
                                $('#simpanBTN').html('Submit');
                                $('#simpanBTN').show();
                                var oTable = $('#example2').dataTable(); //inialisasi datatable
                                oTable.fnDraw(false); //reset datatable
                                iziToast.error({
                                    title: 'Error',
                                    message: data.error,
                                });
                                console.log('Error:', "periksa");
                                break;
                            case 1:

                                $('#simpanBTN').html('Submit'); //tombol simpan
                                $('#simpanBTN').show();
                                document.getElementById("formPersyaratan").reset();
                                var oTable = $('#example2').dataTable(); //inialisasi datatable
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

                        $('#manfaat').val("");


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
    if ($("#formEditBenefit").length > 0) {
        $("#formEditBenefit").validate({
            rules: {
                mafaat: {
                    required: true

                },

            },
            messages: {
                manfaat: {
                    required: 'Tolong Diisi'
                },


            },
            submitHandler: function(form) {
                var actionType = $('#editBTN').val();
                $('#editBTN').html('Sending..');
                var form = $("#formEditBenefit").closest("form");
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
                    url: "{{ route('admin.EditBenefit') }}", //url simpan data
                    type: "POST", //karena simpan kita pakai method POST
                    dataType: 'json', //data tipe kita kirim berupa JSON
                    processData: false,
                    contentType: false,
                    success: function(data) { //jika berhasil
                        switch (data.status) {
                            case 0:
                                $('#editBTN').html('Submit');
                                $('#editBTN').show();
                                var oTable = $('#example1').dataTable(); //inialisasi datatable
                                oTable.fnDraw(false); //reset datatable
                                iziToast.error({
                                    title: 'Error',
                                    message: data.error,
                                });
                                console.log('Error:', "periksa");
                                break;
                            case 1:
                                $('#editBTN').html('Submit'); //tombol simpan
                                $('#editBTN').show();
                                $('#modal-edit-benefit').modal('hide')
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
    if ($("#formEditPersyaratan").length > 0) {
        $("#formEditPersyaratan").validate({
            rules: {
                syarat: {
                    required: true

                },

            },
            messages: {
                syarat: {
                    required: 'Tolong Diisi'
                },


            },
            submitHandler: function(form) {
                var actionType = $('#ubahBTN').val();
                $('#ubahBTN').html('Sending..');
                var form = $("#formEditPersyaratan").closest("form");
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
                    url: "{{ route('admin.EditPersyaratan') }}", //url simpan data
                    type: "POST", //karena simpan kita pakai method POST
                    dataType: 'json', //data tipe kita kirim berupa JSON
                    processData: false,
                    contentType: false,
                    success: function(data) { //jika berhasil
                        switch (data.status) {
                            case 0:
                                $('#ubahtBTN').html('Submit');
                                $('#ubahBTN').show();
                                var oTable = $('#example2').dataTable(); //inialisasi datatable
                                oTable.fnDraw(false); //reset datatable
                                iziToast.error({
                                    title: 'Error',
                                    message: data.error,
                                });
                                console.log('Error:', "periksa");
                                break;
                            case 1:
                                $('#ubahBTN').html('Submit'); //tombol simpan
                                $('#ubahBTN').show();
                                $('#modal-edit-persyaratan').modal('hide')
                                var oTable = $('#example2').dataTable(); //inialisasi datatable
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

$('#modal-edit-benefit').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('myid')
    var manfaat = button.data('manfaat')
    var modal = $(this)
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #manfaat').val(manfaat)

});
$('#modal-edit-persyaratan').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('myid')
    var syarat = button.data('syarat')
    var modal = $(this)
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #syarat').val(syarat)

});
</script>
@endsection
