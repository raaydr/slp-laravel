
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Rapor Tugas Entrepreneur</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/">Rapor</a></li>
                                    <li class="breadcrumb-item active">Entrepreneur</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>
                
                <!-- Main content -->
                <section class="content">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Rapor</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="row">
                        @foreach ($rapor as $hasil)
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{$hasil['judul']}}</span>
                                <span class="info-box-number">{{$hasil['capai']}}</span>

                                <div class="progress">
                                <div class="progress-bar" style="width: {{$hasil['target_tercapai']}}%"></div>
                                </div>
                                <span class="progress-description">
                                {{$hasil['target_tercapai']}}% dari {{$hasil['jumlah']}}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        @endforeach                                   
                        </div>
                        <!-- /.row -->

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Selamat berjuang, Salam Leader, Luar Biasa!
                            <br />
                            
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                    <div class="row">
                        <div class="col-12">
                        <div class="card-primary ">
                        <div class="card-header">
                           <h3 class="card-title">List Tugas Writing Peserta</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Grup</th>
                                    <th>Target Tugas</th>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tfoot>
                                 <tr>
                                    <th></th>
                                    <th><input type="text" placeholder="Search"  style="width: 100%"  /></th>
                                    <th><input type="text" style="width: 30%" /></th>
                                    <th><input type="text" placeholder="Search"  style="width: 70%"/></th>
                                    <th><input type="text" style="width: 100%"/></th>
                                    <th><input type="text" placeholder="Search"  style="width: 70%"/></th>
                                    <th></th>
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
  