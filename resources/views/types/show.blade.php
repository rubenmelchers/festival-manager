@extends ('layouts.master')

@section ('content')

    <div class="col-sm-8 blog-main">

        <h1>Type: {{ $type->title }}</h1>

        <p>
            {{ $type->description }}
        </p>

    </div>


@endsection
