<?php

namespace App\Providers;

use Illuminate\Contracts\Routing\Registrar;
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
        $this->mapRoutes();
    }

    protected function mapRoutes()
    {
        Route::group(['namespace' => "{$this->namespace}", 'middleware' => 'api'], function (Registrar $router) {
            foreach ($this->getRouteFiles() as $file) {
                $namespace = basename($file, '.php');
                $router->group(['namespace' => $namespace], function (Registrar $router) use ($namespace) {
                    $this->app->make("App\\Http\\Routes\\$namespace")->map($router);
                });
            }
        });
    }

    private function getRouteFiles()
    {
        return glob(app_path('Http//Routes') . '/*.php');
    }
}
