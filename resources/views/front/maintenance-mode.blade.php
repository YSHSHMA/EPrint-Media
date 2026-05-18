@extends('front.layouts.app')

@section('title', 'Maintenance')

@push('css')
@endpush

@section('content')
    <!-- Breadcrumb -->
    <div class="container">
        <div class="col py-5 mb-5 text-center">
            <img src="{{asset('front-assets/images/maintenance.png')}}" class="img-fluid blur-up lazyload" alt="" width="250">
            <h3 class="f1-m-2 cl12 tab01-title mb-2">🚧 Website Under Maintenance</h3>
            <p>We are currently performing scheduled maintenance. We apologize for any inconvenience and appreciate your patience. Please check back soon — we'll be up and running shortly!.</p>
        </div>
    </div>
@endsection

@push('script')
@endpush
