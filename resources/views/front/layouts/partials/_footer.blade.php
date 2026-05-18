@php
    $categories = App\Models\Admin\Category::where('status', 1)->get();
@endphp
<footer>
    <div class="bg2 p-t-40 p-b-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <a href="{{ route('index') }}">
                            <img class="max-s-full" src="{{ asset(configData()->footer_logo) }}" alt="LOGO">
                        </a>
                    </div>

                    <div>
                        <p class="f1-s-1 cl11 p-b-16">
                            Welcome to {{ configData()->name }}, your trusted destination for the latest updates, insightful articles,
                            and trending stories from across the globe. Our mission is simple to deliver accurate,
                            engaging, and valuable content that keeps you informed, inspired, and ahead of the curve.
                        </p>

                        <p class="f1-s-1 cl11 p-b-16">
                            Any questions? Mail us on {{ configData()->email }}
                        </p>

                        {{-- <div class="p-t-15">
                            <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-facebook-f"></span>
                            </a>

                            <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-twitter"></span>
                            </a>

                            <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-pinterest-p"></span>
                            </a>

                            <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-vimeo-v"></span>
                            </a>

                            <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-youtube"></span>
                            </a>
                        </div> --}}
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <h5 class="f1-m-7 cl0">
                            Usefull Links
                        </h5>
                    </div>

                    <ul class="m-t--12">
                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="{{ route('index') }}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                Home
                            </a>
                        </li>

                        @foreach ($categories as $category)
                            @if ($category->id != 1)
                                <li class="how-bor1 p-rl-5 p-tb-10">
                                    <a href="{{ route($category->slug . '.index') }}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">{{ $category->name }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <h5 class="f1-m-7 cl0">
                            About
                        </h5>
                    </div>

                    <ul class="m-t--12">
                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="{{ route('about-us') }}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                About Us
                            </a>
                        </li>

                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="{{ route('privacy-policy') }}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                Privacy Policy
                            </a>
                        </li>

                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="{{ route('terms-condition') }}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                Terms & Conditions
                            </a>
                        </li>

                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="{{ route('disclaimer') }}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                Disclaimer
                            </a>
                        </li>

                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="{{ route('contact-us') }}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="bg11">
        <div class="container size-h-4 flex-c-c p-tb-15">
            <span class="f1-s-1 cl0 txt-center">
                <a href="#" class="f1-s-1 cl10 hov-link1">
                    Copyright &copy; {{ configData()->copyright }} <strong>{{ configData()->name }}</strong> All rights reserved | <i class="fa fa-heart"
                        aria-hidden="true"></i> by Decoder
            </span>
        </div>
    </div>
</footer>
