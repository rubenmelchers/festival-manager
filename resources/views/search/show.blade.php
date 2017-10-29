@extends ('layouts.detail')

@section ('content')

<div class="grid-12 container search search--results">
    <div class="col-12">
        <h2>
            Results
        </h2>
    </div>

    @if(count($festivals))
        <div class="col-12">
            <strong>
                Festivals
            </strong>
        </div>
        @foreach($festivals as $festival)

            <div class="col-12">

                <a href="/festivals/{{ $festival->id }}">
                    {{ $festival->title }}

                </a>
                <span> - </span>
                Created on:
                <span>   {{ $festival->created_at->toFormattedDateString() }}</span>
            </div>
        @endforeach
        <br><br><br><br>
    @endif

    @if(count($users))
        <div class="col-12">
            <strong>
                Users
            </strong>
        </div>

        @foreach($users as $user)

            <div class="col-12">
                {{ $user->name }}
                <span> - </span>
                Member since:
                <span>  {{ $user->created_at->toFormattedDateString() }}</span>
            </div>
        @endforeach
        <br><br><br><br>
    @endif

    @if(count($types))
        <div class="col-12">
            <strong>
                Types
            </strong>
        </div>
        @foreach($types as $type)

            <div class="col-12">
                {{ $type->name }}
                <span> - </span>
                Created at:
                <span> {{ $type->created_at->toFormattedDateString() }} </span>
            </div>
        @endforeach
        <br><br><br><br>
    @endif

    @if(count($comments))
        <div class="col-12">
            <strong>
                Comments
            </strong>
        </div>
        @foreach($comments as $comment)

            <div class="col-12">
                User {{ $user->name }} has commented on {{ $comment->festival->title }} on {{ $comment->created_at->toFormattedDateString() }}: {{ $comment->body }}
            </div>
        @endforeach
        <br><br><br><br>
    @endif

</div>

@endsection
