<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /**
     * Show the application’s login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('backend.layout.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    protected function login(Request $rq)
    {

        $this->validate($rq,
            [
                'login_name' => 'required',
                'password' => 'required | min:3 | max:40'
            ], [
                'login_name.required' => 'Tên đăng nhập không được để trống',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu không được nhỏ hơn 3 ký tự',
                'password.max' => 'Mật khẩu không được lớn hơn 40 ký tự'
            ]
        );

        $data = [
            'MaNV' => $rq->login_name,
            'password' => $rq->password,
            'TrangThai' => 1
        ];

        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin');
        } else {
            return redirect()->route('admin.login')->with('thongbao', 'Tài khoản hoặc mật khẩu không đúng hoặc bạn chưa được active tài khoản');
        }
    }

    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
