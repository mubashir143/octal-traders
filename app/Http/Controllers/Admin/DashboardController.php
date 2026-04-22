<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSales = \App\Models\Order::where('status', 'completed')->sum('total_amount');
        $totalProducts = Product::count();
        $totalCustomers = \App\Models\User::where('role', 'customer')->count();
        $outOfStock = Product::where('quantity', '<=', 0)->count();

        return view('admin.dashboard', compact('totalSales', 'totalProducts', 'totalCustomers', 'outOfStock'));
    }

    public function inventory(Request $request)
    {
        $query = Product::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('code', 'LIKE', "%{$search}%");
            });
        }

        $products = $query->latest()->get();

        return view('admin.inventory', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.create-product', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:products,code',
            'category' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'compare_at_price' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'_main.'.$request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $validatedData['image'] = 'uploads/products/'.$imageName;
        }

        $product = Product::create($validatedData);

        // Handle Gallery Images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $imageName = time().'_'.rand(100, 999).'.'.$image->extension();
                $image->move(public_path('uploads/products/gallery'), $imageName);
                $product->images()->create([
                    'image_path' => 'uploads/products/gallery/'.$imageName,
                    'is_main' => false
                ]);
            }
        }

        return redirect()->route('admin.inventory')->with('success', 'Product added successfully!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.edit-product', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:products,code,'.$product->id,
            'category' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'compare_at_price' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'_main.'.$request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $validatedData['image'] = 'uploads/products/'.$imageName;
        }

        $product->update($validatedData);

        // Handle Gallery Images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $imageName = time().'_'.rand(100, 999).'.'.$image->extension();
                $image->move(public_path('uploads/products/gallery'), $imageName);
                $product->images()->create([
                    'image_path' => 'uploads/products/gallery/'.$imageName,
                    'is_main' => false
                ]);
            }
        }

        return redirect()->route('admin.inventory')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

    public function deleteImage(\App\Models\ProductImage $image)
    {
        if (file_exists(public_path($image->image_path))) {
            unlink(public_path($image->image_path));
        }
        $image->delete();

        return redirect()->back()->with('success', 'Image removed successfully!');
    }

    public function setMainImage(\App\Models\ProductImage $image)
    {
        $product = $image->product;
        
        // Update product table main image
        $product->update(['image' => $image->image_path]);
        
        return redirect()->back()->with('success', 'Main image updated successfully!');
    }
}
