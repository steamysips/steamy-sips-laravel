@extends('layouts.layout')

@section('title', 'Create Review for ' . $product->name)

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
        <form method="post" action="{{ route('reviews_store', $product->product_id) }}">
            <!-- make uses of cross-cite request forgery to add a
            hidden code in forms to stop hackers from submitting forms on
            your website from other places  -->
            @csrf
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" class="form-control" name="rating" min="1" max="5"
                    value="{{ old('rating') }}">
            </div>
            <div class="form-group">
                <label for="text">Review Text</label>
                <textarea class="form-control" name="text" rows="4">{{ old('text') }}</textarea>
            </div>
            <button type="submit" class="btn btn-block btn-success">Create Review</button>
        </form>
    </div>
@endsection
