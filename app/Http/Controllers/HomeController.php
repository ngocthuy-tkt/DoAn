<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\ResgisterRequest;
use App\Http\Requests\LoginRequest;
use Hash;

class HomeController extends FrontEndController
{
    public function index()
    {
        $products = Product::where('Sp_Hot', '=', 1)
            ->orderBy('Id_SanPham', 'desc')
            ->paginate(8);
        
        $listItemsProduct = Product::paginate(8);
        return view('home', compact('products', 'listItemsProduct'));
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
    public function creat(ResgisterRequest $request)
    {
        $request->offsetunset('_token');
        $request->merge([
            'MatKhau' => bcrypt($request->MatKhau),
            'NgayTao' => Carbon::now()
        ]);

        if (KhachHang::create($request->all())) {
            return redirect()->back()->with('success','Đăng ký thành công');
        }else{
            return redirect()->back()->with('error','Đăng ký thất bại, vui lòng thử lại');
        }
    }

    public function postLogin(LoginRequest $request)
    {
        // $pwd = $request->MatKhau;
        // $hash = Hash::make($pwd);
        // dd(Hash::check($pwd, $hash));
        if (Auth::guard('web')->attempt(['email' => $request->email, 'MatKhau' => Hash::make($request->MatKhau)])) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }
}
