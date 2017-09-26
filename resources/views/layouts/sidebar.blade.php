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
