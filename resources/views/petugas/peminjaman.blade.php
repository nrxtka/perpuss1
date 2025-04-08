@extends('layoutspetugas.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h1>Peminjaman</h1>
            <a href="{{ route('petugas.createpeminjaman') }}" class="btn btn-primary float-right mb-3">Tambah Peminjaman</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Peminjam</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th class="text-center">Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjaman as $key => $p)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $p->peminjam->nama ?? 'Nama tidak tersedia' }}</td>
                                <td>{{ $p->buku ->judul_buku ?? 'Tidak ada buku' }}</td>
                                <td>{{ $p->tgl_peminjam }}</td>
                                <td>{{ $p->tgl_pengembalian ?? '-' }}</td>
                                <td class="text-center">{{ ucfirst($p->status_peminjaman) }}</td>
                                <td>
                                    <a href="{{ route('petugas.editpeminjaman', $p->id_peminjaman) }}" class="btn btn-warning">Edit</a>

                                    <form action="{{ route('petugas.destroypeminjaman', $p->id_peminjaman) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
