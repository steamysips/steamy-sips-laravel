<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
</head>
<body>
    <h1>Create Order</h1>

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf

        <div>
            <label for="store_id">Store</label>
            <select id="store_id" name="store_id" required>
                @foreach(App\Models\Store::all() as $store)
                    <option value="{{ $store->store_id }}">{{ $store->street }}, {{ $store->city }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="pickup_date">Pickup Date</label>
            <input id="pickup_date" type="date" name="pickup_date" required>
        </div>

        <h2>Products</h2>

        @foreach($products as $product)
            <div>
                <label for="product_{{ $product->product_id }}">{{ $product->name }}</label>
                <input id="product_{{ $product->product_id }}" type="checkbox" name="products[{{ $product->product_id }}][product_id]" value="{{ $product->product_id }}">
                <input type="number" name="products[{{ $product->product_id }}][quantity]" placeholder="Quantity">
                <input type="text" name="products[{{ $product->product_id }}][cup_size]" placeholder="Cup Size">
                <input type="text" name="products[{{ $product->product_id }}][milk_type]" placeholder="Milk Type">
                <input type="number" name="products[{{ $product->product_id }}][unit_price]" placeholder="Unit Price" value="{{ $product->price }}">
            </div>
        @endforeach

        <div>
            <button type="submit">Place Order</button>
        </div>
    </form>
</body>
</html>
