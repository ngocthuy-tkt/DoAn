<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

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

    public function banchay()
    {
      $result = DB::table('chitietdonhang')
                   ->leftJoin('sanpham','chitietdonhang.Id_SanPham','=','sanpham.Id_SanPham')
                   ->leftJoin('donhang','chitietdonhang.Id_DonHang','=','donhang.Id_DonHang')
                   ->where('chitietdonhang.SoLuong', '>=', 10) 
                   // ->whereMonth('donhang.NgayTao','=',Carbon::today()->month)
                   ->select('sanpham.TenSP', 'sanpham.MaSP', 'sanpham.LuotXem')
                   // ->groupBy('chitietdonhang.Id_SanPham')->havingRaw('COUNT(*) < 3')
                   ->get();
      return view('backend.report.banchay', compact('result'));
    }

    public function bancham()
    {
      $pro = DB::table('chitietdonhang')
                   ->leftJoin('sanpham','chitietdonhang.Id_SanPham','=','sanpham.Id_SanPham')
                   ->leftJoin('donhang','chitietdonhang.Id_DonHang','=','donhang.Id_DonHang')
                   ->where('chitietdonhang.SoLuong', '<=', 3) 
                   // ->whereMonth('donhang.NgayTao','=',Carbon::today()->month)
                   ->select('sanpham.TenSP', 'sanpham.MaSP', 'sanpham.LuotXem')
                   // ->groupBy('chitietdonhang.Id_SanPham')->havingRaw('COUNT(*) < 3')
                   ->get();

      return view('backend.report.bancham', compact('pro'));
    }

    public function hanghet()
    {
      $pro = DB::table('sanpham')
                   ->where('soluong', '<', 5) 
                   ->select('sanpham.TenSP', 'sanpham.MaSP', 'sanpham.LuotXem', 'sanpham.soluong')
                   ->paginate(5);    
                  
      return view('backend.report.hanghet', compact('pro'));
    }
}
