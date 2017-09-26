@extends ('layouts.master')


@section ('content')
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

    <div class="sidebar-module">

        <h4>Archives</h4>

        <ul class="list-unstyled">
            @foreach($archives as $stats)

                <li>
                    <a href="/festivals/?month={{$stats['month']}}&year={{$stats['year']}}"> {{ $stats['month'] . ' ' . $stats['year'] }}</a>
                </li>

            @endforeach
        </ul>

    </div>

@endsection
