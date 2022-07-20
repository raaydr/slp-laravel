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
                @if (!empty($biodata->seleksi_kedua))
                <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Persiapan Stadium General</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                        Selain kamu harus datang ada beberapa hal yang harus kalian bawa juga, yaitu:
                        <br>
                        <ul>
                            <li>Kartu nama minimal 34 lembar</li>
                            <li>Materai 10.000</li>
                            <li>Alat tulis</li>
                            <li>Papan jalan</li>
                            <li>Tumbler</li>
                            <li>masker/faceshield</li>
                        </ul>
                        <br>
                        Untuk DressCodenya Sepatu, kaos kaki, baju putih  
                        <ul>
                            <li>Perempuan: rok hitam dan kerudung putih</li>
                            <li>Laki-laki: celana hitam</li>
                        </ul>
                        
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Admin SLP, 2 Juni 2021
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    
                    <!-- /.card -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">LOLOS TAHAP INTERVIEW</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                        Selamat! Kamu Lolos dari Tahap Wawancara.
Ini berarti tinggal satu langkah lagi untuk menjadi "Awardee Smart Leader Preneur #2"
                            <br>
                            Sampai bertemu di Stadium General, pada Sabtu, 5 Juni 2021 pukul 08.00 di <a href="https://g.co/kgs/G9k7b4" target="_blank">Masjid Al - Hikmah</a> 
                            <br>
                            Jl. Bangka II No.24, RT.8/RW.3, Pela Mampang, Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta
                            <br>
                            Selamat berjuang, Salam Leader, Luar Biasa!
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Admin SLP, 28 Mei 2021
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    @endif
                    <!-- /.card -->
                @if (!empty($biodata->seleksi_pertama))
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">LOLOS TAHAP CHALLENGE</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            Selamat! Kamu Lolos ke Tahap Wawancara. Untuk Jadwal wawancara, bisa dilihat di Menu Seleksi Tahap 2
                            <br />

                            Selamat berjuang, Salam Leader, Luar Biasa!
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Admin SLP, 20 Mei 2021
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    @endif
                    <!-- /.card -->
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
                            <br />
                            Anda dapat melihatnya di halaman <strong>Dashboard</strong> dalam menu <strong>Challenge</strong>, jika ingin mengubah bisa menekan tombol ubah dan mengisi ulang kembali form challenge.
                            <br />

                            <br />
                            Selamat berjuang, Salam Leader, Luar Biasa!
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
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
                            <br />
                            Jika grup sebelumnnya sudah penuh, bisa masuk grup yang lain <a href="https://chat.whatsapp.com/HbbLsWKv20RANK9Ui8fW1F"><strong>di sini.</strong></a>Cukup masuk salah satu grup saja.
                            <br />
                            Kemudian jadwalkan pertemuan online hari ini pada pukul 20.30 WIB di <a href="https://us02web.zoom.us/j/7584159011?pwd=MjVsQjc3ckpxUmd2K2pBVG1HdFpRZz09"><strong>Zoom</strong></a>
                            <br />
                            Meeting ID: 758 415 9011 Passcode: 18A
                            <br />
                            Selamat berjuang, Salam Leader, Luar Biasa!
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
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

@endsection
