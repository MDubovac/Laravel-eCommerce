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
            session()->flash('cart-success', 'Item is already in the cart.');
            return redirect('/cart');
        }

        \Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
        session()->flash('cart-success', 'Item added to the cart successfully.');
        return view('cart.index');
    }

    public function destroy($id){
        \Cart::remove($id);
        session()->flash('cart-success', 'Item removed from the cart successfully.');
        return view('cart.index');
    }
}

