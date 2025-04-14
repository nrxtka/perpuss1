<!-- resources/views/admin/createbuku.blade.php -->
<div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="tambahBukuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="tambahBukuModalLabel">Tambah Buku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
  
        <div class="modal-body">
          <form action="{{ route('petugas.storebuku') }}" method="POST" enctype="multipart/form-data">
            @csrf
  
            <div class="mb-3">
              <label for="judul_buku" class="form-label">Judul Buku</label>
              <input type="text" name="judul_buku" class="form-control" required>
            </div>
  
            <div class="mb-3">
              <label for="penulis" class="form-label">Penulis</label>
              <input type="text" name="penulis" class="form-control" required>
            </div>
  
            <div class="mb-3">
              <label for="id_kategoribuku" class="form-label">Kategori</label>
              <select name="id_kategoribuku" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $kat)
                  <option value="{{ $kat->id_kategoribuku }}">{{ $kat->kategori_buku }}</option>
                @endforeach
              </select>
            </div>
  
            <div class="mb-3">
              <label for="penerbit" class="form-label">Penerbit</label>
              <input type="text" name="penerbit" class="form-control" required>
            </div>

            
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <div class="input-group">
                  <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control" required>
                  <span class="input-group-text" id="trigger-datepicker" style="cursor: pointer;">
                    <i class="fas fa-calendar-alt"></i>
                  </span>
                </div>
              </div>
              
              
            <div class="mb-3">
              <label for="stok" class="form-label">Stok</label>
              <input type="number" name="stok" class="form-control" required>
            </div>
  
            <div class="mb-3">
              <label for="cover" class="form-label">Cover Buku</label>
              <input type="file" name="cover" class="form-control" required>
            </div>
  
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
  
          </form>
        </div>
      </div>
    </div>
  </div>
  