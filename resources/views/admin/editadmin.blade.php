@extends('layoutsadmin.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <h1>Edit Admin</h1>
                <form action="{{ route('admin.updateadmin', $admin->id) }}" method="POST">
                    @csrf
                    @method('PUT') 
                
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
                        <input type="text" name="alamat" class="form-control" value="{{ $admin->alamat }}" required>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>                                 
            </div>
        </div>
    </div>
</div>
@endsection
