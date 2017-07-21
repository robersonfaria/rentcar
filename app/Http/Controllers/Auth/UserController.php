<?php
namespace App\Http\Controllers\Auth;


use App\Domain\Service\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * @var UserService
     */
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function update(Request $request){
        try {
            $this->service->update($request->user(), $request->all());
            return response()->json(['data'=>['message'=>'Your data has been updated.']],200);
        } catch (\Exception $e){
            \Log::error($e->getMessage(),$e->getTrace());
            return response()->json(['data'=>['message'=>'Erro não esperado, entre em contato com o administrador']],500);
        }
    }

}