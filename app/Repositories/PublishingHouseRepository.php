<?php
/**
 * Created by PhpStorm.
 * User: Truong
 * Date: 14/11/2018
 * Time: 10:12 CH
 */

namespace App\Repositories;


use App\Models\PublishingHouse;

class PublishingHouseRepository implements PublishingHouseInterface
{

    public function all()
    {
        $authors = PublishingHouse::with('product')->orderBy('id', 'desc')->get();
        return (isset($authors)) ? $authors : false;
    }

    public function findById($id)
    {
        $author = PublishingHouse::with('product')->where('id', '=', $id)->first();
        return (isset($author)) ? $author : false;
    }
}