<!DOCTYPE html>
<html lang="en">
    @include('layoutsadmin.head')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h1>Welcome to My Library</h1>
  </div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Please choose your role</p>

      <div class="d-flex flex-column">
        <!-- Button for Admin -->
        <a href="{{ route('admin.login.form') }}" class="btn btn-primary mb-2">Login as Admin</a>

        <!-- Button for Petugas -->
        <a href="{{ route('login.petugas') }}" class="btn btn-secondary mb-2">Login as Petugas</a>

        <!-- Button for Peminjam -->
        <a href="{{ route('login.peminjam') }}" class="btn btn-success">Login as Peminjam</a>
      </div>

    </div>
  </div><!-- /.card -->
</div>
<!-- /.login-box -->

@include('layoutsadmin.script')
</body>
</html>
