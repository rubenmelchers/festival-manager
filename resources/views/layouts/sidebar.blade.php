<div class="sidebar-module">

    <h4>Archives</h4>

    <ul class="list-unstyled">
        @foreach($archives as $stats)

            <li>
                <a href="/festivals?month={{$stats['month']}}&year={{$stats['year']}}"> {{ $stats['month'] . ' ' . $stats['year'] }}</a>
            </li>

        @endforeach
    </ul>

</div>

<div class="sidebar-module">

    <h4>Types</h4>

    <ul class="list-unstyled">
        @foreach($types as $type)

            <li>
                <a href="/festivals/types/{{$type}}">{{$type}}</a>
            </li>

        @endforeach
    </ul>

</div>
