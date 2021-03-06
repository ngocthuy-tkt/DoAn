<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends BackendController
{

    public function index()
    {
        $users = User::all();
        $columns = [
            'ID','Họ tên', 'Ngày sinh', 'giới tính', 'sdt', 'địa chỉ', 'ngày tạo'
        ];
        return view('backend.user.index',compact('users','columns'));
    }

    public function create()
    {
        return view('backend.user.add');
    }

    public function store(Request $request)
    {
        //dd($request);
        // dd(date('Y-m-d',time()));
        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'phone'  => 'required'
            ],[
                'name.required' => 'Họ tên không được để trống',
                'email.required' => 'Email không được để trống',
                'phone.min' => 'Số điện thoại không để trống',
            ]
        );

        $request->offsetunset('_token');
        // $imgName = '';
        // if($request->hasFile('upload_avatar')){
        //     $image      = $request->file('upload_avatar');
        //     $imgName   = time() . '.' . $image->getClientOriginalExtension();
        //     Storage::disk('user')->put($imgName,file_get_contents($image));
        // }

        $request->merge([
            // 'Avatar' => $imgName,
            'password' => bcrypt($request->password),
        ]);
        
        if (User::create($request->all())) {
            return redirect()->back()->with('success','Thêm mới tài khoản khách hàng thành công');
        }else{
            return redirect()->back()->with('error','Thêm mới tài khoản thất bại, vui lòng thử lại');
        }
    }

    public function edit($id)
    {
         $user = User::findOrFail($id);
        return view('backend.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = $this->userRepository->findById($id);
        
        $request->offsetunset('_token');
        if($request->hasFile('Avatar')){
            Storage::disk('user')->delete($user->Avatar);
            $image      = $request->file('Avatar');
            $imgName   = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('user')->put($imgName,file_get_contents($image));

            $user->avatar = $imgName;
        }

        $user->HoTen = $request->HoTen;
        $user->DiaChi = $request->DiaChi;
        $user->Sdt = $request->Sdt;
        $user->TrangThai = $request->TrangThai;
        $check = $user->save();
        if ($check){
            return redirect()->route('users.index')->with('success','Sửa thành công');
        }
        else{
            return redirect()->back()->with('error','Sửa thất bại, vui lòng thử lại');
        }
    }


    public function destroy($id)
    {
   
        $user = User::findOrFail($id);

        if ($user->delete()) {
            Storage::disk('user')->delete($user->Avatar);
            return redirect()->back()->with('success','Xóa thành công');
        }
        else {
            return redirect()->back()->with('error','Xóa không thành công');
        }
    }
}
