@extends ('layouts.master')


@section ('content')

    <div class="col-8 col_sm-12">
        <br>
        @if(Auth::check())
            <a href="/festivals/create" class="btn btn-primary">Create new festival</a>

        @endif
        <br><br>
        {{-- <ul> --}}
        <div class="grid-12">

            @foreach ($festivals as $festival)

                @include('festivals.festival')

                {{-- <li>
                <a href="/festivals/{{ $festival->id }}">
                {{ $festival->title }}
            </a>
        </li> --}}

                @endforeach
        </div>

        {{-- </ul> --}}
    </div>

@endsection
