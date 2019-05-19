<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'slug', 'link', 'image', 'active'
    ];
}
