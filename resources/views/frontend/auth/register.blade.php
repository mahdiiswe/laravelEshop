@extends('frontend.layouts.master')

@section('main')

    <div class="container">
        <br>
        <p class="text-center">Registration</p>
        <hr>


        @include('frontend.partials._message')

        <body class="text-center">
        <form action="{{ route('register') }}" class="form" method="post">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>

           <div class="group">
               <label for="name">Full Name</label>
               <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Full Name" required >
           </div>


            <div class="group">
                <label for="name">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email address" required >
            </div>

            <div class="group">
                <label for="name">Phone Number</label>
                <input type="text" name="phone_number" value="{{ old('phone_number') }}" class="form-control" placeholder="Phone Number" required >
            </div>

            <div class="group">
                <label for="name">Password</label>
                <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password" required >
            </div>

            <div>
                <br>
            </div>

            <div>
                <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign up</button>
            </div>

        </form>
        </body>


    </div>


@stop