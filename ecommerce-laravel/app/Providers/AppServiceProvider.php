<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // Share cart count with all views
    View::composer('*', function ($view) {
        $cart = session()->get('cart', []);
        $view->with('cartCount', array_sum(array_column($cart, 'quantity')));
    });
    }
}
