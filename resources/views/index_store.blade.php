@extends('layouts.layout')

@section('title', 'List Store')

@section('content')

    <style>
        .push-top {
            margin-top: 50px;
        }

        .create-btn {
            margin-top: 20px;
        }
    </style>

    <div class="push-top">

        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif

        @if (session()->get('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div><br />
        @endif

        <table class="table">
            <thead>
                <tr class="table-warning">
                    <td>Store ID</td>
                    <td>Phone</td>
                    <td>Street</td>
                    <td>City</td>
                    <td>District</td>
                    <td>Coordinate (Latitude, Longitude)</td>
                    <td class="text-center">Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $store)
                    <tr>
                        <td>{{ $store->store_id }}</td>
                        <td>{{ $store->phone_no }}</td>
                        <td>{{ $store->street }}</td>
                        <td>{{ $store->city }}</td>
                        <td>{{ $store->districts }}</td>
                        <td>{{ $store->coordinate ? '(' . $store->coordinate['latitude'] . ', ' . $store->coordinate['longitude'] . ')' : 'Not Available' }}</td>
                        <td class="text-center">
                            <a href="{{ route('stores.show', $store->store_id) }}" class="btn btn-primary btn-sm">Show</a>
                            <a href="{{ route('stores.edit', $store->store_id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('stores.destroy', $store->store_id) }}" method="post"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    {{-- Laravel pagination links --}}
                    {{ $stores->links('vendor.pagination.bootstrap-5') }}
                </ul>
            </nav>
        </div>

        {{-- <div class="text-center create-btn">
    <a href="{{ route('stores.create') }}" class="mt-3 btn btn-success">Add Store</a>
  </div> --}}

    </div>

@endsection
