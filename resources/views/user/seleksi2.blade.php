@extends('topnav.topnavPendaftar')
@section('content')
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Pengumuman</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item active">Pengumuman</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </section>
                    
                    <!-- Main content -->
        <section class="content">
        @if (!empty($biodata->seleksi_berkas))
    <!-- Default box -->
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
    Bagi yang telah mengisi form Challenge, dapat melihat kembali form yang sudah anda input.
    <br>
    Anda dapat melihatnya di halaman <strong>Dashboard</strong> dalam menu <strong>Challenge</strong>, jika ingin mengubah bisa menekan tombol ubah dan mengisi ulang kembali form challenge.
    <br>

        <br>
        Selamat berjuang, Salam Leader, Luar Biasa!
    </div>
    <!-- /.card-body -->
    <div class="card-footer ">
        Admin SLP, 1 Mei 2021
    </div>
    <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    <div class="card card-warning">
        <div class="card-header">
        <h3 class="card-title">Lolos Tahap Pemberkasan</h3>

        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>
        </div>
    </div>
        <div class="card-body">
    Selamat Anda lolos tahap pemberkasan. Silakan masuk grup seleksi tahap selanjutnya <a href="https://chat.whatsapp.com/KEM8zlDzYsZFG1BcGPW4ct"><strong>di sini.</strong></a>
    <br>
    Jika grup sebelumnnya sudah penuh, bisa masuk grup yang lain <a href="https://chat.whatsapp.com/HbbLsWKv20RANK9Ui8fW1F"><strong>di sini.</strong></a>Cukup masuk salah satu grup saja.
    <br>
        Kemudian jadwalkan pertemuan online hari ini pada pukul 20.30 WIB di <a href="https://us02web.zoom.us/j/7584159011?pwd=MjVsQjc3ckpxUmd2K2pBVG1HdFpRZz09"><strong>Zoom</strong></a>
        <br>
        Meeting ID: 758 415 9011
        Passcode: 18A
        <br>
        Selamat berjuang, Salam Leader, Luar Biasa!
    </div>
    <!-- /.card-body -->
    <div class="card-footer ">
        Admin SLP, 26 April 2021
    </div>
    <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @endif
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