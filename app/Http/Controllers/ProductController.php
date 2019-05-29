<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends FrontEndController
{
    public function addclick()  {
    
    $this->clicks = $this->clicks + 1;
    $this->save();
    
    }
    
    public function index($id, $slug)
    {
        $product = Product::where('Id_SanPham', '=', $id)
            ->first(); 
        // $product->addclick();    
        // $product->increment('LuotXem')->save();
        // $click = \DB::table('sanpham')->increment('LuotXem', 1, ['LuotXem' => $product->Id_SanPham]);
        
        return view('detail', compact('product'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        $product->increment('LuotXem')->save();
        return back();
    }
}
