<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(12);
        return view('shop', compact('products'));
    }

    public function show(Product $product)
    {
        return view('single-product', compact('product'));
    }
}
