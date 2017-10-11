<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Festival manager') }}</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        {{-- <link href="/css/app.css" rel="stylesheet"> --}}
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800|Raleway:400,500,700,800,900" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>
    <body>

        <div id="app">
            @include('layouts.nav')

            @if($flash = session('message'))

                <div class="alert alert-success" role="alert">
                    {{ $flash }}
                </div>

            @endif

            <main class="main">
                {{-- <div class="grid-12 container"> --}}

                        @yield('content')

                        {{-- @include('layouts.sidebar') --}}

                {{-- </div> --}}
            </main>

        </div>

        @include('layouts.footer')

        <script type="text/javascript" src="{{ asset('js/main.min.js') }}"></script>
    </body>
</html>
