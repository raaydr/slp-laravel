<!-- Content Header (Page header) -->
<section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Validasi Tugas </h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">{{ ucfirst(getMyPermission(Auth::user()->level)) }}</a></li>
                           <li class="breadcrumb-item active">Validasi Tugas</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
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
                     <div class="card-success ">
                        <div class="card-header">
                           <h3 class="card-title">List Tugas Speaking Peserta</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           <table id="example2" class="table table-bordered table-striped">
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
                     <div class="card-orange ">
                        <div class="card-header">
                           <h3 class="card-title">List Tugas Entrepreneur Peserta</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           <table id="example3" class="table table-bordered table-striped">
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