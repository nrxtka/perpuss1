<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Sidebar toggle -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Notifikasi Buku -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdownBuku" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-book fa-fw"></i>
                @php
                    $jumlahNotif = count($bukuHabis) + count($bukuHampirHabis);
                @endphp
                @if ($jumlahNotif > 0)
                    <span class="badge badge-danger badge-counter">{{ $jumlahNotif }}</span>
                @endif
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdownBuku">
                <h6 class="dropdown-header">Pemberitahuan Stok Buku</h6>

                @foreach ($bukuHabis as $buku)
                    <div class="dropdown-item d-flex align-items-center">
                        <div class="mr-3">
                            <div class="icon-circle bg-danger">
                                <i class="fas fa-book-dead text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">Stok: 0</div>
                            <span class="font-weight-bold">{{ $buku->judul_buku }}</span>
                        </div>
                    </div>
                @endforeach

                @foreach ($bukuHampirHabis as $buku)
                    <div class="dropdown-item d-flex align-items-center">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-exclamation text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">Stok: {{ $buku->stok }}</div>
                            <span class="font-weight-bold">{{ $buku->judul_buku }}</span>
                        </div>
                    </div>
                @endforeach

                @if ($jumlahNotif == 0)
                    <div class="dropdown-item text-center small text-gray-500">Tidak ada notifikasi</div>
                @endif
            </div>
        </li>

      <!-- Logout Icon -->
<li class="nav-item mx-1">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-link nav-link" title="Logout">
            <i class="fas fa-sign-out-alt"></i>
        </button>
    </form>
</li>

        
    </ul>
</nav>
