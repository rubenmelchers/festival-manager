@extends('layouts.fullwidth');

@section('content')


    <div class="col-8 col_sm-12 accountpage">

        <h5>
            Welcome, {{ $user->name }}
        </h5>

        @if(count($user->festivals)) <!-- If the user has created any festivals-->

            Festivals created by you:
            <br><br>
            <div class="festival-overview">

                @foreach( $user->festivals as $festival ) <!-- Loop through each of them and show them on the page -->
                    <div class="grid-12 festival-overview__single">

                        <div class="col-6 festival-overview__title">
                            <span>
                                Name:
                            </span><br>
                            {{ $festival->title }}
                        </div>
                        <div class="col-12 festival-overview__description">
                            <span>
                                Description:
                            </span>
                            <p>
                                {{ $festival->description }}
                            </p>
                        </div>

                        <div class="col-4 festival-overview__location">
                            <span>Location:</span><br>
                            {{ $festival->location }}
                        </div>

                        @if(count($festival->types))
                            <div class="col-12 festival-overview__types">
                                <span>Types:</span><br>
                                <ul>
                                    @foreach($festival->types as $type)
                                        <li>
                                            {{ $type->name }}
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        @endif

                        <div class="col-6">
                            <a href="/users/{{ Auth::user()->id }}/update/festival/{{ $festival->id }}" class="btn btn-info">
                                Update Festival
                            </a>
                        </div>

                        <div class="col-6">
                            <a href="/festivals/{{$festival->id}}">
                                Show festival
                            </a>

                        </div>


                    </div>

                @endforeach

            </div>
        @endif

    </div>

    <div class="col-3 col_sm-12 account-aside" data-push-left="off-1">

        Your info:
        <br><br>

        @if($user->avatar)
            <img src="{{asset($user->avatar)}}" alt="{{$user->name}}'s profile picture" class="account-aside__avatar">
            <br><br>
        @endif

        Name: {{ $user->name }}
        <br>
        Email: {{ $user->email }}
        <br>
        Role:
        @if( $user->role == 1)
            Admin
        @else
            User
        @endif
        <br>
        Member since: {{ $user->created_at->toFormattedDateString() }}

        <br><br>
        <a href="/users/{{ $user->id }}/update">Update info</a>
    </div>


@endsection
