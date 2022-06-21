<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class ProductsController extends Controller
{
    public function show()
    {
        $products = Product::paginate(6);
        $categories = Category::all();
        return view('pages.products.catalog', compact('categories', 'products'));
    }

    public function showCart()
    {
        if (!Session::has('cart')) {
            return view('pages.products.cart', ['products' => null]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);



        return view('pages.products.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        // dd($request->session()->get('cart'));

        return redirect()->route('products.show');
    }
}
