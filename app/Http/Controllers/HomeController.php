<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends FrontEndController
{
    public function index()
    {
        $products = Product::where('Sp_Hot', '=', 1)
            ->orderBy('Id_SanPham', 'desc')
            ->paginate(8);
        return view('home', compact('products'));
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function signupForm(){
        if (Auth::check())
        {
            return redirect('/');
        }
        return view('dangky');
    }
    public function creat(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:4|confirmed',
                'phone'  => 'min:9| max:11',

            ],[
                'name.required' => 'Họ tên không được để trống',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.confirmed' => 'Mật khẩu không khớp',
                'password.min' => 'Mật khẩu quá ngắn',
                'phone.min' => 'Số điện thoại không đúng',
                'phone.max' => 'Số điện thoại không đúng',
            ]
        );

        $request->offsetunset('_token');
        $request->merge([
            'password' => bcrypt($request->password)
        ]);

        if (User::create($request->all())) {
            return redirect()->back()->with('success','Đăng ký thành công');
        }else{
            return redirect()->back()->with('error','Đăng ký thất bại, vui lòng thử lại');
        }
    }
}
