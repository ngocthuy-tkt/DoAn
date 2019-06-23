<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

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
                'TenNguoiNhan' => 'required',
                'KieuThanhToan' => 'required',
                'email' => 'required|email',
                'DiaChi' => 'required',
                'Sdt'  => 'min:9| max:11',

            ],[
                'TenNguoiNhan.required' => 'Họ tên không được để trống',
                'KieuThanhToan.required' => 'Phương thức thanh toán không được để trống',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng',
                'DiaChi.required' => 'Bạn chưa nhập địa chỉ giao hàng',
                'Sdt.min' => 'Số điện thoại không đúng',
                'Sdt.max' => 'Số điện thoại không đúng',
            ]
        );

        $id = Auth::user()->id;
        $request->offsetunset('_token');
        $ship = $request->ship;
        $total = str_replace(',', '', \Cart::subtotal()) + $ship;
        $products_cart = $this->cartRepository->getAllSession();
        $contents = \Cart::content()->map(function($item){
            return $item->id; 
        })->values();
        $size = \Cart::content()->map(function($item){
            return $item->options->size; 
        })->values();
        $data = [
            'NgayTao' => Carbon::now(),
            'NgayCapNhap' => Carbon::now(),
            'TongTien' => $total,
            'TenNguoiNhan' => $request->TenNguoiNhan,
            'email' => $request->email,
            'Sdt' => $request->Sdt,
            'DiaChi' => $request->DiaChi,
            'GhiChu' => $request->GhiChu,
            'Id_KhachHang' => $id,
            'KieuThanhToan' => $request->KieuThanhToan,
            'Id_SanPham' => $contents[0],
            'size' => $size[0],
            'ship' => $ship
        ];
        
        if ($od = Order::create($data)) {
            foreach (\Cart::content() as $value) {
                $data = [
                    'Id_DonHang' => $od->Id_DonHang,
                    'Id_SanPham' => $value->id,
                    'SoLuong' => $value->qty,
                    'DonGia' => $value->price,
                    'TenSp' => $value->name
                ];

                if($detail = OrderDetail::create($data)) {
                    $id = $detail->Id_SanPham;
                    $Sp = Product::find($id);
                    $data = [
                        'SoLuong' => ($Sp->SoLuong)-($detail->SoLuong)
                    ];

                    $Sp->update($data);
                }    
            }
            \Cart::instance('default')->destroy();
            return view('thongbao')->with('success','Đặt hàng thành công');
        }
        return view('thongbao')->with('error','Đặt hàng không thành công');
    }
}
