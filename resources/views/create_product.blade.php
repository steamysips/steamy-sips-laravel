@extends('layouts.layout')

@section('title','Create Product')

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
    Add Product
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
      <form method="post" action="{{ route('products.store') }}">
          @csrf
          <div class="form-group">
              <label for="name">Product Name</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
          </div>
          <div class="form-group">
              <label for="calories">Calories</label>
              <input type="number" class="form-control" name="calories" value="{{ old('calories') }}"/>
          </div>
          <div class="form-group">
              <label for="img_url">Image URL</label>
              <input type="text" class="form-control" name="img_url" value="{{ old('img_url') }}"/>
          </div>
          <div class="form-group">
              <label for="img_alt_text">Image Alt Text</label>
              <input type="text" class="form-control" name="img_alt_text" value="{{ old('img_alt_text') }}"/>
          </div>
          <div class="form-group">
              <label for="category">Category</label>
              <input type="text" class="form-control" name="category" value="{{ old('category') }}"/>
          </div>
          <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control" name="price" value="{{ old('price') }}"/>
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" name="description" value="{{ old('description') }}"></textarea>
          </div>
          <!-- Store selection (for the many-to-many relationship) -->
          <div class="form-group">
              <label for="stores">Stores:</label>
              <select class="form-control" name="stores[]" multiple>
                  @foreach($stores as $store)
                      <option value="{{ $store->store_id }}">{{ $store->name }} - {{ $store->city }}</option>
                  @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-block btn-success">Add Product</button>
      </form>
  </div>
</div>
@endsection
