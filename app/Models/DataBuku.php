<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBuku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    public $timestamps = true;

    protected $fillable = [
        'judul_buku',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'id_kategoribuku',
        'cover',
        'stok',
    ];
    public function kategori()
    {
        return $this->belongsTo(KategoriBuku::class, 'id_kategoribuku', 'id_kategoribuku');

    }
    
}
