@extends('layoutspeminjam.app')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard Peminjam</h1>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <p>Grafik</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <p>Grafik</p>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('petugas.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger mt-3">Logout</button>
            </form>
        </div>
    </div>
</div>
@endsection
