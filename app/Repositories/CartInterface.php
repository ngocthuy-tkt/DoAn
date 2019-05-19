<?php
/**
 * Created by PhpStorm.
 * User: Truong
 * Date: 14/11/2018
 * Time: 10:10 CH
 */

namespace App\Repositories;


interface CartInterface
{
    public function getAllSession();

    public function addToCart($id);

    public function remove($id);

    public function update($id, $qty);
}