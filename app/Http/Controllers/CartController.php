<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CartController extends Controller
{
    public function index() 
    {
        $categories = Category::with('child')
            ->where('TrangThai', '=', 1)
            ->orderBy('Id_DanhMucSp', 'desc')
            ->get();

        return view('cart', compact('categories'));
    }

    public function addToCart(Request $request)
    {
        \Cart::add($request->Id_SanPham, $request->TenSp,1,
           isset($request->GiaKhuyenMai) ? $request->GiaKhuyenMai : $request->DonGia
        )->associate('App\Models\Product');
        return redirect()->route('cart')->with('success', 'Sản phẩm được thêm thành công');
    }

    
    public function destroy($id) {
        \Cart::remove($id);
        return redirect()->back();
    }
    public function update(Request $request, $id) {
        \Cart::update($id, $request->quantity);
        session()->flash('success', 'Update thành công');
        return response()->json(['success' => true]);
    }
}
