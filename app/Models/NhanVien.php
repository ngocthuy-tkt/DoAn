<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NhanVien extends Authenticatable
{
    use Notifiable;
    // The authentication guard for admin
    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'nhanvien';
    protected $primaryKey = 'Id_NhanVien';
 	public $timestamps = false;

    protected $fillable = [
        'MaNV', 'HoTen', 'NgaySinh', 'GioiTinh', 'Sdt', 'DiaChi', 'Avatar', 'MatKhau', 'NgayTao', 'TrangThai', 'quyen'
    ];

    public function getAuthPassword()
    {
        return $this->MatKhau;
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'MatKhau'
    ];
}
