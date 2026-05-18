@extends('admin.layouts.app')

@section('title', 'Config')

@push('css')
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Config /</span> Add</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.setting.config.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="{{ !empty($config) ? 'update' : 'store' }}">
                            <div class="row">
                                @if (!empty($config))
                                    <div class="col-12">
                                        <div
                                            class=" box-col-12 border border-2 rounded-3 d-flex justify-content-between p-3 my-2">
                                            <h6>Maintenance Mode</h6>
                                            <div class="form-check form-switch fs-6 mb-0">
                                                <input class="form-check-input check-size" id="maintenance-mode-change"
                                                    type="checkbox" role="switch"
                                                    {{ !empty($config) && $config->maintenance_mode == 1 ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-sm-6 col-xxl-3 box-col-6 mt-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" name="name" type="text"
                                            placeholder="Enter name"
                                            value="{{ !empty($config) ? $config->name : '' }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xxl-3 box-col-6 mt-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" name="email" type="email"
                                            placeholder="Enter email"
                                            value="{{ !empty($config) ? $config->email : '' }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xxl-3 box-col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Phone <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" name="phone" type="number"
                                            placeholder="Enter phone no."
                                            value="{{ !empty($config) ? $config->phone : '' }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xxl-3 box-col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="copyright">Copyright <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" name="copyright" type="text"
                                            placeholder="Enter your copyright"
                                            value="{{ !empty($config) ? $config->copyright : '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="address">Address <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" name="address" type="text" rows="2.5" placeholder="Enter address" required>{{ !empty($config) ? $config->address : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xxl-3 box-col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="facebook">Facebook URL</label>
                                        <input class="form-control" name="facebook" type="url"
                                            placeholder="Enter your facebook url"
                                            value="{{ !empty($config) ? $config->facebook : '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xxl-3 box-col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="instagram">Instagram URL</label>
                                        <input class="form-control" name="instagram" type="url"
                                            placeholder="Enter your instagram url"
                                            value="{{ !empty($config) ? $config->instagram : '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xxl-3 box-col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="youtube">Youtube URL</label>
                                        <input class="form-control" name="youtube" type="url"
                                            placeholder="Enter your youtube url"
                                            value="{{ !empty($config) ? $config->youtube : '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xxl-3 box-col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="twitter">Twitter URL</label>
                                        <input class="form-control" name="twitter" type="url"
                                            placeholder="Enter your twitter url"
                                            value="{{ !empty($config) ? $config->twitter : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label class="form-label" for="header_logo">Header Logo <span
                                                    class="text-danger">*</span></label>
                                            <div class="text-center">
                                                <img src="{{ !empty($config) ? asset($config->header_logo) : '#' }}"
                                                    alt="" width="150" height="150">
                                                <input type="file" name="header_logo" class="form-control mt-2"
                                                    {{ !empty($config) ? '' : 'required' }}>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label" for="footer_logo">Footer Logo <span
                                                    class="text-danger">*</span></label>
                                            <div class="text-center">
                                                <img src="{{ !empty($config) ? asset($config->footer_logo) : '#' }}"
                                                    alt="" width="150" height="150">
                                                <input type="file" name="footer_logo" class="form-control mt-2"
                                                    {{ !empty($config) ? '' : 'required' }}>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-3">
                                            <label class="form-label" for="favicon">Favicon <span
                                                    class="text-danger">*</span></label>
                                            <div class="text-center">
                                                <img src="{{ !empty($config) ? asset($config->favicon) : '#' }}"
                                                    alt="" width="150" height="150">
                                                <input type="file" name="favicon" class="form-control mt-2"
                                                    {{ !empty($config) ? '' : 'required' }}>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-3">
                                            <label class="form-label" for="loader">Loader <span
                                                    class="text-danger">*</span></label>
                                            <div class="text-center">
                                                <img src="{{ !empty($config) ? asset($config->loader) : '#' }}"
                                                    alt="" width="150" height="150">
                                                <input type="file" name="loader" class="form-control mt-2"
                                                    {{ !empty($config) ? '' : 'required' }} accept="image/gif">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary"
                                    type="submit">{{ !empty($config) ? 'Update' : 'Store' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#maintenance-mode-change').change(function(e) {
            e.preventDefault();
            var isChecked = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ url('admin/setting/maintenance-mode') }}" + '/' + isChecked,
                method: "GET",
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
