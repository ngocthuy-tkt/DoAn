<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'author';
    protected $primaryKey = 'id';

    protected $fillable = [
      'name', 'avatar', 'active'
    ];

    public function product() {
        return $this->hasMany(Product::class,'author_id','id');
    }
}
