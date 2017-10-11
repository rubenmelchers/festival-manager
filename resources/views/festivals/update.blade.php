@extends('layouts.fullwidth')

@section('content')

    <div class="col-12 col_sm-12 blog-main">


        {{-- @foreach($festival as $festival) --}}
            <h1>Update festival: <br>
                    {{ $festival->title }}
            </h1>

            <hr>

        {{-- @endforeach --}}
        <form method="POST" action="/users/update/festival/{{$festival->id}}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">{{ trans('form.title') }}</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="{{$festival->title}}">
            </div>

            <div class="form-group">
                <label for="description">Festival description: </label>
                <textarea name="description" id="description" rows="8" cols="80" class="form-control" placeholder="{{$festival->description}}"></textarea>
            </div>

            <div class="form-group">
                <label for="location">Festival address: </label>
                <input type="text" class="form-control" id="location" name="location" placeholder="{{$festival->location}}" >
            </div>

            <div class="form-group">
                <label for="date">Date: </label>
                <input type="date" name="date" value="Date" class="form-control" placeholder="{{$festival->date}}">
            </div>

            <div class="form-group">
                <label for="starttime">Start time: </label>
                <input type="time" name="starttime" value="start time" class="form-control" placeholder="{{$festival->starttime}}">
            </div>

            <div class="form-group">
                <label for="endtime">End time: </label>
                <input type="date" name="endtime" value="end time" class="form-control" placeholder="{{$festival->endtime}}">
            </div>

            <div class="form-group">
                <label for="image">image:</label>
                <input type="file" name="image" id="image" value="Add image">

                @if($festival->image)
                    <img src="{{$festival->image}}" alt="">
                @endif
            </div>

            <div class="form-group">
                Festival types:
                <br>
                ( Currently chosen:
                @foreach($festival->types as $activetype)

                    @if($loop->last)
                        <strong>
                            {{ $activetype->name }}
                        </strong>
                    @else
                        <strong>
                            {{ $activetype->name }},
                        </strong>
                    @endif
                @endforeach
                 )

                <ul>

                    @foreach($types as $type)

                        <li>
                            <label for="type[{{ $type->name }}]">{{ $type->name }}</label>

                            <input type="checkbox" name="type[{{ $type->name }}]" value="{{ $type->id }}">
                        </li>

                    @endforeach

                </ul>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            @include('layouts.errors')

        </form>


    </div>




@endsection
