<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //

    function colors() {
        return $this->hasMany(ProductColor::class);
    }

    function images() {
        return $this->hasMany(ProductImage::class);
    }
}
