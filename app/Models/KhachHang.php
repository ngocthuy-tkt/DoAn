<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KhachHang extends Authenticatable
{
     use Notifiable;
   
    protected $table = 'khachhang';
    protected $primaryKey = 'Id_KhachHang';
    public $timestamps = false;

    protected $fillable = [
        'HoTen', 'NgaySinh', 'GioiTinh', 'Sdt', 'DiaChi', 'Avatar', 'password', 'NgayTao', 'TrangThai', 'email'
    ];

   
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];
}
