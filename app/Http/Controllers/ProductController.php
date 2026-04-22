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

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $bundleDeals = collect();
        if ($request->filter === 'deals') {
            $query->whereNotNull('compare_at_price')
                  ->whereRaw('compare_at_price > price');
            
            $bundleDeals = \App\Models\Deal::with('products')->where('status', true)->get();
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::all();

        return view('shop', compact('products', 'categories', 'bundleDeals'));
    }

    public function show(Product $product)
    {
        $product->load(['reviews' => function($query) {
            $query->latest();
        }]);
        return view('single-product', compact('product'));
    }

    public function storeReview(Request $request, Product $product)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $product->reviews()->create([
            'user_id' => auth()->id(),
            'user_name' => $request->user_name,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        // Update product average rating
        $product->rating = $product->reviews()->avg('rating');
        $product->reviews_count = $product->reviews()->count();
        $product->save();

        return back()->with('success', 'Review submitted successfully!');
    }
}
