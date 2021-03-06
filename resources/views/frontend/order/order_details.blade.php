@extends('frontend.layouts.master')


@section('main')

    <div class="container">
        <br>
        <p class="text-center">Order Details</p>
        <hr>
    </div>



    <div class="container">

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <ul class="list-group">
            @foreach($order->toArray() as $column => $value)
                @if(is_string($value))
                @if($column == 'user_id')
                    @continue
                @endif
            <li class="list-group-item">
                {{ ucwords(str_replace('_', ' ', $column)) }} : {{ $value }}
            </li>
                @endif
            @endforeach
        </ul>
        <hr>
        <p><h3>Ordered Products</h3></p>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td>Product Title</td>
                    <td>Quantity</td>
                    <td>Total price</td>
                </tr>
            </thead>
            <tbody>
                @foreach($order->products as $product)
                <tr>
                    <td>{{ $product->product->title }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ number_format($product->price,2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@stop