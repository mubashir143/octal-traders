<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::latest();

        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category', $category->name);
            }
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::all();

        return view('shop', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('single-product', compact('product'));
    }
}
