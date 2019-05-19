<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'slug', 'price', 'discount_price', 'category_id', 'author_id', 'publishing_house_id', 'image', 'quantity', 'hot', 'active'
    ];

    public function category() {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function author() {
        return $this->belongsTo(Author::class,'author_id','id');
    }

    public function publishingHouse() {
        return $this->belongsTo(PublishingHouse::class,'publishing_house_id','id');
    }
}
