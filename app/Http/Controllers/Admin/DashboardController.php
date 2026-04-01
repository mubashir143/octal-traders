<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function inventory()
    {
        $products = \App\Models\Product::latest()->get();
        return view('admin.inventory', compact('products'));
    }

    public function create()
    {
        return view('admin.create-product');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:products,code',
            'category' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $validatedData['image'] = 'uploads/products/' . $imageName;
        }

        \App\Models\Product::create($validatedData);

        return redirect()->back()->with('success', 'Product added successfully!');
    }
}
