<div class="modal-header">
    <h5 class="modal-title" id="editPeminjamModalLabel">Edit Peminjam</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form action="{{ route('admin.updatepeminjam', $peminjam->id_peminjam) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" value="{{ $peminjam->nama }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $peminjam->email }}" required>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" value="{{ $peminjam->username }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $peminjam->alamat }}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</form>
