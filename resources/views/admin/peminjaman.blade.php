@extends('layoutsadmin.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row mt-3">
            <div class="col-12">
                <h3 class="mb-3">Data Peminjaman</h3>

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.createpeminjaman') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Tambah Peminjaman
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Peminjam</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Status Peminjaman</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($peminjaman as $key => $item)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $item->peminjam->nama ?? 'Nama tidak tersedia' }}</td>
                                            <td>{{ $item->buku->judul_buku ?? 'Tidak ada buku' }}</td>                                
                                            <td class="text-center">{{ $item->tgl_peminjam }}</td>
                                            <td class="text-center">{{ $item->tgl_pengembalian ?? '-' }}</td>
                                            <td class="text-center">
                                                @if($item->status_peminjaman == 'dipinjam')
                                                    <span class="badge bg-warning text-dark">Dipinjam</span>
                                                @elseif($item->status_peminjaman == 'dikembalikan')
                                                    <span class="badge bg-success">Dikembalikan</span>
                                                @else
                                                    <span class="badge bg-danger">Belum Dikembalikan</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.editpeminjaman', $item->id_peminjaman) }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('admin.destroypeminjaman', $item->id_peminjaman) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
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
    </div>
</div>

@endsection
