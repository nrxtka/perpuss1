@extends('layoutspetugas.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editBukuModal">
                    Edit Buku
                </button>

                <div class="modal fade" id="editBukuModal" tabindex="-1" aria-labelledby="editBukuModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editBukuModalLabel">Edit Buku</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('petugas.updatebuku', $buku->id_buku) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') 

                                    <div class="form-group mb-3">
                                        <label for="judul_buku" class="form-label">Judul Buku</label>
                                        <input type="text" name="judul_buku" class="form-control" value="{{ $buku->judul_buku }}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="id_kategoribuku" class="form-label">Kategori</label>
                                        <select name="id_kategoribuku" id="id_kategoribuku" class="form-control" required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach($kategori as $kat)
                                                <option value="{{ $kat->id_kategoribuku }}" {{ $buku->id_kategoribuku == $kat->id_kategoribuku ? 'selected' : '' }}>
                                                    {{ $kat->kategori_buku }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="penulis" class="form-label">Penulis</label>
                                        <input type="text" name="penulis" class="form-control" value="{{ $buku->penulis }}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="penerbit" class="form-label">Penerbit</label>
                                        <input type="text" name="penerbit" class="form-control" value="{{ $buku->penerbit }}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                        <input type="number" name="tahun_terbit" class="form-control" value="{{ $buku->tahun_terbit }}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="stok" class="form-label">Stok</label>
                                        <input type="number" name="stok" class="form-control" value="{{ $buku->stok }}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="cover" class="form-label">Cover (Kosongkan jika tidak ingin mengubah)</label>
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
            </div>
        </div>
    </div>
</div>
@endsection
