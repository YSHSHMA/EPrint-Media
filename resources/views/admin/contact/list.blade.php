@extends('admin.layouts.app')

@section('title', 'Contact')

@push('css')
@endpush

@section('content')
    {{-- view modal --}}
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="form-label">name</label>
                        <p id="name"></p>
                    </div>
                    <div class="form-group">
                        <label for="message" class="form-label">Message</label>
                        <div id="message"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- main content --}}
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Contact /</span> List</h4> --}}

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <h5 class="card-header">Contact List ( {{$contactList->count()}} )</h5>
                    <div class="card-body">
                        <div class="row m-3">
                            <div class="table-responsive">
                                <table class="table dt-responsive">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @if (sizeof($contactList) != 0)
                                            @foreach ($contactList as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item['name'] }}</td>
                                                    <td>{{ $item['email'] }}</td>
                                                    <td>{{ $item['phone'] }}</td>
                                                    <td>{{ date('d, M Y', strtotime($item['created_at'])) }}</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-icon fs-5 p-0"
                                                            onclick='view_modal(@json($item["name"]), @json($item["message"]))'>
                                                            <i class="fa-solid fa-eye ms-2"></i>
                                                        </button>
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
        function view_modal(name, message) {
            $('#name').text(name);
            $('#message').html(message);
            $('#viewModal').modal('show');
        }
    </script>
@endpush
