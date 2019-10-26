@extends('frontend.layouts.master')

@section('main')
    <div class="container">
        <br>
        <p class="text-center">Cart</p>
        <hr>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

       @if(empty($cart))
            <div class="alert alert-info">
                Please add some products to your cart.
            </div>
           @else

            <table class="table table-bordered">
                <thead>
                <tr>
                    <td>Serial</td>
                    <td>Product</td>
                    <td>Unit price</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>

                @php $i = 1 @endphp
                @foreach($cart as $key => $product)
                    <tr>
                        {{--<tr v-for="product,id in cart">--}}
                        <td>{{ $i++ }}</td>
                        <td>{{ $product['title'] }}</td>
                        <td> BDT {{ number_format($product['unit_price'],2) }}</td>
                        <td><input type="number" name="quantity" value="{{ $product['quantity'] }}"></td>
                        <td> BDT {{ number_format($product['total_price'],2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $key }}">
                                <button type="submit" class="btn btn-lg btn-outline-secondary">
                                    <i class="fas fa-cart-remove"></i> Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td>BDT {{ number_format($total,2) }}</td>
                    <td></td>
                </tr>
                </tbody>
            </table>

            <a href="{{ route('cart.clear') }}" class="btn btn-danger">Clear Cart</a>
            <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
           
       @endif




        {{--<a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>--}}

    </div>
@stop