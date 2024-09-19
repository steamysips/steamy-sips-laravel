@extends('layouts.layout')

@section('title','Create Store')

@section('content')

<div class="card push-top">
  <div class="card-header">
    Add Store
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
    <form method="post" action="{{ route('stores.store') }}">
      @csrf
      <div class="form-group">
          <label for="phone_no">Phone</label>
          <input type="text" class="form-control" name="phone_no"/>
      </div>
      <div class="form-group">
          <label for="street">Street</label>
          <input type="text" class="form-control" name="street"/>
      </div>
      <div class="form-group">
          <label for="city">City</label>
          <input type="text" class="form-control" name="city"/>
      </div>
      <div class="form-group">
          <label for="district">District</label>
          <select class="form-control" name="districts">
              @foreach($districts as $district)
              <option value="{{ $district }}">{{ $district }}</option>
              @endforeach
          </select>
      </div>
      <button type="submit" class="btn btn-block btn-success">Create Store</button>
    </form>
  </div>
</div>

@endsection
