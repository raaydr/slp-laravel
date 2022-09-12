@extends('topnav.topnavAdmin')
@section('content')
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Informasi Pendaftar</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Informasi Pendaftar</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
        
             
              <div class ="row">
              <!-- =========================================================== -->
              <!-- =========================================================== -->
                <div class = "col-md-6">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Gender</h3>
                    </div>
                    <div class="card-body">
                      <div id="gender"></div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
              <!-- =========================================================== -->
              <!-- =========================================================== -->
                <div class = "col-md-6">
                  <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Umur</h3>
                      </div>
                      <div class="card-body">
                        <div id="umur"></div>
                      </div>
                    </div>
                    <!-- /.card -->
                </div>
              <!-- =========================================================== -->
              <!-- =========================================================== -->
              </div>

              <div class ="row">
              <!-- =========================================================== -->
              <!-- =========================================================== -->
                <div class = "col-md-6">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Aktivitas</h3>
                    </div>
                    <div class="card-body">
                      <div id="aktivitas"></div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
              <!-- =========================================================== -->
              <!-- =========================================================== -->
                <div class = "col-md-6">
                  <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Domisili</h3>
                      </div>
                      <div class="card-body">
                        <div id="domisili"></div>
                      </div>
                    </div>
                    <!-- /.card -->
                </div>
              <!-- =========================================================== -->
              <!-- =========================================================== -->
              </div>

              <div class ="row">
              <!-- =========================================================== -->
              <!-- =========================================================== -->
                <div class = "col-md-6">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Peminatan</h3>
                    </div>
                    <div class="card-body">
                      <div id="minat"></div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
              <!-- =========================================================== -->
              <!-- =========================================================== -->
                <div class = "col-md-6">
                  <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Seleksi</h3>
                      </div>
                      <div class="card-body">
                        <div id="seleksi"></div>
                      </div>
                    </div>
                    <!-- /.card -->
                </div>
              <!-- =========================================================== -->
              <!-- =========================================================== -->
              </div>
              

              <!-- =========================================================== -->
            </div><!-- /.container-fluid -->
          </section>
        <!-- /.content -->
@endsection
@section('script')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChartGender);
google.charts.setOnLoadCallback(drawChartDomisili);
google.charts.setOnLoadCallback(drawChartUmur);
google.charts.setOnLoadCallback(drawChartAktivitas);
google.charts.setOnLoadCallback(drawChartPeminatan);
google.charts.setOnLoadCallback(drawChartSeleksi);

// Draw the chart and set the chart values
function drawChartGender() {
  var data = google.visualization.arrayToDataTable([
  ['Gender', 'Banyak'],
  ['Pria : '+{{$informasi['Pria']}}, {{$informasi['Pria']}}],
  ['Wanita : '+{{$informasi['Wanita']}}, {{$informasi['Wanita']}}]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Jumlah Peserta : '+{{$informasi['pendaftar']}},};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('gender'));
  chart.draw(data, options);
}
function drawChartUmur() {
  var data = google.visualization.arrayToDataTable([
  ['Umur', 'Banyak'],
  ['Dibawah 17 : '+{{$informasi['child']}}, {{$informasi['child']}}],
  ['Umur 17-22 : '+{{$informasi['dewasa']}}, {{$informasi['dewasa']}}],
  ['Diatas 22 : '+{{$informasi['old']}}, {{$informasi['old']}}]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Jumlah Peserta : '+{{$informasi['pendaftar']}},};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('umur'));
  chart.draw(data, options);
}
function drawChartAktivitas() {
  var data = google.visualization.arrayToDataTable([
  ['Aktivitas', 'Banyak'],
  ['mahasiswa : ' + {{$informasi['mahasiswa']}}, {{$informasi['mahasiswa']}}],
  ['karyawan : '+{{$informasi['karyawan']}}, {{$informasi['karyawan']}}],
  ['pengusaha : '+{{$informasi['pengusaha']}}, {{$informasi['pengusaha']}}],
  ['pelajar : '+{{$informasi['pelajar']}}, {{$informasi['pelajar']}}],
  ['lainnya : '+{{$informasi['lainnya']}}, {{$informasi['lainnya']}}],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Jumlah Peserta : '+{{$informasi['pendaftar']}},};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('aktivitas'));
  chart.draw(data, options);
}
function drawChartDomisili() {
  var data = google.visualization.arrayToDataTable([
  ['Domisili', 'Banyak'],
  ['Jakarta : ' + {{$informasi['domJak']}}, {{$informasi['domJak']}}],
  ['Bogor : '+{{$informasi['domBog']}}, {{$informasi['domBog']}}],
  ['Depok : '+{{$informasi['domDep']}}, {{$informasi['domDep']}}],
  ['Tangerang : '+{{$informasi['domTang']}}, {{$informasi['domTang']}}],
  ['Bekasi : '+{{$informasi['domBek']}}, {{$informasi['domBek']}}],
  ['Lainnya : '+{{$informasi['domLain']}}, {{$informasi['domLain']}}],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Jumlah Peserta : '+{{$informasi['pendaftar']}},};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('domisili'));
  chart.draw(data, options);
}
function drawChartPeminatan() {
  var data = google.visualization.arrayToDataTable([
  ['Minat', 'Banyak'],
  ['Creative Writing : ' + {{$informasi['writing']}}, {{$informasi['writing']}}],
  ['Public Speaking : '+{{$informasi['speaking']}}, {{$informasi['speaking']}}],
  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Jumlah Peserta : '+{{$informasi['pendaftar']}},};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('minat'));
  chart.draw(data, options);
}
function drawChartSeleksi() {
  var data = google.visualization.arrayToDataTable([
  ['Domisili', 'Banyak'],
  ['Seleksi Berkas : ' + {{$informasi['berkas']}}, {{$informasi['berkas']}}],
  ['Seleksi Pertama : '+{{$informasi['pertama']}}, {{$informasi['pertama']}}],
  ['Seleksi Kedua : '+{{$informasi['kedua']}}, {{$informasi['kedua']}}],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Jumlah Peserta : '+{{$informasi['pendaftar']}},};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('seleksi'));
  chart.draw(data, options);
}
</script>

@endsection
