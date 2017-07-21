<?php
namespace App\Http\Routes;


use Illuminate\Routing\Router;

class Auth
{

    public function map(Router $router)
    {

        $router->post('register', 'RegisterController@register');

        $router->post('login', 'LoginController@login');

        $router->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        $router->post('password/reset', 'ResetPasswordController@reset')->name('password.reset');

        $router->put('me', 'UserController@update')->middleware('auth:api');

    }
}