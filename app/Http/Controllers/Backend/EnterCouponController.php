<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PhieuHang;
use App\Models\Product;
use App\Models\ChiTietPhieuHang;
use DB;

class EnterCouponController extends Controller
{
    public function index()
    {
    	$columns = [
    		'ID', 'Mã đơn hàng', 'Tên khách hàng', 'Ngày tạo', 'Ghi chú','Hành động'
    	];
    	$phieunhap = \DB::table('phieuhang')
                        ->join('users', 'users.id', '=', 'phieuhang.Id_Khachhang')
                        ->select('phieuhang.*', 'users.name')
                        ->orderBy('phieuhang.id', 'desc')
                        ->get();
    	return view('backend.coupon.index', compact('phieunhap', 'columns'));
    }

    public function create()
    {
        $ncc = \App\Models\User::all();
        $product = \App\Models\Product::all();
    	return view('backend.coupon.add', compact('ncc', 'product'));
    }

    public function show($id)
    {
        $hdb1 = DB::table('phieuhang')
                        ->join('chitietphieuhang', 'phieuhang.id', '=', 'chitietphieuhang.Id_PhieuHang')
                        ->join('sanpham', 'chitietphieuhang.Id_SanPham', '=', 'sanpham.Id_SanPham')
                        ->select('phieuhang.*', 'chitietphieuhang.*', 'sanpham.TenSP')
                        ->where('chitietphieuhang.Id_PhieuHang', $id)
                        ->get();

        $total = DB::table('chitietphieuhang')
                        ->join('phieuhang', 'chitietphieuhang.Id_PhieuHang', '=', 'phieuhang.id')
                        ->select('chitietphieuhang.DonGia')
                        ->where('chitietphieuhang.Id_PhieuHang', $id)
                        ->sum('chitietphieuhang.DonGia');   
                        
        return view('backend.coupon.view', compact('hdb1', 'total'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'Id_KhachHang' => 'required',
                'NgayTao' => 'required',
                "GhiChu" => 'required',
                "MaDonHang" => 'required'
            ],[
                'Id_KhachHang.required' => 'Tên khách hàng không được để trống',
                'NgayTao.required' => 'Ngày tạo không được để trống',
                'GhiChu.required' => 'Bạn chưa nhập ghi chú',
                'MaDonHang.required' => 'Bạn chưa nhập mã đơn hàng'
            ]
        );

        $request->offsetunset('_token');
       

        $request->merge([
            'NgayTao' => date('Y-m-d',time()),
            'NgayCapNhap' => date('Y-m-d',time()),
        ]);

        if ($hdm = PhieuHang::create($request->all())) {
            foreach ($request->Id_SanPham as $key => $v) {
                $data = [
                    'Id_PhieuHang' => $hdm->id,
                    'Id_SanPham' => $v,
                    'SoLuong' => $request->SoLuong[$key],
                    'DonGia' => $request->DonGia[$key]
                ];

                if ($ph = ChiTietPhieuHang::create($data)) {
                    try {
                        $id = $ph->Id_SanPham;
                        $Sp = Product::find($id);
                        $data1 = [
                            'SoLuong' => ($Sp->SoLuong) + ($ph->SoLuong)
                        ];

                        $Sp->update($data1);
                    } catch(\Exception $e) {
                        return redirect()->back()->with('success','Thêm mới phiếu hàng thành công');
                    }
                }
            }
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

        $ph->Id_KhachHang = $request->Id_KhachHang;
        $ph->NgayTao = $request->NgayTao;
        $ph->NgayCapNhap = $request->NgayCapNhap;
        $ph->GiaBan = $request->GiaBan;
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
