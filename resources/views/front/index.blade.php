@extends('front.layouts.app')

@section('title', 'Home')

@push('css')
    
@endpush

@section('meta')
    <link rel="canonical" href="{{url('/')}}">
@endsection

@section('content')
    <!-- Headline -->
    <div class="container">
        {{-- start ezoic add --}}
        {{-- <div id="ezoic-pub-ad-placeholder-101"></div>
        <script>
            ezstandalone.cmd.push(function(){
                ezstandalone.showAds(101);
            });
        </script> --}}
        {{-- end ezoic add --}}

        <div class="bg0 flex-wr-sb-c p-tb-20">
            <div class="f2-s-1 size-w-0 m-tb-6 flex-wr-s-c">
                <span class="text-uppercase cl2 p-r-8">
                    Trending Now:
                </span>

                <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown"
                    data-out="fadeOutDown">
                    @foreach ($trendings as $trending)
                        <span class="dis-inline-block slide100-txt-item animated visible-false">
                            @if ($trending->category_id == 2)
                                <a
                                    href="{{ route('technology.post', $trending->slug) }}">{{ Str::limit($trending->title, 55) }}</a>
                            @elseif ($trending->category_id == 3)
                                <a
                                    href="{{ route('finance.post', $trending->slug) }}">{{ Str::limit($trending->title, 55) }}</a>
                            @elseif ($trending->category_id == 4)
                                <a
                                    href="{{ route('health.post', $trending->slug) }}">{{ Str::limit($trending->title, 55) }}</a>
                            @elseif ($trending->category_id == 5)
                                <a
                                    href="{{ route('entertainment.post', $trending->slug) }}">{{ Str::limit($trending->title, 55) }}</a>
                            @endif
                        </span>
                    @endforeach
                </span>
            </div>

            {{-- search --}}
            @include('front.partial.search')

        </div>
    </div>

    <!-- Feature post -->
    <section class="bg0">
        <div class="container">
            <div class="row m-rl--1">
                <div class="col-md-6 p-rl-1 p-b-2">
                    <div class="bg-img1 size-a-3 how1 pos-relative"
                        style="background-image: url({{ asset($featured[0]['thumbnail']) }});">
                        <a href="{{ route($featured[0]['category_id'] == 2 ? 'technology.post' : ($featured[0]['category_id'] == 3 ? 'finance.post' : ($featured[0]['category_id'] == 4 ? 'health.post' : 'entertainment.post')) , $featured[0]->slug) }}"
                            class="dis-block how1-child1 trans-03"></a>

                        <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                            <a href="{{ route($featured[0]['category_id'] == 2 ? 'technology.index' : ($featured[0]['category_id'] == 3 ? 'finance.index' : ($featured[0]['category_id'] == 4 ? 'health.index' : 'entertainment.index')) ) }}"
                                class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                {{ $featured[0]->category->name }}
                            </a>

                            <h3 class="how1-child2 m-t-14 m-b-10">
                                <a href="{{ route($featured[0]['category_id'] == 2 ? 'technology.post' : ($featured[0]['category_id'] == 3 ? 'finance.post' : ($featured[0]['category_id'] == 4 ? 'health.post' : 'entertainment.post')), $featured[0]->slug) }}"
                                    class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                    {{ $featured[0]->title }}
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 p-rl-1">
                    <div class="row m-rl--1">
                        <div class="col-12 p-rl-1 p-b-2">
                            <div class="bg-img1 size-a-4 how1 pos-relative"
                                style="background-image: url({{ asset($featured[1]['thumbnail']) }});">
                                <a href="{{ route($featured[1]['category_id'] == 2 ? 'technology.post' : ($featured[1]['category_id'] == 3 ? 'finance.post' : ($featured[1]['category_id'] == 4 ? 'health.post' : 'entertainment.post')), $featured[1]->slug) }}"
                                    class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-24">
                                    <a href="{{ route($featured[1]['category_id'] == 2 ? 'technology.index' : ($featured[1]['category_id'] == 3 ? 'finance.index' : ($featured[1]['category_id'] == 4 ? 'health.index' : 'entertainment.index')) ) }}"
                                        class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                        {{ $featured[1]->category->name }}
                                    </a>

                                    <h3 class="how1-child2 m-t-14">
                                        <a href="{{ route($featured[1]['category_id'] == 2 ? 'technology.post' : ($featured[1]['category_id'] == 3 ? 'finance.post' : ($featured[1]['category_id'] == 4 ? 'health.post' : 'entertainment.post')), $featured[1]->slug) }}"
                                            class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
                                            {{ $featured[1]->title }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-rl-1 p-b-2">
                            <div class="bg-img1 size-a-5 how1 pos-relative"
                                style="background-image: url({{ asset($featured[2]['thumbnail']) }});">
                                <a href="{{ route($featured[2]['category_id'] == 2 ? 'technology.post' : ($featured[2]['category_id'] == 3 ? 'finance.post' : ($featured[2]['category_id'] == 4 ? 'health.post' : 'entertainment.post')), $featured[2]->slug) }}"
                                    class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                    <a href="{{ route($featured[2]['category_id'] == 2 ? 'technology.index' : ($featured[2]['category_id'] == 3 ? 'finance.index' : ($featured[2]['category_id'] == 4 ? 'health.index' : 'entertainment.index')) ) }}"
                                        class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                        {{ $featured[2]->category->name }}
                                    </a>

                                    <h3 class="how1-child2 m-t-14">
                                        <a href="{{ route($featured[2]['category_id'] == 2 ? 'technology.post' : ($featured[2]['category_id'] == 3 ? 'finance.post' : ($featured[2]['category_id'] == 4 ? 'health.post' : 'entertainment.post')), $featured[2]->slug) }}"
                                            class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                            {{ $featured[2]->title }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-rl-1 p-b-2">
                            <div class="bg-img1 size-a-5 how1 pos-relative"
                                style="background-image: url({{ asset($featured[3]['thumbnail']) }});">
                                <a href="{{ route($featured[3]['category_id'] == 2 ? 'technology.post' : ($featured[3]['category_id'] == 3 ? 'finance.post' : ($featured[3]['category_id'] == 4 ? 'health.post' : 'entertainment.post')), $featured[3]->slug) }}"
                                    class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                    <a href="{{ route($featured[3]['category_id'] == 2 ? 'technology.index' : ($featured[3]['category_id'] == 3 ? 'finance.index' : ($featured[3]['category_id'] == 4 ? 'health.index' : 'entertainment.index')) ) }}"
                                        class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                        {{ $featured[3]->category->name }}
                                    </a>

                                    <h3 class="how1-child2 m-t-14">
                                        <a href="{{ route($featured[3]['category_id'] == 2 ? 'technology.post' : ($featured[3]['category_id'] == 3 ? 'finance.post' : ($featured[3]['category_id'] == 4 ? 'health.post' : 'entertainment.post')) , $featured[3]->slug) }}"
                                            class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                            {{ $featured[3]->title }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
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
    <section class="bg0 p-t-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="p-b-20">

                        {{-- technology --}}
                        <div class="tab01 p-b-20">
                            <div class="tab01-head how2 how2-cl1 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                <h3 class="f1-m-2 cl12 tab01-title">
                                    Technology
                                </h3>

                                <ul class="nav nav-tabs" role="tablist">
                                    {{-- <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tab2-1"
                                            role="tab">All</a>
                                    </li> --}}
                                </ul>

                                <a href="{{ route('technology.index') }}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    View all
                                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                </a>
                            </div>


                            <div class="tab-content p-t-35">
                                <div class="tab-pane fade show active" id="tab1-1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <div class="m-b-30">
                                                <a href="{{ route('technology.post', $techPosts[0]['slug']) }}"
                                                    class="wrap-pic-w hov1 trans-03">
                                                    <img src="{{ asset($techPosts[0]['thumbnail']) }}" loading="lazy" alt="IMG">
                                                </a>

                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a href="{{ route('technology.post', $techPosts[0]['slug']) }}"
                                                            class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            {{ Str::limit($techPosts[0]['title'], 40) }}
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <span class="f1-s-3">
                                                            {{ date('d M Y', strtotime($techPosts[0]['published_at'])) }}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            @foreach ($techPosts->skip(1) as $tech)
                                                <div class="flex-wr-sb-s m-b-30">
                                                    <a href="{{ route('technology.post', $tech['slug']) }}"
                                                        class="size-w-1 wrap-pic-w hov1 trans-03">
                                                        <img src="{{ asset($tech['thumbnail']) }}" loading="lazy" alt="IMG">
                                                    </a>

                                                    <div class="size-w-2">
                                                        <h5 class="p-b-5">
                                                            <a href="{{ route('technology.post', $tech['slug']) }}"
                                                                class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                {{ Str::limit($tech['title'], 40) }}
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
                                                            <span class="f1-s-3">
                                                                {{ date('d M Y', strtotime($tech['published_at'])) }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- finance -->
                        <div class="tab01 p-b-20">
                            <div class="tab01-head how2 how2-cl2 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                <!-- Brand tab -->
                                <h3 class="f1-m-2 cl13 tab01-title">
                                    Finance
                                </h3>

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    {{-- <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tab2-1"
                                            role="tab">All</a>
                                    </li> --}}
                                </ul>

                                <!--  -->
                                <a href="{{ route('finance.index') }}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    View all
                                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                </a>
                            </div>


                            <!-- Tab panes -->
                            <div class="tab-content p-t-35">
                                <!-- - -->
                                <div class="tab-pane fade show active" id="tab2-1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->
                                            <div class="m-b-30">
                                                <a href="{{ route('finance.post', $financePosts[0]['slug']) }}"
                                                    class="wrap-pic-w hov1 trans-03">
                                                    <img src="{{ asset($financePosts[0]['thumbnail']) }}" loading="lazy" alt="IMG">
                                                </a>

                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a href="{{ route('finance.post', $financePosts[0]['slug']) }}"
                                                            class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            {{ Str::limit($financePosts[0]['title'], 40) }}
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <span class="f1-s-3">
                                                            {{ date('d M Y', strtotime($financePosts[0]['published_at'])) }}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->
                                            @foreach ($financePosts->skip(1) as $finance)
                                                <div class="flex-wr-sb-s m-b-30">
                                                    <a href="{{ route('finance.post', $finance['slug']) }}"
                                                        class="size-w-1 wrap-pic-w hov1 trans-03">
                                                        <img src="{{ asset($finance['thumbnail']) }}" loading="lazy" alt="IMG">
                                                    </a>

                                                    <div class="size-w-2">
                                                        <h5 class="p-b-5">
                                                            <a href="{{ route('finance.post', $finance['slug']) }}"
                                                                class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                {{ Str::limit($finance['title'], 40) }}
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
                                                            <span class="f1-s-3">
                                                                {{ date('d M Y', strtotime($finance['published_at'])) }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
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

                        <!-- Health -->
                        <div class="tab01 p-b-20">
                            <div class="tab01-head how2 how2-cl3 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                <!-- Brand tab -->
                                <h3 class="f1-m-2 cl14 tab01-title">
                                    Health
                                </h3>

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    {{-- <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tab3-1"
                                            role="tab">All</a>
                                    </li> --}}
                                </ul>

                                <!--  -->
                                <a href="{{ route('health.index') }}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    View all
                                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                </a>
                            </div>


                            <!-- Tab panes -->
                            <div class="tab-content p-t-35">
                                <!-- - -->
                                <div class="tab-pane fade show active" id="tab3-1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->
                                            <div class="m-b-30">
                                                <a href="{{ route('health.post', $healthPosts[0]['slug']) }}"
                                                    class="wrap-pic-w hov1 trans-03">
                                                    <img src="{{ asset($healthPosts[0]['thumbnail']) }}" loading="lazy" alt="IMG">
                                                </a>

                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a href="{{ route('health.post', $healthPosts[0]['slug']) }}"
                                                            class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            {{ Str::limit($healthPosts[0]['title'], 40) }}
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <span class="f1-s-3">
                                                            {{ date('d M Y', strtotime($healthPosts[0]['published_at'])) }}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            @foreach ($healthPosts->skip(1) as $health)
                                                <div class="flex-wr-sb-s m-b-30">
                                                    <a href="{{ route('health.post', $health['slug']) }}"
                                                        class="size-w-1 wrap-pic-w hov1 trans-03">
                                                        <img src="{{ asset($health['thumbnail']) }}" loading="lazy" alt="IMG">
                                                    </a>

                                                    <div class="size-w-2">
                                                        <h5 class="p-b-5">
                                                            <a href="{{ route('health.post', $health['slug']) }}"
                                                                class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                {{ Str::limit($health['title'], 40) }}
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
                                                            <span class="f1-s-3">
                                                                {{ date('d M Y', strtotime($health['published_at'])) }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Entertainment -->
                        <div class="tab01 p-b-20">
                            <div class="tab01-head how2 how2-cl4 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                <!-- Brand tab -->
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Entertainment
                                </h3>

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    {{-- <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tab3-1"
                                            role="tab">All</a>
                                    </li> --}}
                                </ul>

                                <!--  -->
                                <a href="{{ route('entertainment.index') }}"
                                    class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    View all
                                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                </a>
                            </div>


                            <!-- Tab panes -->
                            <div class="tab-content p-t-35">
                                <!-- - -->
                                <div class="tab-pane fade show active" id="tab4-1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->
                                            <div class="m-b-30">
                                                <a href="{{ route('entertainment.post', $entertainmentPosts[0]['slug']) }}"
                                                    class="wrap-pic-w hov1 trans-03">
                                                    <img src="{{ asset($entertainmentPosts[0]['thumbnail']) }}" loading="lazy"
                                                        alt="IMG">
                                                </a>

                                                <div class="p-t-20">
                                                    <h5 class="p-b-5">
                                                        <a href="{{ route('entertainment.post', $entertainmentPosts[0]['slug']) }}"
                                                            class="f1-m-3 cl2 hov-cl10 trans-03">
                                                            {{ Str::limit($entertainmentPosts[0]['title'], 40) }}
                                                        </a>
                                                    </h5>

                                                    <span class="cl8">
                                                        <span class="f1-s-3">
                                                            {{ date('d M Y', strtotime($entertainmentPosts[0]['published_at'])) }}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            @foreach ($entertainmentPosts->skip(1) as $entertainment)
                                                <div class="flex-wr-sb-s m-b-30">
                                                    <a href="{{ route('entertainment.post', $entertainment['slug']) }}"
                                                        class="size-w-1 wrap-pic-w hov1 trans-03">
                                                        <img src="{{ asset($entertainment['thumbnail']) }}" loading="lazy"
                                                            alt="IMG">
                                                    </a>

                                                    <div class="size-w-2">
                                                        <h5 class="p-b-5">
                                                            <a href="{{ route('entertainment.post', $entertainment['slug']) }}"
                                                                class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                {{ Str::limit($entertainment['title'], 40) }}
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
                                                            <span class="f1-s-3">
                                                                {{ date('d M Y', strtotime($entertainment['published_at'])) }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- sidebar --}}
                <div class="col-md-10 col-lg-4">
                    <div class="p-l-10 p-rl-0-sr991 p-b-20">
                        <!--  -->
                        <div>
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
                        <div class="flex-c-s p-t-8">
                        </div>

                        <!--  -->

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

    {{-- start ezoic add --}}
    {{-- <div id="ezoic-pub-ad-placeholder-110"></div>
    <script>
        ezstandalone.cmd.push(function(){
            ezstandalone.showAds(110);
        });
    </script> --}}
    {{-- end ezoic add --}}

    <!-- Banner -->
    <div class="container">
        <div class="flex-c-c">
        </div>
    </div>

    <!-- Latest -->
    <section class="bg0 p-b-30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-20">
                    <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
                        <h3 class="f1-m-2 cl3 tab01-title">
                            Latest Articles
                        </h3>
                    </div>

                    <div class="row p-t-35">
                        @foreach ($latestPosts as $latest)
                            @php
                                $routePrefix = match ($latest->category_id) {
                                    2 => 'technology',
                                    3 => 'finance',
                                    4 => 'health',
                                    default => 'entertainment',
                                };
                            @endphp
                            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                <!-- Item latest -->
                                <div class="m-b-45">
                                    <a href="{{ route($routePrefix . '.post', $latest->slug) }}" class="wrap-pic-w hov1 trans-03">
                                        <img src="{{ asset($latest->thumbnail) }}" loading="lazy" alt="IMG">
                                    </a>

                                    <div class="p-t-16">
                                        <h5 class="p-b-5">
                                            <a href="{{ route($routePrefix . '.post', $latest->slug) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                {{Str::limit($latest['title'],50)}}
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            <a href="{{ route($routePrefix . '.index') }}" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                {{$latest->category->name}}
                                            </a>

                                            <span class="f1-s-3 m-rl-3">
                                                -
                                            </span>

                                            <span class="f1-s-3">
                                                {{date('d M Y',strtotime($latest['published_at']))}}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-10 col-lg-4">
                    {{-- start ezoic add --}}
                    {{-- <div id="ezoic-pub-ad-placeholder-104"></div>
                    <script>
                        ezstandalone.cmd.push(function(){
                            ezstandalone.showAds(104);
                        });
                    </script> --}}
                    {{-- end ezoic add --}}
                </div>
            </div>
        </div>
    </section>

    {{-- start ezoic add --}}
    {{-- <div id="ezoic-pub-ad-placeholder-103"></div>
    <script>
        ezstandalone.cmd.push(function(){
            ezstandalone.showAds(103);
        });
    </script> --}}
    {{-- end ezoic add --}}
@endsection

@push('script')
    
@endpush
