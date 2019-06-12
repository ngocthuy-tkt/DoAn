<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PhieuHang;

class EnterCouponController extends Controller
{
    public function index()
    {
    	$columns = [
    		'ID', 'Tên nhà cung cấp', 'Ngày tạo', 'Ngày cập nhập', 'Tổng tiền', 'Ghi chú', 'Trạng Thái', 'Hành động'
    	];
    	$phieunhap = \DB::table('phieuhang')
                        ->join('nhacungcap', 'phieuhang.Id_NhaCC', '=', 'nhacungcap.Id_NCC')
                        ->select('phieuhang.*', 'nhacungcap.TenNCC')
                        ->orderBy('phieuhang.id', 'desc')
                        ->get();
    	return view('backend.coupon.index', compact('phieunhap', 'columns'));
    }

    public function create()
    {
        $ncc = \App\Models\NhaCungCap::all();
    	return view('backend.coupon.add', compact('ncc'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'Id_NhaCC' => 'required',
                'NgayTao' => 'required',
                'NgayCapNhap' => 'required',
                'TongTien'  => 'required',
                "GhiChu" => 'required'
            ],[
                'Id_NhaCC.required' => 'Tên nhà cung cấp không được để trống',
                'NgayTao.required' => 'Ngày tạo không được để trống',
                'NgayCapNhap.required' => 'Ngày cập nhập không được để trống',
                'TongTien.required' => 'Tổng tiền không được để trống',
                'GhiChu.required' => 'Bạn chưa nhập ghi chú'
            ]
        );

        $request->offsetunset('_token');
       

        $request->merge([
            'NgayTao' => date('Y-m-d',time()),
            'NgayCapNhap' => date('Y-m-d',time()),
        ]);

        if (PhieuHang::create($request->all())) {
            return redirect()->back()->with('success','Thêm mới phiếu hàng thành công');
        }else{
            return redirect()->back()->with('error','Thêm mới phiếu hàng thất bại, vui lòng thử lại');
        }
    }

    public function edit($id)
    {
        $ph = PhieuHang::findOrFail($id);
        $ncc = \App\Models\NhaCungCap::all();
        return view('backend.coupon.edit', compact('ph', 'ncc'));
    }

    public function update(Request $request, $id)
    {
        $ph = PhieuHang::findOrFail($id);
        
        $request->offsetunset('_token');

        $ph->Id_NhaCC = $request->Id_NhaCC;
        $ph->NgayTao = $request->NgayTao;
        $ph->NgayCapNhap = $request->NgayCapNhap;
        $ph->TongTien = $request->TongTien;
        $ph->GhiChu = $request->GhiChu;
        $ph->TrangThai = 1;
        $check = $ph->save();
        if ($check){
            return redirect()->route('phieunhap.index')->with('success','Sửa thành công');
        }
        else{
            return redirect()->back()->with('error','Sửa thất bại, vui lòng thử lại');
        }
    }


    public function destroy($id)
    {
   
        $user = PhieuHang::findOrFail($id);

        if ($user->delete()) {
            return redirect()->back()->with('success','Xóa thành công');
        }
        else {
            return redirect()->back()->with('error','Xóa không thành công');
        }
    }
}
