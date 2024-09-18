@extends('layouts.layout')

@section('title','Show Product')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif

  <!-- Product Details -->
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Product ID</td>
          <td>Name</td>
          <td>Category</td>
          <td>Price</td>
          <td>Description</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $product->product_id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->description }}</td>
            <td class="text-center">
                <a href="{{ route('products.edit', $product->product_id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('products.destroy', $product->product_id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
  </table>

  <!-- Associated Stores -->
  <h3>Stores</h3>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Store ID</td>
          <td>Phone No</td>
          <td>Street</td>
          <td>City</td>
          <td>District</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($product->stores as $store)
        <tr>
            <td>{{ $store->store_id }}</td>
            <td>{{ $store->phone_no }}</td>
            <td>{{ $store->street }}</td>
            <td>{{ $store->city }}</td>
            <td>{{ $store->district }}</td>
            <td class="text-center">
                <a href="{{ route('stores.edit', $store->store_id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('stores.destroy', $store->store_id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection
