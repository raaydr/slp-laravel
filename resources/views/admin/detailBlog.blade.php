@extends('topnav.topnavAdmin')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Buat Blog</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Buat-Blog</li>
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
                           <h3 class="card-title">Buat Blog</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.createBlog') }}" method="POST" enctype="multipart/form-data" >
                           @csrf
                           <div class="card-body">
                              <div class="form-group row">
                                 <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Pembuat') }}</label>
                                 <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus />
                                    @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="link_instagram" class="col-md-4 col-form-label text-md-right">{{ __('Link Instagram') }}</label>
                                 <div class="col-md-6">
                                    <input id="link_instagram" type="text" class="form-control" name="link_instagram" value="{{ old('link_instagram') }}"  />
                                    @if ($errors->has('link_instagram'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('link_instagram') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="judul" class="col-md-4 col-form-label text-md-right">{{ __('Judul') }}</label>
                                 <div class="col-md-6">
                                    <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}"  />
                                    @if ($errors->has('judul'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="awalan" class="col-md-4 col-form-label text-md-right">{{ __('Awalan') }}</label>
                                 <div class="col-md-6">
                                    <textarea id="awalan" type="text" class="form-control" name="awalan" value="{{ old('awalan') }}"></textarea>
                                    @if ($errors->has('awalan'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('awalan') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                            <label for="artikel" class="col-md-12 text-center">{{ __('artikel') }}</label>
                                            <div class="col-md-12">
                                                <textarea id="summernote"  class="form-control{{ $errors->has('summernote') ? ' is-invalid' : '' }}" name="summernote" value="{{ old('summernote') }}"  required autofocus></textarea>
                                                @if ($errors->has('summernote'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('summernote') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                              
                           </div>
                           <!-- /.card-body -->
                           <div class="card-footer">
                              <!-- /.card-body -->
                              <div class="text-center">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- /.card -->
                  </div>
                  <!-- /.row -->
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
         $(function(){
         $(".datepicker").datepicker({
             format: 'yyyy-mm-dd',
             autoclose: true,
             todayHighlight: true,
         });
         });
         $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  });
      </script>
@endsection
