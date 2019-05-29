<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    protected $table = 'nhacungcap';
    protected $primaryKey = 'Id_NCC';
    public $timestamps = false;

    protected $fillable = [
        'TenNCC', 'Sdt', 'Gmail', 'DiaChi', 'TrangThai', 'NgayTao'
    ];
}
