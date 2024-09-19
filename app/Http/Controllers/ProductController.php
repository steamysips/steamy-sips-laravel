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
        $products = Product::paginate(3);
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
        // Validate product data
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
        $product = Product::create($storeData);

        // Attach the stores to the product (many-to-many relation)
        $product->stores()->attach($request->stores);

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
        $product = Product::findOrFail($id); // Fetch the product by ID
        $stores = Store::all(); // Fetch all stores to be available for selection
        return view('edit_product', compact('product', 'stores')); // Pass both product and stores to the view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate product data
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

        // Find the product
        $product = Product::findOrFail($id);

        // Update the product's attributes
        $product->update($updateData);

        // Sync the stores with the product (many-to-many relation)
        $product->stores()->sync($request->stores);

        return redirect('/products')->with('success', 'Product details have been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Detach associated stores before deleting the product
        $product->stores()->detach();

        // Now proceed with deleting the product
        $product->delete();

        return redirect('/products')->with('success', "{$product->name} has been deleted");
    }
}
