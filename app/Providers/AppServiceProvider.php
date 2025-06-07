<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

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
        
    // Route::middleware('web')
    //     ->middleware(['auth', AdminMiddleware::class]) // tambahkan di sini jika semua route pakai
    //     ->group(base_path('routes/web.php'));
    }
}
