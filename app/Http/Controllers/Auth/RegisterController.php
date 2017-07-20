<?php

namespace App\Http\Controllers\Auth;

use App\Domain\Service\UserService;
use App\Http\Requests\RegisterRequest;
use App\Http\Transformer\UserTransformer;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    /**
     * @var UserService
     */
    private $service;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $service)
    {
        $this->middleware('guest');
        $this->service = $service;
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        try {

            event(new Registered($user = $this->service->create($request->all())));
            return response()->json(['message' => 'ok'], 201);

        }catch (\Exception $e){

            \Log::error($e->getMessage(),$e->getTrace());
            return response()->json(['message'=>'Erro não esperado, entre em contato com o administrador'],500);

        }

    }
}
