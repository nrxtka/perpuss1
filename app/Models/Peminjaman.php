<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    public $timestamps = true; // created_at & updated_at

    protected $fillable = [
        'id_peminjam',
        'id_buku',
        'tgl_peminjam',
        'tgl_pengembalian',
        'status_peminjaman'
    ];

    public function peminjam()
    {
        return $this->belongsTo(DataPeminjam::class, 'id_peminjam', 'id_peminjam');
    }

    public function buku()
    {
        return $this->belongsTo(DataBuku::class, 'id_buku', 'id_buku')->withDefault();
    }
}
