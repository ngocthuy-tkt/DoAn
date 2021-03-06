<?php
/**
 * Created by PhpStorm.
 * User: Truong
 * Date: 14/11/2018
 * Time: 10:12 CH
 */

namespace App\Repositories;


use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;

class ProductRepository implements ProductInterface
{

    public function all()
    {
        $products = Product::join('danhmucsanpham', 'sanpham.Id_DanhMucSp', '=', 'danhmucsanpham.Id_DanhMucSp')
            ->select('sanpham.*', 'danhmucsanpham.TieuDe')
            ->orderBy('Id_SanPham', 'desc')
            ->get();
        return (isset($products)) ? $products : false;
    }

    public function findById($id)
    {
        $product = Product::where('Id_SanPham', '=', $id)
            ->with(['category'])
            ->first();
        return (isset($product)) ? $product : false;
    }
//
//    public function newProduct(array $filters)
//    {
//        $query = Product::with('author')
//            ->where(function ($query) use ($filters){
//                $query->where('active', '=', 1);
//                if(isset($filters['keyword']) && !empty($filters['keyword'])){
//                    $query->where('name', 'like', '%' . $filters['keyword'] . '%');
//                }
//            })
//            ->orderBy('id', 'desc')
//            ->limit($filters['limit'])
//            ->offset($filters['offset']);
//
//        return $query;
//    }

}