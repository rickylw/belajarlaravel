<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HRM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Pimpinan</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
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
               <li class="nav-item menu">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Rekrutmen
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('pimpinan.data-pelamar.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Pelamar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('pimpinan.hasil-interview.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Hasil Interview</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item menu">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Training
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('pimpinan.training-pegawai.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Pegawai
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('pimpinan.training-unitkerja.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Unit Kerja</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item menu">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Resign
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('pimpinan.resign-pegawai.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Pegawai
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('pimpinan.resign-unitkerja.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Unit Kerja</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item menu">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Pesan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('pimpinan.pesan.create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Buat Pesan
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('pimpinan.pesan-masuk.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pesan Masuk</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('pimpinan.pesan-keluar.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pesan Keluar</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item menu">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Perpanjangan Kontrak
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('pimpinan.re-kontrak-pegawai.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Pegawai
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('pimpinan.re-kontrak-unitkerja.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Unit Kerja</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item menu">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Penugasan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('pimpinan.penugasan-pegawai.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Pegawai
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('pimpinan.penugasan-unitkerja.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Unit Kerja</p>
                    </a>
                  </li>
                </ul>
              </li>
              
              <li class="nav-item menu">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Pensiun
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('pimpinan.pensiun-pegawai.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Pegawai
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('pimpinan.pensiun-unitkerja.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Unit Kerja</p>
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