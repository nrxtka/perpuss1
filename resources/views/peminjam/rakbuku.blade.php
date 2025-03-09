@extends('layoutspeminjam.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h1>Rak Buku</h1>
        </div>

        <!-- Filter Kategori -->
        <div class="d-flex justify-content-center mb-4" id="kategoriWrapper">
            <div id="kategoriSlider" class="d-flex" style="overflow: hidden; transition: transform 0.5s ease-in-out;">
                <div class="d-flex flex-nowrap" id="slide1">
                    <a href="{{ route('peminjam.rakbuku') }}" class="btn {{ request('kategori') ? 'btn-outline-primary' : 'btn-primary' }}">Semua</a>
                    @foreach ($kategoriBuku->take(2) as $kategori)
                    <a href="{{ route('peminjam.rakbuku', ['kategori' => $kategori->id_kategoribuku]) }}" 
                       class="btn {{ request('kategori') == $kategori->id_kategoribuku ? 'btn-primary' : 'btn-outline-primary' }}">
                        {{ ucfirst($kategori->kategori_buku) }}
                    </a>
                    @endforeach
                </div>
                <div class="d-flex flex-nowrap" id="slide2" style="display: none;">
                    @foreach ($kategoriBuku->skip(2)->take(2) as $kategori)
                    <a href="{{ route('peminjam.rakbuku', ['kategori' => $kategori->id_kategoribuku]) }}" 
                       class="btn {{ request('kategori') == $kategori->id_kategoribuku ? 'btn-primary' : 'btn-outline-primary' }}">
                        {{ ucfirst($kategori->kategori_buku) }}
                    </a>
                    @endforeach
                </div>
            </div>
            <button class="btn btn-outline-primary" id="btnNext" onclick="slideKategori()">&gt;</button>
        </div>

        <script>
            let slideIndex = 0;

            function slideKategori() {
                const slide1 = document.getElementById('slide1');
                const slide2 = document.getElementById('slide2');

                if (slideIndex === 0) {
                    slide1.style.display = 'none';
                    slide2.style.display = 'flex';
                    slideIndex = 1;
                } else {
                    slide1.style.display = 'flex';
                    slide2.style.display = 'none';
                    slideIndex = 0;
                }
            }
        </script>

        <!-- Daftar Buku -->
        <div class="card mt-4">
            <div class="card-body">
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3"> 
                    @forelse ($buku as $item)
                    <div class="col">
                        <div class="card h-100 shadow-sm" style="width: 180px; height: 270px;"> 
                            <img src="{{ asset('storage/' . $item->cover) }}" class="card-img-top" 
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
