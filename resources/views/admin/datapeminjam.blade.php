@extends('layoutsadmin.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h1>Data Peminjam</h1>
            <a href="{{ route('admin.createpeminjam') }}" class="btn btn-primary float-right mb-3">Tambah Peminjam</a>
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
                                <th>Username</th>
                                <th>Alamat</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datapeminjam as $peminjam)
                                <tr>
                                    <td>{{ $peminjam->id_peminjam }}</td>
                                    <td>{{ $peminjam->nama }}</td>
                                    <td>{{ $peminjam->email }}</td>
                                    <td>{{ $peminjam->username }}</td>
                                    <td>{{ $peminjam->alamat }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm editPeminjamBtn" data-id="{{ $peminjam->id_peminjam }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form action="{{ route('admin.deletepeminjam', $peminjam->id_peminjam) }}" method="POST" style="display: inline;">
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

{{-- Modal Edit --}}
<div class="modal fade" id="editPeminjamModal" tabindex="-1" role="dialog" aria-labelledby="editPeminjamModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="editPeminjamModalContent">
            <!-- Isi dari modal akan dimuat via Ajax -->
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.editPeminjamBtn').on('click', function () {
            var peminjamId = $(this).data('id');
            $.get('/admin/datapeminjam/' + peminjamId + '/edit', function (data) {
                $('#editPeminjamModalContent').html(data);
                $('#editPeminjamModal').modal('show');
            });
        });
    });
</script>
@endpush
