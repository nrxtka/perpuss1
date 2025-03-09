<html lang="en">
  @include('layoutspeminjam.head')
<body class="hold-transition login-page">
<div class="login-logo">
    <b style="font-size: 2.5rem;">Registrasi Peminjam</b>
</div>
<p class="login-box-msg" style="font-size: 1.25rem; text-align: center;">Silahkan Daftar</p>
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
      <form action="{{ route('register.peminjam') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Registrasi</button>
      </form>
    </div>
  </div>
</div>
@include('layoutspeminjam.script')
</body>
</html>
