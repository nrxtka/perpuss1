@extends('layoutspetugas.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <div class="row mt-3">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('petugas.peminjaman') }}">Data Peminjaman</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Peminjaman</li>
                    </ol>
                </nav>
            </div>
        </div>

    <form action="{{ route('petugas.storepeminjaman') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_peminjam" class="form-label">Nama Peminjam</label>
            <select name="id_peminjam" id="id_peminjam" class="form-control" required>
                <option value="">-- Pilih Peminjam --</option>
                @foreach ($peminjams as $peminjam)
                    <option value="{{ $peminjam->id_peminjam }}">{{ $peminjam->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_buku" class="form-label">Judul Buku</label>
            <select name="id_buku" id="id_buku" class="form-control" required>
                <option value="">-- Pilih Buku --</option>
                @foreach ($bukus as $buku)
                    <option value="{{ $buku->id_buku }}">{{ $buku->judul_buku }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tgl_peminjam" class="form-label">Tanggal Peminjaman</label>
            <input type="date" name="tgl_peminjam" id="tgl_peminjam" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tgl_pengembalian" class="form-label">Tanggal Pengembalian</label>
            <input type="date" name="tgl_pengembalian" id="tgl_pengembalian" class="form-control">
        </div>

        <div class="mb-3">
            <label for="status_peminjaman" class="form-label">Status Peminjaman</label>
            <select name="status_peminjaman" id="status_peminjaman" class="form-control" required>
                <option value="dipinjam">Dipinjam</option>
                <option value="dikembalikan">Dikembalikan</option>
                <option value="belum dikembalikan">Belum Dikembalikan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
