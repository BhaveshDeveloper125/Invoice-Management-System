<?php

namespace App\Providers;

use App\Models\Invoice;
use Illuminate\Support\ServiceProvider;
use App\Observers\InvoiceObserver;
use Illuminate\Support\Facades\Route as FacadesRoute;

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
        // FacadesRoute::domain('https://blog.14a2-2402-a00-405-cfe6-30fd-e256-1aea-9364.ngrok-free.app')->group(base_path('routes/sub_domain.php'));
        Invoice::observe(InvoiceObserver::class);
    }
}
