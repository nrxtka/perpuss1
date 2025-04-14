<div class="modal-header">
  <h5 class="modal-title" id="modalEditAdminLabel">Edit Admin</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>

<form action="{{ route('admin.updateadmin', $admin->id) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="modal-body">
      <div class="form-group">
          <label for="nama_lengkap">Nama Lengkap</label>
          <input type="text" name="nama_lengkap" class="form-control" value="{{ $admin->nama_lengkap }}" required>
      </div>

      <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" value="{{ $admin->email }}" required>
      </div>

      <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" name="alamat" class="form-control" value="{{ $admin->alamat }}">
      </div>
  </div>

  <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>

      </div>
  </div>
</div>
