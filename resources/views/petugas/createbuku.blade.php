<!-- Modal Tambah Buku -->
<div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="tambahBukuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="{{ route('petugas.storebuku') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="tambahBukuModalLabel">Tambah Buku</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="judul_buku" class="form-label">Judul Buku</label>
              <input type="text" name="judul_buku" id="judul_buku" class="form-control @error('judul_buku') is-invalid @enderror" required>
              @error('judul_buku')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
  
            <div class="mb-3">
              <label for="penulis" class="form-label">Penulis</label>
              <input type="text" name="penulis" id="penulis" class="form-control @error('penulis') is-invalid @enderror" required>
              @error('penulis')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
  
            <div class="mb-3">
              <label for="id_kategoribuku" class="form-label">Kategori</label>
              <select name="id_kategoribuku" id="id_kategoribuku" class="form-control">
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $kat)
                  <option value="{{ $kat->id_kategoribuku }}">{{ $kat->kategori_buku }}</option>
                @endforeach
              </select>
            </div>
  
            <div class="mb-3">
              <label for="penerbit" class="form-label">Penerbit</label>
              <input type="text" name="penerbit" id="penerbit" class="form-control @error('penerbit') is-invalid @enderror" required>
              @error('penerbit')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
  
            <div class="mb-3">
              <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
              <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror" required>
              @error('tahun_terbit')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
  
            <div class="mb-3">
              <label for="stok" class="form-label">Stok</label>
              <input type="number" name="stok" id="stok" class="form-control" required>
            </div>
  
            <div class="mb-3">
              <label for="cover" class="form-label">Cover Buku</label>
              <input type="file" name="cover" id="cover" class="form-control @error('cover') is-invalid @enderror" required>
              @error('cover')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  