<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends FrontEndController
{
    public function index()
    {
        $products_cart = $this->cartRepository->getAllSession();
        if (Auth::check()) {
            return view('thanhtoan', compact('products_cart'));
        }
        return redirect()->route('login');
    }

    public function order(Request $request)
    {

        $this->validate($request,
            [
                'name' => 'required',
                'payment_type' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'phone'  => 'min:9| max:11',

            ],[
                'name.required' => 'Họ tên không được để trống',
                'payment_type.required' => 'Phương thức thanh toán không được để trống',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng',
                'address.required' => 'Bạn chưa nhập địa chỉ giao hàng',
                'phone.min' => 'Số điện thoại không đúng',
                'phone.max' => 'Số điện thoại không đúng',
            ]
        );

        $request->offsetunset('_token');
        $products_cart = $this->cartRepository->getAllSession();
        if ($od = Order::create($request->all())) {
            foreach ($products_cart as $item) {
                OrderDetail::create([
                    'order_id' => $od->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['qty'],
                    'price' => $item['price'],
                    'name' => $item['name'],
                    'picture' => $item['image'],
                ]);
            }
            Session::put('cart', []);
            return view('thongbao')->with('success','Đặt hàng thành công');
        }
        return view('thongbao')->with('error','Đặt hàng không thành công');
    }
}
