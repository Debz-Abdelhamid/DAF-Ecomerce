<header>
    <div style="background: #b5002b; border: none; border-radius: 1px;" class="container-fluid">
        <div class="row d-flex align-items-center justify-content-between text-center text-sm text-white ">
            <div class=" col-sm-3">
                <div class="d-none d-md-block">
                    <div class="text-sm d-flex justify-content-center text-center align-items-center  p-2">
                        <i class="fas fa-user-headset"></i>&nbsp;&nbsp;
                        <p class="text-white">{{ $settings->contact_email }}</p>
                    </div>

                </div>
            </div>
            <div class="col-xs-6 col-sm-6">
                <p class="mb-0 text-sm text-white">@lang('navbar.joignables') {{ $settings->contact_phone }}</p>
            </div>
            <div class="col-xs-3 col-sm-3">
                <div class="dropdown">
                    <button class="btn  dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <small class="text-white text-sm" id="currentLanguage"><i class="fas fa-language"></i> @lang('navbar.language')</small> </i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="{{route('locale','fr')}}" data-lang="fr">Français</a></li>
                        <li><a class="dropdown-item" href="{{route('locale','ar')}}" data-lang="ar">Arabe</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-2 col-md-1 d-lg-none">
                <div class="wsus__mobile_menu_area">
                    <span style="background-color: #2F4F4F;" class="wsus__mobile_menu_icon"><i class="fal fa-bars"></i></span>
                </div>
            </div>
            <div class="col-xl-2 col-7 col-md-8 col-lg-2">
                <div class="wsus_logo_area">
                    <a class="wsus__header_logo" href="{{ route('home') }}">
                        <img src="{{asset('frontend/images/DAF.svg')}}" alt="logo" class="img-fluid  relative ">
                    </a>
                </div>
            </div>
            <div class="col-xl-8 col-md-8 col-lg-6 d-none d-lg-block">
                <div class="wsus__search">
                    <form action="{{ route('products.index') }}" method="GET">
                        <input type="text" name="search" placeholder="@lang('navbar.Search')..." value="{{ request()->search }}">
                        <button type="submit"><i class="far fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-xl-2 col-3 col-md-3 col-lg-6">
                <div class="wsus__call_icon_area">

                    <ul class="wsus__icon_area">

                        <li><a class="wsus__cart_icon" href="javascript:;"><i style="color: #2F4F4F;"
                            class="fal fa-shopping-bag"></i><span id="cart-count">{{ Cart::content()->count() }}</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="wsus__mini_cart">
        <h4> @lang('product.shopping_cart') <span class="wsus_close_mini_cart"><i class="far fa-times"></i></span></h4>
        <ul class="mini_cart_wrapper">


            @forelse(Cart::content() as $sidebardproduct)
            <li id="mini_cart_{{ $sidebardproduct->rowId }}">
                <div class="wsus__cart_img">
                    <a href="{{ route('product-detail', $sidebardproduct->options->slug) }}"><img src="{{ asset('storage/'.$sidebardproduct->options->image) }}" alt="product" class="img-fluid w-100"></a>

                </div>
                <div class="wsus__cart_text" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                    <a class="wsus__cart_title" href="{{ route('product-detail', $sidebardproduct->options->slug) }}">{{ $sidebardproduct->name }}</a><br>
                    <p>
                        {{ $settings->currency_icon }} {{ $sidebardproduct->price }}
                    </p>
                    <small>
                        @lang('product.variant') : {{$settings->currency_icon}} {{ $sidebardproduct->options->variant_total }}
                    </small>
                    <br>
                    <small>
                        @lang('product.quantity') : {{ $sidebardproduct->qty }}
                    </small>
                </div>

            </li>

            @empty
            <li class="d-flex justify-content-center">
                @lang('product.Empty')
            </li>
            @endforelse

        </ul>

        <div class="mini_cart_actions {{ Cart::content()->count() == 0 ? 'd-none' : '' }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
            <h5>@lang('product.subtotal') <span id="mini_cart_subtotal">{{ $settings->currency_icon }} {{ cartTotal() }}</span></h5>
            <div class="wsus__minicart_btn_area">
                <a class="common_btn" href="{{ route('cart-details') }}">@lang('product.view')</a>
            </div>
        </div>


    </div>

</header>