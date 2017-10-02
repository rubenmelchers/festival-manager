@extends ('layouts.master')


@section ('content')



    <div class="col-sm-8 blog-main">

        @if(count($festivals))

            @foreach($festivals as $festival)

                @include('festivals.festival')

            @endforeach

        @endif

    </div>

@endsection
