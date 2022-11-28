@extends('topnav.topnavPeserta')
@section('head')
<link rel="stylesheet" href="{{asset('template')}}/plugins/summernote/summernote-bs4.min.css">
@endsection
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Input Tugas Speaking</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Tugas Speaking</a></li>
                           <li class="breadcrumb-item active">Input</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-12" id="accordion">
                        <div class="card card-primary card-outline">
                           <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                              <div class="card-header">
                                 <h4 class="card-title w-100">
                                    <b>{{$target->judul}}</b>
                                 </h4>
                                 <h4 class="card-title w-100">
                                    <b>Tanggal Mulai : {{$target->mulai}}</b>
                                 </h4>
                              </div>
                           </a>
                           <div id="collapseOne" class="collapse show" data-parent="#accordion">
                              <div class="card-body">
                              <?php
                                       echo $target->keterangan ;
                                       ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- left column -->
                  @if(session('pesan'))
                  <div class="alert alert-success alert-dismissable">
                     <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h4><i class="icon fa fa-check"></i>Success</h4>
                     {{session('pesan')}}.
                  </div>
                  @endif
                  @if($errors->any())
                  <div class="alert alert-danger alert-dismissable">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h4><i class="icon fa fa-danger"></i>Error</h4>
                     {!! implode('', $errors->all('<div>:message</div>')) !!}
                  </div>
                  @endif
                  
                  <div class="col-md-12">
                     <!-- general form elements -->
                     
                     <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Pengisian Tugas Speaking</h3>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div class="tab-content">
                                 <div class="active tab-pane" id="anggota">
                                    <div class="card">
                                       <div class="card-body register-card-body">
                                          <p class="login-box-msg"><b>Target Tugas : {{$target->judul}}</b></p>
                                          <form method="POST" action="{{ route('peserta.addTugasSpeaking', $target->id) }}"  enctype="multipart/form-data">
                                             @csrf
                                             <div class="col-md-12">
                                                <label for="exampleInputEmail1">Judul Tugas</label>
                                                <div class="input-group mb-3">
                                                   <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="" autocomplete="judul" required autofocus></input>
                                                   <div class="input-group-append">
                                                      <div class="input-group-text">
                                                         <span class=""></span>
                                                      </div>
                                                   </div>
                                                   @error('judul')
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                   </span>
                                                   @enderror
                                                </div>
                                             </div>
                                             <div class="col-md-12">
                                                <label for="exampleInputEmail1">Jenis Media </label>
                                                <div class="input-group mb-3">
                                                <select class="form-control" id="jenis_media">
                                                            <option value="no">Link</option>
                                                            <option value="yes">File</option>
                                                      </select>
                                                   <div class="input-group-append">
                                                      <div class="input-group-text">
                                                         <span class=""></span>
                                                      </div>
                                                   </div>
                                                   @error('nama_mata_pelatihan')
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                   </span>
                                                   @enderror
                                                </div>
                                             </div>
                                             <div class="col-md-12" id="file">
                                             <label for="exampleInputEmail1">Upload File</label>
                                                <div class="input-group control-group increment" >
                                                   <input type="file" name="url_file[]" class="form-control">
                                                   <div class="input-group-btn"> 
                                                      <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                                   </div>
                                                </div>
                                                <div class="clone">
                                                   <div class="control-group input-group" style="margin-top:10px">
                                                      <input type="file" name="url_file[]" class="form-control">
                                                      <div class="input-group-btn"> 
                                                      <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                      </div>
                                                   </div>
                                                </div>
                                                @error('url_file')
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                   </span>
                                                   @enderror
                                                <small class="text-primary">format harus jpeg,jpg,png,pdf berukuran maksimal 5 mb</small>
                                             </div>
                                             <div class="col-md-12" id="link">
                                                <label for="exampleInputEmail1">Upload URL</label>
                                                <div class="input-group mb-3">
                                                <input id="url_link" type="text" class="form-control" name="url_link" value="{{ old('url_link') }}"  placeholder= "url" required autocomplete="url_link">
                                                   <div class="input-group-append">
                                                      <div class="input-group-text">
                                                         <span class=""></span>
                                                      </div>
                                                   </div>
                                                   @error('url_link')
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                   </span>
                                                   @enderror
                                                </div>
                                                <small class="text-primary">format harus berupa URL </small>
                                             </div>
                                             <div class="col-md-12">
                                                <label for="exampleInputEmail1">Jumlah Peserta</label>
                                                <div class="input-group mb-3">
                                                   <input id="jumlah_peserta" type="text" class="form-control @error('jumlah_peserta') is-invalid @enderror" name="jumlah_peserta" value="" placeholder="Jumlah Peserta"  autocomplete="jumlah">
                                                   <div class="input-group-append">
                                                      <div class="input-group-text">
                                                         <span class=""></span>
                                                      </div>
                                                   </div>
                                                   @error('jumlah_peserta')
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                   </span>
                                                   @enderror
                                                </div>
                                                <small class="text-primary">Kosongkan bila belum ada instruksi</small>
                                             </div>
                                             <div class="col-md-12">
                                             <div class="form-group row">
                                                   <label for="keterangan" class="col-md-4 col-form-label ">{{ __('keterangan') }}</label>
                                                   <div class="col-md-12">
                                                      <textarea id="summernote"  class="form-control{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" name="keterangan"    required autofocus></textarea>
                                                         <small id="passwordHelpBlock" class="form-text text-sucess">Keterangan tugas yang dikerjakan</small> 
                                                            @if ($errors->has('keterangan'))
                                                            <span class="invalid-feedback" role="alert">
                                                               <strong>{{ $errors->first('keterangan') }}</strong>
                                                            </span>
                                                            @endif
                                                   </div>
                                                </div>
                                             </div>
                                             
                                             <div class="row">
                                                <!-- /.col -->
                                                <div class="col-12 justify">
                                                @if ($start == 1)
                                                   <button type="submit" class="btn btn-primary btn-block">Input</button>
                                                @else
                                                <h3 class="col-12 text-center ">Bukan Waktunya</h3>
                                                @endif
                                                </div>
                                                <!-- /.col -->
                                             </div>
                                          </form>
                                       </div>
                                       <!-- /.form-box -->
                                    </div>
                                    <!-- /.card -->
                                 </div>
                                 <!-- /.tab-pane -->
                                 <!-- /.tab-content -->
                              </div>
                              <!-- /.card-body -->
                           </div>
                        </div>
                        <!-- /.card -->
                  </div>
                  <!-- /.card -->
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
@endsection
@section('script')
         <script src="{{asset('template')}}/plugins/summernote/summernote-bs4.min.js"></script>
      <script>
         $(function () {
            $('#summernote').summernote()
             $("#example1")
                 .DataTable({
                     responsive: true,
                     lengthChange: false,
                     autoWidth: false,
                     buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
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
         $(function () {
            // Summernote
            $('#summernote').summernote()

         })
         $("#jenis_media").change(function () {
            if ($(this).val() == "yes") {
               $('#file').show();
               $('#url_file').attr('required', '');
               $('#url_file').attr('data-error', 'This field is required.');
               $('#link').hide();
               $('#url_link').val("");
               $('#url_link').removeAttr('required');
               $('#url_link').removeAttr('data-error');
            } else {
               $('#file').hide();
               $('#url_file').val("");
               $('#url_file').removeAttr('required');
               $('#url_file').removeAttr('data-error');
               $('#link').show();
               $('#url_link').attr('required', '');
               $('#url_link').attr('data-error', 'This field is required.');
            }
         });
         $("#jenis_media").trigger("change");
         $( ".clone" ).hide();
         $(document).ready(function() {
            var cloneLimit = 1;
            $(".btn-success").click(function(){ 
               if(cloneLimit < 3){
                  var html = $(".clone").html();
                  $(".increment").after(html);
                  cloneLimit++;
               }
               
            });
            $("body").on("click",".btn-danger",function(){ 
               $(this).parents(".control-group").remove();
               cloneLimit--;
            });
         });

      </script>
@endsection
