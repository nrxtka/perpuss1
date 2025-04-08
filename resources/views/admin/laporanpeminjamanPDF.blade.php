<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        td { font-size: 11px; }
    </style>
</head>
<body>
    <h2 style="text-align: center; margin-bottom: 5px;">Laporan Peminjaman Buku</h2>
    
    @if($dari_tanggal && $sampai_tanggal)
        <p style="text-align: center; margin-top: 0;">
            Periode: <strong>{{ \Carbon\Carbon::parse($dari_tanggal)->format('d-m-Y') }}</strong> s/d 
            <strong>{{ \Carbon\Carbon::parse($sampai_tanggal)->format('d-m-Y') }}</strong>
        </p>
    @endif

    <table>
        <thead>
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
                        Dipinjam
                    @elseif($item->status_peminjaman == 'dikembalikan')
                        Dikembalikan
                    @else
                        Belum Dikembalikan
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
