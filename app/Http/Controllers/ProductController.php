<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends FrontEndController
{
    public function index($id, $slug)
    {
        $product = Product::with('author')
            ->where('id', '=', $id)
            ->first();
        return view('detail', compact('product'));
    }
}
