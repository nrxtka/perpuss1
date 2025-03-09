@extends('layoutsadmin.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <div class="row mt-3">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.kategoribuku') }}">Data Kategori Buku</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Kategori</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Card Form -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Tambah Kategori Buku</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.storekategori') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kategori_buku">Nama Kategori</label>
                        <input type="text" name="kategori_buku" id="kategori_buku" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.kategoribuku') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
