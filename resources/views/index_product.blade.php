@extends('layouts.layout')

@section('title', 'List Product')

@section('content')

    <style>
        .push-top {
            margin-top: 50px;
        }

        .create-btn {
            margin-top: 20px;
        }

        .btn-custom {
            background-color: #28a745;
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
        }

        .btn-custom:hover {
            background-color: #218838;
            color: #fff;
        }

        .alert-success {
            background-color: #d4edda;
            /* Default green for success */
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-deleted {
            background-color: #f8d7da;
            /* Red background for deletion success */
            border-color: #f5c6cb;
            color: #721c24;
        }
    </style>

    <div class="push-top">
        @if (session()->get('success'))
            <div
                class="alert
      @if (strpos(session()->get('success'), 'deleted') !== false) alert-deleted
      @else
        alert-success @endif
    ">
                {{ session()->get('success') }}
            </div><br />
        @endif

        <table class="table">
            <thead>
                <tr class="table-warning">
                    <td>Product ID</td>
                    <td>Name</td>
                    <td>Category</td>
                    <td>Price</td>
                    <td class="text-center">Actions</td>
                    <td class="text-center">Reviews</td> <!-- Add Reviews Column -->
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->price }}</td>
                        <td class="text-center">
                            <a href="{{ route('products.show', $product->product_id) }}"
                                class="btn btn-primary btn-sm">Show</a>
                            <a href="{{ route('products.edit', $product->product_id) }}"
                                class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->product_id) }}" method="post"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                        <td class="text-center"> <!-- Reviews Column -->
                            <a href="{{ route('reviews.index', $product->product_id) }}"
                                class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('reviews.create', $product->product_id) }}"
                                class="btn btn-success btn-sm">Create</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    {{-- Laravel pagination links --}}
                    {{ $products->links('vendor.pagination.bootstrap-5') }}
                </ul>
            </nav>
        </div>

        {{-- <div class="text-center create-btn">
    <a href="{{ route('products.create') }}" class="btn btn-custom">Create Product</a>
  </div> --}}
    </div>

@endsection
