<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhMucSp extends Model
{
    protected $table = 'danhmucsanpham';
    protected $primaryKey = 'Id_DanhMucSp';

    protected $fillable = [
        'TieuDe', 'MoTa','Slug', 'Id_NhomSp_Cha', 'TrangThai', 'NgayTao'
    ];

    public function child() {
        return $this->hasMany(static::class,'Id_NhomSp_Cha','Id_DanhMucSp');
    }

}