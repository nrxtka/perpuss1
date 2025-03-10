@extends('layoutspeminjam.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card mt-4 mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <h3 class="card-title text-center">{{ $buku->judul_buku }}</h3>
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $buku->cover) }}" alt="{{ $buku->judul_buku }}" style="max-width: 100%; height: 300px; object-fit: cover; border-radius: 8px;">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Penulis:</strong> {{ $buku->penulis }}</li>
                    <li class="list-group-item"><strong>Penerbit:</strong> {{ $buku->penerbit }}</li>
                    <li class="list-group-item"><strong>Kategori:</strong> {{ $buku->kategori->kategori_buku ?? 'Tidak ada' }}</li>
                    <li class="list-group-item"><strong>Deskripsi:</strong> {{ $buku->deskripsi ?? 'Tidak ada deskripsi' }}</li>
                    <li class="list-group-item"><strong>Stok:</strong> {{ $buku->stok ?? 'Stok tidak tersedia' }}</li>
                </ul>
                <div class="text-center mt-4">
                    <a href="{{ route('peminjam.rakbuku') }}" class="btn btn-secondary">Batal</a>
                    @if($buku->stok > 0)
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#konfirmasiModal">Pinjam</button>
                        <form id="form-pinjam" action="{{ route('peminjam.peminjaman.store', $buku->id_buku) }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="id_buku" value="{{ $buku->id_buku }}">
                            <input type="hidden" name="tgl_peminjam" value="{{ now()->format('Y-m-d') }}">
                            <input type="hidden" name="tgl_pengembalian" value="{{ now()->addDays(7)->format('Y-m-d') }}">
                            <input type="hidden" name="status_peminjaman" value="dipinjam">
                        </form>
                    @else
                        <button class="btn btn-danger" disabled>Stok Habis</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="konfirmasiModal" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center mx-auto" style="max-width: 500px;">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Peminjaman</h5>
            </div>
            <div class="modal-body">
                Jika kamu meminjam buku ini maka kembalikan di tanggal {{ now()->addDays(7)->format('Y-m-d') }}, jika tidak dikembalikan maka akan kena denda. Apakah kamu yakin ingin meminjam buku ini?
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" onclick="document.getElementById('form-pinjam').submit();">Ya, Pinjam</button>
            </div>
        </div>
    </div>
</div>
@endsection
