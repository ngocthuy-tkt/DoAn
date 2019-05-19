<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublishingHouse extends Model
{
    protected $table = 'publishing_house';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'active'
    ];

    public function product() {
        return $this->hasMany(Product::class,'publishing_house_id','id');
    }
}
