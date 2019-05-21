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
        $categories = Category::with(['child', 'product'])->orderBy('Id_DanhMucSp', 'desc')->get();
        return (isset($categories)) ? $categories : false;
    }

    public function findById($id)
    {
        $cat = Category::with(['child', 'product'])->where('Id_DanhMucSp', '=', $id)->first();
        return (isset($cat)) ? $cat : false;
    }

    public function allNotMyChild($id)
    {
        $cat = $this->findById($id);
        $categories = $this->all();
        foreach ($categories as $key => $item) {
            if ($item->Id_NhomSp_Cha == $cat->id || $item->id == $cat->id) {
                $categories->forget($key);
            }
        }
        return (isset($categories)) ? $categories : false;
    }

    public function allActive()
    {
        $categories = Category::with('child')
            ->where('TrangThai', '=', 1)
            ->orderBy('Id_DanhMucSp', 'desc')
            ->get();
        return (isset($categories)) ? $categories : false;
    }
}