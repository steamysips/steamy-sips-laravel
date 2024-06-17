<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
</head>
<body>
    <h1>Order #{{ $order->order_id }}</h1>

    <p>Status: {{ $order->status }}</p>
    <p>Pickup Date: {{ $order->pickup_date }}</p>
    <p>Store: {{ $order->store->street }}, {{ $order->store->city }}</p>

    <h2>Products</h2>
    <ul>
        @foreach($order->products as $product)
            <li>
                <h3>{{ $product->name }}</h3>
                <p>Quantity: {{ $product->pivot->quantity }}</p>
                <p>Cup Size: {{ $product->pivot->cup_size }}</p>
                <p>Milk Type: {{ $product->pivot->milk_type }}</p>
                <p>Unit Price: {{ $product->pivot->unit_price }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>
