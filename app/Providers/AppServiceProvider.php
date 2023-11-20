<?php

namespace App\Providers;

use App\Models\Servico;
use Exception;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
    public function boot()
    {
        
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        try {
            $servicos = Servico::select('id', 'descricao')->orderBy('descricao', 'asc')->get();
            view()->share('servicos', $servicos);
        } catch (Exception $e) {
            echo "Excção capturada no boot: ". $e->getMessage();
        }
    }
}
