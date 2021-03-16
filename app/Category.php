<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Fillable
    protected $fillable = ['name'];

    // Relationships
    public function products(){
        return $this->hasMany(Product::class);
    }
}
