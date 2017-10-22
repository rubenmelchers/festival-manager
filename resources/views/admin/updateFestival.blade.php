@extends('layouts.detail')

@section('content')
    <div class="grid-12 container festival festival--update">
        <div class="blog-main">


            @foreach($festival as $festival)
                <div class="col-12">
                    <h1>Update
                        <strong>
                            {{ $festival->title }}
                        </strong>
                    </h1>

                    <hr>

                </div>

            @endforeach
            <form method="POST" action="/admin/update/festival/{{$festival->id}}" enctype="multipart/form-data" class="col-12 grid-12">
                {{ csrf_field() }}

                <div class="form-group col-3 col_sm-12">
                    <label for="created_by">Created by:</label>
                    (Currently by {{$festival->user->name}})

                    <select class="form-control" name="created_by">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">
                                {{$user->name}}
                            </option>

                        @endforeach
                    </select>

                </div>

                <div class="form-group col-4 col_sm-12">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="{{$festival->title}}">
                </div>

                <div class="form-group col-12">
                    <label for="description">Festival description: </label>
                    <textarea name="description" id="description" rows="8" cols="80" class="form-control" placeholder="{{$festival->description}}"></textarea>
                </div>

                <div class="form-group col-3 col_sm-12">
                    <label for="location">Festival address: </label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="{{$festival->location}}" >
                </div>

                <div class="form-group col-3 col_sm-12">
                    <label for="date">Date: </label>
                    <input type="date" name="date" class="form-control" value="{{$festival->date}}">
                </div>

                <div class="form-group col-3 col_sm-12">
                    <label for="starttime">Start time: </label>
                    <input type="time" name="starttime" class="form-control" value="{{$festival->starttime}}">
                </div>

                <div class="form-group col-3 col_sm-12">
                    <label for="endtime">End time: </label>
                    <input type="date" name="endtime" class="form-control" value="{{$festival->endtime}}">
                </div>

                <div class="form-group col-12">
                    <label for="image">image:</label><br>
                    <input type="file" name="image" id="image" value="Add image">

                    @if($festival->image != "")
                        <img src="{{$festival->image}}" alt="">
                    @endif
                </div>

                <div class="form-group col-12">
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

                            <li class="festival__checkboxwrapper">
                                <label for="type[{{ $type->name }}]" class="festival__typelabel">{{ $type->name }}</label>

                                <input type="checkbox" name="type[{{ $type->name }}]" value="{{ $type->id }}" class="festival__typecheckbox">
                            </li>

                        @endforeach

                    </ul>
                </div>

                <button type="submit" class="btn btn-primary col-3 col_xs-6 festival__savebutton">Save</button>

                @include('layouts.errors')

            </form>


        </div>

    </div>





@endsection
