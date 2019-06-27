<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends FrontEndController
{
    public function index($slug, $id)
    {
        $cat = Category::where('Id_DanhMucSp', '=', $id)
            ->first();

        $products = Product::where('Id_DanhMucSp', '=', $id)
            ->orderBy('Id_SanPham', 'desc')
            ->paginate(8);
        return view('danhmuc', compact('cat', 'products'));
    }
}
