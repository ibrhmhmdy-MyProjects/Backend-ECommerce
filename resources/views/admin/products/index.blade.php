@extends('admin.layouts.master')
@section('title','Products')
@section('content')
<div class="page-header">
  <h3 class="page-title"> Products </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('CreateProduct')}}">Create New Product</a></li>
    </ol>
  </nav>
</div>
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Products</h4>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th colspan="2">Product Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Date Created</th>
              <th>Date Updated</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
              <tr>
                <td class="py-1 px-0">
                  <img src="{{asset('storage')}}/{{$product->image}}" alt="{{asset('storage')}}/{{$product->image}}" />
                </td>
                <td class="px-0">{{$product->name}}</td>
                <td> {{$product->quantity}} </td>
                <td> ${{$product->price}} </td>
                <td> {{$product->created_at}} </td>
                <td> {{$product->updated_at}} </td>
                <td> 
                  <a href="{{route('ShowProduct',$product->id)}}"  class="btn btn-light btn-sm">Show</a>
                  <a href="{{route('EditProduct',$product->id)}}"  class="btn btn-primary btn-sm">Edit</a>
                  <a href="{{route('DeleteProduct',$product->id)}}"  class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection