<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPeminjam extends Model
{
    use HasFactory;

    protected $table = 'peminjam'; // Pastikan nama tabel sesuai dengan database kamu
    protected $primaryKey = 'id_peminjam'; // Sesuaikan dengan primary key di database

    protected $fillable = [
        'nama', 'email', 'username', 'password', 'alamat',
    ];

    protected $hidden = [
        'password',
    ];
}
