@extends('layoutspetugas.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <h1>Edit Kategori Buku</h1>
                <form action="{{ route('petugas.updatekategori', $kategori->id_kategoribuku) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="kategori_buku">Nama Kategori</label>
                        <input type="text" name="kategori_buku" class="form-control" value="{{ $kategori->kategori_buku }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
