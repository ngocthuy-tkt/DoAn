<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\ResgisterRequest;

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
            'password' => bcrypt($request->password),
            'gender'   => $request->gender,
            'created_at' => Carbon::now()
        ]);

        if (User::create($request->all())) {
            return redirect()->back()->with('success','Đăng ký thành công');
        }else{
            return redirect()->back()->with('error','Đăng ký thất bại, vui lòng thử lại');
        }
    }
}
