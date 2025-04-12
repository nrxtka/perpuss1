@extends('layoutsadmin.app')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>

            @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
            @endif

            <div class="row mt-4">
                <!-- Data Admin -->
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body text-center">
                            <h5 class="card-title">DATA ADMIN</h5>
                            <h3>{{ $totalAdmin }}</h3>
                            <a href="{{ route('admin.dataadmin') }}" class="btn btn-light btn-sm mt-2">View Detail</a>
                        </div>
                    </div>
                </div>

                <!-- Data Petugas -->
                <div class="col-md-3">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-body text-center">
                            <h5 class="card-title">DATA PETUGAS</h5>
                            <h3>{{ $totalPetugas }}</h3>
                            <a href="{{ route('admin.datapetugas') }}" class="btn btn-light btn-sm mt-2">View Detail</a>
                        </div>
                    </div>
                </div>

                <!-- Data Buku -->
                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body text-center">
                            <h5 class="card-title">DATA BUKU</h5>
                            <h3>{{ $totalBuku }}</h3>
                            <a href="{{ route('admin.databuku') }}" class="btn btn-light btn-sm mt-2">View Detail</a>
                        </div>
                    </div>
                </div>

                <!-- Data Peminjaman -->
                <div class="col-md-3">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body text-center">
                            <h5 class="card-title">DATA PEMINJAMAN</h5>
                            <h3>{{ $totalPeminjaman }}</h3>
                            <a href="{{ route('admin.datapeminjam') }}" class="btn btn-light btn-sm mt-2">View Detail</a>
                        </div>
                    </div>
                </div>
            </div>

    

        </div>
    </div>
</div>
@endsection
