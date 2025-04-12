@extends('layoutspetugas.app')

@section('content')
<div class="content-wrapper">
    <div class="container px-3">
        <div class="text-center mt-4 mb-2">
            <h1 class="mb-1">Laporan Peminjaman</h1>
            <br>

            {{-- Keterangan Periode dan Status --}}
            @if($dari_tanggal && $sampai_tanggal)
                <p>
                    Periode: <strong>{{ \Carbon\Carbon::parse($dari_tanggal)->format('d-m-Y') }}</strong> 
                    s.d. <strong>{{ \Carbon\Carbon::parse($sampai_tanggal)->format('d-m-Y') }}</strong>
                    @if($status_peminjaman)
                        | Status: 
                        <strong>
                            {{ 
                                $status_peminjaman === 'dipinjam' ? 'Dipinjam' : 
                                ($status_peminjaman === 'dikembalikan' ? 'Dikembalikan' : 
                                ($status_peminjaman === 'belum_dikembalikan' ? 'Belum Dikembalikan' : 'Semua')) 
                            }}
                        </strong>
                    @endif
                </p>
            @endif
        </div>

        {{-- Form Filter Tanggal dan Status --}}
        <form method="GET" action="{{ route('petugas.laporanpeminjaman') }}" class="mb-4">
            <div class="row g-2 align-items-end">
                <div class="col-md-3">
                    <label for="dari_tanggal"><strong>Dari Tanggal</strong></label>
                    <input type="date" name="dari_tanggal" class="form-control" id="dari_tanggal" value="{{ request('dari_tanggal') }}">
                </div>
                <div class="col-md-3">
                    <label for="sampai_tanggal"><strong>Sampai Tanggal</strong></label>
                    <input type="date" name="sampai_tanggal" class="form-control" id="sampai_tanggal" value="{{ request('sampai_tanggal') }}">
                </div>
                <div class="col-md-3">
                    <label for="status_peminjaman"><strong>Status</strong></label>
                    <select name="status_peminjaman" class="form-control" id="status_peminjaman">
                        <option value="">-- Semua Status --</option>
                        <option value="dipinjam" {{ request('status_peminjaman') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="dikembalikan" {{ request('status_peminjaman') == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                        <option value="belum_dikembalikan" {{ request('status_peminjaman') == 'belum_dikembalikan' ? 'selected' : '' }}>Belum Dikembalikan</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <div class="me-2">
                        <button type="submit" class="btn btn-primary px-4 py-2">Filter</button>
                    </div>
                    <div>
                        <a href="{{ route('petugas.laporanpeminjamanpdf', request()->all()) }}" class="btn btn-danger px-4 py-2">Export PDF</a>
                    </div>
                </div>                                              
            </div>
        </form>

        {{-- Table Result --}}
        @if ($peminjaman->isNotEmpty())
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Peminjam</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status Peminjaman</th>
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
                                <td>
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
        <div class="alert alert-warning text-center mt-4">Tidak ada data peminjaman pada periode dan status yang dipilih.</div>
        @endif
    </div>
</div>
@endsection
