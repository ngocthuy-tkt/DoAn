<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'donhang';
    protected $primaryKey = 'Id_DonHang';
    protected $fillable = [
        'Id_NhanVien', 'Id_DoiHang', 'NgayTao', 'NgayCapNhap', 'TongTien', 'TenNguoiNhan', 'Sdt', 'DiaChi', 'GhiChu', 'TrangThai', 'Id_KhachHang', 'KieuThanhToan', 'email', 'Id_SanPham', 'size', 'ship'
    ];

    public $timestamps = false;
}
