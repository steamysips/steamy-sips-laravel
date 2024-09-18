<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('index_product', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stores = Store::all(); // Fetch all stores
        return view('create_product', compact('stores')); // Pass stores to the view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'calories' => 'required|numeric|min:0',
            'img_url' => 'required|max:255',
            'img_alt_text' => 'required|max:150',
            'category' => 'required|max:50',
            'price' => 'required|numeric|min:0',
            'description' => 'required',
            'stores' => 'required|array', // Stores must be an array
            'stores.*' => 'exists:stores,store_id', // Each selected store must exist in the database
        ]);

        // Create the new product
        Product::create($storeData);

        return redirect('/products')->with('success', 'Product has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('show_product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('edit_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'calories' => 'required|numeric|min:0',
            'img_url' => 'required|max:255',
            'img_alt_text' => 'required|max:150',
            'category' => 'required|max:50',
            'price' => 'required|numeric|min:0',
            'description' => 'required',
            'stores' => 'required|array', // Stores must be an array
            'stores.*' => 'exists:stores,store_id', // Each selected store must exist in the database
        ]);

        Product::where('product_id', $id)->update($updateData);
        return redirect('/products')->with('success', 'Product details have been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('success', "{$product->name} has been deleted");
    }
}
