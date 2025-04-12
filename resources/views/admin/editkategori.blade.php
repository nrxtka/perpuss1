<div class="modal fade" id="editKategoriModal{{ $kategori->id_kategoribuku }}" tabindex="-1" role="dialog" aria-labelledby="editKategoriModalLabel{{ $kategori->id_kategoribuku }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKategoriModalLabel{{ $kategori->id_kategoribuku }}">Edit Kategori Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.updatekategori', $kategori->id_kategoribuku) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="kategori_buku">Nama Kategori</label>
                        <input type="text" name="kategori_buku" class="form-control" value="{{ $kategori->kategori_buku }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
