@extends('layoutsadmin.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row mt-3">
            <div class="col-12"> 
                <div class="card">
                    <div class="card-header">
                        <h3>Data Buku</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul Buku</th>
                                        <th>Kategori</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th>Stok</th>
                                        <th>Cover</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($databuku as $buku)
                                        <tr>
                                            <td class="text-center">{{ $buku->id_buku }}</td>
                                            <td>{{ $buku->judul_buku }}</td>
                                            <td>{{ $buku->kategori->kategori_buku ?? 'Tidak Ada Kategori' }}</td>
                                            <td>{{ $buku->penulis }}</td>
                                            <td>{{ $buku->penerbit }}</td>
                                            <td class="text-center">{{ $buku->tahun_terbit }}</td>
                                            <td class="text-center">{{ $buku->stok }}</td>
                                            <td class="text-center">
                                                @if($buku->cover)
                                                    <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover" class="img-fluid rounded" style="max-width: 80px; height: auto;">
                                                @else
                                                    <span class="text-muted">Tidak ada cover</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editBukuModal{{ $buku->id_buku }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>

                                                <form action="{{ route('admin.deletebuku', $buku->id_buku) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        {{-- Include Modal Edit Buku --}}
                                        @include('admin.editbuku')
                                    @endforeach
                                </tbody>
                            </table>

                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    var editButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
                                    editButtons.forEach(function (btn) {
                                        btn.addEventListener('click', function () {
                                            var target = this.getAttribute('data-bs-target');
                                            var modal = document.querySelector(target);
                                            var bsModal = new bootstrap.Modal(modal);
                                            bsModal.show();
                                        });
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
