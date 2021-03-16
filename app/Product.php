<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    // Fillable
    protected $fillable = [
        'name', 'image', 'price', 'desc', 'category_id'
    ];

    // Relationships
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // Delete Image
    public function deleteImage(){
        Storage::delete($this->image);
    }
}
