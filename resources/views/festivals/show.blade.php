@extends ('layouts.master')

@section ('content')

    <div class="col-sm-8 blog-main">

        <h1>Festival: {{ $festival->title }}</h1>
        <p class="blog-post-meta">{{ $festival->created_at->toFormattedDateString() }}</p>

        <p>
            {{ $festival->body }}
        </p>

    </div>


@endsection
