@extends('frontend.layouts.master')

@section('main')

    <div class="container">
        <br>
        <p class="text-center">Login</p>
        <hr>


        @include('frontend.partials._message')

        <body class="text-center">
        <form action="{{ route('login') }}" class="form" method="post">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

            <div class="group">
                <label for="name">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email address" required >
            </div>

            <div class="group">
                <label for="name">Password</label>
                <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password" required >
            </div>

            <div>
                <br>
            </div>

            <div>
                <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
            </div>

        </form>
        </body>


    </div>


@stop