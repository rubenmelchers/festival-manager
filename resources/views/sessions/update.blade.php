@extends('layouts.fullwidth')

@section('content')

    <div class="col-12 blog-main">

        {{-- @foreach($user as $user) --}}

            <h1>Update form for
                <strong class="admin__highlightedname">
                    {{ $user->name }}
                </strong>
             </h1>
            <hr>

                <form method="POST" action="/users/{{ $user->id }}/update" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group col-8 col_sm-12">
                        <label for="avatar">Avatar:</label><br>
                        <input type="file" name="avatar" id="avatar" value="Upload profile picture">

                    </div>

                    <div class="form-group col-6 col_sm-12">
                        <label for="name" class="col-6">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ $user->name }}">
                    </div>

                    <div class="form-group  col-8 col_sm-12">
                        <label for="email" class="col-8 col_sm-12 control-label">Email Address: </label>

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{$user->email}}">

                    </div>

                    <div class="form-group col-6 col_sm-12">
                        <label for="password" class="col-6">password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>

                    @include('layouts.errors')

                </form>




        {{-- @endforeach --}}





    </div>




@endsection
