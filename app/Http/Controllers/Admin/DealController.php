<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Product;
use Illuminate\Http\Request;

class DealController extends Controller
{
    public function index()
    {
        $deals = Deal::with('products')->latest()->get();
        return view('admin.deals.index', compact('deals'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();
        return view('admin.deals.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deal_price' => 'required|numeric|min:0',
            'products' => 'required|array|min:2',
            'products.*' => 'exists:products,id',
        ]);

        $deal = Deal::create($request->only('name', 'description', 'deal_price'));
        $deal->products()->attach($request->products);

        return redirect()->route('admin.deals.index')->with('success', 'Deal created successfully!');
    }

    public function edit(Deal $deal)
    {
        $products = Product::orderBy('name')->get();
        return view('admin.deals.edit', compact('deal', 'products'));
    }

    public function update(Request $request, Deal $deal)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deal_price' => 'required|numeric|min:0',
            'products' => 'required|array|min:2',
            'products.*' => 'exists:products,id',
        ]);

        $deal->update($request->only('name', 'description', 'deal_price'));
        $deal->products()->sync($request->products);

        return redirect()->route('admin.deals.index')->with('success', 'Deal updated successfully!');
    }

    public function destroy(Deal $deal)
    {
        $deal->delete();
        return redirect()->route('admin.deals.index')->with('success', 'Deal deleted successfully!');
    }
}
