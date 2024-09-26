<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($productId)
    {
        if (Auth::check()) {
            $product = Product::findOrFail($productId);
            $reviews = $product->reviews; // Eager load reviews
            return view('index_review', compact('product', 'reviews'));
        } else {
            return redirect('login')->with('error', 'You need to log in to access this page.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('create_review', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'text' => 'required|max:2000',
        ]);

        $product = Product::findOrFail($productId);
        $review = new Review($request->all());
        $product->reviews()->save($review); // Associate the review with the product

        return redirect()->route('reviews.index', $productId)->with('success', 'Review added successfully');
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
    public function edit($productId, $reviewId)
    {
        $product = Product::findOrFail($productId);
        $review = Review::findOrFail($reviewId);

        return view('edit_review', compact('product', 'review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $productId, $reviewId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'text' => 'required|max:2000',
        ]);

        $review = Review::findOrFail($reviewId);
        $review->update($request->all());

        return redirect()->route('reviews.index', $productId)->with('success', 'Review updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($productId, $reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $review->delete();

        return redirect()->route('reviews.index', $productId)->with('success', 'Review deleted successfully');
    }
}
