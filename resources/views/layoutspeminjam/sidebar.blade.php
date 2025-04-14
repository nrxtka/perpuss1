<!-- resources/views/layouts/navbar.blade.php -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">peminjam</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{ route('peminjam.dashboard') }}" class="d-block">Perpussil</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Kategori Buku -->
                <li class="nav-item">
                    <a href="{{ route('peminjam.rakbuku') }}" class="nav-link {{ request()->is('peminjam/rakbuku') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Rak Buku</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('peminjam.peminjaman') }}" class="nav-link {{ request()->is('peminjam/peminjaman') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Data Peminjaman</p>
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
