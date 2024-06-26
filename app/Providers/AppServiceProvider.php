<?php

namespace App\Providers;

use App\Interfaces\IRepositories\CandidateRepositoryInterface;
use App\Interfaces\IRepositories\CentroMedicoAdm\EspecialidadeRepositoryInterface;
use App\Interfaces\IRepositories\ContatoRepositoryInterface;
use App\Interfaces\IRepositories\CRUDRepositoryInterface;
use App\Interfaces\IRepositories\UploadImagemRepositoryInterface;
use App\Interfaces\IServices\CandidateServiceInterface;
use App\Interfaces\IServices\CentroMedicoAdm\EspecialidadeServiceInterface;
use App\Interfaces\IServices\ContatoServiceInterface;
use App\Interfaces\IServices\CRUDServiceInterface;
use App\Interfaces\IServices\UploadImagemServiceInterface;
use App\Repositories\CandidateRepository;
use App\Repositories\CentroMedicoAdm\EspecialidadeRepository;
use App\Repositories\ContatoRepository;
use App\Repositories\CRUDRepository;
use App\Repositories\UploadImagemRepository;
use App\Services\CandidateService;
use App\Services\CentroMedicoAdm\EspecialidadeService;
use App\Services\ContatoService;
use App\Services\CRUDService;
use App\Services\UploadImagemService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EspecialidadeRepositoryInterface::class, EspecialidadeRepository::class);
        $this->app->bind(EspecialidadeServiceInterface::class, EspecialidadeService::class);

        $this->app->bind(ContatoRepositoryInterface::class, ContatoRepository::class);
        $this->app->bind(ContatoServiceInterface::class, ContatoService::class);

        $this->app->bind(CRUDRepositoryInterface::class, CRUDRepository::class);
        $this->app->bind(CRUDServiceInterface::class, CRUDService::class);

        $this->app->bind(UploadImagemRepositoryInterface::class, UploadImagemRepository::class);
        $this->app->bind(UploadImagemServiceInterface::class, UploadImagemService::class);

        $this->app->bind(CandidateRepositoryInterface::class, CandidateRepository::class);
        $this->app->bind(CandidateServiceInterface::class, CandidateService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
