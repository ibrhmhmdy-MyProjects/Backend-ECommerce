@extends('users.layouts.master')
@section('title','Shopping Cart')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
  <div class="row px-xl-5">
      <div class="col-12">
          <nav class="breadcrumb bg-light mb-30">
              <a class="breadcrumb-item text-dark" href="{{route('Home')}}">Home</a>
              <span class="breadcrumb-item active">Shopping Cart</span>
          </nav>
      </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            @if(session('success'))
                <div>{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div>{{ session('error') }}</div>
            @endif
        </div>

        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                      <th>Products</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if (session('cart'))
                        @foreach ($cart as $id => $product)
                            <tr>
                                <td class="align-middle"><img src="{{asset('storage')}}/{{$product['image']}}" alt="" style="width: 50px;">{{$product['name']}}</td>
                                <td class="align-middle">${{$product['price']}}</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 150px;">
                                        <div class="input-group-btn">
                                            <form action="{{route('UpdateQuantity',['id' => $product['id'],'action' => 'decrease'])}}" method="GET">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="submit" class="btn btn-sm btn-primary btn-minus" >
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <input type="text" name="quantity" value="{{$product['qty']}}" disabled class="form-control form-control-sm bg-secondary border-0 text-center mx-10">
                                        <div class="input-group-btn">
                                            <form action="{{route('UpdateQuantity',['id' => $product['id'],'action' => 'increase'])}}" method="GET">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="submit" class="btn btn-sm btn-primary btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">${{$product['totalPrice']}}</td>
                                <td class="align-middle">
                                    <form action="{{ route('RemoveProduct', $product['id']) }}" method="GET">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="align-middle text-black-50 font-bold">
                                Cart is Empty <a href="{{route('Home')}}" class="btn btn-secondary">Go to Shopping</a>
                            </td>
                        </tr>
                    @endif
              </tbody>
            </table>
            <div class="d-flex align-items-center justify-content-end mt-3 px-3 mx-3">
              <a href="{{route('EmptyCart')}}" class="btn btn-danger btn-sm">Empty Cart</a>
              <a href="{{route('Home')}}" class="btn btn-secondary btn-sm">Go to Shopping</a>
            </div>
      </div>
      <div class="col-lg-4">
          <form class="mb-30" action="">
              <div class="input-group">
                  <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                  <div class="input-group-append">
                      <button class="btn btn-primary">Apply Coupon</button>
                  </div>
              </div>
          </form>
          <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
          <div class="bg-light p-30 mb-5">
              <div class="border-bottom pb-2">
                  <div class="d-flex justify-content-between mb-3">
                      <h6>SubTotal</h6>
                      <h6>
                        ${{$subtotal}}
                    </h6>
                  </div>
                  <div class="d-flex justify-content-between">
                      <h6 class="font-weight-medium">Shipping</h6>
                      <h6 class="font-weight-medium">$20</h6>
                  </div>
              </div>
              <div class="pt-2">
                  <div class="d-flex justify-content-between mt-2">
                      <h5>Total</h5>
                      <h5>
                        @if (!$subtotal)
                            $0 
                        @else 
                            ${{$subtotal + 20}}
                        @endif
                      </h5>
                  </div>
                  <form action="{{route('MakeOrder')}}" method="POST">
                    @csrf
                    <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Cart End -->
@endsection