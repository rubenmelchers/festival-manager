@extends('layouts.master')

@section('content')

    <div class="col-8 col_sm-12 blog-main">

        <h1>Create a type!</h1>

        <hr>

        <form method="POST" action="/types">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="description">Type description: </label>
                <textarea name="description" id="description" rows="8" cols="80" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

            @include('layouts.errors')

        </form>


    </div>




@endsection
