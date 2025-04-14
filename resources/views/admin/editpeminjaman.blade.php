<div class="modal fade" id="editPeminjamanModal{{ $item->id_peminjaman }}" tabindex="-1" role="dialog" aria-labelledby="editPeminjamanLabel{{ $item->id_peminjaman }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Status Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('admin.peminjaman.update', $item->id_peminjaman) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status_peminjaman">Status Peminjaman</label>
                        <select name="status_peminjaman" class="form-control" required>
                            <option value="dipinjam" {{ $item->status_peminjaman == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="dikembalikan" {{ $item->status_peminjaman == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                            <option value="belum dikembalikan" {{ $item->status_peminjaman == 'belum dikembalikan' ? 'selected' : '' }}>Belum Dikembalikan</option>
                        </select>                        
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>

        </div>
    </div>
</div>

    
    @endforeach
