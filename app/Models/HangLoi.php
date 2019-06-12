<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HangLoi extends Model
{
    protected $table = 'HangLoi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Id_SanPham', 'SoLuong', 'GhiChu'
    ];

    public $timestamps = false;
}
