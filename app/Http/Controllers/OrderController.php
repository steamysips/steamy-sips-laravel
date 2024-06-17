<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->client->orders()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required|integer',
            'pickup_date' => 'required|date',
            'products' => 'required|array',
            'products.*.product_id' => 'required|integer',
            'products.*.quantity' => 'required|integer',
            'products.*.cup_size' => 'nullable|string',
            'products.*.milk_type' => 'nullable|string',
            'products.*.unit_price' => 'required|numeric',
        ]);

        $order = Order::create([
            'client_id' => Auth::user()->client->user_id,
            'store_id' => $request->store_id,
            'pickup_date' => $request->pickup_date,
            'status' => 'pending',
        ]);

        foreach ($request->products as $product) {
            $order->products()->attach($product['product_id'], [
                'quantity' => $product['quantity'],
                'cup_size' => $product['cup_size'] ?? null,
                'milk_type' => $product['milk_type'] ?? null,
                'unit_price' => $product['unit_price'],
            ]);
        }

        return redirect()->route('orders.show', ['order' => $order->order_id])->with('status', 'Order placed successfully!');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }
}
