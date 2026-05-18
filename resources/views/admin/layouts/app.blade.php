<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Admin || @yield('title')</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{asset(configData()->favicon)}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin-assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    {{-- sweet alert --}}
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    {{-- bootstrap table --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    @stack('css')

    <!-- Helpers -->
    <script src="{{ asset('admin-assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('admin-assets/js/config.js') }}"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('admin.layouts.partials._sidebar')
            <div class="layout-page">
                @include('admin.layouts.partials._header')
                <div class="content-wrapper">
                    @yield('content')
                    @include('admin.layouts.partials._footer')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script src="{{ asset('admin-assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('admin-assets/js/main.js') }}"></script>
    <script src="{{ asset('admin-assets/js/dashboards-analytics.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    {{-- datatable --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    {{-- ckeditor --}}
    <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
    {{-- ajax --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}

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

    {{-- datatable --}}
    <script>
        $('.dt-responsive').DataTable();
    </script>

    {{-- notification --}}
    {{-- <script>
        function notification(ref_id, ref_type) {
            $.ajax({
                type: "get",
                url: "{{ url('/notification') }}/" + ref_id + '/' + ref_type,
                success: function(response) {
                    if (response.status == 200) {
                        if (response.ref_type == 'ask_us') {
                            window.location.href = "{{ route('contact.list') }}"
                        } else if (response.ref_type == 'request_temple') {
                            window.location.href = "{{ route('request.temple') }}"
                        } else if (response.ref_type == 'teerth_comment') {
                            window.location.href = "{{ route('teerth.comment') }}"
                        } else if (response.ref_type == 'dharma_science_comment') {
                            window.location.href = "{{ route('dharmascience.comment') }}"
                        } else if (response.ref_type == 'temple_comment') {
                            window.location.href = "{{ route('temple.comment') }}"
                        } else if (response.ref_type == 'tyohar_comment') {
                            window.location.href = "{{ route('tyohar.comment') }}"
                        }
                    } else {
                        alert('An Error Occured');
                    }
                },
                error: function() {
                    alert('An Error Occured');
                }
            });
        }
    </script> --}}

</body>

</html>
