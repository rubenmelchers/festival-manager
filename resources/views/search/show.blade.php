@extends ('layouts.detail')

@section ('content')

@foreach($festivals as $festival)

    <h2>
        {{ $festival->title }}
    </h2>
@endforeach




@endsection
