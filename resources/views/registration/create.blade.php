@extends ('layouts.master');

@section ('content')

    <div class="col-8 col_sm-8">

        <h1>Register</h1>


        <form action="/register" method="post">

            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col_md-4 control-label">Name</label>

                <div class="col_md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col_md-4 control-label">E-Mail Address</label>

                <div class="col_md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col_md-4 control-label">Password</label>

                <div class="col_md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    {{-- @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif --}}
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col_md-4 control-label">Confirm Password</label>

                <div class="col_md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col_md-6" data-push-left="off-4">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </div>

            @include('layouts.errors');

        </form>

    </div>


@endsection
