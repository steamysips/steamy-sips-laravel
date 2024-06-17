<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>

    <ul>
        @foreach($products as $product)
            <li>
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>{{ $product->price }}</p>
                <img src="{{ $product->img_url }}" alt="{{ $product->img_alt_text }}">
            </li>
        @endforeach
    </ul>

    {{ $products->links() }}
</body>
</html>
