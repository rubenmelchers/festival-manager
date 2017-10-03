@extends('layouts.master');

@section('content')

    <div class="col-8 col_sm-12">
        <h1>Sign in</h1>

        <form action="/login" method="post">
            {{ csrf_field() }}

            <div class="form-group">

                <label for="email" class="col_md-4">Email address:</label>

                <div class="col_md-6">
                    <input type="text" name="email" placeholder="email" class="form-control">

                </div>

            </div>

            <div class="form-group">

                <label for="password" class="col_md-4">Password</label>
                <div class="col_md-6">
                    <input type="password" name="password" placeholder="password" class="form-control">

                </div>

            </div>

            <div class="form-group">
                <div class="col_md-6 col_md-offset-4">

                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </div>
            </div>


            @include('layouts.errors')


        </form>
    </div>



@endsection
