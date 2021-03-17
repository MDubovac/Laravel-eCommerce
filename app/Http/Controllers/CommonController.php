<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class CommonController extends Controller
{
    public function productList(){
        $allProducts = Product::paginate(3);
        $allCategories = Category::all();
        return view('common.product-list')->with("allProducts", $allProducts)->with('allCategories', $allCategories);
    }

    public function productDetails(Product $product){
        return view('common.product-details')->with('product', $product);
    }

    public function getCategory($Category_id)
    {
        $category = Category::find($Category_id);
        if($category !== null){
            $allProducts = Product::paginate(3);
            return view('common.product-list')->with("allProducts", $allProducts);
        }
    }
}
