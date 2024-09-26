@extends('layouts.layout')

@section('title', 'Edit Review for ' . $product->name)

@section('content')

<style>
    .container {
        max-width: 450px;
    }
    .push-top {
        margin-top: 50px;
    }
</style>

<div class="push-top">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <form method="post" action="{{ route('reviews.update', [$product->product_id, $review->review_id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" class="form-control" name="rating" min="1" max="5" value="{{ $review->rating }}">
        </div>
        <div class="form-group">
            <label for="text">Review Text</label>
            <textarea class="form-control" name="text" rows="4">{{ $review->text }}</textarea>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Update Review</button>
    </form>
</div>
@endsection
