<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'sanpham';
    protected $primaryKey = 'Id_SanPham';
    public $timestamps =  false;

    protected $fillable = [
        'Id_DanhMucSp', 'MaSP', 'TenSp', 'DonGia', 'Id_KhuyenMai', 'SoLuong', 'NgayTao', 'TrangThai', 'LuotXem', 'AnhChinh', 'Sp_Hot', 'size'
    ];

    public function category() {
        return $this->belongsTo(Category::class,'Id_DanhMucSp','Id_DanhMucSp');
    }
}
