@extends('topnav.topnavPendaftar')
@section('content')
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Profile</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/">Seleksi</a></li>
                                    <li class="breadcrumb-item active">Tahap Kedua</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                    @if(session('pesan'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i>Success</h4>
            {{session('pesan')}}.
        </div>
      @endif
                </section>
                @if (!empty($antrian))
                <!-- Main content -->
                <section class="content">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Pemberitahuan</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            Selamat! Kamu Lolos ke Tahap Selanjutnya!!

                            <br />
                            Berikut adalah Hasil Nilai dari Challenge yang sudah Kamu kerjakan. Kamu Luar Biasa!
                            <br />
                            <form>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-5 col-form-label">Nama</label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$nilai->nama}}" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Challenge Writing : </label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$nilai->writing}}" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Challenge Video : </label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$nilai->video}}" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Challenge Business : </label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$nilai->business}}" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Nomor Antrian : </label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$antrian}}" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Waktu : </label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$waktu}}" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Tempat : </label>
                                    <div class="col-sm-5">
                                    Jl. Merdeka Raya No.7, RT.1/RW.7, Abadijaya,Kec. Sukmajaya, Kota Depok,Jawa Barat 16417 
                                    (<a href="https://maps.app.goo.gl/LWU3T1yT3Xbc18uz7" target="_blank">Disini</a>)
                                    </div>
                                </div>
                            </form>
                            Oh ya, sebelum wawancara berlangsung kamu <b>DIWAJIBKAN</b> untuk mengisi link Tes Kepribadian disini <a href="https://www.16personalities.com/id" target="_blank">16personalities</a>
                            <br />
                            Untuk hasilnya, silahkan upload Screenshot bagian Conclusion/Kesimpulan dari Kepribadian kamu dan Upload disini yaa 😋
                            <br />
                            @if ($absen == "Tidak Hadir")
                           <button
                                class="btn btn-success btn-sm m-4"
                                data-toggle="modal"
                                data-myid="{{$nilai->user_id}}"
                                data-myname="{{$nilai->nama}}"
                                data-target="#modal-upload"
                                href="{{ route('pendaftar.kepribadian.pdf', $nilai->user_id) }}"
                                target="_blank">
                                <i class="fas fa-check"> </i>
                                Upload
                            </button>
                            @endif
                            @if (!empty($kepribadian->url_kepribadian))
                            <a class="btn btn-primary btn-sm m-4" href="{{asset('teskepribadian')}}/{{$kepribadian->url_kepribadian}}" target="_blank">check</a>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Selamat berjuang, Salam Leader, Luar Biasa!
                            <br />
                            Admin SLP, 20 Mei 2021
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                    <div class="modal fade" id="modal-upload">
                        <div class="modal-dialog">
                            <div class="modal-content bg-primary">
                                <div class="modal-header">
                                    <h4 class="modal-title">Upload Tes</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{route('pendaftar.kepribadian.pdf')}}" enctype="multipart/form-data" class="was-validated">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group row">
                                                <label for="url_kepribadian" class="col-md-4 col-form-label text-md-right">{{ __('Upload hasil tes') }}</label>
                                                <div class="col-md-7">
                                                    <input
                                                        id="url_kepribadian"
                                                        type="file"
                                                        class="form-control{{ $errors->has('url_kepribadian') ? ' is-invalid' : '' }}"
                                                        name="url_kepribadian"
                                                        value="{{ old('url_kepribadian') }}"
                                                        required
                                                        autofocus
                                                    />
                                                    <small id="passwordHelpBlock" class="form-text text-sucess">
                                                        Format harus jpg,png,jpeg,pdf dan ukuran 5 mb
                                                    </small>
                                                    @if ($errors->has('url_kepribadian'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('url_kepribadian') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-outline-light">Save</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Ranking dari Tahap Challenge</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Rank</th>
                                                <th>nama</th>
                                                <th>writing</th>
                                                <th>video</th>
                                                <th>business</th>
                                                <th>extra-point</th>
                                                <th>total nilai</th>
                                                <th>penjualan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($ranking as $rank)
                                            <?php $i++ ;?>
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td>{{ $rank->nama }}</td>
                                                <td>{{ $rank->writing }}</td>
                                                <td>{{ $rank->video }}</td>
                                                <td>{{ $rank->business }}</td>
                                                <td>{{ $rank->point }}</td>
                                                <td>{{ $rank->total }}</td>
                                                <td>{{ $rank->penjualan }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Rank</th>
                                                <th>Nama</th>
                                                <th>writing</th>
                                                <th>video</th>
                                                <th>business</th>
                                                <th>extra-point</th>
                                                <th>total nilai</th>
                                                <th>penjualan</th>
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
            @endif
            @endsection
@section('script')
        <script>
            $(function () {
                $("#example1")
                    .DataTable({
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
            $("#modal-upload").on("show.bs.modal", function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data("myid");
                var nama = button.data("myname"); // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                console.log("modal kebuka");
                console.log(nama);
                console.log(id);
                var modal = $(this);
                modal.find(".modal-body #user_id").val(id);
                modal.find(".modal-body #nama").val(nama);
            });
        </script>
  @endsection