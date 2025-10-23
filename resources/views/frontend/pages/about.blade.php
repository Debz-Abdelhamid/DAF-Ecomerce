@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} &mdash; A propos de Nous
@endsection

@section('content')

<section class="pt-5 position-relative" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 order-lg-1 order-1 d-flex flex-column gap-4 align-items-lg-start align-items-center">
                <div class="d-flex flex-column gap-4">

                    <div class="mb-5">
                        <h2 class="text-dark fw-bold  mb-5" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">@lang('admin.about') </h2>
                        <p class="text-muted" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">@lang('admin.pp1')</p>
                    </div>


                    <div class="d-flex mb-5 justify-content-lg-start justify-content-center gap-5">
                        <div class="wsus__about_counter_single">
                            <span class="counter">64,700</span>
                            <h4>@lang('admin.produit')</h4>
                        </div>
                        <div class="wsus__about_counter_single">
                            <span class="counter">85,000</span>
                            <h4>@lang('admin.clients')</h4>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-lg-6 order-lg-2 order-2 d-flex flex-column gap-4">
                <div class="d-flex justify-content-center">
                    <img class="rounded img-fluid " src="{{asset('frontend/images/DAF.svg')}}" alt="About Us image" />
                </div>

            </div>
        </div>
    </div>
</section>



<!--============================
        CONTACT PAGE START
    ==============================-->




<section id="wsus__contact">
    <div class="container" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="row d-flex justify-content-evenly ">
            <article class="col-sm-5">
                <div class="col-xl-12" id="cart">
                    <div class="wsus__contact_single">
                        <i class="fal fa-envelope" style="color: #b5002b;"></i>
                        <h5>@lang('admin.mailaddress')
                            <!---->
                        </h5>
                        <p href="">{{ $settings->contact_email }}</p>
                    </div>
                </div>

                <div class="col-xl-12" id="cart">
                    <div class="wsus__contact_single">
                        <i class="far fa-phone-alt" style="color: #b5002b;"></i>
                        <h5>@lang('admin.phonenumber')
                            <!--رقم الهاتف-->
                        </h5>
                        <p>{{ $settings->contact_phone }}</p>
                    </div>
                </div>

                <div class="col-xl-12" id="cart">
                    <div class="wsus__contact_single">
                        <i class="fal fa-map-marker-alt " style="color: #b5002b;"></i>
                        <h5>@lang('admin.contactaddress')
                            <!--عنوان الاتصال-->
                        </h5>
                        <p>Annaba , Algérie</p>
                    </div>
                </div>
            </article>
            <article class="col-sm-5">
                <div class="wsus__con_map">
                    <iframe
                        src="https://maps.google.com/maps?q=annaba%20algerie&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no"
                        width="100%" height="450" style="border:0;" allowfullscreen="100"
                        loading="lazy"></iframe>
                </div>
            </article>
        </div>
    </div>
</section>
<!--============================
        CONTACT PAGE END
    ==============================-->




<div class="wsus__why_shop">
    <div class="container" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="row">
            <div class="col-xl-12">
                <h3>@lang('admin.Pourquoi')
                    <!--لماذا تشتري منا ؟-->
                </h3>
            </div>

            <div id="cart" class="col-xl-3 col-sm-6 col-lg-3">
                <div class="wsus__why_shop_single">
                    <i class="fal fa-box-full" style="color: #b5002b;"></i>
                    <p>@lang('admin.Achat')
                        <!-- شراء المنتجات بالتقسيط -->
                    </p>
                </div>
            </div>

            <div id="cart" class="col-xl-3 col-sm-6 col-lg-3">
                <div class="wsus__why_shop_single">
                    <i class="fal fa-box-usd" style="color: #b5002b;"></i>
                    <p>@lang('admin.Expédition')
                        <!-- الشحن في نفس اليوم على جميع الطلبات -->
                    </p>
                </div>
            </div>

            <div id="cart" class="col-xl-3 col-sm-6 col-lg-3">
                <div class="wsus__why_shop_single">
                    <i class="fal fa-truck" style="color: #b5002b;"></i>
                    <p>@lang('admin.livraison')
                        <!--التوصيل للولايات متوفر في 58 ولاية-->
                    </p>
                </div>
            </div>

            <div id="cart" class="col-xl-3 col-sm-6 col-lg-3">
                <div class="wsus__why_shop_single">
                    <i class="fas fa-user-headset" style="color: #b5002b;"></i>
                    <p>@lang('admin.conseils')
                        <!-- الاستشارة المهنية والتعاون الممتاز -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection