<div class="blog-post">

    <h2 class="blog-post-title">
        <a href="/types/{{ $type->id }}">
            {{ $type->title }}
        </a>
    </h2>
    
    <p class="blog-post-meta">{{ $type->created_at->toFormattedDateString() }}</p>

    <p>{{ $type->description }}</p>

</div>
