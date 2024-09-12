<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
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
        ]);

        Product::create($storeData);

        return redirect('/products')->with('success', 'Product has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('edit', compact('product'));
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
