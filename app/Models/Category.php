<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'slug1', 'avtive', 'parent_id'
    ];

    public function child() {
        return $this->hasMany(static::class,'parent_id','id');
    }

    public function product() {
        return $this->hasMany(Product::class,'category_id','id');
    }
}
