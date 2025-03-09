@extends('layoutsadmin.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.peminjaman') }}">Data Peminjaman</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Peminjaman</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-warning text-white">
                <h5 class="mb-0">Edit Peminjaman</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.updatepeminjaman', $peminjaman->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_peminjam">Nama Peminjam</label>
                        <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" value="{{ $peminjaman->nama_peminjam }}" required>
                    </div>

                    <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" name="judul_buku" id="judul_buku" class="form-control" value="{{ $peminjaman->judul_buku }}" required>
                    </div>

                    <div class="form-group">
                        <label for="tgl_peminjam">Tanggal Peminjaman</label>
                        <input type="date" name="tgl_peminjam" id="tgl_peminjam" class="form-control" value="{{ $peminjaman->tgl_peminjam }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.peminjaman') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
