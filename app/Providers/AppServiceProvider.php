<?php

namespace App\Providers;

use App\Interfaces\IRepositories\CentroMedicoAdm\EspecialidadeRepositoryInterface;
use App\Interfaces\IServices\CentroMedicoAdm\EspecialidadeServiceInterface;
use App\Repositories\CentroMedicoAdm\EspecialidadeRepository;
use App\Services\CentroMedicoAdm\EspecialidadeService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EspecialidadeRepositoryInterface::class, EspecialidadeRepository::class);

        // Registro do serviço EspecialidadeService
        $this->app->bind(EspecialidadeServiceInterface::class, EspecialidadeService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
