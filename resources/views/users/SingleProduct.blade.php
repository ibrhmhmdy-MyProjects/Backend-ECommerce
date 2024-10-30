@extends('users.layouts.master')
@section('title','Product Details')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
      <div class="row px-xl-5">
          <div class="col-12">
              <nav class="breadcrumb bg-light mb-30">
                  <a class="breadcrumb-item text-dark" href="{{route('Home')}}">Home</a>
                  <span class="breadcrumb-item active">{{$product->name}}</span>
              </nav>
          </div>
      </div>
  </div>
  <!-- Breadcrumb End -->
  <!-- Shop Detail Start -->
  <div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-12 mb-30">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="{{asset('storage')}}/{{$product->image}}" alt="Image">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <div class="d-flex flex-column">
                    <h3 class="text-muted">{{$product->name}}</h3>
                    <h3 class="fw-semibold mb-4"><span class="text-muted">${{$product->price}}</span></h3>
                </div>
                {{-- Description --}}
                <div class="d-flex flex-column mb-4">
                    <h4 class="mb-2">Description</h4>
                    <p>{{$product->desc}}</p>
                </div>
                {{-- Quantity --}}
                <div class="d-flex flex-column">
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <a href="{{route('addToCart',$product->id)}}" class="btn btn-primary px-3">
                            <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->
@endsection