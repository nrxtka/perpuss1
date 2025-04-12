@extends('layoutsadmin.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-2">
            <h1 class="h3 mb-0 text-gray-800">Data Admin</h1>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('admin.createadmin') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Admin
            </a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">List Admin</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableAdmin" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center" style="width: 60px">ID</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center" style="width: 120px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td class="text-center align-middle">{{ $admin->id }}</td>
                                    <td class="text-center align-middle">{{ $admin->nama_lengkap }}</td>
                                    <td class="text-center align-middle">{{ $admin->email }}</td>
                                    <td class="text-center align-middle">{{ $admin->alamat }}</td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-info btn-circle btn-sm mr-1 openEditModal" data-id="{{ $admin->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{ route('admin.deleteadmin', $admin->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-between mt-3">
                        <div>
                            @if ($admins->count() > 0)
                                Showing {{ $admins->firstItem() }} to {{ $admins->lastItem() }} of {{ $admins->total() }} entries
                            @else
                                Data tidak ditemukan.
                            @endif
                        </div>
                        <div>
                            {{ $admins->links() }}
                        </div>
                    </div>

                </div> <!-- End table-responsive -->
            </div>
        </div>
    </div>
</div>

<!-- Modal kosong (AJAX akan isi ini) -->
<div class="modal fade" id="modalEditAdmin" tabindex="-1" role="dialog" aria-labelledby="modalEditAdminLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="modalEditAdminContent">
      <!-- Isi AJAX edit admin di sini -->
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.openEditModal').click(function () {
            var adminId = $(this).data('id');
            $.get('/admin/' + adminId + '/edit', function (data) {
                $('#modalEditAdminContent').html(data);
                $('#modalEditAdmin').modal('show');
            });
        });
    });
</script>
@endpush
