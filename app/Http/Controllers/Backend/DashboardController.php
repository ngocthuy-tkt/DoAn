<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends BackendController
{
    public function index()
    {
        $customer = \App\Models\User::count();
        $order = \App\Models\Order::count();
        $total = \App\Models\Order::where('TrangThai', '=', 2)->sum('TongTien');
        $user = \App\Models\NhanVien::count();
        return view('backend.dashboard.index', compact('customer', 'order', 'total', 'user'));
    }

    public function listProductSelling($id)
    {
    	$product = \App\Models\Order::where('Id_SanPham', '=', $id)->count();dd($product);
    }
}
