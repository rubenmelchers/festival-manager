@extends ('layouts.master')

@section ('content')

    <div class="col-sm-8 blog-main">

        <h1>Festival: {{ $festival->title }}</h1>
        <p class="blog-post-meta">{{ $festival->created_at->toFormattedDateString() }}</p>

        <p>
            {{ $festival->description }}
        </p>

        <hr>

        {{-- Show comments --}}
        <div class="comments">

            <ul class="list-group">

                @foreach ($festival->comments as $comment)

                    <li class="list-group-item">

                        <strong>
                            {{ $comment->created_at->diffForHumans() }}: <br>
                        </strong>

                        {{ $comment->body }}

                    </li>

                @endforeach

            </ul>
        </div>

        <hr>

        {{-- Create comment --}}
        <div class="card">

            <div class="card-block">

                <form class="" action="/festivals/{{ $festival->id }}/comments" method="POST">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <textarea name="body" class="form-control" placeholder="Type comment here" rows="8" cols="80" required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add comment</button>
                    </div>

                </form>

                @include('layouts.errors')

            </div>

        </div>

    </div>


@endsection
