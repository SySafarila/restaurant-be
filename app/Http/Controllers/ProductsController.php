<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return redirect()->route('admin.products.index')->with('status', 'Product updated !');
    }

    public function adminProductsDeleteSelected(Request $request)
    {
        $arr = explode(',', $request->ids);
        Product::destroy($arr);
        return redirect()->route('admin.products.index')->with('status', 'Bulk delete success');
    }

    public function adminProductsDelete(Request $request, $id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products.index')->with('status', 'Delete success');
    }

    public function adminProductsCreate()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function adminProductsStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'quantity' => ['required', 'numeric', 'digits_between:0,11'],
            'price' => ['required', 'numeric'],
            'discount' => ['required', 'numeric','digits_between:0,11'],
            'category_id' => ['required', 'exists:categories,id'],
            'cover' => ['required', 'file', 'image', 'max:10000'],
            'additionalImages.*' => ['file', 'image', 'max:10000']
        ]);

        $randomString = Str::random(10);
        $imgName = $randomString . str_replace(' ', '-', $request->file('cover')->getClientOriginalName());
        $dir = 'public/productCover';

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount' => $request->discount,
            'category_id' => $request->category_id,
            'cover' => $imgName,
            'coverPath' => 'storage/productCover/',
        ]);

        $request->file('cover')->storeAs($dir, $imgName);

        if ($request->hasFile('additionalImages')) {
            foreach ($request->file('additionalImages') as $image ) {
                $randomString = Str::random(10);
                $imgName = $randomString . str_replace(' ', '-', $image->getClientOriginalName());
                $dir = 'public/productImages';

                $product->images()->create([
                    'name' => $imgName,
                    'path' => 'storage/productImages/'
                ]);

                $image->storeAs($dir, $imgName);
            }
        }

        return redirect()->route('admin.products.index')->with('status', 'Product created !');
    }
}
