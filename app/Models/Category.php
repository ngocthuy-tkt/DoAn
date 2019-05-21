<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'danhmucsanpham';
    protected $primaryKey = 'Id_DanhMucSp';
    public $timestamps = false;

    protected $fillable = [
        'TieuDe', 'MoTa', 'TrangThai', 'Id_NhomSp_Cha'
    ];

    public function child() {
        return $this->hasMany(static::class,'Id_NhomSp_Cha','Id_DanhMucSp');
    }

    public function product() {
        return $this->hasMany(Product::class,'Id_DanhMucSp','Id_SanPham');
    }
}
