@extends ('layouts.detail')

@section ('content')

<div class="grid-12 container">
    <div class="col-12">
        <h2>
            Results
        </h2>
    </div>

</div>

@if(count($festivals))
    @foreach($festivals as $festival)

        <div class="col-12">

                {{ $festival->title }}
            <span> - </span>
            Created on:
            <span>   {{ $festival->created_at->toFormattedDateString() }}</span>
        </div>
    @endforeach
@endif

@if(count($users))

    @foreach($users as $user)

        <div class="col-12">
            {{ $user->name }}
            <span> - </span>
            Member since:
            <span>  {{ $user->created_at->toFormattedDateString() }}</span>
        </div>
    @endforeach
@endif

@if(count($types))

    @foreach($types as $type)

        <div class="col-12">
            {{ $type->name }}
            <span> - </span>
            Created at:
            <span> {{ $type->created_at->toFormattedDateString() }} </span>
        </div>
    @endforeach
@endif

@if(count($comments))

    @foreach($comments as $comment)

        <div class="col-12">
            {{ $user->name }}
        </div>
    @endforeach
@endif

@endsection
