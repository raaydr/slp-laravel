@extends('topnav.topnavPeserta')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Buat Jualan</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Peserta</a></li>
                           <li class="breadcrumb-item active">Buat-Jualan</li>
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
                           <h3 class="card-title">Buat Jualan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('peserta.linkJualan') }}" method="POST" enctype="multipart/form-data" >
                           @csrf
                           <div class="card-body">
                              <div class="form-group row">
                                 <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Nomor WA') }}</label>
                                 <div class="col-md-6">
                                    <input id="link" type="text" class="form-control" name="link" value="{{ old('link') }}" required autofocus />
                                    @if ($errors->has('link'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('link') }}</strong>
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
                                 @if($detail != "")
                                 <a href="{{ route('Penjualan', $nama) }}" target="_blank" class="btn btn-success ">check</a>
                                  @endif
                              </div>
                           </div>
                        </form>
                        <!-- The text field -->
                        @if($detail != "")
                        <div class="form-group row">
                                 <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Link Jualan') }}</label>
                                 <div class="col-md-6">
                                 <input type="text" value="{{$detail}}" id="myInput"readonly>
                                    @if ($errors->has('link'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                        <!-- The button used to copy the text -->
                        <a class="btn btn-primary " onclick="myFunction()">Copy text</a> 
                        @endif
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
            function myFunction() {
               /* Get the text field */
               var copyText = document.getElementById("myInput");

               /* Select the text field */
               copyText.select();
               copyText.setSelectionRange(0, 99999); /* For mobile devices */

               /* Copy the text inside the text field */
               document.execCommand("copy");

               /* Alert the copied text */
               alert("Copied the text: " + copyText.value);
         } 
      </script>
@endsection
