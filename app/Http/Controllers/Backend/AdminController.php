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
            'Họ tên', 'Tài khoản', 'Active', 'Quyền', 'Hành động'
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
                'fullname' => 'required',
                'username' => 'required|min:5|max:50|unique:nhanvien,MaNV',
                'password' => 'required|min:4|confirmed',
                'role'     => 'required'
            ],[
                'fullname.required' => 'Họ tên không được để trống',
                'username.required' => 'Tên đăng nhập không được để trống',
                'username.min' => 'Tên đăng nhập quá ngắn',
                'username.max' => 'Tên đăng nhập quá dài',
                'username.unique' => 'Tên đăng nhập đã tồn tại',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.confirmed' => 'Mật khẩu không khớp',
                'password.min' => 'Mật khẩu quá ngắn',
            ]
        );

        $request->offsetunset('_token');

        $request->merge([
            'MaNV'    => $request->username,
            'HoTen'    => $request->fullname,
            'quyen'    => $request->role,
            'MatKhau' => bcrypt($request->password)
        ]);
        // create new product
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

        $admin->TrangThai = $request->active;
        $admin->quyen = $request->role;
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
