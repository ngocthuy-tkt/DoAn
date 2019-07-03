<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;
use Auth;

class OrderController extends BackendController
{
    public function index()
    {
        $columns = [
            'ID', 'Mã đơn hàng','Tên khách hàng', 'Số điện thoại', 'Địa chỉ', 'Tổng tiền', 'Ghi chú', 'Phương thức', 'Ship','Trạng thái' , 'Hành động'
        ];

        $orders =DB::table('donhang')
                        ->join('sanpham', 'donhang.Id_SanPham', '=', 'sanpham.Id_SanPham')
                        ->join('chitietdonhang', 'donhang.Id_DonHang', '=', 'chitietdonhang.Id_DonHang')
                        ->where('donhang.TrangThai', '=', 0)
                        ->orwhere('donhang.TrangThai', '=', 1)
                        ->select('donhang.*', 'sanpham.TenSp', 'chitietdonhang.SoLuong')
                        ->get();
        
        $orderSucc = DB::table('donhang')->where('donhang.TrangThai', '=' , 2)
                                        ->join('sanpham', 'donhang.Id_SanPham', '=', 'sanpham.Id_SanPham')
                                        ->join('chitietdonhang', 'donhang.Id_DonHang', '=', 'chitietdonhang.Id_DonHang')
                                        ->select('donhang.*', 'sanpham.TenSp', 'chitietdonhang.SoLuong')
                                        ->get();
        $orderCan = DB::table('donhang')->where('donhang.TrangThai', '=' , -1)
                                        ->join('sanpham', 'donhang.Id_SanPham', '=', 'sanpham.Id_SanPham')
                                        ->join('chitietdonhang', 'donhang.Id_DonHang', '=', 'chitietdonhang.Id_DonHang')
                                        ->select('donhang.*', 'sanpham.TenSp', 'chitietdonhang.SoLuong')->get();
        return view('backend.order.index', compact('orders', 'columns', 'orderSucc', 'orderCan'));
    }

    public function edit($id)
    {
    	$editOrder = DB::table('donhang')
    		->where('Id_DonHang', '=', $id)
            ->select('donhang.*')
            ->first();   
        return view('backend.order.edit', compact('editOrder'));    
    }

    public function update(Request $request, $id)
    {
    	$orders = Order::find($id);
    	$id = Auth::guard('admin')->user()->Id_NhanVien;
    	$data = [
    		'Id_NhanVien' => $id,
    		'TrangThai' => $request->TrangThai
    	];

    	try {
            if($orders->update($data)) {
                return redirect()->back()->with('success','Cập nhập thành công');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error','Sửa thất bại, vui lòng thử lại');
        }
    }
}
