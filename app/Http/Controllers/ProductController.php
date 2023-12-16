<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
        ]);
        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validation
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
        ]);
        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    }

    public function sell(Request $request, Product $product)
    {

        // Validation
        $request->validate([
            'quantity' => 'required|numeric',
        ]);

        // Check if quantity is available
        if ($product->quantity < $request->quantity) {
            return redirect()->back()->with('error', 'Not enough quantity available!');
        }

        // Update product quantity
        $product->update([
            'quantity' => $product->quantity - $request->quantity,
        ]);

        // Create sell record
        $product->sells()->create([
            'quantity' => $request->quantity,
            'total_price' => $request->quantity * $product->price,
        ]);

        return redirect()->back()->with('success', 'Product sold successfully!');
    }
}
