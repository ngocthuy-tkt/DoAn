<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDonMua extends Model
{
    protected $table = 'hoadonmua';
    protected $primaryKey = 'Id_HoaDonMua';
    public $timestamps = false;

    protected $fillable = [
        'Id_NhaCC', 'NgayTao', 'NgayCapNhap', 'TongTien', 'TrangThai'
    ];
}
