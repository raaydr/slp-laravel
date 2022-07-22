<<aside class="main-sidebar sidebar-light-success elevation-4">
                <!-- Brand Logo -->
                <a href="/" class="brand-link">
                    <img src="{{asset('develop')}}/img/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: 0.8;" />
                    <span class="brand-text font-weight-light">Peserta</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
               @if ( Route::currentRouteName() == "peserta.pengumuman" )
                  <a href="{{ route('peserta.pengumuman') }}" class="nav-link active">
               @else
                  <a href="{{ route('peserta.pengumuman') }}" class="nav-link ">
               @endif
               <i class="nav-icon nav-icon far fa-envelope"></i>
                                <p>
                                    Pengumuman
                                </p>
                  </a>
            </li>
            <li class="nav-item">
               @if ( Route::currentRouteName() == "peserta.grup" )
                  <a href="{{ route('peserta.grup') }}" class="nav-link active">
               @else
                  <a href="{{ route('peserta.grup') }}" class="nav-link ">
               @endif
               <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Grup
                                </p>
                  </a>
            </li>
            <li class="nav-item">
               @if ( Route::currentRouteName() == "peserta.daily.quest" )
                  <a href="{{ route('peserta.daily.quest') }}" class="nav-link active">
               @else
                  <a href="{{ route('peserta.daily.quest') }}" class="nav-link ">
               @endif
               <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                Daily Quest
                                </p>
                  </a>
            </li>
            <li class="nav-item">
               @if ( Route::currentRouteName() == "peserta.record.quest" )
                  <a href="{{ route('peserta.record.quest') }}" class="nav-link active">
               @else
                  <a href="{{ route('peserta.record.quest') }}" class="nav-link ">
               @endif
               <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Quest Record
                                    </p>
                  </a>
            </li>

            <li class="nav-item">
               @if ( Route::currentRouteName() == "peserta.dashboard" )
                  <a href="{{ route('peserta.dashboard') }}" class="nav-link active">
               @else
                  <a href="{{ route('peserta.dashboard') }}" class="nav-link ">
               @endif
               <i class="nav-icon fas ion-person"></i>
                                    <p>
                                        Dashboard
                                    </p>
                  </a>
            </li>

            <li class="nav-item">
               @if ( Route::currentRouteName() == "peserta.jualan" )
                  <a href="{{ route('peserta.jualan') }}" class="nav-link active">
               @else
                  <a href="{{ route('peserta.jualan') }}" class="nav-link ">
               @endif
               <i class="nav-icon fas ion-person"></i>
                                    <p>
                                        Jualan
                                    </p>
                  </a>
            </li>
            
            
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>