<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDonBan extends Model
{
    protected $table = 'hoadonban';
    protected $primaryKey = 'Id_HoaDonBan';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'Id_NhanVien', 'Id_DoiHang', 'NgayTao', 'NgayCapNhap', 'TongTien', 'TenNguoiNhan', 
        'Sdt', 'DiaChi', 'GhiChu', 'TrangThai', 'NVChuyenHang', 'Id_KhachHang', 'Id_ThanhToan'
    ];
}

