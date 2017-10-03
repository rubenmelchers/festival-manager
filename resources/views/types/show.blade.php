@extends ('layouts.master')

@section ('content')

    <div class="col-8 col_sm-12 blog-main">

        <h1>Type: {{ $type->title }}</h1>

        <p>
            {{ $type->description }}
        </p>

    </div>


@endsection
