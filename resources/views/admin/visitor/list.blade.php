@extends('admin.layouts.app')

@section('title', 'Visitor')

@push('css')
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Visitor /</span> List</h4> --}}

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <h5 class="card-header">Visitor List ( {{$visitorList->count()}} )</h5>
                    <div class="card-body">
                        <div class="row m-3">
                            <div class="table-responsive">
                                <table class="table dt-responsive">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>IP</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>URL</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @if (sizeof($visitorList) != 0)
                                            @foreach ($visitorList as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item['ip_address'] }}</td>
                                                    <td>{{ $item['country'] }}</td>
                                                    <td>{{ $item['state'] }}</td>
                                                    <td>{{ $item['city'] }}</td>
                                                    <td>{{ $item['url'] }}</td>
                                                    <td>{{ date('d, M Y', strtotime($item['created_at'])) }}</td>
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
@endpush
