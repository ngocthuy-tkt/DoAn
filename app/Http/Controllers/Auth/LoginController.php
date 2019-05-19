<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected function guard()
    {
        return Auth::guard('web');
    }

    protected function login(Request $rq)
    {
        $this->validate($rq,
            [
                'email' => 'required|email',
                'password' => 'required | min:3 | max:40'
            ], [
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu không được nhỏ hơn 3 ký tự',
                'password.max' => 'Mật khẩu không được lớn hơn 40 ký tự'
            ]
        );

        if (Auth::guard('web')->attempt(['email' => $rq->email, 'password' => $rq->password])) {
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
}
