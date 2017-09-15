@extends ('layouts.master')


@section ('content')

    <ul>

        @foreach ($festivals as $festival)

            <li>
                <a href="/festivals/{{ $festival->id }}">
                    {{ $festival->title }}
                </a>
            </li>

        @endforeach
    </ul>

@endsection
