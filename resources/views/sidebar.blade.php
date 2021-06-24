<aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
            <img src="{{asset('develop')}}/img/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: 0.8;" />
            <span class="brand-text font-weight-light">AdminSLP</span>
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
					 @if ( Route::currentRouteName() == "admin.dashboard" )
                        <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <p>
                              Dashboard
                           </p>
                        </a>
					 @else
						<a href="{{ route('admin.dashboard') }}" class="nav-link ">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <p>
                              Dashboard
                           </p>
                        </a>
					 @endif
                     </li>
                     <li class="nav-item">
						@if ( Route::currentRouteName() == "admin.eliminasi" || Route::currentRouteName() == "admin.gagaldaftar" || Route::currentRouteName() == "admin.challenge" || Route::currentRouteName() == "admin.challenge.rank" || Route::currentRouteName() == "admin.interview.antrian" )
                        <a href="../widgets.html" class="nav-link active">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                              Seleksi
                              <i class="fas fa-angle-left right"></i>
                           </p>
                        </a>
						@else
						<a href="../widgets.html" class="nav-link ">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                              Seleksi
                              <i class="fas fa-angle-left right"></i>
                           </p>
                        </a>
						@endif
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
						   @if ( Route::currentRouteName() == "admin.eliminasi" )
                              <a href="{{ route('admin.eliminasi') }}" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Pendaftar Tereliminasi</p>
                              </a>
						   @else
							  <a href="{{ route('admin.eliminasi') }}" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Pendaftar Tereliminasi</p>
                              </a>
						   @endif
                           </li>
                           <li class="nav-item">
						   @if ( Route::currentRouteName() == "admin.gagaldaftar" )
                              <a href="{{ route('admin.gagaldaftar') }}" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Pendaftar Ulang</p>
                              </a>
						   @else
                              <a href="{{ route('admin.gagaldaftar') }}" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Pendaftar Ulang</p>
                              </a>
						   @endif	  
                           </li>
                           <li class="nav-item">
						   @if ( Route::currentRouteName() == "admin.challenge" )
                              <a href="{{ route('admin.challenge') }}" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Tahap Challenge</p>
                              </a>
						   @else
							  <a href="{{ route('admin.challenge') }}" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Tahap Challenge</p>
                              </a>
						   @endif
                           </li>
                           <li class="nav-item">
						   @if ( Route::currentRouteName() == "admin.challenge.rank" )
                              <a href="{{ route('admin.challenge.rank') }}" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Rank Challenge</p>
                              </a>
						   @else
						      <a href="{{ route('admin.challenge.rank') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Rank Challenge</p>
                              </a>
						   @endif  
                           </li>
                           <li class="nav-item">
						   @if ( Route::currentRouteName() == "admin.interview.antrian" )
							   <a href="{{ route('admin.interview.antrian') }}" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Antrian Interview</p>
                              </a>
						   @else
                              <a href="{{ route('admin.interview.antrian') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Antrian Interview</p>
                              </a>
						   @endif
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item">
						@if ( Route::currentRouteName() == "admin.create.fasil" || Route::currentRouteName() == "admin.list.fasil")
                        <a href="../widgets.html" class="nav-link active">
                           <i class="nav-icon fas fa-columns"></i>
                           <p>
                              Fasil
                              <i class="fas fa-angle-left right"></i>
                           </p>
                        </a>
						@else
						<a href="../widgets.html" class="nav-link ">
                           <i class="nav-icon fas fa-columns"></i>
                           <p>
                              Fasil
                              <i class="fas fa-angle-left right"></i>
                           </p>
                        </a>
						@endif
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
						   @if ( Route::currentRouteName() == "admin.create.fasil" )
                              <a href="{{ route('admin.create.fasil') }}" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Daftar Fasil</p>
                              </a>
						   @else
							  <a href="{{ route('admin.create.fasil') }}" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Daftar Fasil</p>
                              </a>
						   @endif
                           </li>
                           <li class="nav-item">
						   @if ( Route::currentRouteName() == "admin.list.fasil" )
                              <a href="{{ route('admin.list.fasil') }}" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>List Fasil</p>
                              </a>
						   @else
							  <a href="{{ route('admin.list.fasil') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>List Fasil</p>
                              </a>
						   @endif
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item">
						@if ( Route::currentRouteName() == "admin.peserta.pengelompok" || Route::currentRouteName() == "admin.daily.quest")
                        <a href="../widgets.html" class="nav-link active">
                           <i class="nav-icon fas ion-person"></i>
                           <p>
                              Peserta
                              <i class="fas fa-angle-left right"></i>
                           </p>
                        </a>
						@else
							<a href="../widgets.html" class="nav-link ">
                           <i class="nav-icon fas ion-person"></i>
                           <p>
                              Peserta
                              <i class="fas fa-angle-left right"></i>
                           </p>
                        </a>
						@endif
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
						   @if ( Route::currentRouteName() == "admin.peserta.pengelompok" )
                              <a href="{{ route('admin.peserta.pengelompok') }}" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Pengelompokkan</p>
                              </a>
						   @else
							  <a href="{{ route('admin.peserta.pengelompok') }}" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Pengelompokkan</p>
                              </a>
						   @endif
                           </li>
                           <li class="nav-item">
						   @if ( Route::currentRouteName() == "admin.daily.quest" )
                              <a href="{{ route('admin.daily.quest') }}" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Daily Quest</p>
                              </a>
							@else
							  <a href="{{ route('admin.daily.quest') }}" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Daily Quest</p>
                              </a>
							@endif
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item">
					 @if ( Route::currentRouteName() == "admin.coba" || Route::currentRouteName() == "admin.controller.create" )
                        <a href="../widgets.html" class="nav-link active">
                           <i class="nav-icon far fa-plus-square"></i>
                           <p>
                              Controller
                              <i class="fas fa-angle-left right"></i>
                           </p>
                        </a>
					 @else
						<a href="../widgets.html" class="nav-link ">
                           <i class="nav-icon far fa-plus-square"></i>
                           <p>
                              Controller
                              <i class="fas fa-angle-left right"></i>
                           </p>
                        </a>
					 @endif
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
						   @if ( Route::currentRouteName() == "admin.coba" )
                              <a href="{{ route('admin.coba') }}" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Control</p>
                              </a>
						   @else
							  <a href="{{ route('admin.coba') }}" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Control</p>
                              </a>
						   @endif
                           </li>
                           <li class="nav-item">
						   @if ( Route::currentRouteName() == "admin.controller.create" )
                              <a href="{{ route('admin.controller.create') }}" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create-control</p>
                              </a>
						   @else
							  <a href="{{ route('admin.controller.create') }}" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create-control</p>
                              </a>
						   @endif
                           </li>
                        </ul>
                     </li>
                  </ul>
               </nav>
               <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
         </aside>