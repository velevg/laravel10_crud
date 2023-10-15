@extends('layouts.app');

@section('body')
<h1 class="mb-0">Detail Product</h1>
<hr />
<div class="row">
    <div class="col mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->title }}" readonly>
    </div>
    <div class="col mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}"
            readonly>
    </div>
</div>

<div class="row">
    <div class="col mb-3">
        <label for="product_code" class="form-label">Product Code</label>
        <input type="text" name="product_code" class="form-control" placeholder="Product Code"
            value="{{ $product->product_code }}" readonly>
    </div>
    <div class="col mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea type="text" name="description" class="form-control" placeholder="Description" readonly>{{ $product->description }}</textarea>
    </div>
</div>

<div class="row">
    <div class="col mb-3">
        <label for="created_at" class="form-label">Created At</label>
        <input type="text" name="created_at" class="form-control" placeholder="Product Code"
            value="{{ $product->created_at }}" readonly>
    </div>
    <div class="col mb-3">
        <label for="updated_at" class="form-label">Updated At</label>
        <input type="text" name="updated_at" class="form-control" placeholder="Description"
            value="{{ $product->updated_at }}" readonly>
    </div>
</div>
@endsection
