@extends('layouts.layout')

@section('title', 'Reviews for ' . $product->name)

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

    <h3>Reviews for {{ $product->name }}</h3>
    <table class="table">
        <thead>
            <tr class="table-warning">
                <td>Review ID</td>
                <td>Text</td>
                <td>Rating</td>
                <td class="text-center">Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->review_id }}</td>
                    <td>{{ $review->text }}</td>
                    <td>{{ $review->rating }}</td>
                    <td class="text-center">
                        <a href="{{ route('reviews.edit', [$product->product_id, $review->review_id]) }}"
                           class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('reviews.destroy', [$product->product_id, $review->review_id]) }}"
                              method="post" style="display:inline-block">
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
