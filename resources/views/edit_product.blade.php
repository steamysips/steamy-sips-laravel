@extends('layouts.layout')

@section('title','Edit Product')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Edit Product
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('products.update', $product->product_id) }}">
          @csrf
          @method('PATCH')
          <div class="form-group">
              <label for="name">Product Name</label>
              <input type="text" class="form-control" name="name" value="{{ $product->name }}"/>
          </div>
          <div class="form-group">
              <label for="calories">Calories</label>
              <input type="number" class="form-control" name="calories" value="{{ $product->calories }}"/>
          </div>
          <div class="form-group">
              <label for="img_url">Image URL</label>
              <input type="text" class="form-control" name="img_url" value="{{ $product->img_url }}"/>
          </div>
          <div class="form-group">
              <label for="img_alt_text">Image Alt Text</label>
              <input type="text" class="form-control" name="img_alt_text" value="{{ $product->img_alt_text }}"/>
          </div>
          <div class="form-group">
              <label for="category">Category</label>
              <input type="text" class="form-control" name="category" value="{{ $product->category }}"/>
          </div>
          <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control" name="price" value="{{ $product->price }}"/>
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" name="description">{{ $product->description }}</textarea>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update Product</button>
      </form>
  </div>
</div>
@endsection
