@extends('layoutsadmin.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <h1>Edit Peminjam</h1>
                <form action="{{ route('admin.updatepeminjam', $peminjam->id_peminjam) }}" method="POST">
                    @csrf
                    @method('PUT') 
                
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
                        <input type="password" name="password" class="form-control"value="{{  $peminjam->username }}" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ $peminjam->alamat }}">
                    </div>
                
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>                                 
            </div>
        </div>
    </div>
</div>
@endsection
