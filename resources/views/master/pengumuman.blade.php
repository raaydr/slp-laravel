<!-- Content Header (Page header) -->
<section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Pengumuman</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/">Peserta</a></li>
                                    <li class="breadcrumb-item active">Pengumuman</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                @foreach ($data as $pengumuman)
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{$pengumuman->judul}}
                                <br>
                                {{$pengumuman->tanggal_diumumkan}}
                            </h3>
                            
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                                                    
                            <?php
                                echo $pengumuman->isi ;
                                ?>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Note mislee : {{$pengumuman->note}}
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    
                    <!-- /.card -->
                
                    
                @endforeach
                </section>
                <!-- /.content -->