@extends('layoutspetugas.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <h1>Edit Buku</h1>
                <form action="{{ route('petugas.updatebuku', $buku->id_buku) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                
                    <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" name="judul_buku" class="form-control" value="{{ $buku->judul_buku }}" required>
                    </div>
                    <label for="id_kategoribuku">Kategori</label>
                    <select name="id_kategoribuku" id="id_kategoribuku" class="form-control">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $kat)
                            <option value="{{ $kat->id_kategoribuku }}">{{ $kat->kategori_buku }}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" name="penulis" class="form-control" value="{{ $buku->penulis }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" value="{{ $buku->penerbit }}" required>
                    </div>

                    <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" class="form-control" value="{{ $buku->tahun_terbit }}" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{ $buku->stok }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="cover">Cover (Kosongkan jika tidak ingin mengubah)</label>
                        <input type="file" name="cover" class="form-control">
                        @if($buku->cover)
                            <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover Buku" width="100" class="mt-2">
                        @endif
                    </div>
                
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>                                 
            </div>
        </div>
    </div>
</div>
@endsection
