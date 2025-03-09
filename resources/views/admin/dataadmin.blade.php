@extends('layoutsadmin.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h1>Data Admin</h1>
            <a href="{{ route('admin.createadmin') }}" class="btn btn-primary float-right mb-3">Tambah Admin</a>     
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->nama_lengkap }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->alamat }}</td>
                                    <td>
                                      <a href="{{ route('admin.editadmin', $admin->id) }}" class="btn btn-info btn-sm">
                                          <i class="fas fa-edit"></i> Edit
                                      </a>
                                  
                                      <form action="{{ route('admin.deleteadmin', $admin->id) }}" method="POST" style="display: inline;">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                              <i class="fas fa-trash"></i> Delete
                                          </button>
                                      </form>
                                  </td>
                                  
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- End table-responsive -->
            </div>
        </div>
    </div>
</div>
@endsection
