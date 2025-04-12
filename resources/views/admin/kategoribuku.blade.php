@extends('layoutsadmin.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h1>Data Kategori Buku</h1>
            <a href="{{ route('admin.createkategoribuku') }}" class="btn btn-primary float-right mb-3">Tambah Kategori</a>
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
                                <th>Kategori Buku</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoribuku as $kategori)
                                <tr>
                                    <td>{{ $kategori->id_kategoribuku }}</td>
                                    <td>{{ $kategori->kategori_buku }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editKategoriModal{{ $kategori->id_kategoribuku }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>                                        
                                        <form action="{{ route('admin.deletekategori', $kategori->id_kategoribuku) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- Modal Edit dipanggil dari file terpisah --}}
                                @include('admin.editkategori', ['kategori' => $kategori])
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- End table-responsive -->
            </div>
        </div>
    </div>
</div>
@endsection
