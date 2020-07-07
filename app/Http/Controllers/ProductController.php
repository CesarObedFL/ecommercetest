<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;

use App\Product;

class ProductController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Products::paginate(6);
        return view('home', compact('products'));
    }

    public function create()
    {
        return view('products.create-product');
    }

    public function store(ProductRequest $request)
    {
        $request->request->add(['slug' => Str::slug($request->name),'status' => 1]);
        $product = Product::create($request->all());
        if ($request->has('image')) {
            $product->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return redirect()->action('HomeController@index')->with('success', __('product.created'));
    }

    public function show($product_slug)
    {
        $product = Product::where('slug', $product_slug)->get()->first();
        return view('products.details-product', compact('product'));
    }

    public function edit($product_slug)
    {
        $product = Product::where('slug', $product_slug)->get()->first();
        return view('products.edit-product', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $request->request->add(['slug' => Str::slug($request->name)]);
        Product::where('id',$id)->update($request->except('_token','_method'));
        return redirect()->action('ProductController@show',$request->slug)->with('edit',__('product.edited'));
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->action('HomeController@index')->with('delete', __('product.deleted'));
    }
}
