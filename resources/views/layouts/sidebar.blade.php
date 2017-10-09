<aside class="sidebar col-3 col_sm-12" data-push-left="off-1 off_sm-0">
    <div class="sidebar-module">

        <h5>Archives</h5>

        <ul class="list-unstyled">
            @foreach($archives as $stats)

                <li>
                    <a href="/festivals?month={{$stats['month']}}&year={{$stats['year']}}"> {{ $stats['month'] . ' ' . $stats['year'] }}</a>
                </li>

            @endforeach
        </ul>

    </div>

    <div class="sidebar-module">

        <h5>Types</h5>

        <ul class="list-unstyled">
            <li>
                <a href="/festivals">All</a>
            </li><br>
            @foreach($types as $type)

                <li>
                    <a href="/festivals/types/{{$type}}">{{$type}}</a>
                </li>

            @endforeach
        </ul>

    </div>
</aside>
