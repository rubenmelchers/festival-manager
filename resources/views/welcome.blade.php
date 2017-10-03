@extends ('layouts.master')


@section ('content')



    <div class="col-8 col_sm-12 blog-main">

        @if(count($festivals))

            @foreach($festivals as $festival)

                @include('festivals.festival')

            @endforeach

        @endif

    </div>

@endsection
