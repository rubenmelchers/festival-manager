<p class="blog-post-meta">
    By {{ $festival->user->name }} on
    {{ $festival->created_at->toFormattedDateString() }}
</p>

@if(count($festival->types))

    <ul>
        @foreach($festival->types as $type)

            <li>
                <a href="/festivals/types/{{ $type->name }}">
                    {{ $type->name }}
                </a>
            </li>

        @endforeach

    </ul>

@endif


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
                    By {{ $comment->user->name }} on:
                    {{ $comment->created_at->diffForHumans() }}: <br>
                </strong>

                {{ $comment->body }}

            </li>

        @endforeach

    </ul>
</div>

<hr>

@if(Auth::check())
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

@else

    <div class="card">

        <div class="card-block">

            <p>
                Please log in to create comments!
            </p>

        </div>

    </div>

@endif

{{-- </div> --}}
