@extends('topnav.topnavAdmin')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Detail Target Tugas</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Target Tugas</a></li>
                           <li class="breadcrumb-item active">Edit</li>
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
                                    <b>Tanggal Mulai : {{$tanggal_mulai}}</b>
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
                  <div class="col-md-12">
                     <!-- general form elements -->
                     
                     <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Edit Target Tugas</h3>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div class="tab-content">
                                 <div class="active tab-pane" id="anggota">
                                    <div class="card">
                                       <div class="card-body register-card-body">
                                          <p class="login-box-msg">Edit Target Tugas</p>
                                          <form method="POST" action="{{ route('admin.EditTargetTugas', $target->id) }}" enctype="multipart/form-data">
                                             @csrf
                                             <div class="col-md-12">
                                                <label for="exampleInputEmail1">Judul Target Tugas</label>
                                                <div class="input-group mb-3">
                                                   <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{$target->judul}}" autocomplete="judul" autofocus></input>
                                                   <div class="input-group-append">
                                                      <div class="input-group-text">
                                                         <span class="fas fa-user"></span>
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
                                                <label for="exampleInputEmail1">Generasi</label>
                                                <div class="input-group mb-3">
                                                   <input id="gen" type="text" class="form-control @error('gen') is-invalid @enderror" name="gen" value="{{$target->gen}}" autocomplete="gen" autofocus></input>
                                                   <div class="input-group-append">
                                                      <div class="input-group-text">
                                                         <span class="fas fa-user"></span>
                                                      </div>
                                                   </div>
                                                   @error('gen')
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                   </span>
                                                   @enderror
                                                </div>
                                             </div>
                                             <div class="col-md-12">
                                                <label for="exampleInputEmail1">Jumlah</label>
                                                <div class="input-group mb-3">
                                                   <input id="jumlah" type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{$target->jumlah}}" placeholder="jumlah"  autocomplete="jumlah">
                                                   <div class="input-group-append">
                                                      <div class="input-group-text">
                                                         <span class="fas fa-user"></span>
                                                      </div>
                                                   </div>
                                                   @error('jumlah')
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                   </span>
                                                   @enderror
                                                </div>
                                             </div>
                                             <div class="col-md-12">
                                                <label for="exampleInputEmail1">Tipe Tugas</label>
                                                <div class="input-group mb-3">
                                                   <div class="col-md-3">
                                                      <div class="custom-control custom-radio custom-control-inline mt-2">
                                                         <input type="radio" id="customRadioInline1" name="proses_pengembangan" class="custom-control-input" value="1" {{ (($target->tipe_tugas) == 'Creative Writing')? "checked" : "" }}/>
                                                         <label class="custom-control-label" for="customRadioInline1">Creative Writing</label>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-3">
                                                      <div class="custom-control custom-radio custom-control-inline mt-2">
                                                         <input type="radio" id="customRadioInline2" name="proses_pengembangan" class="custom-control-input" value="2" {{ (($target->tipe_tugas) == 'Public Speaking')? "checked" : "" }}>
                                                         <label class="custom-control-label" for="customRadioInline2">Public Speaking</label>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-3">
                                                      <div class="custom-control custom-radio custom-control-inline mt-2">
                                                         <input type="radio" id="customRadioInline3" name="proses_pengembangan" class="custom-control-input" value="3" {{ (($target->tipe_tugas) == 'Business')? "checked" : "" }}/>
                                                         <label class="custom-control-label" for="customRadioInline3">Business</label>
                                                      </div>
                                                   </div>
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>tolong diisi</strong>
                                                   </span>
                                                </div>
                                             </div>
                                             <div class="col-md-12">
                                                <label for="exampleInputEmail1">Tanggal Mulai</label>
                                                <div class="input-group mb-3">
                                                <div class="input-group date">
                                                   <div class="input-group-addon">
                                                      <span class="glyphicon glyphicon-th"></span>
                                                   </div>
                                                   <input placeholder="masukkan tanggal pembuatan" type="text" class="form-control datepicker" name="mulai"  autofocus />
                                                   <div class="input-group-append">
                                                      <div class="input-group-text">
                                                         <span class="far fa-calendar-alt"></span>
                                                      </div>
                                                   </div>
                                                   @error('tanggal_pembuatan')
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                   </span>
                                                   @enderror
                                                </div>
                                             </div>
                                          </div>
                                             <div class="col-md-12">
                                             <div class="form-group row">
                                                   <label for="keterangan" class="col-md-4 col-form-label ">{{ __('keterangan') }}</label>
                                                   <div class="col-md-12">
                                                      <textarea id="summernote"  class="form-control{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" name="keterangan"    autofocus></textarea>
                                                         <small id="passwordHelpBlock" class="form-text text-sucess">Penjelasan tentang target</small> 
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
                                                   <button type="submit" class="btn btn-primary btn-block">Input</button>
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
      <script>
         $(function () {
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
            $(".datepicker").datepicker({
              format: 'mm/dd/yy',
              autoclose: true,
              todayHighlight: true,
          });
            // Summernote
            $('#summernote').summernote()

         })
      </script>
@endsection
