@extends('admin.layouts.app')

@section('title', 'Agreement')

@push('css')
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Agreement /</span> Add</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="col">
                            <div class="nav-align-top mb-4">
                                <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                            data-bs-target="#navs-pills-justified-home"
                                            aria-controls="navs-pills-justified-home" aria-selected="true">
                                            <i class="tf-icons bx bx-home"></i> About Us
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                            data-bs-target="#navs-pills-justified-profile"
                                            aria-controls="navs-pills-justified-profile" aria-selected="false">
                                            <i class="tf-icons bx bx-user"></i> Terms & Condition
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                            data-bs-target="#navs-pills-justified-disclaimer"
                                            aria-controls="navs-pills-justified-disclaimer" aria-selected="false">
                                            <i class="tf-icons bx bx-message-square"></i> Disclaimer
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                            data-bs-target="#navs-pills-justified-messages"
                                            aria-controls="navs-pills-justified-messages" aria-selected="false">
                                            <i class="tf-icons bx bx-message-square"></i> Privacy Policy
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                                        <form action="{{ route('admin.setting.agreement.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="name" value="About Us">
                                            @php
                                                $aboutUs = $agreements->firstWhere('name', 'About Us');
                                            @endphp

                                            <div class="row mt-3 g-2">
                                                <h6>Detail</h6>
                                                <textarea name="description" class="form-control ckeditor" required>{{ $aboutUs->description ?? '' }}</textarea>

                                            </div>
                                            <div class="row mt-3 g-2 float-end">
                                                <input type="submit" id="submit" class="btn btn-primary" value="Submit">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                                        <form action="{{ route('admin.setting.agreement.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="name" value="Terms & Conditions">
                                            @php
                                                $aboutUs = $agreements->firstWhere('name', 'Terms & Conditions');
                                            @endphp

                                            <div class="row mt-3 g-2">
                                                <h6>Detail</h6>
                                                <textarea name="description" class="form-control ckeditor" required>{{ $aboutUs->description ?? '' }}</textarea>

                                            </div>
                                            <div class="row mt-3 g-2 float-end">
                                                <input type="submit" id="submit" class="btn btn-primary" value="Submit">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="navs-pills-justified-disclaimer" role="tabpanel">
                                        <form action="{{ route('admin.setting.agreement.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="name" value="Disclaimer">
                                            @php
                                                $aboutUs = $agreements->firstWhere('name', 'Disclaimer');
                                            @endphp

                                            <div class="row mt-3 g-2">
                                                <h6>Detail</h6>
                                                <textarea name="description" class="form-control ckeditor" required>{{ $aboutUs->description ?? '' }}</textarea>

                                            </div>
                                            <div class="row mt-3 g-2 float-end">
                                                <input type="submit" id="submit" class="btn btn-primary" value="Submit">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="navs-pills-justified-messages" role="tabpanel">
                                        <form action="{{ route('admin.setting.agreement.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="name" value="Privacy Policy">
                                            @php
                                                $aboutUs = $agreements->firstWhere('name', 'Privacy Policy');
                                            @endphp

                                            <div class="row mt-3 g-2">
                                                <h6>Detail</h6>
                                                <textarea name="description" class="form-control ckeditor" required>{{ $aboutUs->description ?? '' }}</textarea>

                                            </div>
                                            <div class="row mt-3 g-2 float-end">
                                                <input type="submit" id="submit" class="btn btn-primary"
                                                    value="Submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>

    {{-- ck editor --}}
    <script>
        CKEDITOR.config.height = 450;
        CKEDITOR.config.width = '100%';
    </script>
@endpush
