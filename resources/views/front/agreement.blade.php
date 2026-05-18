@extends('front.layouts.app')

@section('title', 'Info')

@push('css')
    <style>
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
    <!-- Breadcrumb -->
    <div class="container">
        <div class="headline bg0 flex-wr-sb-c p-tb-20">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ route('index') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>

                <span class="breadcrumb-item f1-s-3 cl9">
                    {{ $agreement->name }}
                </span>
            </div>

            {{-- search --}}
            @include('front.partial.search')
        </div>
    </div>

    <!-- Page heading -->
    <div class="container p-t-4 p-b-35">
        <h2 class="f1-l-1 cl2">
            {{ $agreement->name }}
        </h2>
    </div>

    <!-- Content -->
    <section class="bg0 p-b-30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-8 p-b-30">
                    <div class="p-r-10 p-r-0-sr991">
                        <div class="pause-style">
                            <style>
                                .no-css,
                                .no-css * {
                                    all: revert !important;
                                }
                            </style>

                            <div class="no-css">
                                {!! $agreement->description !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-5 col-lg-4 p-b-30">
                    <div class="p-l-10 p-rl-0-sr991 p-t-5">
                        <!-- Popular Posts -->
                        <div class="p-l-10 p-rl-0-sr991">
                            <!-- Popular Posts -->
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
