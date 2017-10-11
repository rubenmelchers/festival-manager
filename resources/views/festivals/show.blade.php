@extends ('layouts.detail')

@section ('content')

    <div class="festival">
        <header class="festival__header grid-12">
            @if($festival->image != "")
                <div class="festival__image" style="background: url({{$festival->image}})"></div>

            @else
                <div class="festival__image festival__image--nobackground"></div>
            @endif

            <div class="col-12">
                <h2 class="festival__title">
                    {{$festival->title}}
                </h2>

                <div class="festival__date">
                    {{ date('d M Y', strtotime($festival->date)) }}
                </div>

                <div class="festival__time">
                    {{ date('G:i', strtotime($festival->starttime)) }}
                    -
                    {{ date('h:i', strtotime($festival->endtime)) }}
                </div>
            </div>

        </header>


        <div class="grid-12 container">

            <div class="col-8">
                <div class="festival__main">
                    @include('festivals.body')

                </div>

            </div>

        </div>

    </div>




@endsection
