<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\DataBuku;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('layoutspetugas.navbar', function ($view) {
            $bukuHabis = DataBuku::where('stok', 0)->get();
            $bukuHampirHabis = DataBuku::where('stok', '<=', 5)->where('stok', '>', 0)->get();

            $view->with('bukuHabis', $bukuHabis)->with('bukuHampirHabis', $bukuHampirHabis);
        });
    }

    public function register()
    {
        //
    }
}
