@extends('frontend.layouts.master')


@section('title')
    {{$settings->site_name}} &mdash; Product Details
@endsection

@section('content')

<style>
    .simply-countdown-one {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .time-box {
        background-color: rgba(255, 255, 255, 0.3);
        border: 2px solid #007bff;
        border-radius: 8px;
        padding: 10px;
        text-align: center;
        min-width: 70px;
    }

    .time-value {
        font-size: 24px;
        font-weight: bold;
        color: #007bff;
    }

    .time-label {
        font-size: 14px;
        color: #333;
    }
</style>



     


    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>products details</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="javascript:;">product</a></li>
                            <li><a href="javascript:;">product details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        PRODUCT DETAILS START
    ==============================-->
    <section id="wsus__product_details">
        <div class="container">
            <div class="wsus__details_bg">
                <div class="row">
                    <div class="col-xl-4 col-md-5 col-lg-5" style="z-index: 9999 !important;">
                        <div id="sticky_pro_zoom">
                            <div class="hidden exzoom" id="exzoom">
                                <div class="exzoom_img_box">
                                    @if($product->video_link)

                                    <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                        href="{{ $product->video_link }}">
                                        <i class="fas fa-play"></i>
                                    </a>
                                    @endif
                                    <ul class='exzoom_img_ul'>
                                        <li><img class="zoom ing-fluid w-100" src="{{ asset('storage/' . $product->thumb_image) }}" alt="product"></li>
                                        @foreach($product->galleries as $image)
                                        <li><img class="zoom ing-fluid w-100" src="{{ asset('storage/' . $image->image) }}" alt="product"></li>

                                        @endforeach
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn"> <i
                                            class="far fa-chevron-left"></i> </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> <i
                                            class="far fa-chevron-right"></i> </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-7 col-lg-7">
                        <div class="wsus__pro_details_text">
                            <a class="title" href="javascript:;">{{ $product->name }}</a>
                            @if($product->qty > 0)

                                <p class="wsus__stock_area"><span class="in_stock">in stock</span> ({{ $product->qty }} item)</p>
                            @elseif($product->qty == 0)
                                <p class="wsus__stock_area"><span class="in_stock">stock out</span> ({{ $product->qty }} item)</p>
                            @endif
                            @if(checkDiscount($product))
                                <h4>  {{$product->offer_price}} {{ $settings->currency_icon }} <del> {{$product->price}} {{ $settings->currency_icon }}</del></h4>
                                <p class="wsus__price"><span> Prix / Mois :</span>  {{ $product->price_60 }} {{ $settings->currency_icon }}</p>
                            @else
                                <h4>{{$product->price}} {{ $settings->currency_icon }} </h4>
                                <p class="wsus__price"><span> Prix / 60 Mois :</span>  {{ $product->price_60 }} {{ $settings->currency_icon }}</p>


                            @endif
                           
                             <p class="description">{!! $product->short_description !!}</p>
                            @if(checkDiscount($product))
                            <div class="wsus_pro_hot_deals">
                                <h5 class="">offer ending time : </h5>
                                <div class="simply-countdown-one">

                                </div>
                            </div>
                            @endif

                            <form class="shopping-cart-form" method="POST">

                            <div class="wsus__selectbox">
                                <div class="row">
                                    <input type="hidden" name="product" value="{{ $product->id }}" >
                                        @foreach($product->variants as $variants)
                                            <div class="col-xl-6 col-sm-6">
                                                <h5 class="mb-2">{{$variants->name }} :</h5>
                                                <select class="select_2" name="variants_items[]">
                                                    @foreach($variants->variantitems as $varianitem)
                                                        <option {{ $varianitem->is_default ? 'selected' : '' }} value="{{ $varianitem->id }}">{{ $varianitem->name }} (${{ $varianitem->price }})</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        @endforeach
                                </div>
                            </div>



                            <div class="wsus__quentity">
                                <h5>quentity :</h5>
                                <div class="select_number">
                                    <input class="number_area" type="text" name="qty" min="1" max="100" value="1" />
                                </div>

                            </div>

                            <ul class="wsus__button_area">
                                <li><button type="submit" class="add_cart" href="#">add to cart</button></li>
                                
                            </ul>
                            </form>

                            <p class="brand_model"><span>brand :</span> {{ $product->brand->name }}</p>


                        </div>
                    </div>
                    <div class="col-xl-3 col-md-12 mt-md-5 mt-lg-0">
                        <div class="wsus_pro_det_sidebar" id="sticky_sidebar">
                            <ul>
                                <li>
                                    <span><i class="fal fa-truck"></i></span>
                                    <div class="text">
                                        <h4> {{ $product->price_12 }} {{ $settings->currency_icon }} / mois jusqu'à 12 mois</h4>
                                        <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
                                    </div>
                                </li>
                                <li>
                                    <span><i class="far fa-shield-check"></i></span>
                                    <div class="text">
                                        <h4>{{ $product->price_24 }} {{ $settings->currency_icon }} / mois jusqu'à 24 mois</h4>
                                        <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
                                    </div>
                                </li>
                                <li>
                                    <span><i class="fal fa-envelope-open-dollar"></i></span>
                                    <div class="text">
                                        <h4>{{ $product->price_36 }} {{ $settings->currency_icon }} / mois jusqu'à 36 mois</h4>
                                        <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
                                    </div>
                                </li>

                                <li>
                                    <span><i class="fal fa-envelope-open-dollar"></i></span>
                                    <div class="text">
                                        <h4>{{ $product->price_48 }} {{ $settings->currency_icon }} / mois jusqu'à 48 mois</h4>
                                        <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
                                    </div>
                                </li>

                                <li>
                                    <span><i class="fal fa-envelope-open-dollar"></i></span>
                                    <div class="text">
                                        <h4>{{ $product->price_60 }} {{ $settings->currency_icon }} / mois jusqu'à 60 mois</h4>
                                        <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__pro_det_description">
                        <div class="wsus__details_bg">
                            <ul class="mb-3 nav nav-pills" id="pills-tab3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab7" data-bs-toggle="pill"
                                        data-bs-target="#pills-home22" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">Description</button>
                                </li>


                            </ul>
                            <div class="tab-content" id="pills-tabContent4">
                                <div class="tab-pane fade show active " id="pills-home22" role="tabpanel"
                                    aria-labelledby="pills-home-tab7">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="wsus__description_area">

                                                {!! $product->long_description !!}

                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--============================
        PRODUCT DETAILS END
    ==============================-->


    <!--============================
        RELATED PRODUCT START
    ==============================-->
    {{-- <section id="wsus__flash_sell">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__section_header">
                        <h3>Related Products</h3>
                        <a class="see_btn" href="#">see more <i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row flash_sell_slider">
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="images/pro3.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="images/pro3_3.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">Electronics </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(133 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">hp 24" FHD monitore</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="images/pro4.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="images/pro4_4.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(17 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">men's casual fashion watch</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="images/pro9.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="images/pro9_9.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(120 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">men's fashion sholder bag</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="images/pro2.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="images/pro2_2.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(72 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">men's casual shoes</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="images/pro4.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="images/pro4_4.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(17 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">men's casual fashion watch</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}
    <!--============================
        RELATED PRODUCT END
    ==============================-->

@endsection



@push('scripts')

<script>

    $(document).ready(function(){

        @if($product->offer_end_date)

            var offerEndDate = new Date("{{ $product->offer_end_date->format('Y-m-d') }}");
            offerEndDate.setHours(23, 59, 59, 999);
            simplyCountdown('.simply-countdown-one', {
                year: offerEndDate.getFullYear(),
                month: offerEndDate.getMonth() + 1,
                day: offerEndDate.getDate(),
                hours: offerEndDate.getHours(),
                minutes: offerEndDate.getMinutes(),
                seconds: offerEndDate.getSeconds(),

                onEnd: function() {

                    $('.simply-countdown-one').html("Offer has ended");
                }
            });
        @endif

    });

</script>



@endpush
