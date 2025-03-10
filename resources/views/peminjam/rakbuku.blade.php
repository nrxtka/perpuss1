@extends('layoutspeminjam.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h1>Rak Buku</h1>
        </div>
        @if(session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
        <!-- Filter Kategori & Search -->
        <div class="d-flex align-items-center mb-4">
            <div class="me-2" style="width: 150px;">
                <select id="kategoriSelect" class="form-select" onchange="location = this.value;">
                    <option value="{{ route('peminjam.rakbuku') }}" {{ request('kategori') ? '' : 'selected' }}>Semua</option>
                    @foreach ($kategoriBuku as $kategori)
                        <option value="{{ route('peminjam.rakbuku', ['kategori' => $kategori->id_kategoribuku]) }}" 
                            {{ request('kategori') == $kategori->id_kategoribuku ? 'selected' : '' }}>
                            {{ ucfirst($kategori->kategori_buku) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div style="flex: 1;">
                <input type="text" class="form-control" placeholder="Cari buku..." 
                       onkeydown="if(event.key === 'Enter') location.href='{{ route('peminjam.rakbuku') }}?search=' + this.value">
            </div>
        </div>

        <!-- Daftar Buku -->
        <div class="card mt-4">
            <div class="card-body">
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3"> 
                    @forelse ($buku as $item)
                    <div class="col">
                        <div class="card h-100 shadow-sm" style="width: 180px; height: 270px;"> 
                            <img src="{{ asset('storage/' . $item->cover) }}"  class="card-img-top" 
                                style="object-fit: cover; width: 100%; height: 220px; border-top-left-radius: 5px; border-top-right-radius: 5px;" 
                                alt="{{ $item->judul_buku }}">
                            <div class="card-body text-center p-2">
                                <h6 class="card-title text-truncate">{{ $item->judul_buku }}</h6>
                                <p class="card-text text-muted small mb-2">Kategori: {{ $item->kategori->kategori_buku ?? 'Tidak ada' }}</p>
                                <a href="{{ route('peminjam.detailbuku', $item->id_buku) }}" class="btn btn-success btn-sm">Detail</a>
                            </div>
                        </div>
                    </div>                    
                @empty
                    <p class="text-center">Tidak ada buku dalam kategori ini.</p>
                @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
