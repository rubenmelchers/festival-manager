<div class="col-4 col_md-6 col_sm-12 festival-preview__wrapper">
    <div class="festival-preview__article">
        @if($festival->image !== null)
            <a href="festivals/{{$festival->id}}" style="background-image: url({{$festival->image}})" class="festival-preview__link festival-preview__link--image">
            @else
                <a href="festivals/{{$festival->id}}" class="festival-preview__link">
                @endif

                <div class="festival-preview__title">
                    {{ $festival->title }}
                </div>

                <div class="festival-preview__date">
                    {{ date('d M Y', strtotime($festival->date)) }}
                </div>

                <div class="festival-preview__description">
                    <p>
                        {{ $festival->description }}
                    </p>
                </div>

            </a>
    </div>

</div>
