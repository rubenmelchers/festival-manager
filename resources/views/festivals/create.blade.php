@extends('layouts.master')

@section('content')

    <div class="col-8 blog-main">

        @if( Auth::user()->isAdmin() )

            <h1>Add new festival</h1>

        @else
            <h1>Create a festival!</h1>

        @endif

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
                <input type="text" class="form-control" id="location" name="location" placeholder="voorbeeldstraat 10, stad" >
            </div>

            @if(count($types))
                <div class="form-group">
                    <span>Festival type:</span><br>

                    @foreach($types as $type)
                        <label for="type[{{ $type->name }}]">{{ $type->name }}</label>
                        <input type="checkbox" name="type[{{ $type->name }}]" value="{{ $type->id }}">
                        <br>
                    @endforeach

                </div>
            @endif

            <button type="submit" class="btn btn-primary">Submit</button>

            @include('layouts.errors')

        </form>


    </div>




@endsection
