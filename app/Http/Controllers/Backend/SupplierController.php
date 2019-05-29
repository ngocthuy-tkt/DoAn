<?php

namespace App\Http\Controllers\Backend;

use App\Models\NhaCungCap;
use Illuminate\Http\Request;
use DB;
use Auth;

class SupplierController extends BackendController
{
    public function index()
    {
        $ncc = NhaCungCap::get();
        $columns = [
            'ID', 'Tên nhà cung cấp', 'Số điện thoại', 'Email', 'Địa chỉ', 'Ngày tạo', 'Trạng thái' , 'Hành động'
        ];
        return view('backend.ncc.index', compact('ncc', 'columns'));
    }

    public function create()
    {
        return view('backend.ncc.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'TenNCC' => 'required',
                'Sdt' => 'required',
                'Gmail' => 'required',
                'DiaChi'  => 'required'
            ],[
                'TenNCC.required' => 'Tên nhà cung cấp không được để trống',
                'Sdt.required' => 'Số điện thoại không được để trống',
                'Gmail.required' => 'Email không được để trống',
                'DiaChi.required' => 'Địa chỉ không được để trống'
            ]
        );

        $request->offsetunset('_token');
       

        $request->merge([
            'NgayTao' => date('Y-m-d',time()),
        ]);

        if (NhaCungCap::create($request->all())) {
            return redirect()->back()->with('success','Thêm mới nhà cung cấp thành công');
        }else{
            return redirect()->back()->with('error','Thêm mới nhà cung cấp thất bại, vui lòng thử lại');
        }
    }

    public function edit($id)
    {
        $ncc = NhaCungCap::findOrFail($id);
        return view('backend.ncc.edit', compact('ncc'));
    }

    public function update(Request $request, $id)
    {
        $ncc = NhaCungCap::findOrFail($id);
        
        $request->offsetunset('_token');

        $ncc->TenNCC = $request->TenNCC;
        $ncc->Sdt = $request->Sdt;
        $ncc->Gmail = $request->Gmail;
        $ncc->DiaChi = $request->DiaChi;
        $ncc->TrangThai = $request->TrangThai;
        $check = $ncc->save();
        if ($check){
            return redirect()->route('supplier.index')->with('success','Sửa thành công');
        }
        else{
            return redirect()->back()->with('error','Sửa thất bại, vui lòng thử lại');
        }
    }


    public function destroy($id)
    {
   
        $user = NhaCungCap::findOrFail($id);

        if ($user->delete()) {
            return redirect()->back()->with('success','Xóa thành công');
        }
        else {
            return redirect()->back()->with('error','Xóa không thành công');
        }
    }
}
