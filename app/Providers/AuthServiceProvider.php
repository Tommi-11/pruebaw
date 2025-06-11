<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\SeguimientoEgresado;
use App\Policies\SeguimientoEgresadoPolicy;
use App\Models\RSU;
use App\Policies\RSUPolicy;
use App\Models\ProyeccionSocial;
use App\Policies\ProyeccionSocialPolicy;
use App\Models\ExtensionUniversitaria;
use App\Policies\ExtensionUniversitariaPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        SeguimientoEgresado::class => SeguimientoEgresadoPolicy::class,
        RSU::class => RSUPolicy::class,
        ProyeccionSocial::class => ProyeccionSocialPolicy::class,
        ExtensionUniversitaria::class => ExtensionUniversitariaPolicy::class,
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
