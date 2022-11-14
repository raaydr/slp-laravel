@extends('topnav.topnavPendaftar')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>SMART LEADER PRENEUR CHALLENGE</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Seleksi</a></li>
                           <li class="breadcrumb-item active">Tahap Pertama</li>
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
                     <?php $i = 0; ?>
                        @foreach ($rule as $challenge)
                     <?php $i++ ;?>

                        <div class="card card-orange card-outline">
                           
                           <a class="d-block w-100" data-toggle="collapse" href="#collapse{{$i}}">
                              <div class="card-header">
                                 <h4 class="card-title w-100">
                                    <b>{{$challenge->judul}}</b>
                                 </h4>
                              </div>
                           </a>
                           @if($i == 1)
                           <div id="collapse{{$i}}" class="collapse show" data-parent="#accordion">
                           @else
                           <div id="collapse{{$i}}" class="collapse " data-parent="#accordion">
                           @endif
                           
                              <div class="card-body">
                              {!! $challenge->rule !!}
                              </div>
                           </div>
                        </div>
                        @endforeach
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
                     <div class="card card-primary">
                        <div class="card-header">
                           <h3 class="card-title">Form Pengisian Challenge</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('pendaftar.upload.seleksi1') }}" method="POST" enctype="multipart/form-data" class="was-validated">
                           @csrf
                           <div class="card-body">
                           <label for="exampleInputEmail1">Silahkan input ulang jika ingin mengubah data Challenge</label>
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">ID</label>
                                    <input type="text" class="form-control" name="id" value="{{$biodata->user_id}}" readonly>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputPassword1">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{ $biodata->nama}}"readonly>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="url_video" class="col-md-4 col-form-label text-md-right">{{ __('Link Video Challenge') }}</label>
                                 <div class="col-md-6">
                                    <input id="url_video" type="text" class="form-control" name="url_video" value="{{ old('url_video') }}" required autofocus>
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                    contoh : https://www.youtube.com/watch?v=dQw4w9WgXcQ
                                    </small>
                                    @if ($errors->has('url_video'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('url_video') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="url_writing" class="col-md-4 col-form-label text-md-right">{{ __('Link Writing Challenge') }}</label>
                                 <div class="col-md-6">
                                    <input id="url_writing" type="text" class="form-control" name="url_writing" value="{{ old('url_writing') }}" required autofocus>
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                    contoh : https://www.instagram.com/p/CN8v_Wesjud/
                                    </small> 
                                    @if ($errors->has('url_writing'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('url_writing') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="url_Business" class="col-md-4 col-form-label text-md-right">{{ __('Upload Bukti Transfer Pembelian ') }}</label>
                                 <div class="col-md-7">
                                    <input id="url_Business" type="file" class="form-control{{ $errors->has('url_Business') ? ' is-invalid' : '' }}" name="url_Business" value="{{ old('url_Business') }}" required autofocus>
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                    Format harus jpg,png,jpeg,pdf dan ukuran maksimal 2 mb
                                    </small> 
                                    @if ($errors->has('url_Business'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('url_Business') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="url_cv" class="col-md-4 col-form-label text-md-right">{{ __('Upload CV') }}</label>
                                 <div class="col-md-7">
                                    <input id="url_cv" type="file" class="form-control{{ $errors->has('url_cv') ? ' is-invalid' : '' }}" name="url_cv" value="{{ old('url_cv') }}" required autofocus>
                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                    Format harus pdf dan ukuran maksimal 10mb
                                    </small> 
                                    @if ($errors->has('url_cv'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('url_cv') }}</strong>
                                    </span>
                                    @endif
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="mentoring" class="col-md-4 col-form-label text-md-right">{{ __('Apakah kamu pernah mengikuti kegiatan mentoring keagamaan atau halaqoh?') }}</label>
                                 <div class="col-md-6">
                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                       <input type="radio" id="customRadioInline1" name="mentoring" class="custom-control-input" value="Pernah"required>
                                       <label class="custom-control-label" for="customRadioInline1">ya</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input type="radio" id="customRadioInline2" name="mentoring" class="custom-control-input" value="Belum Pernah"required>
                                       <label class="custom-control-label" for="customRadioInline2">tidak</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="mentoring_rutin" class="col-md-4 col-form-label text-md-right">{{ __('Jika "Ya", seberapa sering kamu mengikuti kegiatan mentoring tersebut ?') }}</label>
                              <div class="col-md-6">
                                 <textarea id="mentoring_rutin" type="text" class="form-control{{ $errors->has('mentoring_rutin') ? ' is-invalid' : '' }}" name="mentoring_rutin" value="{{ old('mentoring_rutin') }}" rows="3"> Abaikan Bila Menjawab "Tidak"</textarea>
                                 @if ($errors->has('mentoring_rutin'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('mentoring_rutin') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="futur" class="col-md-4 col-form-label text-md-right">{{ __('Apa yang kamu lakukan ketika sedang futur (ketika malas beribadah dan melakukan kebaikan) ? ') }}</label>
                              <div class="col-md-6">
                                 <textarea id="futur" type="text" class="form-control{{ $errors->has('futur') ? ' is-invalid' : '' }}" name="futur" value="{{ old('futur') }}" rows="3" required autofocus></textarea>
                                 @if ($errors->has('futur'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('futur') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="faith" class="col-md-4 col-form-label text-md-right">{{ __('Apa yang kamu pahami tentang "Faith" (Keyakinan) ? ') }}</label>
                              <div class="col-md-6">
                                 <textarea id="faith" type="text" class="form-control{{ $errors->has('faith') ? ' is-invalid' : '' }}" name="faith" value="{{ old('faith') }}" rows="3" required autofocus></textarea>
                                 @if ($errors->has('faith'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('faith') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="ethic" class="col-md-4 col-form-label text-md-right">{{ __('Apa yang kamu pahami tentang "Ethic" (Etika) ?') }}</label>
                              <div class="col-md-6">
                                 <textarea id="ethic" type="text" class="form-control{{ $errors->has('ethic') ? ' is-invalid' : '' }}" name="ethic" value="{{ old('ethic') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('ethic'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('ethic') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="question1" class="col-md-4 col-form-label text-md-right">{{ __('Bagaimana tanggapanmu jika melihat atau mengenal orang yang memiliki kemampuan lebih baik dibandingkan dirimu ?') }}</label>
                              <div class="col-md-6">
                                 <textarea id="question1" type="text" class="form-control{{ $errors->has('question1') ? ' is-invalid' : '' }}" name="question1" value="{{ old('question1') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('question1'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('question1') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="question2" class="col-md-4 col-form-label text-md-right">{{ __('Menurutmu apa perbedaan antara etika, moral, dan akhlak ?') }}</label>
                              <div class="col-md-6">
                                 <textarea id="question2" type="text" class="form-control{{ $errors->has('question2') ? ' is-invalid' : '' }}" name="question2" value="{{ old('question2') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('question2'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('question2') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="question3" class="col-md-4 col-form-label text-md-right">{{ __('Bagaimana caramu agar dapat konsisten beretika dan berakhlak baik ? Berikan contohnya ! ') }}</label>
                              <div class="col-md-6">
                                 <textarea id="question3" type="text" class="form-control{{ $errors->has('question3') ? ' is-invalid' : '' }}" name="question3" value="{{ old('question3') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('question3'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('question3') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="question4" class="col-md-4 col-form-label text-md-right">{{ __('Apa yang kamu pahami tentang "Leadership"  ') }}</label>
                              <div class="col-md-6">
                                 <textarea id="question4" type="text" class="form-control{{ $errors->has('question4') ? ' is-invalid' : '' }}" name="question4" value="{{ old('question4') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('question4'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('question4') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="organisasi" class="col-md-4 col-form-label text-md-right">{{ __('Pernahkan kamu aktif terlibat dalam sebuah organisasi ?') }}</label>
                              <div class="col-md-6 was-validated">
                                 <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="customRadioInline3" name="organisasi" class="custom-control-input" value="Pernah" required>
                                    <label class="custom-control-label" for="customRadioInline3">Pernah</label>
                                 </div>
                                 <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline4" name="organisasi" class="custom-control-input" value="Belum Pernah"required>
                                    <label class="custom-control-label" for="customRadioInline4">Belum Pernah</label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="aktif_organisasi" class="col-md-4 col-form-label text-md-right">{{ __('Jika "Pernah", apa peranmu dalam organisasi tersebut ? Jelaskan aktivitas organisasi tersebut !') }}</label>
                              <div class="col-md-6">
                                 <textarea id="aktif_organisasi" type="text" class="form-control{{ $errors->has('aktif_organisasi') ? ' is-invalid' : '' }}" name="aktif_organisasi" value="{{ old('aktif_organisasi') }}" rows="3">Abaikan Bila Menjawab "Belum Pernah"</textarea>
                                 @if ($errors->has('aktif_organisasi'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('aktif_organisasi') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="question5" class="col-md-4 col-form-label text-md-right">{{ __('Sebagai seorang pemimpin, apa yang kamu lakukan jika anggota kelompokmu melakukan kesalahan ?') }}</label>
                              <div class="col-md-6">
                                 <textarea id="question5" type="text" class="form-control{{ $errors->has('question5') ? ' is-invalid' : '' }}" name="question5" value="{{ old('question5') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('question5'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('question5') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="question6" class="col-md-4 col-form-label text-md-right">{{ __('Sebagai seorang anggota, apa yang kamu lakukan jika mengetahui pemimpinmu melakukan kesalahan ?') }}</label>
                              <div class="col-md-6">
                                 <textarea id="question6" type="text" class="form-control{{ $errors->has('question6') ? ' is-invalid' : '' }}" name="question6" value="{{ old('question6') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('question6'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('question6') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="entrepreneurship" class="col-md-4 col-form-label text-md-right">{{ __('Apa yang kamu pahami tentang "Entrepreneurship" ?Jelaskan !') }}</label>
                              <div class="col-md-6">
                                 <textarea id="entrepreneurship" type="text" class="form-control{{ $errors->has('entrepreneurship') ? ' is-invalid' : '' }}" name="entrepreneurship" value="{{ old('entrepreneurship') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('entrepreneurship'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('entrepreneurship') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="alasan_wirausaha" class="col-md-4 col-form-label text-md-right">{{ __('Kenapa kamu ingin berwirausaha? Jelaskan alasan terbesarmu ! ') }}</label>
                              <div class="col-md-6">
                                 <textarea id="alasan_wirausaha" type="text" class="form-control{{ $errors->has('alasan_wirausaha') ? ' is-invalid' : '' }}" name="alasan_wirausaha" value="{{ old('alasan_wirausaha') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('alasan_wirausaha'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('alasan_wirausaha') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="pernah_wirausaha" class="col-md-4 col-form-label text-md-right">{{ __('Apakah kamu pernah berdagang atau berbisnis ? (selain challenge dari SLP)') }}</label>
                              <div class="col-md-6">
                                 <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="customRadioInline5" name="pernah_wirausaha" class="custom-control-input" value="Pernah"required>
                                    <label class="custom-control-label" for="customRadioInline5">Pernah</label>
                                 </div>
                                 <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline6" name="pernah_wirausaha" class="custom-control-input" value="Belum Pernah"required>
                                    <label class="custom-control-label" for="customRadioInline6">Belum Pernah</label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="exp_wirausaha" class="col-md-4 col-form-label text-md-right">{{ __('Jika pernah berdagang atau berbisnis, jelaskan pengalamanmu ! (selain challenge dari SLP)') }}</label>
                              <div class="col-md-6">
                                 <textarea id="exp_wirausaha" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="exp_wirausaha" value="{{ old('exp_wirausaha') }}" rows="3">Abaikan Bila Menjawab "Belum Pernah"</textarea>
                                 @if ($errors->has('exp_wirausaha'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('exp_wirausaha') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="omset" class="col-md-4 col-form-label text-md-right">{{ __('Berapa omset terbesar yang pernah kamu raih dalam berwirausaha ?') }}</label>
                              <div class="col-md-6">
                                 <textarea id="omset" type="text" class="form-control{{ $errors->has('omset') ? ' is-invalid' : '' }}" name="omset" value="{{ old('omset') }}" rows="3"required autofocus></textarea>
                                 @if ($errors->has('omset'))
                                 <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('omset') }}</strong>
                                 </span>
                                 @endif
                              </div>
                           </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                     <!-- /.card-body -->
                     @if ($seleksi_pertama == 1)
                     <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        
                        </div> 
                     </div>
                     @endif
                     </form>
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
      </script>
@endsection
