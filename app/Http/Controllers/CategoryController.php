<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends FrontEndController
{
    public function index($slug, $id)
    {
        $cat = Category::where('id', '=', $id)
            ->first();

        $products = Product::with('author')
            ->where('active', '=', 1)
            ->where('category_id', '=', $id)
            ->orderBy('id', 'desc')
            ->paginate(8);
        return view('danhmuc', compact('cat', 'products'));
    }
}
