@extends('layoutsadmin.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
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
                                    @foreach($peminjaman as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
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
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editPeminjamanModal{{ $item->id_peminjaman }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ route('admin.peminjaman.destroy', $item->id_peminjaman) }}" method="POST" style="display: inline;">
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

{{-- Modals dipisah dari tbody/table --}}
@foreach($peminjaman as $item)
<div class="modal fade" id="editPeminjamanModal{{ $item->id_peminjaman }}" tabindex="-1" role="dialog" aria-labelledby="editPeminjamanLabel{{ $item->id_peminjaman }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.peminjaman.update', $item->id_peminjaman) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editPeminjamanLabel{{ $item->id_peminjaman }}">Edit Status Peminjaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Status Peminjaman</label>
                        <select name="status_peminjaman" class="form-control" required>
                            <option value="dipinjam" {{ $item->status_peminjaman == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="dikembalikan" {{ $item->status_peminjaman == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                            <option value="belum dikembalikan" {{ $item->status_peminjaman == 'belum dikembalikan' ? 'selected' : '' }}>Belum Dikembalikan</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection
