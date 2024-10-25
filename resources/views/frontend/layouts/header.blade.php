
    <header>
        <div class="container">
            <div class="row">
                <div class="col-2 col-md-1 d-lg-none">
                    <div class="wsus__mobile_menu_area">
                        <span class="wsus__mobile_menu_icon"><i class="fal fa-bars"></i></span>
                    </div>
                </div>
                <div class="col-xl-2 col-7 col-md-8 col-lg-2">
                    <div class="wsus_logo_area">
                        <a class="wsus__header_logo" href="{{ route('home') }}">
                            <img src="{{asset('frontend/images/logo_2.png')}}" alt="logo" class="img-fluid w-100">
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-md-6 col-lg-4 d-none d-lg-block">
                    <div class="wsus__search">
                        <form action="{{ route('products.index') }}" method="GET">
                            <input type="text" name="search" placeholder="Search..." value="{{ request()->search }}">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-5 col-3 col-md-3 col-lg-6">
                    <div class="wsus__call_icon_area">
                        <div class="wsus__call_area">
                            <div class="wsus__call">
                                <i class="fas fa-user-headset"></i>
                            </div>
                            <div class="wsus__call_text">
                                <p>{{ $settings->contact_email }}</p>
                                <p>{{ $settings->contact_phone }}</p>
                            </div>
                        </div>
                        <ul class="wsus__icon_area">
                        
                            <li><a class="wsus__cart_icon" href="javascript:;"><i
                                        class="fal fa-shopping-bag"></i><span id="cart-count">{{ Cart::content()->count() }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="wsus__mini_cart">
            <h4>shopping cart <span class="wsus_close_mini_cart"><i class="far fa-times"></i></span></h4>
            <ul class="mini_cart_wrapper">
                

                @forelse(Cart::content() as $sidebardproduct)
                    <li id="mini_cart_{{ $sidebardproduct->rowId }}">
                        <div class="wsus__cart_img">
                            <a href="{{ route('product-detail', $sidebardproduct->options->slug) }}"><img src="{{ asset('storage/'.$sidebardproduct->options->image) }}" alt="product" class="img-fluid w-100"></a>
                            
                        </div>
                        <div class="wsus__cart_text">
                            <a class="wsus__cart_title" href="{{ route('product-detail', $sidebardproduct->options->slug) }}">{{ $sidebardproduct->name }}</a><br>
                            <p>
                                {{ $settings->currency_icon }} {{ $sidebardproduct->price}}
                            </p>
                            <small>
                              Variants Total: {{$settings->currency_icon}} {{ $sidebardproduct->options->variant_total }}
                            </small>
                            <br>
                            <small>
                                Quantity: {{ $sidebardproduct->qty }}
                            </small>  


                        </div>
                    </li>

                @empty
                    <li class="d-flex justify-content-center">
                        Cart Is Empty !
                    </li>
                @endforelse
            
            </ul>
            
            <div class="mini_cart_actions {{ Cart::content()->count() == 0 ? 'd-none' : '' }}">
                <h5>sub total <span id="mini_cart_subtotal">{{ $settings->currency_icon }} {{ cartTotal() }}</span></h5>
                <div class="wsus__minicart_btn_area">
                    <a class="common_btn" href="{{ route('cart-details') }}">view cart</a>
                </div>
            </div>
            
        </div>

    </header>

