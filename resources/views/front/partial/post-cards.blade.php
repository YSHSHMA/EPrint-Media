@foreach ($posts as $post)
    <div class="col-sm-6 p-r-25 p-r-15-sr991">
        <div class="m-b-45">
            <a href="{{ route(Request::segment(1).'.post', $post->slug) }}" class="wrap-pic-w hov1 trans-03">
                <img src="{{ asset($post->thumbnail) }}" loading="lazy" alt="IMG">
            </a>
            <div class="p-t-16">
                <h5 class="p-b-5">
                    <a href="{{ route(Request::segment(1).'.post', $post->slug) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                        {{ Str::limit($post->title, 50) }}
                    </a>
                </h5>
                <span class="cl8">
                    <span class="f1-s-3">
                        {{ date('d M Y', strtotime($post->published_at)) }}
                    </span>
                </span>
            </div>
        </div>
    </div>
@endforeach
