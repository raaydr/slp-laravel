<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-success elevation-4">
                <!-- Brand Logo -->
                <a href="/" class="brand-link">
                    <img src="{{asset('develop')}}/img/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: 0.8;" />
                    <span class="brand-text font-weight-light">Pendaftar</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- SidebarSearch Form -->
                    <div class="form-inline mt-2">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item">
                            @if ( Route::currentRouteName() == "pendaftar.dashboard" )
                                <a href="{{ route('pendaftar.dashboard') }}" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            @else
                            <a href="{{ route('pendaftar.dashboard') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            @endif
                            </li>
                            <li class="nav-item">
                            @if ( (Route::currentRouteName() == "pendaftar.seleksi1") || (Route::currentRouteName() == "pendaftar.ranking.challenge"))
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Seleksi
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                            @else
                            <a href="#" class="nav-link ">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Seleksi
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                            @endif
                                <ul class="nav nav-treeview">
                                    @if($biodata->seleksi_berkas == 1)
                                    <li class="nav-item">
                                    @if ( Route::currentRouteName() == "pendaftar.seleksi1" )
                                        <a href="{{ route('pendaftar.seleksi1') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tahap 1</p>
                                        </a>
                                    @else
                                    <a href="{{ route('pendaftar.seleksi1') }}" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tahap 1</p>
                                        </a>
                                    @endif
                                    </li>
                                    @endif
                                    @if($biodata->seleksi_pertama == 1)
                                    <li class="nav-item">
                                    @if ( Route::currentRouteName() == "pendaftar.ranking.challenge" )
                                        <a href="{{ route('pendaftar.ranking.challenge') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tahap 2</p>
                                        </a>
                                    @else
                                        <a href="{{ route('pendaftar.ranking.challenge') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tahap 2</p>
                                        </a>
                                    @endif
                                    </li>
                                    @endif
                                </ul>
                            </li>
                            
                            <li class="nav-item">
                            @if ( Route::currentRouteName() == "pendaftar.pengumuman" )
                                <a href="{{ route('pendaftar.pengumuman') }}" class="nav-link active">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Pengumuman
                                        
                                    </p>
                                </a>
                            @else
                            <a href="{{ route('pendaftar.pengumuman') }}" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Pengumuman
                                        
                                    </p>
                                </a>
                            @endif
                            </li>
                            
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>