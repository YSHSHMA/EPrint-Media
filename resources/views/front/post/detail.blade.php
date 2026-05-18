@php
    $postUrl = urlencode(url()->current());
    $postTitle = urlencode($detail->title);
@endphp
@extends('front.layouts.app')

@section('title', 'Details')

@section('meta')
    <meta name="description" content="{{ $detail->meta_description ?: seo_fallback_description($detail->detail, 155) }}">
    @if (!empty($detail->meta_keywords))
        <meta name="keywords" content="{{ $detail->meta_keywords }}">
    @endif

    {{-- Canonical --}}
    <link rel="canonical" href="{{ seo_post_url($detail) }}" />

    {{-- Open Graph (Facebook/LinkedIn) --}}
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $detail->meta_title ?: $detail->title }}">
    <meta property="og:description"
        content="{{ $detail->meta_description ?: seo_fallback_description($detail->content, 180) }}">
    <meta property="og:url" content="{{ seo_post_url($detail) }}">
    <meta property="og:image" content="{{ $detail->thumbnail ? url($detail->thumbnail) : url(configData()->header_logo) }}">
    <meta property="og:site_name" content="{{ configData()->name }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $detail->meta_title ?: $detail->title }}">
    <meta name="twitter:description"
        content="{{ $detail->meta_description ?: seo_fallback_description($detail->content, 180) }}">
    <meta name="twitter:image"
        content="{{ $detail->thumbnail ? url($detail->thumbnail) : url(configData()->header_logo) }}">

    {{-- Schema: BlogPosting --}}
    <script type="application/ld+json">
        {!! json_encode(schema_blog_post($detail), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
    </script>

    {{-- Schema: BreadcrumbList --}}
    <script type="application/ld+json">
        {!! json_encode(schema_breadcrumbs_for_post($detail), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
    </script>
@endsection

@push('css')
    <style>
        .img-div {
            height: 300px;
            overflow: hidden;
        }

        .img-div>img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* share  */
        .share-buttons .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            border-radius: 8px;
            color: #fff;
            padding: 10px;
            transition: 0.3s ease;
        }

        .share-buttons .btn i {
            margin-right: 8px;
            font-size: 16px;
        }

        .btn-facebook {
            background: #3b5998;
        }

        .btn-facebook:hover {
            background: #2d4373;
        }

        .btn-twitter {
            background: #1da1f2;
        }

        .btn-twitter:hover {
            background: #0d95e8;
        }

        .btn-linkedin {
            background: #0077b5;
        }

        .btn-linkedin:hover {
            background: #005582;
        }

        .btn-whatsapp {
            background: #25D366;
        }

        .btn-whatsapp:hover {
            background: #1ebe5d;
        }

        .btn-email {
            background: #dd4b39;
        }

        .btn-email:hover {
            background: #c23321;
        }

        /* no style */
        .pause-style {
            all: initial;
            font-family: sans-serif;
            color: #222;
            line-height: 1.8;
            text-align: justify;
        }

        @media (max-width: 991px) {
            .pause-style {
                font-size: 14px;
            }
        }
    </style>
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
        <div class="headline bg0 flex-wr-sb-c p-tb-20">
            <div class="f2-s-1 m-tb-6">
                <a href="{{ route('index') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>

                <a href="{{ route($detail['category_id'] == 2 ? 'technology.index' : ($detail['category_id'] == 3 ? 'finance.index' : ($detail['category_id'] == 4 ? 'health.index' : 'entertainment.index'))) }}"
                    class="breadcrumb-item f1-s-3 cl9">
                    {{ $detail['category_id'] == 2 ? 'Technology' : ($detail['category_id'] == 3 ? 'Finance' : ($detail['category_id'] == 4 ? 'Health' : 'Entertainment')) }}
                </a>

                <span class="breadcrumb-item f1-s-3 cl9">
                    {{ $detail->title }}
                </span>
            </div>

            {{-- search --}}
            @include('front.partial.search')
        </div>
    </div>

    <!-- Content -->
    <section class="bg0 p-b-40 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-t-20">
                    <div class="p-r-10 p-r-0-sr991">
                        <!-- Blog Detail -->
                        <div class="">{{-- start share button --}}
                            <div class="post-container">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ Request::segment(1) }}"
                                        class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                                        {{ $detail->category_id == 2 ? 'Technology' : ($detail->category_id == 3 ? 'Finance' : ($detail->category_id == 4 ? 'Health' : 'Entertainment')) }}
                                    </a>

                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle" type="button" id="shareMenu"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            style="background-color: #17b978; color: white;">
                                            <i class="fas fa-share-alt"></i> Share
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="shareMenu">
                                            <a class="dropdown-item"
                                                href="https://www.facebook.com/sharer/sharer.php?u={{ $postUrl }}"
                                                target="_blank">
                                                <i class="fab fa-facebook text-primary"></i> Facebook
                                            </a>
                                            <a class="dropdown-item"
                                                href="https://twitter.com/intent/tweet?url={{ $postUrl }}&text={{ $postTitle }}"
                                                target="_blank">
                                                <i class="fab fa-twitter text-info"></i> Twitter
                                            </a>
                                            <a class="dropdown-item"
                                                href="https://www.linkedin.com/shareArticle?mini=true&url={{ $postUrl }}&title={{ $postTitle }}"
                                                target="_blank">
                                                <i class="fab fa-linkedin text-primary"></i> LinkedIn
                                            </a>
                                            <a class="dropdown-item"
                                                href="https://api.whatsapp.com/send?text={{ $postTitle }}%20{{ $postUrl }}"
                                                target="_blank">
                                                <i class="fab fa-whatsapp text-success"></i> WhatsApp
                                            </a>
                                            {{-- <a class="dropdown-item"
                                                href="mailto:?subject={{ $postTitle }}&body={{ $postUrl }}">
                                                <i class="fas fa-envelope text-danger"></i> Email
                                            </a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end share button --}}

                            <h3 class="f1-l-3 cl2 p-b-16 p-t-20 respon2">
                                {{ $detail->title }}
                            </h3>

                            <div class="flex-wr-s-s p-b-40">
                                <span class="f1-s-3 cl8 m-r-15 d-flex w-100" style="justify-content: space-between">
                                    <span class="f1-s-5">
                                        By Team TrendifyBuzz
                                    </span>
                                    <span class="f1-s-5">
                                        {{ 'On: ' . date('d M Y', strtotime($detail->published_at)) }}
                                    </span>
                            </div>

                            <div class="wrap-pic-max-w p-b-20 img-div">
                                <img src="{{ asset($detail->thumbnail) }}" loading="lazy" alt="IMG">
                            </div>

                            {{-- start ezoic add --}}
                            {{-- <div id="ezoic-pub-ad-placeholder-102"></div>
                            <script>
                                ezstandalone.cmd.push(function(){
                                    ezstandalone.showAds(102);
                                });
                            </script> --}}
                            {{-- end ezoic add --}}

                            <div class="pause-style">
                                <style>
                                    .no-css,
                                    .no-css * {
                                        all: revert !important;
                                    }
                                </style>

                                <div class="no-css">
                                    {!! $detail->detail !!}
                                    {{-- <p>Published at: {{ date('d M Y', strtotime($detail->published_at)) }}</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- share --}}
                    <div class="share-buttons p-t-30 p-b-20">
                        <div class="row">
                            <div class="col-3 mb-2">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $postUrl }}" target="_blank"
                                    class="btn btn-block btn-facebook">
                                    <i class="fab fa-facebook-f"></i> <span class="d-none d-md-inline">Facebook</span>
                                </a>
                            </div>
                            <div class="col-3 mb-2">
                                <a href="https://twitter.com/intent/tweet?url={{ $postUrl }}&text={{ $postTitle }}"
                                    target="_blank" class="btn btn-block btn-twitter">
                                    <i class="fab fa-twitter"></i> <span class="d-none d-md-inline">Twitter</span>
                                </a>
                            </div>
                            <div class="col-3 mb-2">
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $postUrl }}&title={{ $postTitle }}"
                                    target="_blank" class="btn btn-block btn-linkedin">
                                    <i class="fab fa-linkedin-in"></i> <span class="d-none d-md-inline">LinkedIn</span>
                                </a>
                            </div>
                            <div class="col-3 mb-2">
                                <a href="https://api.whatsapp.com/send?text={{ $postTitle }}%20{{ $postUrl }}"
                                    target="_blank" class="btn btn-block btn-whatsapp">
                                    <i class="fab fa-whatsapp"></i> <span class="d-none d-md-inline">WhatsApp</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- start ezoic add --}}
                    {{-- <div id="ezoic-pub-ad-placeholder-109"></div>
                    <script>
                        ezstandalone.cmd.push(function(){
                            ezstandalone.showAds(109);
                        });
                    </script> --}}
                    {{-- end ezoic add --}}

                </div>

                <!-- Sidebar -->
                <div class="col-md-10 col-lg-4 p-b-20 p-t-20">
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
                                                <img src="{{ asset($random->thumbnail) }}" loading="lazy"
                                                    alt="IMG">
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
@endpush
