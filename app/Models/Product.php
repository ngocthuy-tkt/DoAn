<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'sanpham';
    protected $primaryKey = 'Id_SanPham';

    protected $fillable = [
        'Id_DanhMucSp', 'MaSP', 'TenSp', 'DonGia', 'Id_KhuyenMai', 'SoLuong', 'NgayTao', 'TrangThai', 'LuotXem', 'AnhChinh', 'Sp_Hot'
    ];

    public function category() {
        return $this->belongsTo(Category::class,'Id_DanhMucSp','Id_DanhMucSp');
    }

    // public function author() {
    //     return $this->belongsTo(Author::class,'author_id','id');
    // }

    // public function publishingHouse() {
    //     return $this->belongsTo(PublishingHouse::class,'publishing_house_id','id');
    // }
}
