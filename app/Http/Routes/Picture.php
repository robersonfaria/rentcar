<?php
namespace App\Http\Routes;


use Illuminate\Routing\Router;

class Picture
{

    public function map(Router $router)
    {

        $router->group(['middleware' => 'auth:api'], function() use ($router){

            $router->post('/advertisements/{uuid}/pictures','PictureController@create');

            $router->delete('/advertisements/{uuid}/pictures/{file}', 'PictureController@destory');

        });

    }
}