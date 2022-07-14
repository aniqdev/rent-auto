<div class="posts-wrapper">

    @foreach($posts as $post)

    <article class="post-item card-4">

        <a href="{{ route('aktuality.show', $post->slug) }}" class="post-item__link"></a>

        <div class="post-item__img">
            @if($post->thumbnail)
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->name }}" />
            @else
                <img src="{{ asset('storage/images/no-image.png') }}" alt="{{ $post->name }}" />
            @endif

            <div class="post-item__name">
                {{ $post->name }}
            </div>
        </div>

        <div class="post-item__description">
            <div class="post-item__category">
                {{ $post->category->name }}
            </div>

            <div class="post-item__shorttext">
                {!! $post->short_text !!}
            </div>
        </div>

        <div class="post-item__actions">
            <div class="post-item__readmore">
                <a href="{{ route('aktuality.show', $post->slug) }}">Číst více <i class="icofont-rounded-right"></i></a>
            </div>
        </div>

    </article>

    @endforeach




</div>
