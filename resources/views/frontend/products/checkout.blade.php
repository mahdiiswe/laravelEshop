@extends('frontend.layouts.master')


@section('main')

    <div class="container">
        <br>
        <p class="text-center">Checkout</p>
        <hr>

        @guest()
            <div class="alert alert-info">
                 You need to <a  href="{{ route('login') }}">Login</a> first to complete your order.
            </div>
        @else
            <div class="alert alert-info">
                You are ordering as, {{ auth()->user()->name }}.
            </div>
        @endguest()
    </div>


    @auth()
    <div class="container">
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill">{{ count($cart) }}</span>
                    </h4>
                    <ul class="list-group mb-3">
                     @foreach($cart as $key => $products)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $products['title'] }}</h6>
                                <small class="text-muted">Quantity: {{ $products['quantity'] }}</small>
                            </div>
                            <span class="text-muted">{{ number_format($products['total_price'],2) }}</span>
                        </li>
                      @endforeach

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (BDT)</span>
                            <strong>{{ number_format($total,2) }}</strong>
                        </li>
                    </ul>


                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Billing address</h4>

                    @include('frontend.partials._message')

                    <form action="{{ route('order') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="customer_name">Customer Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="customer_name" id="username" value="{{ auth()->user()->name }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="customer_phone_number">Email</label>
                            <input type="text" class="form-control" name="customer_phone_number" id="email" value="{{ auth()->user()->phone_number }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <textarea type="text" class="form-control" name="address" id="address" placeholder="Enter Shipping Address" required></textarea>
                        </div>


                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="Enter Your City" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="postal_code">Postal Code</label>
                                <input type="text" class="form-control" name="postal_code" id="zip" placeholder="Enter Postal Code" required>
                            </div>
                        </div>


                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                    </form>
                </div>

            </div>
    </div>
    @endauth()


@stop