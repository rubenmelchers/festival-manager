@extends ('layouts.master')


@section ('content')

    <div class="col-md-8">
        <br>
        @if(Auth::check())
            <a href="/festivals/create">Create new festival</a>

        @endif
        <br><br>
        <ul>

            @foreach ($festivals as $festival)

                <li>
                    <a href="/festivals/{{ $festival->id }}">
                        {{ $festival->title }}
                    </a>
                </li>

            @endforeach
        </ul>
    </div>

@endsection
