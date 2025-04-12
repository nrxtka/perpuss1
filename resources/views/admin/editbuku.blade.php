<!-- resources/views/admin/editbuku.blade.php -->
<div class="modal fade" id="editBukuModal{{ $buku->id_buku }}" tabindex="-1" role="dialog" aria-labelledby="editBukuLabel{{ $buku->id_buku }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="editBukuLabel{{ $buku->id_buku }}">Edit Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('admin.updatebuku', $buku->id_buku) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" name="judul_buku" class="form-control" value="{{ $buku->judul_buku }}" required>
                    </div>

                    <div class="form-group">
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
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>
