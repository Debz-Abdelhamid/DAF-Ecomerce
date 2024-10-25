@extends('frontend.layouts.master')


@section('title')
    {{$settings->site_name}} &mdash; Product Details
@endsection

@section('content')


        <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>products</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="javascript:;">products</a></li>
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
        PRODUCT PAGE START
    ==============================-->
    <section id="wsus__product_page">
        <div class="container">
            <div class="row">
                
                <div class="col-xl-3 col-lg-4">
                    <div class="wsus__sidebar_filter ">
                        <p>filter</p>
                        <span class="wsus__filter_icon">
                            <i class="far fa-minus" id="minus"></i>
                            <i class="far fa-plus" id="plus"></i>
                        </span>
                    </div>
                    <div class="wsus__product_sidebar" id="sticky_sidebar">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        All Categories
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            @foreach($categories as $category)
                                            <li><a href="{{ route('products.index', ['category' => $category->slug]) }}">{{$category->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                   
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree3">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree3" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        brand
                                    </button>
                                </h2>
                                <div id="collapseThree3" class="accordion-collapse collapse show"
                                    aria-labelledby="headingThree3" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <ul>
                                            @foreach($brands as $brand)
                                            <li><a href="{{ route('products.index', ['brand' => $brand->slug]) }}">{{$brand->name}}</a></li>
                                            @endforeach
                                        </ul>
                                       
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="row">
                        <div class="col-xl-12 d-none d-md-block mt-md-4 mt-lg-0">
                            <div class="wsus__product_topbar">
                                <div class="wsus__product_topbar_left">
                                    <div class="nav nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button class="nav-link {{ session()->has('product_list_style') && session()->get('product_list_style') == 'grid' ? 'active' : '' }} list-view {{!session()->has('product_list_style') ? 'active' : '' }}"  data-id="grid" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab"
                                            aria-controls="v-pills-home" aria-selected="true">
                                            <i class="fas fa-th"></i>
                                        </button>
                                        <button class="nav-link {{ session()->has('product_list_style') && session()->get('product_list_style') == 'list' ? 'active' : '' }} list-view" data-id="list" id="v-pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-profile" type="button" role="tab"
                                            aria-controls="v-pills-profile" aria-selected="false">
                                            <i class="fas fa-list-ul"></i>
                                        </button>
                                    </div>
                                   
                            </div>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade {{ session()->has('product_list_style') && session()->get('product_list_style') == 'grid' ? 'show active' : '' }} {{ !session()->has('product_list_style') ? 'show active' : '' }}" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="row">
                                    @forelse($products as $product)
                                        <div class="col-xl-4 col-sm-6 mb-4">
                                            <div class="wsus__product_item">
                                                <span class="wsus__new" style="background-color:red; font-size:18px;">{{ productType($product->type) }}</span>
                                                @if(checkDiscount($product))
                                                    <span class="wsus__minus">{{ calculateDiscountPercent($product->price, $product->offer_price) }}</span>
                                                @endif
                                                <a class="wsus__pro_link" href="{{ route('product-detail', $product->slug) }}">
                                                    <img src="{{ asset('storage/'.$product->thumb_image) }}" alt="product" class="img-fluid w-100 img_1" />
                                                    @if ($product->galleries->isNotEmpty())
                                                        <img src="{{ asset('storage/' . $product->galleries->first()->image) }}" alt="product" class="img-fluid w-100 img_2" />
                                                    @else
                                                        <img src="{{ asset('storage/' . $product->thumb_image) }}" alt="product" class="img-fluid w-100 img_2" />
                                                    @endif
                                                </a>
                                                <ul class="wsus__single_pro_icon">
                                                    <li><a href="{{ route('product-detail', $product->slug) }}"><i class="far fa-eye"></i></a></li>
                                                </ul>
                                                <div class="wsus__product_details">
                                                    <a class="wsus__category" href="#">{{ @$product->category->name }}</a>
                                                    <a class="wsus__pro_name" href="{{ route('product-detail', $product->slug) }}">{{ limitText($product->name, 50) }}</a>
                                                    @if(checkDiscount($product))
                                                        <p class="wsus__price">
                                                            <span><b>Prix Total :</b></span> &nbsp; {{ $product->offer_price }} {{ $settings->currency_icon }} <del>{{ $product->price }} {{ $settings->currency_icon }}</del>
                                                        </p>
                                                        <div class="d-flex justify-center items-center text-center">
                                                            <p class="wsus__price text-danger"><span><b>Prix :</b></span> &nbsp; {{ $product->price_60 }} {{ $settings->currency_icon }} <span class="text-danger"><b>/Mois</b></span></p>
                                                        </div>
                                                    @else
                                                        <p class="wsus__price"><span><b>Prix Total :</b></span> &nbsp; {{ $product->price }} {{ $settings->currency_icon }}</p>
                                                        <div class="d-flex justify-center items-center text-center">
                                                            <p class="wsus__price text-danger"><span><b>Prix :</b></span> &nbsp; {{ $product->price_60 }} {{ $settings->currency_icon }} <span class="text-danger"><b>/Mois</b></span></p>
                                                        </div>
                                                    @endif
                                                    <form class="shopping-cart-form">
                                                        <input type="hidden" name="product" value="{{ $product->id }}">
                                                        @foreach($product->variants as $variants)
                                                            <select class="d-none" name="variants_items[]">
                                                                @foreach($variants->variantitems as $varianitem)
                                                                    <option {{ $varianitem->is_default ? 'selected' : '' }} value="{{ $varianitem->id }}">{{ $varianitem->name }} (${{ $varianitem->price }})</option>
                                                                @endforeach
                                                            </select>
                                                        @endforeach
                                                        <input type="hidden" name="qty" min="1" max="100" value="1" />
                                                        <button type="submit" class="add_cart">add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center mt-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h2>Product Not Found!</h2>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            
                            <div class="tab-pane fade {{ session()->has('product_list_style') && session()->get('product_list_style') == 'list' ? 'show active' : '' }}" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="row">
                                    @forelse($products as $product)
                                        <div class="col-xl-12">
                                            <div class="wsus__product_item wsus__list_view">
                                                <span class="wsus__new" style="background-color:red; font-size:18px;">{{ productType($product->type) }}</span>
                                                @if(checkDiscount($product))
                                                    <span class="wsus__minus">{{ calculateDiscountPercent($product->price, $product->offer_price) }}</span>
                                                @endif
                                                <a class="wsus__pro_link" href="{{ route('product-detail', $product->slug) }}">
                                                    <img src="{{ asset('storage/'.$product->thumb_image) }}" alt="product" class="img-fluid w-100 img_1" />
                                                    @if ($product->galleries->isNotEmpty())
                                                        <img src="{{ asset('storage/' . $product->galleries->first()->image) }}" alt="product" class="img-fluid w-100 img_2" />
                                                    @else
                                                        <img src="{{ asset('storage/' . $product->thumb_image) }}" alt="product" class="img-fluid w-100 img_2" />
                                                    @endif
                                                </a>
                                                <div class="wsus__product_details">
                                                    <a class="wsus__category" href="javascript:;">{{ @$product->category->name }}</a>
                                                    <a class="wsus__pro_name" href="{{ route('product-detail', $product->slug) }}">{{ limitText($product->name, 50) }}</a>
                                                    @if(checkDiscount($product))
                                                        <p class="wsus__price">
                                                            <span><b>Prix Total :</b></span> &nbsp; {{ $product->offer_price }} {{ $settings->currency_icon }} <del>{{ $product->price }} {{ $settings->currency_icon }}</del>
                                                        </p>
                                                        <div class="d-flex justify-center items-center text-center">
                                                            <p class="wsus__price text-danger"><span><b>Prix :</b></span> &nbsp; {{ $product->price_60 }} {{ $settings->currency_icon }} <span class="text-danger"><b>/Mois</b></span></p>
                                                        </div>
                                                    @else
                                                        <p class="wsus__price"><span><b>Prix Total :</b></span> &nbsp; {{ $product->price }} {{ $settings->currency_icon }}</p>
                                                        <div class="d-flex justify-center items-center text-center">
                                                            <p class="wsus__price text-danger"><span><b>Prix :</b></span> &nbsp; {{ $product->price_60 }} {{ $settings->currency_icon }} <span class="text-danger"><b>/Mois</b></span></p>
                                                        </div>
                                                    @endif
                                                    <p class="list_description">{{ $product->short_description }}</p>
                                                    <ul class="wsus__single_pro_icon">
                                                        <form class="shopping-cart-form">
                                                            <input type="hidden" name="product" value="{{ $product->id }}">
                                                            @foreach($product->variants as $variants)
                                                                <select class="d-none" name="variants_items[]">
                                                                    @foreach($variants->variantitems as $varianitem)
                                                                        <option {{ $varianitem->is_default ? 'selected' : '' }} value="{{ $varianitem->id }}">{{ $varianitem->name }} (${{ $varianitem->price }})</option>
                                                                    @endforeach
                                                                </select>
                                                            @endforeach
                                                            <input type="hidden" name="qty" min="1" max="100" value="1" />
                                                            <button type="submit" class="add_cart">add to cart</button>
                                                        </form>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center mt-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h2>Product Not Found!</h2>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="mt-5">
                        @if($products->hasPages())
                            {{ $products->withQueryString()->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        PRODUCT PAGE END
    ==============================-->


@endsection



@push('scripts')

        <script>
            $(document).ready(function(){

                $('.list-view').on('click', function(){
                    let style = $(this).data('id');

                    $.ajax({
                        method: 'GET',
                        url: "{{ route('change-product-list-view') }}",
                        data: { style: style },
                        success: function(data)
                        {

                        },
                        error: function()
                        {

                        }
                    });
                });

            });
        </script>    
@endpush
