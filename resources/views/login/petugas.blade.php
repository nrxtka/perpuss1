<!DOCTYPE html>
<html lang="en">
  @include('layoutspetugas.head')
<body class="hold-transition login-page">
<div class="login-logo">
    <b style="font-size: 2.5rem;">Silahkan Login</b>
</div>
<p class="login-box-msg" style="font-size: 1.25rem; text-align: center;">Login Sebagai Petugas!</p>
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
      <div class="d-flex justify-content-start">
        <a href="{{ route('pilih.index') }}" class="btn btn-secondary mb-3">Back</a>
      </div>

      @if(session('LoginError'))
        <div class="alert alert-danger" role="alert">
          {{ session('LoginError') }}
        </div>
      @endif

      <form action="{{ route('petugas.login') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
    
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>

    </div>
  </div>
</div>

@include('layoutspetugas.script')
</body>
</html>
