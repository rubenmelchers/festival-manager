@extends ('layouts.master')


@section ('content')

    <h1> Administration panel for: {{ Auth::user()->name }} </h1>



@endsection
