<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'), // pastikan password di-hash
        ]);
    }
}
