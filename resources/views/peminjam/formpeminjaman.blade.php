@extends('layoutspeminjam.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mt-4 mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <h3 class="card-title text-center">Form Pinjam Buku</h3>
                <form action="{{ route('peminjam.peminjaman.store', ['id_buku' => $buku->id_buku]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id_buku" class="form-label">Nama Buku</label>
                        <input type="text" class="form-control" name="id_buku" value="{{ $buku->id_buku }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="id_peminjam" class="form-label">Nama Peminjam</label>
                        <input type="text" class="form-control" name="id_peminjam" value="{{ session('id_peminjam') }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_peminjam" class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tgl_peminjam" value="{{ now()->format('Y-m-d') }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pengembalian" class="form-label">Tenggat Pengembalian</label>
                        <input type="date" class="form-control" name="tgl_pengembalian" value="{{ now()->addDays(5)->format('Y-m-d') }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="status_peminjaman" class="form-label">Status Peminjaman</label>
                        <input type="text" class="form-control" name="status_peminjaman" value="dipinjam" readonly>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('peminjam.rakbuku') }}" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-success">Pinjam</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="alert alert-danger mt-4" role="alert">
            <strong>Catatan:</strong> Setiap keterlambatan pada pengembalian buku akan dikenakan sanksi berupa denda.
        </div>
    </div>
</div>
@endsection
