<section id="wsus__flash_sell" class="wsus__flash_sell_2">
    <div class=" container">
        <div class="row">
            <div class="col-xl-12">
                <div class="offer_time" style="background: url({{asset('frontend/images/flash_sell_bg.jpg')}})">
                    <div class="wsus__flash_coundown">
                        <span class=" end_text">flash Sale</span>
                        <div class="simply-countdown simply-countdown-one"></div>
                        <a class="common_btn" href="{{ route('flash-sale') }}">see more <i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row flash_sell_slider">

            @foreach($flashsaleitems as $flashsaleitem)
                <div class="col-xl-3 col-sm-6 col-lg-4">


                    <div class="wsus__product_item">
                        <span class="wsus__new" style="background-color:red; font-size:18px;">{{ productType($flashsaleitem->productitem->type) }}</span>
                        @if(checkDiscount($flashsaleitem->productitem))

                            <span class="wsus__minus">{{ calculateDiscountPercent($flashsaleitem->productitem->price, $flashsaleitem->productitem->offer_price)}}</span>

                        @endif
                        <a class="wsus__pro_link" href="{{ route('product-detail', $flashsaleitem->productitem->slug ) }}">
                            <img src="{{ asset('storage/'.$flashsaleitem->productitem->thumb_image) }}" alt="product" class="img-fluid w-100 img_1" />
                        @if ($flashsaleitem->productitem->galleries->isNotEmpty())
                            <img src="{{ asset('storage/' . $flashsaleitem->productitem->galleries->first()->image) }}" alt="product" class="img-fluid w-100 img_2" />
                        @else
                             <img src="{{ asset('storage/' . $flashsaleitem->productitem->thumb_image) }}" alt="product" class="img-fluid w-100 img_2" />
                        @endif
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="{{ route('product-detail', $flashsaleitem->productitem->slug) }}"><i
                                        class="far fa-eye"></i></a></li>
                           
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">{{ $flashsaleitem->productitem->category->name }}</a>
                            
                            <a class="wsus__pro_name" href="{{ route('product-detail', $flashsaleitem->productitem->slug ) }}">{{limitText($flashsaleitem->productitem->name)}}</a>
                            @if(checkDiscount($flashsaleitem->productitem))

                                <p class="wsus__price"> <span> <b>Prix Total : </b></span> &nbsp; {{ $flashsaleitem->productitem->offer_price }} {{ $settings->currency_icon }} <del> {{ $flashsaleitem->productitem->price }} {{ $settings->currency_icon }}</del></p>
                                <div class="d-flex justify-center items-center text-center">
                                    <p class="wsus__price text-center text-danger"><span > <b>Prix : </b> </span> &nbsp; {{ $flashsaleitem->productitem->price_60 }} {{ $settings->currency_icon }}  <span class="text-danger"> <b>/Mois </b> </span></p>
                                </div>
                            @else
                                <p class="wsus__price"><span> <b>Prix Total : </b></span> &nbsp;  {{ $flashsaleitem->productitem->price }} {{ $settings->currency_icon }}</p>
                                <div class="d-flex justify-center items-center text-center">
                                    <p class="wsus__price text-center text-danger"><span> <b>Prix : </b> </span> &nbsp; {{ $flashsaleitem->productitem->price_60 }} {{ $settings->currency_icon }}  <span class="text-danger"> <b>/Mois </b> </span></p>
                                </div>

                            @endif
                            <form class="shopping-cart-form">
                                <input type="hidden" name="product" value="{{ $flashsaleitem->productitem->id }}" >
                                @foreach($flashsaleitem->productitem->variants as $variants)

                                    <select class="d-none" name="variants_items[]">
                                        @foreach($variants->variantitems as $varianitem)
                                            <option  {{ $varianitem->is_default ? 'selected' : '' }} value="{{ $varianitem->id }}">{{ $varianitem->name }} (${{ $varianitem->price }})</option>
                                        @endforeach
                                    </select>

                                @endforeach
                                    <input class="" type="hidden" name="qty" min="1" max="100" value="1" />
                                <button type="submit" class="add_cart" href="#">add to cart</button>
                            </form>
                        </div>
                    </div>

                </div>
            @endforeach


        </div>
    </div>
</section>



@push('scripts')

    <script>
        $(document).ready(function(){

            @if($flashsaledate)

                var flashSaleEndDate = new Date("{{ $flashsaledate->sale_end_date->format('Y-m-d') }}");
                flashSaleEndDate.setHours(23, 59, 59, 999);
                simplyCountdown('.simply-countdown-one', {
                year: flashSaleEndDate.getFullYear(),
                month: flashSaleEndDate.getMonth() + 1,
                day: flashSaleEndDate.getDate(),
                hours: flashSaleEndDate.getHours(),
                minutes: flashSaleEndDate.getMinutes(),
                seconds: flashSaleEndDate.getSeconds(),

                });

            @endif



        });
    </script>

@endpush