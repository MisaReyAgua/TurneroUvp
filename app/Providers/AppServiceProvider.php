<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ModuloService;

/**
 * Proveedor de servicios de la aplicación.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Registra cualquier servicio de la aplicación.
     *
     * @return void
     */
    public function register()
    {
        // Registrar ModuloService como un singleton
        $this->app->singleton(ModuloService::class, function ($app) {
            return new ModuloService();
        });
    }

    /**
     * Inicia cualquier servicio de la aplicación.
     *
     * @return void
     */
    public function boot()
    {
        // Código de inicio de la aplicación (si es necesario)
    }
}
