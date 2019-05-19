<?php
/**
 * Created by PhpStorm.
 * User: Truong
 * Date: 14/11/2018
 * Time: 10:12 CH
 */

namespace App\Repositories;


use App\Models\Category;

class CategoryRepository implements CategoryInterface
{

    public function all()
    {
        $categories = Category::with(['child', 'product'])->orderBy('id', 'desc')->get();
        return (isset($categories)) ? $categories : false;
    }

    public function findById($id)
    {
        $cat = Category::with(['child', 'product'])->where('id', '=', $id)->first();
        return (isset($cat)) ? $cat : false;
    }

    public function allNotMyChild($id)
    {
        $cat = $this->findById($id);
        $categories = $this->all();
        foreach ($categories as $key => $item) {
            if ($item->parent_id == $cat->id || $item->id == $cat->id) {
                $categories->forget($key);
            }
        }
        return (isset($categories)) ? $categories : false;
    }

    public function allActive()
    {
        $categories = Category::with('child')
            ->where('active', '=', 1)
            ->orderBy('id', 'desc')
            ->get();
        return (isset($categories)) ? $categories : false;
    }
}