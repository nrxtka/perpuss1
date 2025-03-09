<?php
// app/Models/Peminjam.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Peminjam extends Authenticatable
{
    use Notifiable;

    protected $table = 'peminjam';
    protected $primaryKey = 'id_peminjam';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'email',
        'username',
        'password',
        'alamat'
    ];

    protected $hidden = [
        'password',
    ];
}