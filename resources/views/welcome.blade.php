@extends ('layouts.master-nogrid')


@section ('content')



    <div class="grid-12 container festival-previews">



        @if(count($festivals))
            <div class="col-8 col_sm-12">
                <div class="grid-12">
                    @foreach($festivals as $festival)

                        @include('festivals.festival')

                    @endforeach


                </div>
            </div>
        @endif


        @include('layouts.sidebar')


    </div>

@endsection
