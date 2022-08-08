<aside class="main-sidebar sidebar-light-primary elevation-4">
   <!-- Brand Logo -->
   <a href="/" class="brand-link">
   <img src="{{asset('develop')}}/img/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: 0.8;" />
   <span class="brand-text font-weight-light">AdminSLP</span>
   </a>
   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            
            <li class="nav-item">
               @if ( Route::currentRouteName() == "admin.eliminasi" || Route::currentRouteName() == "admin.gagaldaftar" || Route::currentRouteName() == "admin.challenge" || Route::currentRouteName() == "admin.challenge.rank" || Route::currentRouteName() == "admin.interview.antrian"||Route::currentRouteName() == "admin.listPendaftar"||Route::currentRouteName() == "admin.informasiPendaftar" )
                  <a href="../widgets.html" class="nav-link active">
               @else
                  <a href="../widgets.html" class="nav-link ">
               @endif
                     <i class="nav-icon fas fa-th"></i>
                     <p>
                        Seleksi
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
               <ul class="nav nav-treeview">
               <li class="nav-item">
               @if ( Route::currentRouteName() == "admin.informasiPendaftar" )
                        <a href="{{ route('admin.informasiPendaftar') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.informasiPendaftar') }}" class="nav-link ">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>Informasi Pendaftar</p>
                        </a>
                  </li>
               <li class="nav-item">
               @if ( Route::currentRouteName() == "admin.listPendaftar" )
                        <a href="{{ route('admin.listPendaftar') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.listPendaftar') }}" class="nav-link ">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>List Pendaftar</p>
                        </a>
                  </li>
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "admin.eliminasi" )
                        <a href="{{ route('admin.eliminasi') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.eliminasi') }}" class="nav-link ">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>Pendaftar Tereliminasi</p>
                        </a>
                  </li>
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "admin.challenge.rank" )
                        <a href="{{ route('admin.challenge.rank') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.challenge.rank') }}" class="nav-link">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>Rank Challenge</p>
                        </a>
                  </li>
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "admin.interview.antrian" )
                        <a href="{{ route('admin.interview.antrian') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.interview.antrian') }}" class="nav-link">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>Antrian Interview</p>
                        </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               @if ( Route::currentRouteName() == "admin.create.fasil" || Route::currentRouteName() == "admin.list.fasil")
                  <a href="../widgets.html" class="nav-link active">
               @else
                  <a href="../widgets.html" class="nav-link ">
               @endif
                     <i class="nav-icon fas fa-columns"></i>
                     <p>
                        Fasil
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "admin.create.fasil" )
                        <a href="{{ route('admin.create.fasil') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.create.fasil') }}" class="nav-link ">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>Daftar Fasil</p>
                        </a>
                  </li>
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "admin.list.fasil" )
                        <a href="{{ route('admin.list.fasil') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.list.fasil') }}" class="nav-link">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>List Fasil</p>
                        </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               @if ( Route::currentRouteName() == "admin.peserta.pengelompok" 
               || Route::currentRouteName() == "admin.AbsensiKegiatan"
               || Route::currentRouteName() == "admin.targetTugas.pembuatan"
               || Route::currentRouteName() == "admin.PemeriksaanTugasWriting"
               || Route::currentRouteName() == "admin.validasiTugas"
               || Route::currentRouteName() == "admin.PemeriksaanTugasWritingDetail")
               
                  <a href="../widgets.html" class="nav-link active">
               @else
                  <a href="../widgets.html" class="nav-link ">
               @endif
                     <i class="nav-icon fas ion-person"></i>
                     <p>
                        Pembinaan
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "admin.peserta.pengelompok" )
                        <a href="{{ route('admin.peserta.pengelompok') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.peserta.pengelompok') }}" class="nav-link ">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>List Peserta</p>
                        </a>
                  </li>
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "admin.AbsensiKegiatan" )
                        <a href="{{ route('admin.AbsensiKegiatan') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.AbsensiKegiatan') }}" class="nav-link ">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>Absensi Kegiatan</p>
                        </a>
                  </li>
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "admin.targetTugas.pembuatan" )
                        <a href="{{ route('admin.targetTugas.pembuatan') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.targetTugas.pembuatan') }}" class="nav-link ">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>Pembuatan Target</p>
                        </a>
                  </li>
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "admin.validasiTugas" )
                        <a href="{{ route('admin.validasiTugas') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.validasiTugas') }}" class="nav-link ">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>Validasi Tugas </p>
                        </a>
                  </li>
               </ul>
            </li>
            <!-- 
            <li class="nav-item">
               @if ( Route::currentRouteName() == "admin.buatBlog" || Route::currentRouteName() == "admin.listBlog"|| Route::currentRouteName() == "admin.detailBlog")
                  <a href="../widgets.html" class="nav-link active">
               @else
                  <a href="../widgets.html" class="nav-link ">
               @endif
                     <i class="nav-icon fas fa-tachometer-alt"></i>
                     <p>
                        Lain-lain
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "admin.buatBlog" )
                        <a href="{{ route('admin.buatBlog') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.buatBlog') }}" class="nav-link ">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>Blog</p>
                        </a>
                  </li>
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "admin.listBlog" )
                        <a href="{{ route('admin.listBlog') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.listBlog') }}" class="nav-link ">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>List Blog</p>
                        </a>
                  </li>
               </ul>
            </li> -->
            <li class="nav-item">
               @if ( Route::currentRouteName() == "admin.control" 
               || Route::currentRouteName() == "admin.controller.create" 
               || Route::currentRouteName() == "admin.PembuatanLaporan"
               || Route::currentRouteName() == "admin.PembuatanPengumuman" 
               ||Route::currentRouteName() == "admin.ListSemuaPeserta")
                  <a href="../widgets.html" class="nav-link active">
               @else
                  <a href="../widgets.html" class="nav-link ">
               @endif
                     <i class="nav-icon far fa-plus-square"></i>
                     <p>
                        Controller
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "admin.control" )
                        <a href="{{ route('admin.control') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.control') }}" class="nav-link ">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>Control</p>
                        </a>
                  </li>
                  <!-- 
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "admin.controller.create" )
                        <a href="{{ route('admin.controller.create') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.controller.create') }}" class="nav-link ">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>Create-control</p>
                        </a>
                  </li> -->
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "admin.PembuatanLaporan" )
                        <a href="{{ route('admin.PembuatanLaporan') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.PembuatanLaporan') }}" class="nav-link ">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>Laporan</p>
                        </a>
                  </li>
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "admin.PembuatanPengumuman" )
                        <a href="{{ route('admin.PembuatanPengumuman') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.PembuatanPengumuman') }}" class="nav-link ">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>Pengumuman</p>
                        </a>
                  </li>
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "admin.ListSemuaPeserta" )
                        <a href="{{ route('admin.ListSemuaPeserta') }}" class="nav-link active">
                     @else
                        <a href="{{ route('admin.ListSemuaPeserta') }}" class="nav-link ">
                     @endif
                           <i class="far fa-circle nav-icon"></i>
                           <p>Data Peserta</p>
                        </a>
                  </li>
               </ul>
            </li>
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>