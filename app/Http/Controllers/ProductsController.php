<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name, $id)
    {
        $product = Product::with('images')->where(['id' => $id, 'name' => $name])->first();
        // return $product;
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function adminProductsIndex()
    {
        $products = Product::with('category')->get();
        $n = 1;

        // return $products;
        return view('admin.products.index', compact('products', 'n'));
    }

    public function adminProductsEdit($id)
    {
        $product = Product::with('images')->find($id);
        $categories = Category::all();
        // return $product;
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function adminProductsUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'quantity' => ['required', 'numeric', 'digits_between:0,11'],
            'price' => ['required', 'numeric'],
            'discount' => ['required', 'numeric','digits_between:0,11'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        Product::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount' => $request->discount,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('admin.products.edit', $id)->with('status', 'Product updated !');
    }
}
