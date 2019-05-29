<?php

namespace App\Http\Controllers\Backend;

use App\Models\HoaDonBan;
use Illuminate\Http\Request;
use DB;
use Auth;

class BillOfSaleController extends BackendController
{
    public function index()
    {
        $hdb = DB::table('hoadonban')
                        ->join('nhanvien', 'hoadonban.Id_NhanVien', '=', 'nhanvien.Id_NhanVien')
                        ->select('hoadonban.*', 'nhanvien.HoTen')
                        ->orderBy('hoadonban.Id_HoaDonBan', 'desc')
                        ->get();
        $columns = [
            'ID', 'Tên nhân viên', 'Tên khách hàng', 'Sdt', 'Địa chỉ' , 'Tổng tiền', 'Ngày tạo','Hành động'
        ];
        return view('backend.bill.index', compact('hdb', 'columns'));
    }

    public function create()
    {
        return view('backend.bill.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'TenNguoiNhan' => 'required',
                'Sdt' => 'required',
                'DiaChi' => 'required',
                'GhiChu'  => 'required',
                // 'Tongtien' => 'required'
            ],[
                'TenNguoiNhan.required' => 'Tên người nhận không được để trống',
                'Sdt.required' => 'Số điện thoại không được để trống',
                'DiaChi.required' => 'Địa chỉ không được để trống',
                'GhiChu.required' => 'Ghi chú không được để trống',
                // 'TongTien.required' => 'Tổng tiền không được để trống'
            ]
        );

        $request->offsetunset('_token');

        $data = [
            'NgayTao' => date('Y-m-d',time()),
            'NgayCapNhap' => date('Y-m-d',time()),
            'Id_NhanVien' => Auth::guard('admin')->user()->Id_NhanVien,
            'TongTien' => $request->TongTien,
            'TenNguoiNhan' => $request->TenNguoiNhan,
            'Sdt' => $request->Sdt,
            'DiaChi' => $request->DiaChi,
            'GhiChu' => $request->GhiChu,
            'TrangThai' => $request->TrangThai
        ];

        if (HoaDonBan::create($data)) {
            return redirect()->back()->with('success','Thêm mới hóa đơn bán thành công');
        }else{
            return redirect()->back()->with('error','Thêm mới hóa đơn bán thất bại, vui lòng thử lại');
        }
    }

    public function edit($id)
    {
        $hdm = HoaDonBan::findOrFail($id);
        $ncc = \App\Models\NhaCungCap::all();
        return view('backend.invoice.edit', compact('hdm', 'ncc'));
    }

    public function update(Request $request, $id)
    {
        $hdm = HoaDonBan::findOrFail($id);
        
        $request->offsetunset('_token');

        $hdm->Id_NhaCC = $request->Id_NhaCC;
        $hdm->NgayTao = $request->NgayTao;
        $hdm->NgayCapNhap = $request->NgayCapNhap;
        $hdm->TongTien = $request->TongTien;
        $hdm->TrangThai = 1;
        $check = $hdm->save();
        if ($check){
            return redirect()->route('invoice.index')->with('success','Sửa thành công');
        }
        else{
            return redirect()->back()->with('error','Sửa thất bại, vui lòng thử lại');
        }
    }


    public function destroy($id)
    {
   
        $user = HoaDonBan::findOrFail($id);

        if ($user->delete()) {
            return redirect()->back()->with('success','Xóa thành công');
        }
        else {
            return redirect()->back()->with('error','Xóa không thành công');
        }
    }
}
