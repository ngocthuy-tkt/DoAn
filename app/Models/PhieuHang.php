<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuHang extends Model
{
    protected $table = 'phieuhang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Id_NhaCC', 'NgayTao', 'NgayCapNhap', 'TongTien', 'TrangThai', 'GhiChu'
    ];

    public $timestamps = false;
}
