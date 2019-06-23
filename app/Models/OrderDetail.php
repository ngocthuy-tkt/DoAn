<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'chitietdonhang';
    protected $primaryKey = 'Id_CTDonHang';
    protected $fillable = [
        'Id_SanPham', 'SoLuong', 'DonGia', 'TenSp', 'Id_DonHang'
    ];

    public $timestamps = false;
}
