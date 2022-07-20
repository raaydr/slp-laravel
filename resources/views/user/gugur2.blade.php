@extends('topnav.topnavPendaftar')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Terima kasih telah berpartisipasi</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">

        <div class="error-content">
        
          <h3><i class="fas fa-info-circle text-danger"></i> Kamu Tereliminasi.</h3>

          <p>
          Tetap semangat dan terus produktif lahirkan karya-karya positifmu di manapun kamu berada.
          <br>
          Jangan lupa untuk selalu cek <a href="https://www.instagram.com/slp.indonesia/" target="_blank">IG</a> dan website <a href="https://slpindonesia.com/"target="_blank">SLP Indonesia</a> buat update program-program kami selanjutnya ya. Kami tunggu partisipasi kamu berikutnya.
          <br>
            <strong>Cheers!</strong>
            
          </p>
        <form>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-5 col-form-label">Nama</label>
                <div class="col-sm-5">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$nilai->nama}}"readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-5 col-form-label">Challenge Writing</label>
                <div class="col-sm-5">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$nilai->writing}}"readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-5 col-form-label">Challenge Video</label>
                <div class="col-sm-5">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$nilai->video}}"readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-5 col-form-label">Challenge Business</label>
                <div class="col-sm-5">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$nilai->business}}"readonly>
                </div>
            </div>
        </form>
        </div>
      </div>
      <!-- /.error-page -->
      
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
        </script>
@endsection
