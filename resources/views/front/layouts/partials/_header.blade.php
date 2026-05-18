@php
    $categories = App\Models\Admin\Category::where('status', 1)->get();
@endphp
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="{{ route('index') }}"><img src="{{ asset(configData()->header_logo) }}" alt="{{configData()->name}}"></a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">

            <ul class="main-menu-m">
                <li>
                    <a href="{{ route('index') }}">Home</a>
                </li>

                @foreach ($categories as $category)
                    @if ($category->id != 1)
                        <li>
                            <a href="{{ route($category->slug . '.index') }}">{{ $category->name }}</a>
                        </li>
                    @endif
                @endforeach

                <li class="">
                    <a href="{{ route('contact-us') }}">
                        Contact Us
                    </a>
                </li>
            </ul>
        </div>

        <!--  -->
        <div class="wrap-logo container">
            <!-- Logo desktop -->
            <div class="logo">
                <a href="{{ route('index') }}"><img src="{{ asset(configData()->header_logo) }}" alt="{{configData()->name}}"></a>
            </div>

            <!-- Banner -->
            {{-- <div class="banner-header">
                <a href="https://themewagon.com/themes/free-bootstrap-4-html5-news-website-template-magnews2/"><img
                        src="{{ asset('front-assets/images/banner-01.jpg') }}" alt="IMG"></a>
            </div> --}}
        </div>

        <!--  -->
        <div class="wrap-main-nav">
            <div class="main-nav">
                <!-- Menu desktop -->
                <nav class="menu-desktop">
                    <a class="logo-stick" href="{{ route('index') }}">
                        <img src="{{ asset(configData()->header_logo) }}" alt="{{configData()->name}}">
                    </a>

                    <ul class="main-menu">
                        <li class="{{Request::is('/')?'main-menu-active':''}}">
                            <a href="{{ route('index') }}">Home</a>
                        </li>

                        @foreach ($categories as $category)
                            @if ($category->id != 1)
                                <li class="{{Request::is($category->slug.'*')?'main-menu-active':''}}">
                                    <a href="{{ route($category->slug . '.index') }}">{{ $category->name }}</a>
                                </li>
                            @endif
                        @endforeach

                        <li class="{{Request::is('contact-us')?'main-menu-active':''}}">
                            <a href="{{ route('contact-us') }}" class="">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
