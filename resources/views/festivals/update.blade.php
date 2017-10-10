@extends('layouts.fullwidth')

@section('content')

    <div class="col-12 col_sm-12 blog-main">


        {{-- @foreach($festival as $festival) --}}
            <h1>Update festival: <br>
                    {{ $festival->title }}
            </h1>

            <hr>

        {{-- @endforeach --}}
        <form method="POST" action="/users/{{$festival->id}}">
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
