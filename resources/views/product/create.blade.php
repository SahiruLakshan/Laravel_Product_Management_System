@extends('layouts.front')

@section('title')
   Create Page
@endsection

@section('content')

<div class="container mt-3">
  <div class="row justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                  <h1>Insert Product</h1>
                  <hr />
                </div>
            </div>
        </div>
  
        <div class="col-md-6">
          <form action="{{ url('/insert') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Product Description</label>
                    <textarea name="description" rows="3" class="form-control" required></textarea>
                </div>
                <div class="form-group mt-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" required>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>
                
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
          </form>
        </div>
  </div>
</div>

  
@endsection
