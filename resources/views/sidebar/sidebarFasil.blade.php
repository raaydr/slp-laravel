<aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
            <img src="{{asset('develop')}}/img/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: 0.8;" />
            <span class="brand-text font-weight-light">Fasil</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
               <!-- Sidebar Menu -->
               <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                     <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                     @if ( Route::currentRouteName() == "fasil.grup" )
                        <a href="{{ route('fasil.grup') }}" class="nav-link active">
                     @else
                        <a href="{{ route('fasil.grup') }}" class="nav-link ">
                     @endif
                     <i class="nav-icon fas fa-th"></i>
                           <p>Grup </p>
                        </a>
                  </li>
                  <li class="nav-item">
                     @if ( Route::currentRouteName() == "fasil.dashboard" )
                        <a href="{{ route('fasil.dashboard') }}" class="nav-link active">
                     @else
                        <a href="{{ route('fasil.dashboard') }}" class="nav-link ">
                     @endif
                     <i class="nav-icon fas fa-user"></i>
                           <p>Profile </p>
                        </a>
                  </li>
                     <li class="nav-item">
                     @if ( Route::currentRouteName() == "fasil.validasiTugas" )
                        <a href="{{ route('fasil.validasiTugas') }}" class="nav-link active">
                     @else
                        <a href="{{ route('fasil.validasiTugas') }}" class="nav-link ">
                     @endif
                     <i class="nav-icon fas fa-edit"></i>
                           <p>Validasi Tugas </p>
                        </a>
                  </li>
                  </ul>
               </nav>
               <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
         </aside>