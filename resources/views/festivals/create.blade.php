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
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Festival description: </label>
                <textarea name="description" id="description" rows="8" cols="80" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="location">Festival address: </label>
                <input type="text" class="form-control" id="location" name="location" placeholder="voorbeeldstraat 10, stad"  required>
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <br>
                <input type="date" name="date" value="Date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="starttime">Start time:</label>
                <br>
                <input type="time" name="starttime" value="Start time" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="endtime">End time:</label>
                <br>
                <input type="time" name="endtime" value="End time" class="form-control">
            </div>

            <div class="form-group">
                <label for="image">Add image</label><br>
                <input type="file" name="image" value="Add image">

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
