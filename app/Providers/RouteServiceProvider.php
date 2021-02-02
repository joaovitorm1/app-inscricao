<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));
            /* INSCRICAO */
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/inscricaoRoutes.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            /* ADMINISTRAÇÃO */
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/adm/administracaoRoutes.php'));
                
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/adm/dashboardRoutes.php'));

            /* INSCRICAO */
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/adm/inscricoesRoutes.php'));

            /* CADASTROS */
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/adm/config/cadastro/cargoRoutes.php'));
            
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/adm/config/cadastro/editalRoutes.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/adm/config/cadastro/grupoOcupacionalRoutes.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/adm/config/cadastro/requisitoRoutes.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/adm/config/cadastro/tituloRoutes.php'));
            
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/adm/config/cadastro/LocalCargoRoutes.php'));
            
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/adm/config/cadastro/tipoCargoRoutes.php'));
            
           /* SEGURANÇA */
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/adm/config/seguranca/permissaoRoutes.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/adm/config/seguranca/grupoUsuarioRoutes.php'));
            
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/adm/config/seguranca/usuarioRoutes.php'));
            
            /* HOMOLOGAÇÃO */
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/adm/config/homologacao/auditoriaRoutes.php'));

        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
