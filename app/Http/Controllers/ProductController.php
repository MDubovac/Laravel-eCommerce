<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Constructor
     * Middleware
     */
    public function __construct(){
        $this->middleware(['auth', 'admin.middleware']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required|unique:products',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'desc' => 'required',
            'category_id' => 'required'
        ]);

        $image = $request->image->store('products');

        Product::create([
            'name' => $request->name,
            'image' => $image,
            'price' => $request->price,
            'desc' => $request->desc,
            'category_id' => $request->category_id,
        ]);

        session()->flash('success', 'Product created successfully');
        return redirect(route("products.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.create')->with('product', $product)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => ['required', Rule::unique('products', 'name')->ignore($product->id)],
            'price' => 'required|numeric',
            'desc' => 'required',
            'category_id' => 'required'
        ]);

        $data = $request->only(['name', 'image', 'price', 'desc', 'category_id']);

        if($request->hasFile('image')){
            $image = $request->image->store('products');
            $product->deleteImage();
            $data['image'] = $image;
        }

        $product->update($data);

        session()->flash('success', 'Product updated successfully');
        return redirect(route("products.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $product->deleteImage();

        session()->flash('success', 'Product deleted successfully');
        return redirect(route('products.index'));
    }
}
