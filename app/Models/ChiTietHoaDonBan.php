<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonBan extends Model
{
    protected $table = 'chitiethoadonban';
    protected $primaryKey = 'Id_CTHDBan';
    protected $fillable = [
        'Id_SanPham', 'SoLuong', 'DonGia', 'Id_HoaDonBan'
    ];

    public $timestamps = false;
}
