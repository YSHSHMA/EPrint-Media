<!DOCTYPE html>
<html lang="en">

<head>
    {{-- start google adsense --}}
    {{-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1945902890169043"
     crossorigin="anonymous"></script> --}}
    {{-- end google adsense --}}
    
    {{-- start ezoic Privacy scripts (must be before header script) --}}
    {{-- <script src="https://cmp.gatekeeperconsent.com/min.js" data-cfasync="false"></script>
    <script src="https://the.gatekeeperconsent.com/cmp.min.js" data-cfasync="false"></script> --}}
    {{-- end ezoic Privacy scripts (must be before header script) --}}

    {{-- start Ezoic header script --}}
    {{-- <script async src="//www.ezojs.com/ezoic/sa.min.js"></script>
    <script>
        window.ezstandalone = window.ezstandalone || {};
        ezstandalone.cmd = ezstandalone.cmd || [];
        </script> --}}
    {{-- end Ezoic header script --}}

    <!--Start Google tag (gtag.js) google analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZETVYSGHQD"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-ZETVYSGHQD');
    </script>
    <!--End Google tag (gtag.js) google analytics -->

    {{-- start google search console --}}
    <meta name="google-site-verification" content="NLWTJvz_rZc4b14UxZopgO1fEvhlH656SRSQ2I1OfKI" />
    {{-- end google search console --}}


    {{-- Start Microsoft Calrity --}}
    {{-- <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "t2g5v8ld12");
    </script> --}}
    {{-- End Microsoft Calrity --}}

    
    
    <title>{{ configData()->name }} || @yield('title')</title>

    {{-- meta --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="max-image-preview:large">
    @yield('meta')

    {{-- css --}}
    <link rel="icon" type="image/png" href="{{ asset(configData()->favicon) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('front-assets/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('front-assets/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/util.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/main.css') }}">
    {{-- sweet alert --}}
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

    {{-- css --}}
    <style>
        .search-ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: #fff;
            border: 1px solid #ccc;
            max-height: 250px;
            overflow-y: auto;
            z-index: 1000;
            list-style: none;
            margin: 5px 0 0 0;
            padding: 0;
        }
    </style>

    @stack('css')

</head>

<body class="animsition">

    @include('front.layouts.partials._header')

    @yield('content')

    @include('front.layouts.partials._footer')

    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <span class="fas fa-angle-up"></span>
        </span>
    </div>

    <!-- Modal Video 01-->
    {{-- <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

            <div class="wrap-video-mo-01">
                <div class="video-mo-01">
                    <iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div> --}}

    <script src="{{ asset('front-assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('front-assets/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('front-assets/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('front-assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/main.js') }}"></script>
    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    @stack('script')

    {{-- message --}}
    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-right',
                iconColor: 'green',
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true
            })
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        </script>
    @elseif (session('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-right',
                iconColor: 'red',
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true
            })
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}'
            })
        </script>
    @endif

    {{-- search --}}
    <script>
        $(function() {
            const $input = $("#liveSearch");
            const $results = $("#searchResults");

            $input.on("keyup", function() {
                const query = $(this).val().trim();
                if (query.length < 2) return $results.hide().empty();

                $.get("{{ route('search') }}", {
                    query
                }, function(data) {
                    const items = data.results || data;
                    const baseUrl = window.location.origin;
                    $results.empty();

                    if (items.length) {
                        items.forEach(item => {
                            const prefix = ({
                                2: 'technology',
                                3: 'finance',
                                4: 'health',
                                5: 'entertainment'
                            } [item.category_id] || 'post');
                            $results.append(`
                            <li class="p-2 hover:bg-gray-100 border-b last:border-b-0">
                                <a href="${baseUrl}/${prefix}/post/${item.slug}" class="block text-sm text-gray-800">${item.title}</a>
                            </li>
                        `);
                        });
                    } else {
                        $results.append('<li class="p-2 text-gray-500">No results found</li>');
                    }

                    $results.show();
                });
            });

            $(document).on("click", e => {
                if (!$(e.target).closest("#liveSearch, #searchResults").length) $results.hide();
            });
        });
    </script>

</body>
