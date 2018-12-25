<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $mynamespace = [
        'User'
    ];

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {

//        if (session('locale')) {
//
//            app()->setlocale(session('locale'));
//        }
        $this->mapApiRoutes();

        $this->mapWebRoutes();
        foreach ($this->mynamespace as $path) {
            $namespace = 'App\Packages\\' . $path . '\Controller';
            Route::prefix('api')
                ->middleware('api')
                ->namespace($namespace)
                ->group(base_path('app/Packages/' . $path . '/Route/api.php'));
            Route::middleware('web')
                ->namespace($namespace)
                ->group(base_path('app/Packages/' . $path . '/Route/routes.php'));
        }
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
