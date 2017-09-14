@extends ('layouts.master')


@section ('content')

    <div class="col-sm-8 blog-main">

        @foreach($types as $type)

            @include('types.type')

        @endforeach

    </div>

    <div class="col-sm-8 blog-main">

        @foreach($festivals as $festival)

            @include('festivals.festival')

        @endforeach

    </div>

@endsection
