<!-- resources/views/layouts/navbar.blade.php -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">petugas</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{ route('petugas.dashboard') }}" class="d-block">Perpussil</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Data -->
                <li class="nav-item has-treeview {{ request()->is('petugas/datapetugas') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('petugas.databuku') }}" class="nav-link {{ request()->is('petugas/databuku') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Buku</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Kategori Buku -->
                <li class="nav-item">
                    <a href="{{ route('petugas.kategoribuku') }}" class="nav-link {{ request()->is('petugas/kategoribuku') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Kategori Buku</p>
                    </a>
                </li>

                <!-- Data Peminjaman -->
                <li class="nav-item">
                    <a href="{{ route('petugas.peminjaman') }}" class="nav-link {{ request()->is('petugas/peminjaman') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Data Peminjaman</p>
                    </a>
                </li>
                  <!-- Data Peminjaman -->
                  <li class="nav-item">
                    <a href="{{ route('petugas.laporanpeminjaman') }}" class="nav-link {{ request()->is('petugas/laporan-peminjaman') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Laporan Peminjaman</p>
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-left">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </button>
                    </form>
                </li>

            </ul>
        </nav>
    </div>
</aside>
