@extends('vendor.layouts.master')

@section('title')
    {{ $settings->site_name }} &mdash; Dashboard
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('vendor.layouts.sidebard')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content">
                    <div class="wsus__dashboard">
                        <div class="row">

                            <!-- Pending Orders -->
                            <div class="col-xl-3 col-6 col-md-4">
                                <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                                    <i class="far fa-address-book"></i>
                                    <p>@lang('vendor.Pendingorders') ({{ $pending_orders }})</p>
                                </a>
                            </div>

                            <!-- Orders in Distribution -->
                            <div class="col-xl-3 col-6 col-md-4">
                                <a class="wsus__dashboard_item green" href="{{ route('vendor.orders.index') }}">
                                    <i class="fal fa-cloud-download"></i>
                                    <p>@lang('vendor.Ordersencours') ({{ $distrubution_orders }})</p>
                                </a>
                            </div>

                            <!-- Total Products -->
                            <div class="col-xl-3 col-6 col-md-4">
                                <a class="wsus__dashboard_item sky" href="{{ route('vendor.product.index') }}">
                                    <i class="fas fa-star"></i>
                                    <p>@lang('vendor.TotalProducts') ({{ $Products }})</p>
                                </a>
                            </div>

                            <!-- Profile -->
                            <div class="col-xl-3 col-6 col-md-4">
                                <a class="wsus__dashboard_item orange" href="{{ route('vendor.profile') }}">
                                    <i class="fas fa-user-shield"></i>
                                    <p>@lang('vendor.Profile')</p>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
