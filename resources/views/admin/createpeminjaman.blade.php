@extends('layoutsadmin.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <div class="row mt-3">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.peminjaman') }}">Data Peminjaman</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Peminjaman</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Card Form -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Tambah Peminjaman</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.storepeminjaman') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_peminjam">Peminjam</label>
                        <select name="id_peminjam" id="id_peminjam" class="form-control @error('id_peminjam') is-invalid @enderror" required>
                            <option value="">-- Pilih Peminjam --</option>
                            @foreach($peminjam as $user)
                                <option value="{{ $user->id_peminjam }}">{{ $user->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_peminjam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="id_buku">Buku</label>
                        <select name="id_buku" id="id_buku" class="form-control @error('id_buku') is-invalid @enderror" required>
                            <option value="">-- Pilih Buku --</option>
                            @foreach($buku as $b)
                                <option value="{{ $b->id_buku }}">{{ $b->judul_buku }}</option>
                            @endforeach
                        </select>                                             
                        @error('id_buku')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tgl_peminjam">Tanggal Pinjam</label>
                        <input type="date" name="tgl_peminjam" id="tgl_peminjam" class="form-control @error('tgl_peminjam') is-invalid @enderror" required>
                        @error('tgl_peminjam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tgl_pengembalian">Tanggal Kembali</label>
                        <input type="date" name="tgl_pengembalian" id="tgl_pengembalian" class="form-control @error('tgl_pengembalian') is-invalid @enderror" required>
                        @error('tgl_pengembalian')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status_peminjaman">Status</label>
                        <select name="status_peminjaman" id="status_peminjaman" class="form-control @error('status_peminjaman') is-invalid @enderror">
                            <option value="dipinjam">Dipinjam</option>
                            <option value="dikembalikan">Dikembalikan</option>
                            <option value="belum dikembalikan">Belum Dikembalikan</option>
                        </select>
                        @error('status_peminjaman')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.peminjaman') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
