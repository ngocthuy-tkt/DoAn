<?php
/**
 * Created by PhpStorm.
 * User: Truong
 * Date: 14/11/2018
 * Time: 10:12 CH
 */

namespace App\Repositories;


use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartRepository implements CartInterface
{
    public function getAllSession()
    {
        $cart = Session::get('cart');
        return (isset($cart)) ? $cart : false;
    }

    public function addToCart($id)
    {
        $product = Product::with('author')
            ->where('id', '=', $id)
            ->first();
        $cart = Session::get('cart');
        if ($cart) {
            if (array_key_exists($id, $cart)) {
                $cart[$id]['qty'] += 1;
            } else {
                $cart[$product->id] = array(
                    "id" => $product->id,
                    "name" => $product->name,
                    "price" => ($product->discount_price != 0) ? $product->price : $product->discount_price,
                    "image" => $product->image,
                    "qty" => 1,
                );
            }
        } else {
            $cart[$product->id] = array(
                "id" => $product->id,
                "name" => $product->name,
                "price" => ($product->discount_price != 0) ? $product->price : $product->discount_price,
                "image" => $product->image,
                "qty" => 1,
            );
        }

        Session::put('cart', $cart);

    }


    public function remove($id)
    {
        $cart = Session::get('cart');
        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
        }
        Session::put('cart', $cart);
    }

    public function update($id, $qty)
    {
        $cart = Session::get('cart');
        if (array_key_exists($id, $cart)) {
            $cart[$id]['qty'] = $qty;
        }
        Session::put('cart', $cart);
    }
}