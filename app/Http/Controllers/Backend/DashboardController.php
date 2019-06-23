<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class DashboardController extends BackendController
{
    public function index()
    {
        $customer = \App\Models\User::count();
        $order = \App\Models\Order::count();
        $total = \App\Models\Order::where('TrangThai', '=', 2)->sum('TongTien');
        $user = \App\Models\NhanVien::count();

        $result = DB::table('donhang')
                    ->leftJoin('sanpham','donhang.Id_SanPham','=','sanpham.Id_SanPham')
                   ->leftJoin('chitietdonhang','chitietdonhang.Id_DonHang','=','donhang.Id_DonHang')
                   ->select('sanpham.TenSP', 'sanpham.MaSP', 'sanpham.LuotXem')
                   ->groupBy('chitietdonhang.Id_SanPham')->havingRaw('COUNT(*) > 10')
                   ->get();

        $pro = DB::table('donhang')
                    ->leftJoin('sanpham','donhang.Id_SanPham','=','sanpham.Id_SanPham')
                   ->leftJoin('chitietdonhang','chitietdonhang.Id_DonHang','=','donhang.Id_DonHang')
                   ->select('sanpham.TenSP', 'sanpham.MaSP', 'sanpham.LuotXem')
                   ->groupBy('chitietdonhang.Id_SanPham')->havingRaw('COUNT(*) > 3')
                   ->get();           

        return view('backend.dashboard.index', compact('customer', 'order', 'total', 'user', 'result', 'pro'));
    }
}
