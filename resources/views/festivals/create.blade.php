@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">

        <h1>Create a festival!</h1>

        <hr>

        <form method="POST" action="/festivals">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="description">Festival description: </label>
                <textarea name="description" id="description" rows="8" cols="80" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="location">Festival address: </label>
                <textarea name="location" id="location" rows="8" cols="80" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            @include('layouts.errors')

        </form>


    </div>




@endsection
