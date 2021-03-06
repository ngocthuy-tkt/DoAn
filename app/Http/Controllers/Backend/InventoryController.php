<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HangLoi;
use App\Models\Product;

class InventoryController extends Controller
{
    public function index()
    {
    	$hangloi = \DB::table('HangLoi')
    				->join('sanpham', 'HangLoi.Id_SanPham', '=', 'sanpham.Id_SanPham')
    				->select('HangLoi.*', 'sanpham.MaSp')
    				->orderBy('HangLoi.id', 'desc')
    				->get();
        $columns = [
            'ID', 'Mã sản phẩm', 'Mã đơn hàng','Số lượng', 'Giá tiền', 'Ngày tạo','Ghi chú'
        ];

        return view('backend.inventory.index', compact('hangloi', 'columns'));
    }

    public function create()
    {
    	$sanpham = Product::get();
    	return view('backend.inventory.add', compact('sanpham'));
    }

    public function store(Request $request)
    {
    	$this->validate($request,
            [
                'Id_SanPham' => 'required',
                'SoLuong' => 'required',
                'GhiChu' => 'required',
                'MaDonHang' => 'required',
                'GiaTien' => 'required',
                'NgayTao' => 'required',
            ],[
                'Id_SanPham.required' => 'Bạn chưa chọn sản phẩm',
                'SoLuong.required' => 'Bạn chưa nhập số lượng',
                'GhiChu.required' => 'Bạn chưa ghi chú',
                'MaDonHang.required' => 'Bạn chưa nhập mã đơn hàng',
                'GiaTien.required' => 'Bạn chưa nhập giá tiền',
                'NgayTao.required' => 'Bạn chưa nhập ngày tạo',
            ]
        );

        $request->offsetunset('_token');
      

        if (HangLoi::create($request->all())) {
            return redirect()->back()->with('success','Thêm mới thành công');
        }else{
            return redirect()->back()->with('error','Thêm mới thất bại, vui lòng thử lại');
        }
    }
}
