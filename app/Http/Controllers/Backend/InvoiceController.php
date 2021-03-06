<?php

namespace App\Http\Controllers\Backend;

use App\Models\HoaDonMua;
use App\Models\ChiTietHoaDonMua;
use Illuminate\Http\Request;
use DB;
use Auth;

class InvoiceController extends BackendController
{
    public function index()
    {
        $hdm = DB::table('hoadonmua')
                        ->join('nhacungcap', 'hoadonmua.Id_NhaCC', '=', 'nhacungcap.Id_NCC')
                        ->join('chitiethoadonmua', 'hoadonmua.Id_HoaDonMua', '=', 'chitiethoadonmua.Id_HoaDonMua')
                        ->select('hoadonmua.*', 'nhacungcap.TenNCC', 'chitiethoadonmua.*')
                        ->orderBy('hoadonmua.Id_HoaDonMua', 'desc')
                        ->groupby('hoadonmua.Id_HoaDonMua')->distinct()
                        ->get();
        $columns = [
            'ID', 'Tên nhà cung cấp', 'Ngày tạo', 'Hành động'
        ];
        return view('backend.invoice.index', compact('hdm', 'columns'));
    }

    public function create()
    {
        $ncc = \App\Models\NhaCungCap::all();
        // $product = \App\Models\Product::all();
        return view('backend.invoice.add', compact('ncc'));
    }

    public function show($id)
    {
        $hdb1 = DB::table('hoadonmua')
                        ->join('chitiethoadonmua', 'hoadonmua.Id_HoaDonMua', '=', 'chitiethoadonmua.Id_HoaDonMua')
                        ->select('hoadonmua.*', 'chitiethoadonmua.*')
                        ->where('chitiethoadonmua.Id_HoaDonMua', $id)
                        ->get();
                        
        $total = DB::table('chitiethoadonmua')
                        ->join('hoadonmua', 'chitiethoadonmua.Id_HoaDonMua', '=', 'hoadonmua.Id_HoaDonMua')
                        ->select('chitiethoadonmua.DonGia')
                        ->where('chitiethoadonmua.Id_HoaDonMua', $id)
                        ->sum('chitiethoadonmua.DonGia');        
                        
        return view('backend.invoice.view', compact('hdb1', 'total'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'Id_NhaCC' => 'required',
                'NgayTao' => 'required'
            ],[
                'Id_NhaCC.required' => 'Tên nhà cung cấp không được để trống',
                'NgayTao.required' => 'Ngày tạo không được để trống'
            ]
        );

        $request->offsetunset('_token');
       

        $request->merge([
            'NgayTao' => date('Y-m-d',time()),
            'NgayCapNhap' => date('Y-m-d',time()),
        ]);

        if ($hdm = HoaDonMua::create($request->all())) {
            foreach ($request->Id_SanPham as $key => $v) {
                $data = [
                    'Id_HoaDonMua' => $hdm->Id_HoaDonMua,
                    'Id_SanPham' => $v,
                    'SoLuong' => $request->SoLuong[$key],
                    'DonGia' => $request->DonGia[$key]
                ];

                if($detail = ChiTietHoaDonMua::create($data)) {
                    $id = $detail->Id_SanPham;
                    $Sp = Product::find($id);
                    $data1 = [
                        'SoLuong' => ($Sp->SoLuong)-($detail->SoLuong)
                    ];
                    $Sp->update($data1);
                } 
            }
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
