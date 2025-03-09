<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    use HasFactory;

    protected $table = 'kategoribuku';

    protected $primaryKey = 'id_kategoribuku'; 

    public $timestamps = true; 

    protected $fillable = [
        'kategori_buku',
    ];
    
}
