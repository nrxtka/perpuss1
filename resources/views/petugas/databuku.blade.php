@extends('layoutspetugas.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h1>Data Buku</h1>
            <a href="{{ route('petugas.createbuku') }}" class="btn btn-primary float-right mb-3">Tambah Buku</a>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    
        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>    
                                  <th>Cover</th>
                                <th>Judul Buku</th>
                                <th>Kategori</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th> Stok Buku </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($databuku as $buku)
                                <tr>
                                    <td>{{ $buku->id_buku }}</td>
                                    <td>
                                        @if($buku->cover)
                                            <img src="{{ Storage::url($buku->cover) }}" alt="Cover" style="width: 80px; height: auto; object-fit: cover;">
                                        @else
                                            <span class="text-muted">Tidak ada cover</span>
                                        @endif
                                    </td>
                                    <td>{{ $buku->judul_buku }}</td>
                                    <td>{{ $buku->kategori->kategori_buku ?? 'Tidak Ada Kategori' }}</td>
                                    <td>{{ $buku->penulis }}</td>
                                    <td>{{ $buku->penerbit }}</td>
                                    <td>{{ $buku->tahun_terbit }}</td>
                                    <td>{{ $buku->stok }}</td>
                                    <td>
                                        <a href="{{ route('petugas.editbuku', $buku->id_buku) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('petugas.deletebuku', $buku->id_buku) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fas fa-trash"></i> Delete
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
@endsection
