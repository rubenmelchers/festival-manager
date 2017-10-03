@extends ('layouts.master')


@section ('content')

    <div class="col-8 col_sm-12">
        <h3> Administration panel for
            <strong class="admin__highlightedname">
                {{ Auth::user()->name }}
            </strong>
        </h3>

        <hr>

        @if(count($users))
            <section class="admin__users-section">
                <button type="button" name="users-dropdown" class="admin__showbutton">
                    <span></span>
                </button>

                <table class="admin__userstable active">
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            role
                        </th>
                        <th>
                            Created on
                        </th>
                        <th>
                            Updated on
                        </th>
                    </tr>

                    @foreach($users as $user)
                        <tr>
                            <td> {{ $user->name }} </td>

                            <td> {{ $user->email }} </td>

                            <td> {{ $user->role }} </td>

                            <td> {{ $user->created_at }} </td>

                            <td> {{ $user->updated_at }} </td>

                        </tr>
                    @endforeach
                </table>

            </section>
            <hr>
        @endif





    </div>  <!-- End of main div -->


@endsection
