@extends('layoutsadmin.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <h1>Edit Petugas</h1>
                <form action="{{ route('admin.updatepetugas', $petugas->id_petugas) }}" method="POST">
                    @csrf
                    @method('PUT') 
                
                    <div class="form-group">
                        <label for="nama_petugas">Nama Lengkap</label>
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
                
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>                                 
            </div>
        </div>
    </div>
</div>
@endsection
