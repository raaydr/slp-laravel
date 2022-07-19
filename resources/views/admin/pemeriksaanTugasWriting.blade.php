@extends('topnav.topnavAdmin')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Pemeriksaan Tugas Writing</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="/">Admin</a></li>
                           <li class="breadcrumb-item active">Pemeriksaan Tugas Writing</li>
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
                     <div class="card">
                        <div class="card-header">
                           <h3 class="card-title">Generasi ke-2 </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Target Tugas</th>
                                    <th>Kelompok</th>
                                    <th>Status</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                              <tr>
                                          <td>1</td>
                                          <td>Peserta A</td>
                                          <td>Daily Writing</td>
                                          <td>3</td>
                                          <td><p class="text-danger" >Belum Diperiksa</p></td>
                                          <td>
                                             <button type="submit" class="btn btn-primary">Check</button>
                                          </td>
                                          </tr>
                                          <tr>
                                          <td>2</td>
                                          <td>Peserta B</td>
                                          <td>Creative Writing</td>
                                          <td>2</td>
                                          <td><p class="text-danger" >Belum Diperiksa</p></td>
                                          <td>
                                             <button type="submit" class="btn btn-primary">Check</button>
                                          </td>
                                          </tr>
                                          <tr>
                                          <td>3</td>
                                          <td>Peserta A</td>
                                          <td>Daily Writing</td>
                                          <td>3</td>
                                          <td><p class="text-success" >Valid</p></td>
                                          <td>
                                             <button type="submit" class="btn btn-warning">edit</button>
                                          </td>
                                          </tr>
                                          <tr>
                                          <td>4</td>
                                          <td>Peserta B</td>
                                          <td>Daily Writing</td>
                                          <td>2</td>
                                          <td><p class="text-success" >Valid</p></td>
                                          <td>
                                          <button type="submit" class="btn btn-warning">edit</button>
                                          </td>
                                          </tr>
                                          <tr>
                                          <td>5</td>
                                          <td>Peserta A</td>
                                          <td>Penulisan Buku</td>
                                          <td>Buku Fiksi</td>
                                          <td><p class="text-success" >Valid</p></td>
                                          <td>
                                          <button type="submit" class="btn btn-warning">edit</button>
                                          </td>
                                          </tr>
                              </tbody>
                              <tfoot>
                                 <tr>
                                 <th>No</th>
                                    <th>Nama</th>
                                    <th>Target Tugas</th>
                                    <th>Kelompok</th>
                                    <th>Status</th>
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
@endsection
@section('script')
      <script>
         $(function () {
             $("#example1")
                 .DataTable({
                     responsive: true,
                     lengthChange: false,
                     autoWidth: false,
                     buttons: [ "colvis"],
                 })
                 .buttons()
                 .container()
                 .appendTo("#example1_wrapper .col-md-6:eq(0)");
             
         });
      </script>
@endsection
