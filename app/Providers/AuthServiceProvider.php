<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Petugas;
use App\Policies\PeminjamanPolicy;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Petugas::class => PeminjamanPolicy::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
