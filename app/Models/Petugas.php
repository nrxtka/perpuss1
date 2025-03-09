<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    public $timestamps = true;

    protected $fillable = [
        'nama_petugas', 'email', 'username', 'password', 'alamat'
    ];
}
