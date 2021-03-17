<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        
        return view('cart.index');
    }

    public function store(Request $request){
        $duplicates = \Cart::search(function($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });

        if($duplicates->isNotEmpty()){
            return redirect('/cart');
        }

        \Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
        return view('cart.index');
    }

    public function destroy($id){
        \Cart::remove($id);
        return view('cart.index');
    }
}

