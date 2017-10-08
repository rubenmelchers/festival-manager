@extends('layouts.master')

@section('content')

    <div class="col-8 col_sm-12 blog-main">

        <h1>Create a type!</h1>

        <hr>

        <form method="POST" action="/types">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Type name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="active">Type status: </label>

                <select class="form-control" name="active">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

            @include('layouts.errors')

        </form>


    </div>




@endsection
