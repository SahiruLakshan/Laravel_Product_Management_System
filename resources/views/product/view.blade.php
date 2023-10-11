@extends('layouts.front')

@section('title')
   Product View
@endsection

@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <h4>Product Details</h4>
            
        </div>
        <div class="card-body mb-0">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                       
                        <th>No</th>
                        <th>Product_ID</th>
                        <th>Product_Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $x=0; @endphp
                    @foreach($product as $item)
                     
                       @php $x++;@endphp 
                       <tr>
                           <td>{{$x}}</td>
                           <td>{{$item->id}} </td>
                           <td>{{$item->name}}</td>
                           <td>{{$item->description}}</td>
                           <td>Rs.{{$item->price}}</td>
                           <td>
                               <img src="{{ asset('assets/product/'.$item->image) }}" height="100px" class="product-image" alt="Image is here">
                           </td>
                           
                           <td>
                                
                               <a href="{{ url('update/'.$item->id)}}" class="btn btn-primary">Edit</a>
                               <a href="{{ url('delete/'.$item->id)}}" class="btn btn-danger">Delete</button>
                           </td>
                       </tr>
                     
                    @endforeach
                </tbody>
            </table>
        </div>       
    </div> 
       
@endsection