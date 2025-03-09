@extends('layoutspeminjam.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
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
                </ul>
                <div class="text-center mt-4">
                    <a href="{{ route('peminjam.rakbuku') }}" class="btn btn-secondary">Batal</a>
                    <form action="{{ route('peminjam.peminjaman.store', $buku->id_buku) }}" method="POST" style="display: inline;">
                        @csrf
                        <input type="hidden" name="id_buku" value="{{ $buku->id_buku }}">
                        <input type="hidden" name="tgl_peminjam" value="{{ now()->format('Y-m-d') }}">
                        <input type="hidden" name="tgl_pengembalian" value="{{ now()->addDays(7)->format('Y-m-d') }}">
                        <input type="hidden" name="status_peminjaman" value="dipinjam">
                        <button type="submit" class="btn btn-success">Pinjam</button>
                    </form>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
function pinjamBuku(form) {
    fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
        }
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>
