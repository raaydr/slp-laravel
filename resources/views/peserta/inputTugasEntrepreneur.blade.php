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
                        <h1>Input Tugas Entrepreneur</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Tugas Entrepreneur</a></li>
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
                  @if(session('error'))
                  <div class="alert alert-danger alert-dismissable">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h4><i class="icon fa fa-info"></i>Error</h4>
                     {{session('error')}}.
                  </div>
                  @endif
                  <div class="col-md-12">
                     <!-- general form elements -->
                     
                     <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Pengisian Tugas Entrepreneur</h3>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div class="tab-content">
                                 <div class="active tab-pane" id="anggota">
                                    <div class="card">
                                       <div class="card-body register-card-body">
                                          <p class="login-box-msg"><b>Target Tugas : {{$target->judul}}</b></p>
                                          <form method="POST" action="{{ route('peserta.addTugasEntrepreneur', $target->id) }}"  enctype="multipart/form-data">
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
                                                <label for="exampleInputEmail1">Sumber Produk</label>
                                                <div class="input-group mb-3">
                                                <div class="col-md-9">
                                                      <div class="custom-control custom-radio custom-control-inline mt-2">
                                                            <input type="radio" id="customRadioInline1" name="sumber_produk" class="custom-control-input" value="Produk SLP" required autofocus />
                                                            <label class="custom-control-label" for="customRadioInline1">Produk SLP</label>
                                                      </div>
                                                      <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline2" name="sumber_produk" class="custom-control-input" value="Produk Luar" required autofocus />
                                                            <label class="custom-control-label" for="customRadioInline2">Produk Luar</label>
                                                      </div>
                                                      <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline3" name="sumber_produk" class="custom-control-input" value="Produk Campuran" required autofocus />
                                                            <label class="custom-control-label" for="customRadioInline3">Produk Campuran(SLP+Luar)</label>
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
                                                <label for="exampleInputEmail1">Sumber Produk</label>
                                                <div class="input-group mb-3">
                                                <div class="col-md-9">
                                                      <div class="custom-control custom-radio custom-control-inline mt-2">
                                                            <input type="radio" id="customRadioInline7" name="jenis_produk" class="custom-control-input" value="Jasa" required autofocus />
                                                            <label class="custom-control-label" for="customRadioInline7">Jasa</label>
                                                      </div>
                                                      <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline4" name="jenis_produk" class="custom-control-input" value="Konsumtif" required autofocus />
                                                            <label class="custom-control-label" for="customRadioInline4">Konsumtif</label>
                                                      </div>
                                                      <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline5" name="jenis_produk" class="custom-control-input" value="Barang" required autofocus />
                                                            <label class="custom-control-label" for="customRadioInline5">Barang</label>
                                                      </div>
                                                      <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline6" name="jenis_produk" class="custom-control-input" value="Lainnya" required autofocus />
                                                            <label class="custom-control-label" for="customRadioInline6">Lainnya</label>
                                                      </div>
                                                      <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline8" name="jenis_produk" class="custom-control-input" value="Campuran" required autofocus />
                                                            <label class="custom-control-label" for="customRadioInline8">Campuran</label>
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
                                                <label for="exampleInputEmail1">Profit</label>
                                                <div class="input-group mb-3">
                                                   <input id="profit" type="text" class="form-control @error('profit') is-invalid @enderror" name="profit" value="" autocomplete="profit"required autofocus></input>
                                                   <div class="input-group-append">
                                                      <div class="input-group-text">
                                                         <span class=""></span>
                                                      </div>
                                                   </div>
                                                   @error('profit')
                                                   <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                   </span>
                                                   @enderror
                                                </div>
                                             </div>
                                             <div class="col-md-12" id="file">
                                                <label for="exampleInputEmail1">Upload File</label>
                                                <div class="input-group control-group increment" >
                                                   <input type="file" name="url_file[]" class="form-control"required autofocus>
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
                                                <small class="text-primary">format harus jpeg,jpg,png berukuran maksimal 5 mb</small>
                                             </div>
                                             <div class="col-md-12">
                                             <div class="form-group row">
                                                   <label for="keterangan" class="col-md-4 col-form-label ">{{ __('keterangan') }}</label>
                                                   <div class="col-md-12">
                                                      <textarea id="summernote"  class="form-control{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" name="keterangan"required    autofocus></textarea>
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
                                                <h3 class="col-12 text-center ">Belum di mulai</h3>
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
         var rupiah = document.getElementById("profit");
         profit.addEventListener("keyup", function(e) {
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
         $(function () {
            // Summernote
            $('#summernote').summernote()

         })
         $( ".clone" ).hide();
         $(document).ready(function() {
            
            var cloneLimit = 1;
            $(".btn-success").click(function(){ 
               if(cloneLimit < 4){
                  var html = $(".clone").html();
                  $(".increment").after(html);
                  cloneLimit++;
                  console.log(cloneLimit);
               }
               
            });
            $("body").on("click",".btn-danger",function(){ 
               $(this).parents(".control-group").remove();
               cloneLimit--;
               console.log(cloneLimit);
            });
         });

      </script>
@endsection
