<?php
namespace App\Http\Routes;


use Illuminate\Routing\Router;

class Advertisement
{

    public function map(Router $router)
    {
        $router->get('/advertisements/search', 'AdvertisementController@search');

        $router->group(['middleware' => 'auth:api'], function() use ($router){
            $router->resource('/advertisements','AdvertisementController',['except'=>['create','edit', 'show']]);

            $router->post('/advertisements/{uuid}', 'AdvertisementController@showByUser');

            $router->post('/advertisements/{uuid}/toogle-published', 'AdvertisementController@tooglePublished');
        });

        $router->get('/advertisement/{uuid}', 'AdvertisementController@publicView');

        $router->get('/advertisement/{uuid}/images', 'AdvertisementController@getImagens');

    }
}