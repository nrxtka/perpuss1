@extends('layoutsadmin.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h1>Data Petugas</h1>
            <a href="{{ route('admin.createpetugas') }}" class="btn btn-primary float-right mb-3">Tambah Petugas</a>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nama Petugas</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datapetugas as $petugas)
                                <tr>
                                    <td>{{ $petugas->id_petugas }}</td>
                                    <td>{{ $petugas->nama_petugas }}</td>
                                    <td>{{ $petugas->email }}</td>
                                    <td>{{ $petugas->alamat }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm openEditModalPetugas" data-id="{{ $petugas->id_petugas }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>

                                        <form action="{{ route('admin.deletepetugas', $petugas->id_petugas) }}" method="POST" style="display: inline;">
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

<!-- Modal Edit Petugas -->
<div class="modal fade" id="modalEditPetugas" tabindex="-1" role="dialog" aria-labelledby="modalEditPetugasLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="modalEditPetugasContent">
      <!-- AJAX load here -->
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.openEditModalPetugas').click(function () {
            var petugasId = $(this).data('id');
            $.get('/admin/editpetugas/' + petugasId, function (data) {
                $('#modalEditPetugasContent').html(data);
                $('#modalEditPetugas').modal('show');
            });
        });
    });
</script>
@endpush
