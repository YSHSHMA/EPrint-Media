@extends('admin.layouts.app')

@section('title', 'Category')

@push('css')
@endpush

@section('content')
    {{-- edit modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.category.update') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="updateid">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="updatecategory"
                            placeholder="Enter Category Name" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- main content --}}
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category /</span> Add</h4> --}}

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.category.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-8 offset-md-1">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Category Name"
                                        autocomplete="off" required>
                                    @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <input type="submit" class="btn btn-primary" value="Add category">
                                </div>
                            </div>
                        </form>
                        <hr>
                        <h5 class="card-header">Category List ( {{$categorylist->count()}} )</h5>
                        <div class="row m-3">
                            <div class="table-responsive">
                                <table class="table dt-responsive">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @if (sizeof($categorylist) != 0)
                                            @foreach ($categorylist as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item['name'] }}</td>
                                                    <td>
                                                        <div class="form-check-size d-flex justify-content-center">
                                                            <div class="form-check form-switch form-check-inline">
                                                                <input class="form-check-input check-size status-change"
                                                                    type="checkbox" role="switch" data-id="{{ $item->id }}"
                                                                    {{ $item->status == 1 ? 'checked' : '' }}>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ date('d, M Y', strtotime($item['created_at'])) }}</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-icon fs-5 p-0"
                                                            onclick="edit_modal({{ $item['id'] }} , '{{ $item['name'] }}')"><i
                                                                class="fa-solid fa-pen-to-square ms-2"></i></button>
                                                        </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function edit_modal(id, name) {
            $('#updateid').val(id);
            $('#updatecategory').val(name);
            $('#editModal').modal('show');
        }
    </script>

    {{-- status changed --}}
    <script>
        $('.status-change').change(function(e) {
            e.preventDefault();
            var status = $(this).is(':checked') ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                url: "{{ route('admin.category.status') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    status: status
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
        });
    </script>
@endpush
