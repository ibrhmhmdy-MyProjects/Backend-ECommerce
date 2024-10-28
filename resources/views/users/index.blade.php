@extends('users.layouts.master')
@section('title','ECommerce')
@section('content')
 <!-- Carousel Start -->
 <div class="container-fluid mb-3">
  @include('users.components.carousel')
</div>
<!-- Carousel End -->

<!-- Features Start -->
<div class="container-fluid pt-5">
  @include('users.components.features')
</div>
<!-- Features End -->

<!-- Categories Start -->
<div class="container-fluid pt-5">
  @include('users.components.categories')
</div>
<!-- Categories End -->

<!-- Featured Products Start -->
<div class="container-fluid pt-5 pb-3">
  @include('users.products.featured')
</div>
<!-- Featured Products End -->

<!-- Offer Start -->
<div class="container-fluid pt-5 pb-3">
  @include('users.components.offers')
</div>
<!-- Offer End -->

<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
  @include('users.components.recent_products')
</div>
<!-- Products End -->

<!-- Vendor Start -->
<div class="container-fluid py-5">
  @include('users.components.vendors')
</div>
<!-- Vendor End -->
@endsection