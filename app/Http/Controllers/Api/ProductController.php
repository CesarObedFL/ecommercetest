<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();  
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description'=> $request->description,
                'price' => $request->price,
                'status' => 1
            ]);
        return response()->json(['product' => $product, 'message' => __('product.created')], 201);
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::where('id', $id)->update([
                'name' => $request->name,
                'slug' => $request-> Str::slug($request->name),
                'description'=> $request->description,
                'price' => $request->price,
            ]);
        return response()->json(['product' => $product, 'message' => __('product.edited')], 200);
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
