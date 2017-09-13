@extends ('layouts.master')


@section ('content')

    <div class="col-sm-8 blog-main">

        @foreach($types as $type)

            @include('types.type')

        @endforeach

    </div>

@endsection
