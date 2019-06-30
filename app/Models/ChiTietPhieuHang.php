<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuHang extends Model
{
    protected $table = 'chitietphieuhang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Id_SanPham', 'SoLuong', 'DonGia', 'Id_PhieuHang', 'TenSP'
    ];

    public $timestamps = false;
}
