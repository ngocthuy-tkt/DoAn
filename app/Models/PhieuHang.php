<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuHang extends Model
{
    protected $table = 'phieuhang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Id_KhachHang', 'MaDonHang', 'NgayTao', 'NgayCapNhap', 'TrangThai', 'GhiChu', 'GiaBan'
    ];

    public $timestamps = false;
}
