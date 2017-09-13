@extends ('layouts.master')


@section ('content')

    <h1>Festivals <?= $name ?></h1>

    <ul>

        @foreach ($types as $type)

            <li>
                <a href="types/{{ $type->id }}">
                    {{ $type->title }}
                </a>
            </li>

        @endforeach
    </ul>

@endsection
