@extends('layoutsadmin.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h1>Laporan Peminjaman</h1>
        </div>

        {{-- Form Filter Tanggal --}}
        <form method="GET" action="{{ route('admin.laporanpeminjaman') }}">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="dari_tanggal">Dari Tanggal</label>
                        <input type="date" name="dari_tanggal" class="form-control" id="dari_tanggal" value="{{ request('dari_tanggal') }}">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="sampai_tanggal">Sampai Tanggal</label>
                        <input type="date" name="sampai_tanggal" class="form-control" id="sampai_tanggal" value="{{ request('sampai_tanggal') }}">
                    </div>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        {{-- Jika ada data peminjaman --}}
        @if ($peminjaman->isNotEmpty())
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('admin.laporanpeminjamanpdf', request()->all()) }}" class="btn btn-danger mr-2">Export PDF</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Peminjam</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th class="text-center">Status Peminjaman</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjaman as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->peminjam->nama ?? 'Nama tidak tersedia' }}</td>
                                <td>{{ $item->buku->judul_buku ?? 'Tidak ada buku' }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tgl_peminjam)) }}</td>
                                <td>{{ $item->tgl_pengembalian ? date('d-m-Y', strtotime($item->tgl_pengembalian)) : '-' }}</td>
                                <td class="text-center">
                                    @if($item->status_peminjaman == 'dipinjam')
                                        <span class="badge bg-warning text-dark">Dipinjam</span>
                                    @elseif($item->status_peminjaman == 'dikembalikan')
                                        <span class="badge bg-success">Dikembalikan</span>
                                    @else
                                        <span class="badge bg-danger">Belum Dikembalikan</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-warning mt-4">Tidak ada data peminjaman pada periode yang dipilih.</div>
        @endif
    </div>
</div>
@endsection
