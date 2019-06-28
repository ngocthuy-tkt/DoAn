<?php

namespace App\Http\Controllers\Backend;

use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends BackendController
{

    public function index()
    {
        $admins = NhanVien::where('Id_NhanVien', '!=', Auth::guard('admin')->user()->Id_NhanVien)->get();
        $columns = [
            'Họ tên', 'Tài khoản', 'Ngày Sinh', 'Giới tính', 'Số điện thoại', 'Địa chỉ','Hoạt động', 'Quyền', 'Hành động'
        ];
        return view('backend.admin.index',
            compact('admins', 'columns')
        );
    }

    public function create()
    {
        return view('backend.admin.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'MaNV' => 'required',
                'HoTen' => 'required|min:5|max:50|unique:nhanvien,MaNV',
                'MatKhau' => 'required|min:4',
                'quyen'     => 'required'
            ],[
                'MaNV.required' => 'Mã nhân viên không được để trống',
                'HoTen.required' => 'Tên đăng nhập không được để trống',
                'HoTen.min' => 'Tên đăng nhập quá ngắn',
                'HoTen.max' => 'Tên đăng nhập quá dài',
                'HoTen.unique' => 'Tên đăng nhập đã tồn tại',
                'MatKhau.required' => 'Bạn chưa nhập mật khẩu',
                'MatKhau.min' => 'Mật khẩu quá ngắn',
                'quyen.required' => 'Mật khẩu quá ngắn',
            ]
        );

        $request->offsetunset('_token');

        $request->merge([
            'MaNV'    => $request->MaNV,
            'HoTen'    => $request->HoTen,
            'quyen'    => $request->quyen,
            'MatKhau' => bcrypt($request->MatKhau)
        ]);
        // create new nhân viên
        if (NhanVien::create($request->all())) {
            return redirect()->back()->with('success','Thêm mới tài khoản quản trị thành công');
        }else{
            return redirect()->back()->with('error','Thêm mới tài khoản thất bại, vui lòng thử lại');
        }
    }

    public function edit($id)
    {
        $admin = NhanVien::findOrFail($id);
        return view('backend.admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = NhanVien::findOrFail($id);

        $request->offsetunset('_token');

        $admin->TrangThai = $request->TrangThai;
        $admin->quyen = $request->quyen;
        $admin->NgaySinh = $request->NgaySinh;
        $admin->Sdt = $request->Sdt;
        $admin->DiaChi = $request->DiaChi;
        $admin->GioiTinh = $request->GioiTinh;
        $admin->MatKhau = bcrypt($request->MatKhau);
        $check = $admin->save();
        if ($check){
            return redirect()->route('administration.index')->with('success','Sửa tài khoản thành công');
        }
        else{
            return redirect()->back()->with('error','Sửa tài khoản thất bại, vui lòng thử lại');
        }
    }

    public function destroy($id)
    {
        $admin = NhanVien::findOrFail($id);

        if ($admin->delete()) {
            return redirect()->back()->with('success','Xóa thành công');
        }
        else {
            return redirect()->back()->with('error','Xóa không thành công');
        }
    }
}
