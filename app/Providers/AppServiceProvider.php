<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        // quantidade de itens do carrinho no ícone do menu
        View::composer('partials.menu', function ($view) {
            $view->with('qtdCarrinho', array_sum(session('carrinho', [])));
        });
    }
}
