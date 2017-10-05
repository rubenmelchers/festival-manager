@extends('layouts.master')

@section('content')

    <div class="col-12 blog-main">

        @foreach($user as $user)

            <h1>Update form for
                <strong class="admin__highlightedname">
                    {{ $user->name }}
                </strong>
             </h1>
            <hr>

                <form method="POST" action="/admin/update/user/{{ $user->id }}">
                    {{ csrf_field() }}

                    <div class="form-group col-6 col_sm-12">
                        <label for="name" class="col-6">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ $user->name }}">
                    </div>

                    <div class="form-group  col-8 col_sm-12">
                        <label for="email" class="col-8 col_sm-12 control-label">Email Address: </label>

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{$user->email}}">

                    </div>

                    <div class="form-group col-5 col_sm-12">
                        <label for="role">Role:</label>

                        @if( $user->role == 1)
                            <p>Account is currently an administrator</p>
                            <select class="form-control" name="role">
                                <option value="1" selected>Administrator</option>
                                <option value="2">User</option>
                            </select>
                        @else
                            <p>Account is currently a user</p>
                            <select class="form-control" name="role">
                                <option value="1">Administrator</option>
                                <option value="2" selected>User</option>
                            </select>
                        @endif

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>

                    @include('layouts.errors')

                </form>




        @endforeach





    </div>




@endsection
