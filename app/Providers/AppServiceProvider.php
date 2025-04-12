<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\DataBuku; // <- pastikan sesuai dengan namespace model DataBuku kamu

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Kirim data stok buku habis dan hampir habis ke navbar
        View::composer('layoutsadmin.navbar', function ($view) {
            $bukuHabis = DataBuku::where('stok', 0)->get();
            $bukuHampirHabis = DataBuku::where('stok', '<=', 5)
                ->where('stok', '>', 0)
                ->get();

            $view->with('bukuHabis', $bukuHabis)
                 ->with('bukuHampirHabis', $bukuHampirHabis);
        });
    }
}
