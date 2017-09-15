<div class="blog-post">

    <h2 class="blog-post-title">
        <a href="festivals/{{ $festival->id }}">
            {{ $festival->title }}
        </a>
    </h2>

    <p class="blog-post-meta">{{ $festival->created_at->toFormattedDateString() }}</p>

    <p>{{ $festival->description }}</p>

</div>
