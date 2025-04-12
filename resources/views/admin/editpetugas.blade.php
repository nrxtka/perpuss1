<div class="modal-header">
    <h5 class="modal-title">Edit Petugas</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form action="{{ route('admin.updatepetugas', $petugas->id_petugas) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="form-group">
            <label for="nama_petugas">Nama Petugas</label>
            <input type="text" name="nama_petugas" class="form-control" value="{{ $petugas->nama_petugas }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $petugas->email }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $petugas->alamat }}" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    </div>
</form>
