@extends('admin.layouts.master')
@section('title','Products')
@section('content')
<div class="page-header">
  <h3 class="page-title">Products</h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('IndexProducts')}}">Products</a></li>
      <li class="breadcrumb-item active" aria-current="page">Create Product</li>
    </ol>
  </nav>
</div>
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New Product</h4>
        @if($errors->any())
         <ul class="alert alert-danger">
          @foreach ($errors->all() as $error)
               <li class="pl-2">{{$error}}</li>
           @endforeach
          </ul>
        @endif
        <form action="{{route('StoreProduct')}}" method="POST" enctype="multipart/form-data" class="forms-sample">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Product Name</label>
            <input type="text" id="exampleInputName1" name="name" class="form-control"  placeholder="Product Name">
          </div>
          <div class="form-group">
            <label for="exampleTextarea2">Textarea</label>
            <textarea class="form-control" id="exampleTextarea2" name="desc" rows="8" placeholder="Description"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputQuantity3">Quantity</label>
            <input type="number" id="exampleInputQuantity3" name="quantity" class="form-control" placeholder="Quantity">
          </div>
          <div class="form-group">
            <label for="exampleInputPrice4">Price</label>
            <input type="number" id="exampleInputPrice4" name="price" class="form-control" placeholder="Price">
          </div>
          <div class="form-group mb-3">
            <label>File upload</label>
            <div class="d-flex align-items-center justify-between gap-2 flex-col">
              <input type="file" name="image" class="bg-current p-2 text-light text-xl">
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-lg mt-3">Save Product</button>
        </form>
      </div>
    </div>
  </div>
@endsection