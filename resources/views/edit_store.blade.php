@extends('layouts.layout')

@section('title','Edit Store')

@section('content')

<div class="card push-top">
  <div class="card-header">
    Edit Store
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
    <form method="post" action="{{ route('stores.update', $store->store_id) }}">
      @csrf
      @method('PATCH')
      <div class="form-group">
          <label for="phone_no">Phone</label>
          <input type="text" class="form-control" name="phone_no" value="{{ $store->phone_no }}"/>
      </div>
      <div class="form-group">
          <label for="street">Street</label>
          <input type="text" class="form-control" name="street" value="{{ $store->street }}"/>
      </div>
      <div class="form-group">
          <label for="city">City</label>
          <input type="text" class="form-control" name="city" value="{{ $store->city }}"/>
      </div>
      <div class="form-group">
          <label for="districts">District</label>
          <select class="form-control" name="districts">
              @foreach($districts as $district)
              <option value="{{ $district }}" {{ $store->district == $district ? 'selected' : '' }}>{{ $district }}</option>
              @endforeach
          </select>
      </div>
      <button type="submit" class="btn btn-block btn-danger">Update Store</button>
    </form>
  </div>
</div>

@endsection
