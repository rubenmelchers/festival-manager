@extends('layouts.master')

@section('content')

    <div class="col-8 col_sm-12 blog-main">

        @foreach($type as $type)
            <h1>Update type</h1>

            <hr>

            <form method="POST" action="/admin/update/type/{{$type->id}}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Title:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{$type->name}}">
                </div>

                <div class="form-group">
                    <label for="active">Status (active):</label>
                    <select class="form-control" name="active">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>

                @include('layouts.errors')

            </form>

        @endforeach



    </div>




@endsection
