<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show()
    {
        return view('');
    }

    public function create()
    {
        $categories = Category::all();

        return view('pages.admin.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'description' => 'required|max:1024',

            'category' => 'max:30',

            'color' => 'max:30',

            'stock_price',
            'price' => 'required',
            'price_onsale',

            'quantity' => 'required',

            'subtag1' => 'max:30',
            'subtag2' => 'max:30',

            'active',

            'added_by',

            // 'image' => 'required|mimes:jpg,png,jpeg',
            'imageURL' => 'required'
        ]);

        // $newImageName = time() . '-' . $request->name . '-' . $request->category .
        //     $request->image->extension();

        Product::create([
            'name' => request('name'),
            'subtitle' => request('subtitle'),
            'description' => request('description'),

            'category' => request('category'),

            'color' => request('color'),

            'stock_price' => request('stock_price'),
            'price' => request('price'),
            'price_onsale' => 0,

            'quantity' => request('quantity'),
            'quantity_sold' => 0,

            'subtag1' => request('subtag1'),
            'subtag2' => request('subtag2'),

            'active' => request('active') ? true : false,

            'added_by' => User::select('id')->where('id', auth()->user()->id)->first()->id,

            'onsale' => 0,

            // 'image_path' => $newImageName,
            'image_path' => request('imageURL'),
            

        ]);

        // $request->image->move(public_path('images/products'), $newImageName);

        return redirect()->route('products.show');
    }
}
