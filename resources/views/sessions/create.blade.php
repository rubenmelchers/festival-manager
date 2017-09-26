@extends('layouts.master');

@section('content')

    <div class="col-md-8">
        <h1>Sign in</h1>

        <form action="/login" method="post">
            {{ csrf_field() }}

            <div class="form-group">

                <label for="email" class="col-md-4">Email address:</label>

                <div class="col-md-6">
                    <input type="text" name="email" placeholder="email" class="form-control">

                </div>

            </div>

            <div class="form-group">

                <label for="password" class="col-md-4">Password</label>
                <div class="col-md-6">
                    <input type="password" name="password" placeholder="password" class="form-control">

                </div>

            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">

                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </div>
            </div>


            @include('layouts.errors')


        </form>
    </div>



@endsection
