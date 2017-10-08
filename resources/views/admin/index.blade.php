@extends ('layouts.master')


@section ('content')

    <div class="col-12">
        <h3> Administration panel for
            <strong class="admin__highlightedname">
                {{ Auth::user()->name }}
            </strong>
        </h3>

        <hr>

        <section class="admin__users-section">
            <h4>
                Users
            </h4>
            <button type="button" name="users-dropdown" class="admin__showbutton admin__showbutton--users hideTable">
                <span></span>
            </button>

            <table class="admin__userstable active">
                <tr>
                    <th>
                        User ID
                    </th>
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
                    <th>
                        Admin commands
                    </th>
                </tr>

                @if(count($users))
                    @foreach($users as $user)
                        <tr>
                            <td class="admin__iddata">{{ $user->id }}</td>
                            <td class="admin__namedata"> {{ $user->name }} </td>

                            <td> {{ $user->email }} </td>

                            <td>
                                @if(  $user->role  === 1)
                                    Admin
                                @else
                                    User
                                @endif
                            </td>

                            <td> {{ $user->created_at->toFormattedDateString() }} </td>

                            <td> {{ $user->updated_at->toFormattedDateString() }} </td>

                            <td>
                                <br>
                                <a href="/admin/update/user/{{ $user->id }}" class="btn btn-primary">
                                    Update
                                </a>

                                <br><br>

                                <a href="#" class="admin__userdelete btn btn-danger">
                                    Delete
                                </a>
                                <br><br>
                            </td>
                        </tr>
                    @endforeach
                @endif

                <tr>
                    <td>
                        <br>
                        <a href="/admin/add/user" class="btn btn-primary">Add new user</a>
                        <br>
                    </td>
                </tr>
            </table>

        </section>
        <hr>


        <section class="admin__festivals-section">
            <h4>
                Festivals
            </h4>
            <button type="button" name="festivals-dropdown" class="admin__showbutton admin__showbutton--festivals hideTable">
                <span></span>
            </button>

            <table class="admin__festivalstable active">
                <tr>
                    <th>
                        Festival ID
                    </th>
                    <th>
                        Created by
                    </th>
                    <th>
                        Title
                    </th>
                    <th class="admin__festivalstable-description">
                        Description
                    </th>
                    <th>
                        Location
                    </th>
                    <th>
                        Created on
                    </th>
                    <th>
                        Updated on
                    </th>
                    <th>
                        Admin commands
                    </th>
                </tr>

                @if(count($festivals))
                    @foreach($festivals as $festival)
                        <tr>
                            <td class="admin__iddata">{{$festival->id}}</td>
                            <td> {{ $festival->user->name }} </td>

                            <td class="admin__namedata"> {{ $festival->title }} </td>

                            <td> {{ $festival->description }} </td>

                            <td> {{ $festival->location }} </td>

                            <td> {{ $festival->created_at->toFormattedDateString() }} </td>

                            <td> {{ $festival->updated_at->toFormattedDateString() }} </td>

                            <td><br>
                                <a href="/admin/update/festival/{{ $festival->id }}" class="btn btn-primary">
                                    Update
                                </a><br>

                                <br>

                                <a href="#" class="admin__festivaldelete btn btn-danger">
                                    Delete
                                </a><br>
                            </td>
                        </tr>
                    @endforeach
                @endif

                <tr>
                    <td>
                        <br>
                        <a href="/admin/add/festival" class="btn btn-primary">Add new festival</a>
                        <br>
                    </td>
                </tr>
            </table>

        </section>
        <hr>





        <section class="admin__types-section">
            <h4>
                Types
            </h4>
            <button type="button" name="types-dropdown" class="admin__showbutton admin__showbutton--types hideTable">
                <span></span>
            </button>

            <table class="admin__typestable active">
                <tr>
                    <th>
                        Type ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Active
                    </th>
                    <th>
                        Created on
                    </th>
                    <th>
                        Updated on
                    </th>
                    <th>
                        Admin commands
                    </th>
                </tr>

                @if(count($types))
                    @foreach($types as $type)
                        <tr>
                            <td class="admin__iddata">{{$type->id}}</td>
                            <td class="admin__namedata"> {{ $type->name }} </td>

                            <td> {{ $type->active }} </td>

                            <td> {{ $type->created_at->toFormattedDateString() }} </td>

                            <td> {{ $type->updated_at->toFormattedDateString() }} </td>

                            <td><br>
                                <a href="/admin/update/type/{{$type->id}}" class="btn btn-primary">
                                    Update
                                </a>

                                <br><br>
                                <a href="#" class="admin__deletetype btn btn-danger">
                                    Delete
                                </a><br><br>
                            </td>
                        </tr>
                    @endforeach
                @endif

                <tr>
                    <td>
                        <br>
                        <a href="/admin/add/type" class="btn btn-primary">Add new type</a>
                        <br>
                    </td>
                </tr>
            </table>

        </section>
        <hr>

    </div>  <!-- End of main div -->


@endsection
