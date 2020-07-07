<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

Use App\Product;

class CartController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function checkout()
    {
        return view('cart.checkout');
    }

    public function getCart() 
    {
        return session()->get('cart');
    }

    public function addToCart($id) 
    {
        $product = Product::findOrFail($id);
        if(!$product) {
            return redirect()->action('HomeController@index')->with('errors', 'Product does not exist!...');
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "id" => $id,
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "subtotal" => $product->price
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!...');
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            $cart[$id]['subtotal'] = $cart[$id]['price'] * $cart[$id]['quantity'];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully...');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "subtotal" => $product->price
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully...');
    }

    public function updateItem(Request $request)
    {
        if($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $id = $request->id;
            $cart[$id]["quantity"] = $request->quantity;
            $cart[$id]['subtotal'] = $cart[$id]['price'] * $cart[$id]['quantity'];
            session()->put('cart', $cart);
            $response = ['edit' => true,'message' => 'Quantity updated successfully!...'];
            return response()->json($response, 200);
        }
    }

    public function removeItem(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return response()->json(null, 204);
        }
    }
}