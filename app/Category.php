<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Relationships
    public function products(){
        return $this->hasMany(Product::class);
    }
}
