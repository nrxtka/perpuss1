@extends('layoutspetugas.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row mt-3">
            <div class="col-12"> 
                <div class="card">
                    <div class="card-header">
                        <h3>Data Buku</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul Buku</th>
                                        <th>Kategori</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th>Stok</th>
                                        <th>Cover</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($databuku as $buku)
                                        <tr>
                                            <td class="text-center">{{ $buku->id_buku }}</td>
                                            <td>{{ $buku->judul_buku }}</td>
                                            <td>{{ $buku->kategori->kategori_buku ?? 'Tidak Ada Kategori' }}</td>
                                            <td>{{ $buku->penulis }}</td>
                                            <td>{{ $buku->penerbit }}</td>
                                            <td class="text-center">{{ $buku->tahun_terbit }}</td>
                                            <td class="text-center">{{ $buku->stok }}</td>
                                            <td class="text-center">
                                                @if($buku->cover)
                                                    <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover" class="img-fluid rounded" style="max-width: 80px; height: auto;">
                                                @else
                                                    <span class="text-muted">Tidak ada cover</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editBukuModal{{ $buku->id_buku }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>

                                                <form action="{{ route('petugas.deletebuku', $buku->id_buku) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="editBukuModal{{ $buku->id_buku }}" tabindex="-1" aria-labelledby="editBukuModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Buku</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('petugas.updatebuku', $buku->id_buku) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="form-group mb-3">
                                                                <label for="judul_buku">Judul Buku</label>
                                                                <input type="text" name="judul_buku" class="form-control" value="{{ $buku->judul_buku }}" required>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="id_kategoribuku">Kategori</label>
                                                                <select name="id_kategoribuku" class="form-control" required>
                                                                    <option value="">Pilih Kategori</option>
                                                                    @foreach($kategori as $kat)
                                                                        <option value="{{ $kat->id_kategoribuku }}" {{ $buku->id_kategoribuku == $kat->id_kategoribuku ? 'selected' : '' }}>
                                                                            {{ $kat->kategori_buku }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="penulis">Penulis</label>
                                                                <input type="text" name="penulis" class="form-control" value="{{ $buku->penulis }}" required>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="penerbit">Penerbit</label>
                                                                <input type="text" name="penerbit" class="form-control" value="{{ $buku->penerbit }}" required>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="tahun_terbit">Tahun Terbit</label>
                                                                <input type="number" name="tahun_terbit" class="form-control" value="{{ $buku->tahun_terbit }}" required>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="stok">Stok</label>
                                                                <input type="number" name="stok" class="form-control" value="{{ $buku->stok }}" required>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="cover">Cover (Kosongkan jika tidak ingin mengubah)</label>
                                                                <input type="file" name="cover" class="form-control">
                                                                @if($buku->cover)
                                                                    <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover Buku" class="img-fluid rounded mt-2" style="max-width: 150px;">
                                                                @endif
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
