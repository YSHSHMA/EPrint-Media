@extends('admin.layouts.app')

@section('title', 'Post List')

@push('css')
@endpush

@section('content')

    {{-- main page --}}
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Post /</span> List</h4> --}}

        <div class="card">
            <h5 class="card-header">Post List ( {{$postList->count()}} )</h5>
            <div class="table-responsive text-nowrap p-3">
                <table class="table table-hover dt-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Trending</th>
                            <th>Featured</th>
                            <th>Popular</th>
                            {{-- <th>Latest</th> --}}
                            <th>Status</th>
                            <th>Publish Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($postList as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td> <img src="{{ asset($item['thumbnail']) }}" width="50" alt=""></td>
                                <td class="w-25">{{ Str::limit($item['title'], 50) }}</td>
                                <td class="w-25">{{ $item->category->name }}</td>
                                <td class="w-25">
                                    <div class="form-check form-switch fs-6 mb-0">
                                        <input class="form-check-input check-size trending-change" type="checkbox"
                                            role="switch" data-id="{{ $item->id }}"
                                            {{ $item->is_trending == 1 ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td class="w-25">
                                    <div class="form-check form-switch fs-6 mb-0">
                                        <input class="form-check-input check-size featured-change" type="checkbox"
                                            role="switch" data-id="{{ $item->id }}"
                                            {{ $item->is_featured == 1 ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td class="w-25">
                                    <div class="form-check form-switch fs-6 mb-0">
                                        <input class="form-check-input check-size popular-change" type="checkbox"
                                            role="switch" data-id="{{ $item->id }}"
                                            {{ $item->is_popular == 1 ? 'checked' : '' }}>
                                    </div>
                                </td>
                                {{-- <td class="w-25">
                                    <div class="form-check form-switch fs-6 mb-0">
                                        <input class="form-check-input check-size latest-change" type="checkbox"
                                            role="switch" data-id="{{$item->id}}" {{ $item->is_latest == 1 ? 'checked' : '' }}>
                                    </div>
                                </td> --}}
                                <td class="w-25">
                                    <div class="form-check form-switch fs-6 mb-0">
                                        <input class="form-check-input check-size status-change" type="checkbox"
                                            role="switch" data-id="{{ $item->id }}"
                                            {{ $item->status == 1 ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>{{ date('d, M Y', strtotime($item['published_at'])) }}</td>
                                <td class="text-center">
                                    <a class="btn btn-icon fs-5 p-0"
                                        href="{{ route('admin.post.edit', ['id' => $item['id']]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i> </a>
                                    <a class="btn btn-icon fs-5 p-0"
                                        href="{{ route('admin.post.delete', ['id' => $item['id']]) }}"
                                        onclick="if (! confirm('Are your sure, You want to delete this Post?')) { return false; }">
                                        <i class="fa-solid fa-trash ms-2"></i> </a>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <script>
        var id = "";
        var type = "";
        var isChecked = "";
        var limit = "";

        $('.trending-change').change(function(e) {
            e.preventDefault();

            let $checkbox = $(this);
            let id = $checkbox.data('id');
            let isChecked = $checkbox.is(':checked') ? 1 : 0;
            let type = 'is_trending';

            if (isChecked === 1) {
                checkLimit(type, function(limit) {
                    if (limit) {
                        changeFunctionality(id, type, isChecked);
                    } else {
                        $checkbox.prop('checked', false);
                    }
                });
            } else {
                changeFunctionality(id, type, isChecked);
            }
        });


        $('.featured-change').change(function(e) {
            e.preventDefault();

            let $checkbox = $(this);
            let id = $checkbox.data('id');
            let isChecked = $checkbox.is(':checked') ? 1 : 0;
            let type = 'is_featured';

            if (isChecked === 1) {
                checkLimit(type, function(limit) {
                    if (limit) {
                        changeFunctionality(id, type, isChecked);
                    } else {
                        $checkbox.prop('checked', false);
                    }
                });
            } else {
                changeFunctionality(id, type, isChecked);
            }
        });

        $('.popular-change').change(function(e) {
            e.preventDefault();

            let $checkbox = $(this);
            let id = $checkbox.data('id');
            let isChecked = $checkbox.is(':checked') ? 1 : 0;
            let type = 'is_popular';

            if (isChecked === 1) {
                checkLimit(type, function(limit) {
                    if (limit) {
                        changeFunctionality(id, type, isChecked);
                    } else {
                        $checkbox.prop('checked', false);
                    }
                });
            } else {
                changeFunctionality(id, type, isChecked);
            }
        });

        // $('.latest-change').change(function (e) { 
        //     e.preventDefault();

        //     id = $(this).data('id');
        //     isChecked = $(this).is(':checked') ? 1 : 0;
        //     type = 'is_latest';
        //     changeFunctionality(id,type , isChecked);            
        // });

        $('.status-change').change(function(e) {
            e.preventDefault();

            id = $(this).data('id');
            isChecked = $(this).is(':checked') ? 1 : 0;
            type = 'status';
            changeFunctionality(id, type, isChecked);
        });

        function checkLimit(type, callback) {
            $.ajax({
                url: "{{ route('admin.post.check.limit') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    type: type,
                },
                success: function(response) {
                    if (!response.status) {
                        alert(response.message);
                        callback(false);
                    } else {
                        callback(true);
                    }
                },
                error: function() {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'bottom-right',
                        iconColor: 'greenred',
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true
                    })
                    Toast.fire({
                        icon: 'error',
                        title: 'An error occurred'
                    })
                    callback(false);
                }
            });
        }

        function changeFunctionality(id, type, isChecked) {
            $.ajax({
                url: "{{ route('admin.post.status') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    type: type,
                    is_checked: isChecked
                },
                success: function(response) {
                    if (response.status) {
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
                            title: response.message
                        })
                    } else {
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
                            title: response.message
                        })
                        window.location.reload();
                    }
                },
                error: function() {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'bottom-right',
                        iconColor: 'greenred',
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true
                    })
                    Toast.fire({
                        icon: 'error',
                        title: 'An error occurred'
                    })
                    window.location.reload();
                }
            });
        }
    </script>
@endpush
