<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonMua extends Model
{
    protected $table = 'chitiethoadonmua';
    protected $primaryKey = 'Id_CTHDMua';
    protected $fillable = [
        'Id_SanPham', 'SoLuong', 'DonGia', 'Id_HoaDonMua'
    ];

    public $timestamps = false;
}
