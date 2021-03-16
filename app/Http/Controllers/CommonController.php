<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CommonController extends Controller
{
    public function productList(){
        $allProducts = Product::all();
        return view('common.product-list')->with("allProducts", $allProducts);
    }
}
