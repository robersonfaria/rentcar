<?php
namespace App\Http\Routes;


use Illuminate\Routing\Router;

class Advertisement
{

    public function map(Router $router){

        $router->resource('/advertisements','AdvertisementController',['middleware'=>'auth:api','except'=>['create']]);
    }
}