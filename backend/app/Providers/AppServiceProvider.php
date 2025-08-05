<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

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
        //
        // parent::boot();

        Route::middleware('web')
            ->group(base_path('routes/e-commerce.php'));

        Route::middleware('web')
            ->group(base_path('routes/warehouse.php'));
    }
}
