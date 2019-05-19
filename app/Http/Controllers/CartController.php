<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends FrontEndController
{
    public function index() {
        $cart = $this->cartRepository->getAllSession();
        return view('cart', compact('cart'));
    }

    public function addToCart($id)
    {
        $this->cartRepository->addToCart($id);
        return redirect()->route('cart');
    }
    public function removeCartItem($id) {
        $this->cartRepository->remove($id);
        return redirect()->route('cart');
    }
    public function updateCartItem($id,$qty) {
        $this->cartRepository->update($id,$qty);
        return redirect()->route('cart');
    }
}
