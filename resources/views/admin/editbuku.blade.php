<!-- resources/views/admin/editbuku.blade.php -->
<div class="modal fade" id="editBukuModal{{ $buku->id_buku }}" tabindex="-1" role="dialog" aria-labelledby="editBukuLabel{{ $buku->id_buku }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="editBukuLabel{{ $buku->id_buku }}">Edit Buku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
  
        <div class="modal-body">
          <form action="{{ route('admin.updatebuku', $buku->id_buku) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
  
            <div class="mb-3">
              <label for="judul_buku" class="form-label">Judul Buku</label>
              <input type="text" name="judul_buku" class="form-control" value="{{ $buku->judul_buku }}" required>
            </div>
  
            <div class="mb-3">
              <label for="penulis" class="form-label">Penulis</label>
              <input type="text" name="penulis" class="form-control" value="{{ $buku->penulis }}" required>
            </div>
  
            <div class="mb-3">
              <label for="id_kategoribuku" class="form-label">Kategori</label>
              <select name="id_kategoribuku" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $kat)
                  <option value="{{ $kat->id_kategoribuku }}" {{ $buku->id_kategoribuku == $kat->id_kategoribuku ? 'selected' : '' }}>
                    {{ $kat->kategori_buku }}
                  </option>
                @endforeach
              </select>
            </div>
  
            <div class="mb-3">
              <label for="penerbit" class="form-label">Penerbit</label>
              <input type="text" name="penerbit" class="form-control" value="{{ $buku->penerbit }}" required>
            </div>
  
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <div class="input-group">
                  <input type="text" name="tahun_terbit" id="tahun_terbit_{{ $buku->id_buku }}" class="form-control" value="{{ $buku->tahun_terbit }}" required>
                  <span class="input-group-text" style="cursor: pointer;">
                    <i class="fas fa-calendar-alt"></i>
                  </span>
                </div>
              </div>
              
  
            <div class="mb-3">
              <label for="stok" class="form-label">Stok</label>
              <input type="number" name="stok" class="form-control" value="{{ $buku->stok }}" required>
            </div>
  
            <div class="mb-3">
              <label for="cover" class="form-label">Cover Buku (Kosongkan jika tidak diubah)</label>
              <input type="file" name="cover" class="form-control">
              @if($buku->cover)
                <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover Buku" width="100" class="mt-2">
              @endif
            </div>
  
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
  
          </form>
        </div>
      </div>
    </div>
  </div>
  @push('scripts')
<script>
  $(document).ready(function () {
    $('#tahun_terbit_{{ $buku->id_buku }}').datepicker({
      format: "yyyy",
      viewMode: "years",
      minViewMode: "years",
      autoclose: true
    });

    $('#tahun_terbit_{{ $buku->id_buku }}').on('keydown paste', function(e) {
      e.preventDefault();
    });

    $('#tahun_terbit_{{ $buku->id_buku }}').on('focus', function () {
      $(this).datepicker('show');
    });
  });
</script>
@endpush
