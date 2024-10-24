@extends('admin.layouts.master')
@section('title','Products')
@section('content')
  <div class="page-header">
    <h3 class="page-title">Products</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('IndexProducts')}}">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
      </ol>
    </nav>
  </div>
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Product: {{$product->name}}</h4>
        @if($errors->any())
         <ul class="alert alert-danger">
          @foreach ($errors->all() as $error)
               <li class="pl-2">{{$error}}</li>
           @endforeach
          </ul>
        @endif
        <form action="{{route('UpdateProduct',$product->id)}}" method="POST" enctype="multipart/form-data" class="forms-sample">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="exampleInputName1">Product Name</label>
            <input type="text" id="exampleInputName1" name="name" value="{{$product->name}}" class="form-control"  placeholder="Product Name">
          </div>
          <div class="form-group">
            <label for="exampleTextarea2">Textarea</label>
            <textarea class="form-control" id="exampleTextarea2" name="desc" rows="8" placeholder="Description">{{$product->desc}}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputQuantity3">Quantity</label>
            <input type="number" id="exampleInputQuantity3" name="quantity" value="{{$product->quantity}}" class="form-control" placeholder="Quantity">
          </div>
          <div class="form-group">
            <label for="exampleInputPrice4">Price</label>
            <input type="number" id="exampleInputPrice4" name="price" value="{{$product->price}}" class="form-control" placeholder="Price">
          </div>
          <div class="form-group mb-3">
            <label>File upload</label>
            <div class="d-flex align-items-center justify-between gap-2 flex-col">
              <input type="file" name="image" id="formFile" class="bg-current p-2 text-light text-xl">
              <img id="formFile" src="{{asset('/storage')}}/{{$product->image}}" alt="{{$product->image}}" class="w-2">
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-lg mt-3">Update Product</button>
        </form>
      </div>
    </div>
  </div>
@endsection
