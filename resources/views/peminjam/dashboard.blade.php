@extends('layoutspeminjam.app')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard Peminjam</h1>

            @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
            @endif

            <div class="row mt-4">
                <!-- Data Buku Tersedia -->
                <div class="col-md-6">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body text-center">
                            <h5 class="card-title">BUKU TERSEDIA</h5>
                            <h3>{{ $totalBuku }}</h3>
                            <a href="{{ route('peminjam.rakbuku') }}" class="btn btn-light btn-sm mt-2">Lihat Buku</a>
                        </div>
                    </div>
                </div>

                <!-- Riwayat Peminjaman -->
                <div class="col-md-6">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body text-center">
                            <h5 class="card-title">RIWAYAT PEMINJAMAN</h5>
                            <h3>{{ $totalRiwayat }}</h3>
                            <a href="{{ route('peminjam.peminjaman') }}" class="btn btn-light btn-sm mt-2">Lihat Riwayat</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
