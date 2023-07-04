<?php

namespace App\Providers;

use App\Services\JobService;
use App\Services\CompanyService;
use App\Services\CandidateService;
use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\JobServiceInterface;
use App\Services\Interfaces\CompanyServiceInterface;
use App\Services\Interfaces\CandidateServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CandidateServiceInterface::class, CandidateService::class);
        $this->app->bind(CompanyServiceInterface::class, CompanyService::class);
        $this->app->bind(JobServiceInterface::class, JobService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
