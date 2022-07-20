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
          <h3><i class="fas fa-info-circle text-danger"></i> Kamu Tereliminasi dari tahap Wawancara.</h3>

          <p>
          Tetap semangat dan terus produktif lahirkan karya-karya positifmu di manapun kamu berada.
          <br>
          Jangan lupa untuk selalu cek <a href="https://www.instagram.com/slp.indonesia/" target="_blank">IG</a> dan website <a href="https://slpindonesia.com/"target="_blank">SLP Indonesia</a> buat update program-program kami selanjutnya ya. Kami tunggu partisipasi kamu berikutnya.
          <br>
            <strong>Cheers!</strong>
            
          </p>
        
          
        </div>
      </div>
      <!-- /.error-page -->

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
