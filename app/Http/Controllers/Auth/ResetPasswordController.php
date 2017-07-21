<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function sendResetResponse($response)
    {
        return response()->json(['data'=>['message'=>trans($response)]]);
    }
//http://localhost/password/reset?336c34054216c6cb301711c945629ce214942b2808ce098554e4fa63ff6001ea
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response()->json(['data'=>['message'=>trans($response)]]);
//        return redirect()->back()
//            ->withInput($request->only('email'))
//            ->withErrors(['email' => trans($response)]);
    }
}
