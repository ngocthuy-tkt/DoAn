<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('web');
    }

    protected function login(LoginRequest $rq)
    {
        if (Auth::guard('web')->attempt(['email' => $rq->email, 'MatKhau' => $rq->MatKhau])) {
            return redirect()->route('home');
        } else {
            return redirect()->route('home')->with('thongbao', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }
    protected function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('home');
    }
}
