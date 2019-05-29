<?php

namespace App\Http\Controllers\Backend;

use App\Models\HoaDonMua;
use Illuminate\Http\Request;
use DB;
use Auth;

class InvoiceController extends BackendController
{
    public function index()
    {
        $hdm = DB::table('hoadonmua')
                        ->join('nhacungcap', 'hoadonmua.Id_NhaCC', '=', 'nhacungcap.Id_NCC')
                        ->select('hoadonmua.*', 'nhacungcap.TenNCC')
                        ->orderBy('hoadonmua.Id_NhaCC', 'desc')
                        ->get();
        $columns = [
            'ID', 'Tên nhà cung cấp', 'Ngày tạo', 'Tổng tiền', 'Trạng thái' , 'Hành động'
        ];
        return view('backend.invoice.index', compact('hdm', 'columns'));
    }

    public function create()
    {
        $ncc = \App\Models\NhaCungCap::all();
        return view('backend.invoice.add', compact('ncc'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'Id_NhaCC' => 'required',
                'NgayTao' => 'required',
                'NgayCapNhap' => 'required',
                'TongTien'  => 'required'
            ],[
                'Id_NhaCC.required' => 'Tên nhà cung cấp không được để trống',
                'NgayTao.required' => 'Ngày tạo không được để trống',
                'NgayCapNhap.required' => 'Ngày cập nhập không được để trống',
                'TongTien.required' => 'Tổng tiền không được để trống'
            ]
        );

        $request->offsetunset('_token');
       

        $request->merge([
            'NgayTao' => date('Y-m-d',time()),
            'NgayCapNhap' => date('Y-m-d',time()),
        ]);

        if (HoaDonMua::create($request->all())) {
            return redirect()->back()->with('success','Thêm mới hóa đơn mua thành công');
        }else{
            return redirect()->back()->with('error','Thêm mới hóa đơn mua thất bại, vui lòng thử lại');
        }
    }

    public function edit($id)
    {
        $hdm = HoaDonMua::findOrFail($id);
        $ncc = \App\Models\NhaCungCap::all();
        return view('backend.invoice.edit', compact('hdm', 'ncc'));
    }

    public function update(Request $request, $id)
    {
        $hdm = HoaDonMua::findOrFail($id);
        
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
   
        $user = HoaDonMua::findOrFail($id);

        if ($user->delete()) {
            return redirect()->back()->with('success','Xóa thành công');
        }
        else {
            return redirect()->back()->with('error','Xóa không thành công');
        }
    }
}
