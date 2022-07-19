@extends('topnav.topnavAdmin')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Seleksi</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Rank-Challenge</li>
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
                           <h3 class="card-title">List Pendaftar Tahap Challenge</h3>
                           <div class="modal fade" id="modal-penilaian">
                                    <div class="modal-dialog">
                                       <div class="modal-content bg-warning">
                                          <div class="modal-header">
                                             <h4 class="modal-title">Penilaian</h4>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <form id="form-penilaian-edit" name="form-penilaian-edit"  enctype="multipart/form-data" class="was-validated">
                                          {{csrf_field()}}
                                             <div class="modal-body">
                                                <div class="form-group row">
                                                   <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('id') }}</label>
                                                   <div class="col-md-7">
                                                      <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id"  readonly />
                                                      @if ($errors->has('user_id'))
                                                      <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('user_id') }}</strong>
                                                      </span>
                                                      @endif
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label for="writing" class="col-md-4 col-form-label text-md-right">{{ __('writing') }}</label>
                                                   <div class="col-md-7">
                                                      <input
                                                         id="writing"
                                                         type="text"
                                                         class="form-control"
                                                         name="writing"
                                                         value="{{ old('writing') }}"
                                                         required
                                                         autofocus
                                                         />
                                                     
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label for="video" class="col-md-4 col-form-label text-md-right">{{ __('video') }}</label>
                                                   <div class="col-md-7">
                                                      <input
                                                         id="video"
                                                         type="text"
                                                         class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}"
                                                         name="video"
                                                         value="{{ old('video') }}"
                                                         required
                                                         autofocus
                                                         />
                                                      @if ($errors->has('video'))
                                                      <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('video') }}</strong>
                                                      </span>
                                                      @endif
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label for="penjualan" class="col-md-4 col-form-label text-md-right">{{ __('penjualan') }}</label>
                                                   <div class="col-md-7">
                                                      <input
                                                         id="penjualan"
                                                         type="text"
                                                         class="form-control{{ $errors->has('penjualan') ? ' is-invalid' : '' }}"
                                                         name="penjualan"
                                                         value="{{ old('penjualan') }}"
                                                         required
                                                         autofocus
                                                         />
                                                      @if ($errors->has('business'))
                                                      <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('business') }}</strong>
                                                      </span>
                                                      @endif
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label for="point" class="col-md-4 col-form-label text-md-right">{{ __('point') }}</label>
                                                   <div class="col-md-7">
                                                      <input
                                                         id="point"
                                                         type="text"
                                                         class="form-control{{ $errors->has('point') ? ' is-invalid' : '' }}"
                                                         name="point"
                                                         value="{{ old('point') }}"
                                                         required
                                                         autofocus
                                                         />
                                                      @if ($errors->has('point'))
                                                      <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $errors->first('point') }}</strong>
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
                                 <!-- /.modal -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           @if(session('berhasil'))
                           <div class="alert alert-success alert-dismissable md-5">
                              <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check"></i>Penilaian</h5>
                              {{session('berhasil')}}.
                           </div>
                           @endif
                           @if(session('pesan'))
                           <div class="alert alert-warning alert-dismissable md-5">
                              <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-info"></i>Penilaian</h5>
                              {{session('pesan')}}.
                           </div>
                           @endif
                           @if(session('challenge'))
                           <div class="alert alert-danger alert-dismissable md-5">
                              <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fa fa-check"></i>Penilaian </h5>
                              {{session('challenge')}}.
                           </div>
                           @endif
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>Rank</th>
                                    <th>nama</th>
                                    <th>Writing</th>
                                    <th>Video</th>
                                    <th>Business</th>
                                    <th>extra</th>
                                    <th>Penjualan</th>
                                    <th>total</th>
                                    <th>Penilaian</th>
                                    <th>Status</th>
                                    <th>Challenge Writing</th>
                                    <th>Challenge Video</th>
                                    <th>Challenge Business</th>
                                 </tr>
                              </thead>
                                
                              
                              <tfoot>
                                 <tr>
                                    <th>Rank</th>
                                    <th>nama</th>
                                    <th>Writing</th>
                                    <th>Video</th>
                                    <th>Business</th>
                                    <th>extra</th>
                                    <th>penjualan</th>
                                    <th>total</th>
                                    <th>Penilaian</th>
                                    <th>Status</th>
                                    <th>Challenge Writing</th>
                                    <th>Challenge Video</th>
                                    <th>Challenge Business</th>
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
         $(function(){
             $("#example1")
                 .DataTable({
                      processing:true,
                     serverSide:true,
                     ajax : {
                        url : "{{route('admin.challenge.rank')}}",
                        type : 'GET'
                     },
                     columns:[            
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        {data:'nama',name:'nama'},
                        {data:'writing',name:'writing'},
                        {data:'video',name:'video'},
                        {data:'business',name:'business'},
                        {data:'point',name:'point'},
                        {data:'penjualan',name:'penjualan'},
                        {data:'total',name:'total'},
                        {data: 'Penilaian', name: 'Penilaian'},
                        {data: 'Status', name: 'Status', orderable: true, searchable: true},
                        {data: 'Challenge Writing', name: 'Challenge Writing', orderable: true, searchable: true},
                        {data: 'Challenge Video', name: 'Challenge Video', orderable: true, searchable: true},
                        {data: 'Challenge Business', name: 'Challenge Business', orderable: true, searchable: true},
                        
                     ],
                     responsive: true,
                     lengthChange: false,
                     autoWidth: false,
                 })
                 .buttons()
                 .container()
                 .appendTo("#example1_wrapper .col-md-6:eq(0)");
             $("#example2").DataTable({
                 paging: true,
                 lengthChange: false,
                 searching: false,
                 ordering: true,
                 info: true,
                 autoWidth: false,
                 responsive: true,
             });
         });
         $('#modal-penilaian').on('show.bs.modal', function (event) {
             
             var button = $(event.relatedTarget) // Button that triggered the modal
             var id = button.data('myid')
             var writing = button.data('writing') 
             var video = button.data('video') 
             var penjualan = button.data('penjualan') 
             var point = button.data('point')  
             var modal = $(this)
             modal.find('.modal-body #user_id').val(id)
             modal.find('.modal-body #writing').val(writing)
             modal.find('.modal-body #video').val(video)
             modal.find('.modal-body #penjualan').val(penjualan)
             modal.find('.modal-body #point').val(point)
         });
         $('body').on('click', '.deleteItem', function() {
                  var Item_id = $(this).data("id");
                  var val = $(this).data("val");
                  var url = '{{ route("admin.keputusanSeleksiPertama",[":id",":val"]) }}';
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
         //SIMPAN & UPDATE DATA DAN VALIDASI (SISI CLIENT)
        //jika id = modal-penilaian panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
        //jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
        if ($("#form-penilaian-edit").length > 0) {
            $.validator.addMethod('minStrict', function (value, el, param) {
               return value < param;
            });
            $("#form-penilaian-edit").validate({
               rules: {
                  writing: {
                     required: true,
                     number: true,
                     minStrict:101

                  },
                  video: {
                     required: true,
                     number: true,
                     minStrict:101

                  },
                  penjualan: {
                     required: true,
                     number: true,
                    
                  },
                  point: {
                     number: true

                  },
               },
               messages: {
                  writing: {
                     required: 'Tolong Diisi',
                     number: 'Mohon untuk menginput hanya angka',
                     minStrict: 'angka terlalu besar'
                  },
                  video: {
                     required: 'Tolong Diisi',
                     number: 'Mohon untuk menginput hanya angka',
                     minStrict: 'angka terlalu besar'
                  },
                  penjualan: {
                     required: 'Tolong Diisi',
                     number: 'Mohon untuk menginput hanya angka'
                  },
                  point: {
                     number: 'Mohon untuk menginput hanya angka'
                  }
               },
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');

                    $.ajax({
                        data: $('#form-penilaian-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('admin.challenge.editpenilaian') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function (data) { //jika berhasil 
                            $('#form-penilaian-edit').trigger("reset"); //form reset
                            $('#modal-penilaian').modal('hide'); //modal hide
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
