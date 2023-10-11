@extends('layouts.front')

@section('title')
   Update Page

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-6 text-center">
                  <h1>Update Product</h1>
                  <hr />
              </div>
          </div>
        </div>
        <div class="col-md-6">
          <form action="{{ url('/edit', $product ?->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                  <label for="name" class="form-label">Product Name</label>
                  <input type="text" value="{{ $product ?->name }}" class="form-control" name="name" required>
              </div>

              <div class="form-group">
                  <label for="description" class="form-label">Product Description</label>
                  <textarea name="description" rows="3" class="form-control" required>{{ $product ?->description }}</textarea>
              </div>

              <div class="form-group mt-3">
                  <label for="price" class="form-label">Price</label>
                  <input type="number" value="{{ $product ?->price }}" name="price" required>
              </div>

              @if ($product ?->image)
                  <img src="{{ asset('assets/product/' . $product ?->image) }}" height="200px" alt="Product image">
              @endif

              <div class="form-group">
                  <input type="file" value="{{ $product ?->image }}" name="image" accept="image/*" class="form-control">
              </div>

              <div class="form-group mt-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
        </div>
    </div>
</div>


@endsection
