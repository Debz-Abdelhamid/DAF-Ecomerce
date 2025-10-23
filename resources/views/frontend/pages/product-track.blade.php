@php

    
    $address = json_decode(@$order->order_address);
    

@endphp

@extends('frontend.layouts.master')

@section('title')

{{$settings->site_name}} &mdash; 
@endsection


@section('content')




 <!--============================
        TRACKING ORDER START
    ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="wsus__track_area">
                <div class="row">
                    <div class="col-xl-5 col-md-10 col-lg-8 m-auto">
                        <form class="tack_form" action="{{ route('product-tracking.index') }}" method="GET">
                            
                            <h4 class="text-center">@lang('trak.track_order')</h4>
                            <p class="text-center">@lang('trak.track')</p>

                            @if(App::getLocale() == 'ar')
                                <div class="wsus__track_input" dir="rtl">
                                    <label class="d-block mb-2" id='trak' dir='rtl'>@lang('trak.track_id')</label>
                                    <div>
                                        <input type="text" name="tracker"  placeholder="Code : 2521578455" value="{{ @$order->inovice_id }}">
                                    </div>
                                </div>
                            @else
                            <div class="wsus__track_input">
                                <label class="d-block mb-2">@lang('trak.track_id')</label>
                                <div>
                                    <input type="text" name="tracker"  placeholder="Code : 2521578455" value="{{ @$order->inovice_id }}">
                                </div>
                            </div>

                            @endif


                       
                            
                            
                            <button type="submit" class="common_btn">@lang('trak.track_btn')</button>
                        </form>
                    </div>
                </div>
                @if(isset($order))
                <div class="row">
                    <div class="col-xl-12">
                        <div class="wsus__track_header">
                            <div class="wsus__track_header_text">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 col-lg-3">
                                        <div class="wsus__track_header_single">
                                            <h5>@lang('product.Order_Date')</h5>
                                            <p>{{ date('d M Y', strtotime(@$order->created_at)) }}</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-lg-3">
                                        <div class="wsus__track_header_single">
                                            <h5>@lang('product.shopping_by') :</h5>
                                            <p>{{ @$address->name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-lg-3">
                                        <div class="wsus__track_header_single">
                                            <h5>@lang('product.status') :</h5>
                                            <p>{{ @$order->order_status }}</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-lg-3">
                                        <div class="wsus__track_header_single border_none">
                                            <h5>@lang('product.tracking') :</h5>
                                            <p>{{ @$order->inovice_id }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        @if(@$order->order_status == 'canceled')

                        <div class="col-xl-12">
                            <ul class="progtrckr" data-progtrckr-steps="4">
                                
                                <li class="progtrckr_done icon_one  check_mark">@lang('product.pending') </li>
                                <li class="icon_four {{ @$order->order_status == 'canceled' ? 'red_mark' : '' }} ">@lang('product.canceled')</li>
                            </ul>
                        </div>

                        @else

                            <div class="col-xl-12">
                                <ul class="progtrckr" data-progtrckr-steps="4">
                                    
                                    <li class="progtrckr_done icon_one  check_mark">@lang('product.pending')</li>
                                    <li class="progtrckr_done icon_two {{ @$order->order_status == 'destribution' || @$order->order_status == 'deliverd'  ? 'check_mark' : '' }} ">@lang('product.order_Processing')</li>
                                    <li class="icon_three {{ @$order->order_status == 'deliverd' ? 'check_mark' : '' }}">@lang('product.Delivered')</li>
                                    
                                </ul>
                            </div>

                        @endif
                        <div class="col-xl-12">
                            <a href="{{ route('home') }}" class="common_btn"><i class="fas fa-chevron-left"></i>@lang('product.back_to_Home') </a>
                        </div>

                        
                </div>
                @endif
            </div>
        </div>
    </section>
    <!--============================
        TRACKING ORDER END
    ==============================-->


@endsection