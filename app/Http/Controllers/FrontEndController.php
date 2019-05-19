<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CartInterface;
use View;

class FrontEndController extends Controller
{
    public $cartRepository;
    public $carts = [];
    public function __construct(
        CartInterface $cartRepository
    )
    {
        $this->cartRepository = $cartRepository;
        $this->header();
        $this->items = session('cart');
    }

    public function header()
    {
        $categories = Category::with('child')
            ->where('active', '=', 1)
            ->orderBy('id', 'desc')
            ->get();
        View::share(compact('categories'));
    }
}
