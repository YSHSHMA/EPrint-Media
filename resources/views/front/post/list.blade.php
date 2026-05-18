@extends('front.layouts.app')

@section('title', 'Post')

@section('meta')
    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@push('css')
@endpush

@section('content')
    {{-- start ezoic add --}}
    {{-- <div id="ezoic-pub-ad-placeholder-101"></div>
    <script>
        ezstandalone.cmd.push(function(){
            ezstandalone.showAds(101);
        });
    </script> --}}
    {{-- end ezoic add --}}

    <!-- Breadcrumb -->
    <div class="container">
        <div class="bg0 flex-wr-sb-c p-tb-8 p-tb-20">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ route('index') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>

                <span class="breadcrumb-item f1-s-3 cl9">
                    {{ Request::is('technology') ? 'Technology' : (Request::is('finance') ? 'Finance' : (Request::is('health') ? 'Health' : 'Entertainment')) }}
                </span>
            </div>

            {{-- search --}}
            @include('front.partial.search')

        </div>
    </div>

    <!-- Page heading -->
    <div class="container p-t-4 p-b-40">
        <h2 class="f1-l-1 cl2">
            {{ Request::is('technology') ? 'Technology' : (Request::is('finance') ? 'Finance' : (Request::is('health') ? 'Health' : 'Entertainment')) }}
        </h2>
    </div>

    <!-- Feature post -->
    <section class="bg0">
        <div class="container">
            <div class="row m-rl--1">
                <div class="col-md-6 p-rl-1 p-b-2">
                    <div class="bg-img1 size-a-3 how1 pos-relative"
                        style="background-image: url({{ asset($posts[0]['thumbnail']) }});">
                        <a href="{{ route(Request::segment(1) . '.post', $posts[0]['slug']) }}"
                            class="dis-block how1-child1 trans-03"></a>

                        <div class="flex-col-e-s s-full p-rl-25 p-tb-20">

                            <h3 class="how1-child2 m-t-14 m-b-10">
                                <a href="{{ route(Request::segment(1) . '.post', $posts[0]['slug']) }}"
                                    class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                    {{ $posts[0]['title'] }}
                                </a>
                            </h3>

                            <span class="how1-child2">
                                <span class="f1-s-3 cl11">
                                    {{ date('d M Y', strtotime($posts[0]['published_at'])) }}
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 p-rl-1">
                    <div class="row m-rl--1">
                        @foreach ($posts->skip(1)->take(4) as $post)
                            <div class="col-sm-6 p-rl-1 p-b-2">
                                <div class="bg-img1 size-a-14 how1 pos-relative"
                                    style="background-image: url({{ asset($post['thumbnail']) }});">
                                    <a href="{{ route(Request::segment(1) . '.post', $post['slug']) }}"
                                        class="dis-block how1-child1 trans-03"></a>

                                    <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                        <h3 class="how1-child2 m-t-14">
                                            <a href="{{ route(Request::segment(1) . '.post', $post['slug']) }}"
                                                class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                                {{ $post['title'] }}
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- start ezoic add --}}
    {{-- <div id="ezoic-pub-ad-placeholder-102"></div>
    <script>
        ezstandalone.cmd.push(function(){
            ezstandalone.showAds(102);
        });
    </script> --}}
    {{-- end ezoic add --}}

    <!-- Post -->
    <section class="bg0 p-t-70 p-b-55">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-20">
                    <div class="row" id="postContainer">
                        @foreach ($posts as $post)
                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                <div class="m-b-45">
                                    <a href="{{ route(Request::segment(1) . '.post', $post->slug) }}"
                                        class="wrap-pic-w hov1 trans-03">
                                        <img src="{{ asset($post->thumbnail) }}" loading="lazy" alt="IMG">
                                    </a>
                                    <div class="p-t-16">
                                        <h5 class="p-b-5">
                                            <a href="{{ route(Request::segment(1) . '.post', $post->slug) }}"
                                                class="f1-m-3 cl2 hov-cl10 trans-03">
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
                    </div>

                    @if (count($posts) == 8)
                        <div class="text-center mt-4">
                            <button id="loadMoreBtn" class="btn btn-primary">
                                <span id="btnText">Load More</span>
                                <span id="btnSpinner" class="spinner-border spinner-border-sm ml-2" role="status"
                                    style="display: none;"></span>
                            </button>
                        </div>
                    @endif

                </div>

                {{-- start ezoic add --}}
                {{-- <div id="ezoic-pub-ad-placeholder-109"></div>
                <script>
                    ezstandalone.cmd.push(function(){
                        ezstandalone.showAds(109);
                    });
                </script> --}}
                {{-- end ezoic add --}}


                <div class="col-md-10 col-lg-4 p-b-20">
                    <div class="p-l-10 p-rl-0-sr991">
                        <!-- Most Popular -->
                        <div class="p-b-23">
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Most Popular
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                @foreach ($popularPosts as $key => $popular)
                                    <li class="flex-wr-sb-s p-b-22">
                                        <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                            {{ $key + 1 }}
                                        </div>

                                        @if ($popular->category_id == 2)
                                            <a href="{{ route('technology.post', $popular->slug) }}"
                                                class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">{{ Str::limit($popular->title, 60) }}</a>
                                        @elseif ($popular->category_id == 3)
                                            <a href="{{ route('finance.post', $popular->slug) }}"
                                                class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">{{ Str::limit($popular->title, 60) }}</a>
                                        @elseif ($popular->category_id == 4)
                                            <a href="{{ route('health.post', $popular->slug) }}"
                                                class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">{{ Str::limit($popular->title, 60) }}</a>
                                        @elseif ($popular->category_id == 5)
                                            <a href="{{ route('entertainment.post', $popular->slug) }}"
                                                class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">{{ Str::limit($popular->title, 60) }}</a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!--  -->
                        {{-- <div class="flex-c-s p-b-50">

                        </div> --}}


                        <div class="p-t-50">
                            <!-- Liked Post -->
                            <div>
                                <div class="how2 how2-cl4 flex-s-c">
                                    <h3 class="f1-m-2 cl3 tab01-title">
                                        You May Also Like
                                    </h3>
                                </div>

                                <ul class="p-t-35">
                                    @foreach ($randomPosts as $random)
                                        @php
                                            $routePrefix = match ($random->category_id) {
                                                2 => 'technology',
                                                3 => 'finance',
                                                4 => 'health',
                                                default => 'entertainment',
                                            };
                                        @endphp

                                        <li class="flex-wr-sb-s p-b-30">
                                            <a href="{{ route($routePrefix . '.post', $random->slug) }}"
                                                class="size-w-10 wrap-pic-w hov1 trans-03">
                                                <img src="{{ asset($random->thumbnail) }}" loading="lazy" alt="IMG">
                                            </a>

                                            <div class="size-w-11">
                                                <h6 class="p-b-4">
                                                    <a href="{{ route($routePrefix . '.post', $random->slug) }}"
                                                        class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        {{ Str::limit($random->title, 45) }}
                                                    </a>
                                                </h6>

                                                <span class="cl8 txt-center p-b-24">
                                                    <a href="{{ route($routePrefix . '.index') }}"
                                                        class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        {{ $random->category->name }}
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">-</span>

                                                    <span class="f1-s-3">
                                                        {{ date('d M Y', strtotime($random->published_at)) }}
                                                    </span>
                                                </span>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                        {{-- start ezoic add --}}
                        {{-- <div id="ezoic-pub-ad-placeholder-105"></div>
                        <script>
                            ezstandalone.cmd.push(function(){
                                ezstandalone.showAds(105);
                            });
                        </script> --}}
                        {{-- end ezoic add --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        let offset = 8;

        $('#loadMoreBtn').on('click', function() {
            $('#btnText').text("Loading...");
            $('#btnSpinner').show();
            $('#loadMoreBtn').prop('disabled', true);

            $.ajax({
                url: "{{ route(Request::segment(1).'.post.loadMore') }}",
                type: "GET",
                data: {
                    offset: offset
                },
                success: function(response) {
                    if (response.count > 0) {
                        $('#postContainer').append(response.html);
                        offset += response.count;
                        $('#btnText').text("Load More");
                        $('#btnSpinner').hide();
                        $('#loadMoreBtn').prop('disabled', false);
                    } else {
                        $('#btnText').text("No More Posts");
                        $('#btnSpinner').hide();
                        $('#loadMoreBtn').prop('disabled', true);
                    }
                }
            });
        });
    </script>
@endpush
