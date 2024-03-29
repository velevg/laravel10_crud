@extends('layouts.app')

@section('body')
    <div class="d-flex alignt-item-center justify-content-between">
        <h1 class="mb-0">List Product</h1>
        <a href="{{ route('product.create') }}" class="btn btn-primary">Add product</a>
    </div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>File Name</th>
                <th>Image</th>
                <th>Title</th>
                <th>Price</th>
                <th>Product Code</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($product->count() > 0)
                @foreach ($product as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->file_name }}</td>
                        <td class="align-middle"><img src="{{ asset('pics/' . $rs->file_name) }}" alt=""
                                width="32" height="32"></td>
                        <td class="align-middle">{{ $rs->title }}</td>
                        <td class="align-middle">{{ $rs->price }}</td>
                        <td class="align-middle">{{ $rs->product_code }}</td>
                        <td class="align-middle">{{ $rs->description }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group">
                                <a href="{{ route('product.show', $rs->id) }}" type="button"
                                    class="btn btn-secondary">Detail</a>
                                <a href="{{ route('product.edit', $rs->id) }}" type="button"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ route('product.destroy', $rs->id) }}" method="POST"
                                    class="btn btn-sm btn-danger p-0" type="button" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
