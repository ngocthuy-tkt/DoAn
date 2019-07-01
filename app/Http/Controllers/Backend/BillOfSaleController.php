<?php

namespace App\Http\Controllers\Backend;

use App\Models\HoaDonBan;
use Illuminate\Http\Request;
use App\Models\ChiTietHoaDonBan;
use App\Models\Product;
use App\Models\User;
use DB;
use Auth;

class BillOfSaleController extends BackendController
{
    public function index(Request $request)
    {
        $hdb = DB::table('hoadonban')
                        ->join('nhanvien', 'hoadonban.Id_NhanVien', '=', 'nhanvien.Id_NhanVien')
                        ->join('users', 'hoadonban.TenKhachHang', '=', 'users.id')
                        ->join('chitiethoadonban', 'hoadonban.Id_HoaDonBan', '=', 'chitiethoadonban.Id_HoaDonBan')
                        ->join('sanpham', 'chitiethoadonban.Id_SanPham', '=', 'sanpham.Id_SanPham')
                        ->select('hoadonban.*', 'nhanvien.HoTen', 'chitiethoadonban.*', 'sanpham.TenSP', 'users.name')
                        ->orderBy('hoadonban.Id_HoaDonBan', 'desc')
                        ->groupby('hoadonban.Id_HoaDonBan')->distinct()
                        ->get();

                                        
        $columns = [
            'ID', 'Mã hóa đơn bán','Tên nhân viên', 'Tên khách hàng', 'Sdt', 'Địa chỉ', 'Ngày tạo','Hành động'
        ];
        return view('backend.bill.index', compact('hdb', 'columns'));
    }

    public function show($id)
    {
        $hdb1 = DB::table('hoadonban')
                        ->join('chitiethoadonban', 'hoadonban.Id_HoaDonBan', '=', 'chitiethoadonban.Id_HoaDonBan')
                        ->join('sanpham', 'chitiethoadonban.Id_SanPham', '=', 'sanpham.Id_SanPham')
                        ->select('hoadonban.*', 'chitiethoadonban.*', 'sanpham.TenSP')
                        ->where('chitiethoadonban.Id_HoaDonBan', $id)
                        ->get();

        $total = DB::table('chitiethoadonban')
                        ->join('hoadonban', 'chitiethoadonban.Id_HoaDonBan', '=', 'hoadonban.Id_HoaDonBan')
                        ->select('chitiethoadonban.DonGia')
                        ->where('chitiethoadonban.Id_HoaDonBan', $id)
                        ->sum('chitiethoadonban.DonGia');                      
                        
        return view('backend.bill.view', compact('hdb1', 'total'));
    }

    public function create()
    {
        $product = Product::all();
        $users = User::all();
        return view('backend.bill.add', compact('product', 'users'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'TenKhachHang' => 'required',
                'Sdt' => 'required',
                'DiaChi' => 'required',
                'GhiChu'  => 'required'
            ],[
                'TenKhachHang.required' => 'Tên khách hàng không được để trống',
                'Sdt.required' => 'Số điện thoại không được để trống',
                'DiaChi.required' => 'Địa chỉ không được để trống',
                'GhiChu.required' => 'Ghi chú không được để trống'
            ]
        );

        $request->offsetunset('_token');

        $dataFormRequest = [
            'NgayTao' => date('Y-m-d',time()),
            'Id_NhanVien' => Auth::guard('admin')->user()->Id_NhanVien,
            'TenKhachHang' => $request->TenKhachHang,
            'Sdt' => $request->Sdt,
            'DiaChi' => $request->DiaChi,
            'GhiChu' => $request->GhiChu
        ];
        
        if ($hdb = HoaDonBan::create($dataFormRequest)) {
            foreach ($request->Id_SanPham as $key => $v) {
                $data = [
                    'Id_HoaDonBan' => $hdb->Id_HoaDonBan,
                    'Id_SanPham' => $v,
                    'SoLuong' => $request->SoLuong[$key],
                    'DonGia' => $request->DonGia[$key]
                ];

                ChiTietHoaDonBan::create($data);
            }
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
