@extends('users.layouts.master')
@section('title','ECommerce')
@section('content')
<!-- Products Start -->
<div class="container-fluid pt-2 pb-3">
    <div class="row px-xl-5">
        <div class="col-12 mb-3">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
  <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Recent Products</span></h2>
  <div class="row px-xl-5">
      @foreach ($products as $product)
          <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
              <div class="product-item bg-light mb-4">
                  <div class="product-img position-relative overflow-hidden">
                      <img class="img-fluid w-100" src="{{asset('storage')}}/{{$product->image}}" alt="">
                      <div class="product-action">
                          <a class="btn btn-outline-dark btn-square" href="{{route('addToCart',$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                          <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                          <a class="btn btn-outline-dark btn-square" href="{{route('SingleProduct',$product->id)}}"><i class="fas fa-eye"></i></a>
                          <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                      </div>
                  </div>
                  <div class="text-center py-4">
                      <a class="h6 text-decoration-none text-truncate" href="{{route('SingleProduct',$product->id)}}">{{$product->name}}</a>
                      <div class="d-flex align-items-center justify-content-center mt-2">
                          <h5>${{$product->price}}</h5>
                      </div>
                  </div>
              </div>
          </div>
      @endforeach
  </div>
</div>
<!-- Products End -->

@endsection