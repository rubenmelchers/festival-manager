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


                    </div>

                @endforeach

            </div>
        @endif

    </div>


@endsection
