<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
</head>
<body>
    <h1>Orders</h1>

    <ul>
        @foreach($orders as $order)
            <li>
                <a href="{{ route('orders.show', $order->order_id) }}">Order #{{ $order->order_id }}</a>
                <p>Status: {{ $order->status }}</p>
                <p>Pickup Date: {{ $order->pickup_date }}</p>
            </li>
        @endforeach
    </ul>

    {{ $orders->links() }}
</body>
</html>
