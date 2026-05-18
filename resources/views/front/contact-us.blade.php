@extends('front.layouts.app')

@section('title', 'Contact Us')

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
        <div class="headline bg0 flex-wr-sb-c p-tb-20">
            <div class="f2-s-1 p-r-30 m-tb-6">
                <a href="{{ route('index') }}" class="breadcrumb-item f1-s-3 cl9">
                    Home
                </a>

                <span class="breadcrumb-item f1-s-3 cl9">
                    Contact Us
                </span>
            </div>

            {{-- search --}}
            @include('front.partial.search')

        </div>
    </div>

    <!-- Page heading -->
    <div class="container p-b-20">
        <h2 class="f1-l-1 cl2">
            Contact Us
        </h2>

        <p class="p-t-2 f1-s-7">
            Connect with us for news tips, feedback, collaboration ideas, or general inquiries.
        </p>
    </div>

    <!-- Content -->
    <section class="bg0 p-b-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-8 p-b-80">
                    <div class="p-r-10 p-r-0-sr991">
                        <form action="{{route('contact-us-submit')}}" method="post">
                            @csrf
                            <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text"
                                name="name" placeholder="Name*" required>
                                @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror

                            <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="email"
                                name="email" placeholder="Email">

                            <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="number"
                                name="phone" placeholder="Mobile No.">

                            <textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="message"
                                placeholder="Your Message*" required></textarea>
                                @error('message')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror

                            <button type="submit" class="size-a-20 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-20">
                                Send
                            </button>
                        </form>
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
                <div class="col-md-5 col-lg-4 p-b-20">
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

        {{-- start ezoic add --}}
        {{-- <div id="ezoic-pub-ad-placeholder-103"></div>
        <script>
            ezstandalone.cmd.push(function(){
                ezstandalone.showAds(103);
            });
        </script> --}}
        {{-- end ezoic add --}}
    </section>
@endsection

@push('script')
@endpush
