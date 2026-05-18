@extends('admin.layouts.app')

@section('title', 'Dashboard')

@push('css')
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-4">
            <div class="col-12 mb-2">
                <div class="row mb-3">
                    <div class="col-md-4 mb-2">
                        <div class="card border-bottom border-primary">
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="col-9">
                                        <h6 class="card-title mt-3">Technology</h6>
                                        <h4 class="card-title">{{ $post->where('category_id', 2)->count() }}</h4>
                                    </div>
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <i class="fa fa-microchip fa-2xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card border-bottom border-primary">
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="col-9">
                                        <h6 class="card-title mt-3">Finance</h6>
                                        <h4 class="card-title">{{ $post->where('category_id', 3)->count() }}</h4>
                                    </div>
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <i class="fa fa-coins fa-2xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card border-bottom border-primary">
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="col-9">
                                        <h6 class="card-title mt-3">Health</h6>
                                        <h4 class="card-title">{{ $post->where('category_id', 4)->count() }}</h4>
                                    </div>
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <i class="fa fa-stethoscope fa-2xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card border-bottom border-primary">
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="col-9 mt-3">
                                        <h6 class="card-title">Entertainment</h6>
                                        <h4 class="card-title">{{ $post->where('category_id', 5)->count() }}</h4>
                                    </div>
                                    <div class="col-3 d-flex align-items-center justify-content-center">
                                        <i class="fa fa-film fa-2xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card border-bottom border-primary">
                            <div class="card-body py-2">
                                <a href="{{ route('admin.contact.list') }}" style="color: #566a7f !important">
                                    <div class="row">
                                        <div class="col-9 mt-3">
                                            <h6 class="card-title">Contacts</h6>
                                            <h4 class="card-title">{{ $contact->count() }}</h4>
                                        </div>
                                        <div class="col-3 d-flex align-items-center justify-content-center">
                                            <i class="fa fa-users fa-2xl"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card border-bottom border-primary">
                            <div class="card-body py-2">
                                <a href="{{ route('admin.visitor.list') }}" style="color: #566a7f !important">
                                    <div class="row">
                                        <div class="col-9 mt-3">
                                            <h6 class="card-title">Visitors</h6>
                                            <h4 class="card-title">{{ $visitor }}</h4>
                                        </div>
                                        <div class="col-3 d-flex align-items-center justify-content-center">
                                            <i class="fa fa-address-book fa-2xl"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table">
                                <h5 class="mb-4">Contacts List</h5>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($contact) != 0)
                                        @foreach ($contact->take(5) as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item['name'] }}</td>
                                                <td>{{ $item['email'] }}</td>
                                                <td>{{ $item['phone'] }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="border-0 text-center" colspan="3">No Data Available</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <h5>Latest Post</h5>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($post) != 0)
                                        @foreach ($post->take(5) as $key => $pst)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td> <img src="{{ asset($pst['thumbnail']) }}" width="50"
                                                        alt=""></td>
                                                <td>{{ $pst['title'] }}</td>
                                                <td>{{ $pst->category->name }}</td>
                                                <td>{{ date('d, M Y', strtotime($pst['published_at'])) }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center border-0" colspan="6">No Data Available</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
