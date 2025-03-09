@extends('layoutspetugas.app')

@section('content')
<div class="container">
    <h2>Edit Peminjaman</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('petugas.updatepeminjaman', $peminjaman->id_peminjaman) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_peminjam" class="form-label">Nama Peminjam</label>
            <select name="id_peminjam" id="id_peminjam" class="form-control" required>
                <option value="">-- Pilih Peminjam --</option>
                @foreach ($peminjams as $peminjam)
                    <option value="{{ $peminjam->id_peminjam }}" 
                        {{ old('id_peminjam', $peminjaman->id_peminjam) == $peminjam->id_peminjam ? 'selected' : '' }}>
                        {{ $peminjam->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_buku" class="form-label">Judul Buku</label>
            <select name="id_buku" id="id_buku" class="form-control" required>
                <option value="">-- Pilih Buku --</option>
                @foreach ($bukus as $buku)
                    <option value="{{ $buku->id_buku }}" 
                        {{ old('id_buku', $peminjaman->id_buku) == $buku->id_buku ? 'selected' : '' }}>
                        {{ $buku->judul_buku }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tgl_peminjam" class="form-label">Tanggal Peminjaman</label>
            <input type="date" name="tgl_peminjam" id="tgl_peminjam" class="form-control" 
                value="{{ old('tgl_peminjam', $peminjaman->tgl_peminjam) }}" required>
        </div>

        <div class="mb-3">
            <label for="tgl_pengembalian" class="form-label">Tanggal Pengembalian</label>
            <input type="date" name="tgl_pengembalian" id="tgl_pengembalian" class="form-control" 
                value="{{ old('tgl_pengembalian', $peminjaman->tgl_pengembalian) }}">
        </div>

        <div class="mb-3">
            <label for="status_peminjaman" class="form-label">Status Peminjaman</label>
            <select name="status_peminjaman" id="status_peminjaman" class="form-control" required>
                <option value="dipinjam" 
                    {{ old('status_peminjaman', $peminjaman->status_peminjaman) == 'dipinjam' ? 'selected' : '' }}>
                    Dipinjam
                </option>
                <option value="dikembalikan" 
                    {{ old('status_peminjaman', $peminjaman->status_peminjaman) == 'dikembalikan' ? 'selected' : '' }}>
                    Dikembalikan
                </option>
                <option value="belum dikembalikan" 
                    {{ old('status_peminjaman', $peminjaman->status_peminjaman) == 'belum dikembalikan' ? 'selected' : '' }}>
                    Belum Dikembalikan
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
