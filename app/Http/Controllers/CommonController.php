<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class CommonController extends Controller
{
    public function productList(){
        $allProducts = Product::paginate(3  );
        $allCategories = Category::all();
        return view('common.product-list')->with("allProducts", $allProducts)->with('allCategories', $allCategories);
    }
}
