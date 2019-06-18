<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends FrontEndController
{    
    public function index($id, $slug)
    {
        $product = Product::where('Id_SanPham', '=', $id)
            ->first();
        $sizes = unserialize($product->size);
        $product->increment('LuotXem');
        
        return view('detail', compact('product', 'sizes'));
    }
}
