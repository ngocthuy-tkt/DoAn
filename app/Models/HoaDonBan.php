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
        'Id_NhanVien', 'NgayTao', 'TenKhachHang', 
        'Sdt', 'DiaChi', 'GhiChu'
    ];
}

