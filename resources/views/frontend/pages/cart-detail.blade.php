@extends('frontend.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Cart Details
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
                        <h4>cart View</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
                            <li><a href="#">cart view</a></li>
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
        CART VIEW PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="wsus__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            Product item
                                        </th>

                                        <th class="wsus__pro_name">
                                            Product details
                                        </th>


                                        <th class="wsus__pro_tk">
                                           Unit Price
                                        </th>

                                        <th class="wsus__pro_tk">
                                           Ttotal Price
                                        </th>


                                        <th class="wsus__pro_select">
                                            quantity
                                        </th>


                                        <th class="wsus__pro_icon">
                                            <a href="#" class="common_btn clear_cart">clear cart</a>
                                        </th>
                                    </tr>

                                    @forelse($cartItems as $cart)
                                    <tr class="d-flex cart_table-{{ $cart->rowId }}">
                                        <td class="wsus__pro_img"><img src="{{ asset('storage/'.$cart->options->image) }}" alt="product"
                                                class="img-fluid w-100" style="margin-left:10px;">
                                        </td>

                                        <td class="wsus__pro_name">
                                            <p>{!! $cart->name !!}</p>
                                            @foreach($cart->options->variants as $key => $variant)
                                                <span>{{ $key }}: {{ $variant['name'] }} ({{ $settings->currency_icon.$variant['price']}})</span>

                                            @endforeach
                                        </td>


                                        <td class="wsus__pro_tk">
                                            <h6>{{ $settings->currency_icon.$cart->price }}</h6>
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6 id="{{ $cart->rowId }}">{{ $settings->currency_icon.($cart->price + $cart->options->variant_total) * $cart->qty }}</h6>
                                        </td>



                                        <td class="">
                                            <form class="gap-2 product_qty_wrapper">
                                                <button class="btn btn-danger product-decrement">-</button>
                                                <input class="product-qty" data-rowid="{{ $cart->rowId }}" type="text" min="1" max="100" value="{{ $cart->qty }}" readonly />
                                                <button class="btn btn-success product-increment">+</button>
                                            </form>
                                        </td>

                                        <td class="wsus__pro_icon">
                                            <a href="{{ route('cart.remove-item', $cart->rowId) }}"><i class="far fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr class="d-flex">
                                            <td class="wsus__pro_icon" style="width:100%;">
                                                Cart Is Empty !
                                            </td>
                                        </tr>

                                    @endforelse



                                </tbody>
                            </table>
                        </div>

                        <div class="p-3  justify-content-center items-center text-center" id="sticky_sidebar">
                            <h4 class="pb-3 text-danger"> <b>Total Cart Faciliter : </b> </h4>
                            <div class="p-2">
                                <p id="faciliter_12"> <b>{{ $cartFaciliter['price_12'] }} {{ $settings->currency_icon }} / mois jusqu'à 12 mois</b> </p>
                                <p id="faciliter_24"> <b>{{ $cartFaciliter['price_24'] }} {{ $settings->currency_icon }} / mois jusqu'à 24 mois</b> </p>
                                <p id="faciliter_36"> <b>{{ $cartFaciliter['price_36'] }} {{ $settings->currency_icon }} / mois jusqu'à 36 mois</b> </p>
                                <p id="faciliter_48"> <b>{{ $cartFaciliter['price_48'] }} {{ $settings->currency_icon }} / mois jusqu'à 48 mois</b></p>
                                <p id="faciliter_60"> <b>{{ $cartFaciliter['price_60'] }} {{ $settings->currency_icon }} / mois jusqu'à 60 mois</b></p>
                            </div>
                       </div>

                    </div>
                </div>

                
                <div class="col-xl-3">
                    


                    <div class="mt-3 wsus__cart_list_footer_button" id="sticky_sidebar">
                        <h6>total cart</h6>
                        <p>variant total: <span id="variant_total"> {{ variantTotal() }} {{ $settings->currency_icon }}</span></p>
                        <p>subtotal: <span id="sub_total"> {{ cartTotal() }} {{ $settings->currency_icon }}</span></p>
            
                        <p class="total"><span>total:</span> <span id="cart-total">{{ cartTotal() }} {{ $settings->currency_icon }}</span></p>

                        <a class="mt-4 text-center common_btn w-100" href="{{ route('user.checkout') }}">checkout</a>
                        <a class="mt-1 text-center common_btn w-100" href="{{ route('home') }}"><i
                                class="fab fa-shopify"></i> Keep Shopping</a>
        
                    </div>
                </div>


                
            </div>
        </div>
    </section>
    <section id="wsus__single_banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_2.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>sell on <span>35% off</span></h6>
                            <h3>smart watch</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content single_banner_2">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_3.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>New Collection</h6>
                            <h3>Cosmetics</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
          CART VIEW PAGE END
    ==============================-->

@endsection


@push('scripts')
    <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /**  Decrement Product Quantity*/

            $('.product-increment').on('click', function(e){
                e.preventDefault();
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) + 1;
                let rowId = input.data('rowid');
                input.val(quantity);

                $.ajax({
                    method: 'POST',
                    url: "{{route('cart-update-quantity')}}",

                    data: {
                        quantity: quantity,
                        rowId: rowId,
                    },

                    success: function(data)
                    {

                        if(data.status == 'success')
                        {
                            let productId = "#"+rowId;
                            let totalAmount = "{{ $settings->currency_icon }}"+ data.product_total;
                            $(productId).text(totalAmount);
                            fetchSidebardCartProducts();
                            getVariantTotal();
                            renderCartSubTotal();
                            totalCartFaciliter();
                            notyf.success(data.message);
                        }else if(data.status == 'error')
                        {
                            notyf.error(data.message);
                        }
                    },

                    error: function(data)
                    {

                    }

                });
            });

            /**  Decrement Product Quantity*/


            $('.product-decrement').on('click', function(e){
                e.preventDefault();
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) - 1;
                let rowId = input.data('rowid');
                if(quantity >= 1)
                {

                    input.val(quantity);

                    $.ajax({
                        method: 'POST',
                        url: "{{route('cart-update-quantity')}}",

                        data: {
                            quantity: quantity,
                            rowId: rowId,
                        },

                        success: function(data)
                        {

                            if(data.status == 'success')
                            {
                                let productId = "#"+rowId;
                                let totalAmount = "{{ $settings->currency_icon }}"+ data.product_total;
                                $(productId).text(totalAmount);
                                fetchSidebardCartProducts();
                                getVariantTotal();
                                renderCartSubTotal();
                                totalCartFaciliter();
                                notyf.success(data.message);

                            }else if(data.status == 'error')
                            {
                                notyf.error(data.message);
                            }
                        },

                        error: function(data)
                        {

                        }

                    });
                }else
                {
                    input.val(1);

                }
            });

            /** Clear Cart */
            $('.clear_cart').on('click', function(e){
                e.preventDefault();

                Swal.fire({
                title: "Are you sure?",
                text: "This Action will clear your cart!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, clear it!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            method: 'GET',
                            url: "{{ route('clear.cart') }}",

                            success: function(data)
                            {
                                if(data.status == "success")
                                {
                                    window.location.reload();
                                }
                            },

                            error: function(xhr,status,error)
                            {

                            }


                        });

                    }
                });

            });


            function fetchSidebardCartProducts()
            {

                    $.ajax({

                        method:'GET',
                        url: "{{ route('cart.sidebard') }}",

                        success: function(data)
                        {

                            $('.mini_cart_wrapper').html("");
                            var html = '';
                            for(let item in data)
                            {
                                let product = data[item];

                                html +=`
                                <li id="mini_cart_${product.rowId}">
                                    <div class="wsus__cart_img">
                                        <a href="${'{{ route("product-detail", ":slug") }}'.replace(':slug', product.options.slug)}"><img src="${'{{ asset("/storage") }}' + '/' + product.options.image}" alt="product" class="img-fluid w-100"></a>
                                    </div>
                                    <div class="wsus__cart_text">
                                        <a class="wsus__cart_title" href="${'{{ route("product-detail", ":slug") }}'.replace(':slug', product.options.slug)}">${product.name}</a>
                                        <p>{{ $settings->currency_icon }}${product.price}</p>
                                         <small>Variants Total: {{$settings->currency_icon}} ${product.options.variant_total}</small>
                                    <br>
                                        <small>
                                            Quantity: ${product.qty}
                                        </small>
                                    </div>
                                </li>`;

                            }

                            $('.mini_cart_wrapper').html(html);
                            getSidebarSubtotal();
                        },

                        error: function(xhr,status,error)
                        {


                        }

                    });

            }



             /** Get Sidebar Cart Subtotal */

            function getSidebarSubtotal()
            {
                    $.ajax({
                        method: 'GET',
                        url: "{{ route('cart.sidebard-product-subtotal') }}",
                        success: function(data)
                        {
                            $('#mini_cart_subtotal').text("{{ $settings->currency_icon }}"+data);
                        },

                        error: function()
                        {

                        }
                    });
            }

            /** Get Total Cart subtotal  */
            function renderCartSubTotal()
            {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('cart.sidebard-product-subtotal') }}",
                    success: function(data)
                    {
                        $('#sub_total').text(data+ "{{ $settings->currency_icon }}");
                        $('#cart-total').text(data+ "{{ $settings->currency_icon }}");
                        
                    },

                    error: function()
                    {
                        console.log(error);
                    }
                });

            }


            /** Cart Facilité */

            function totalCartFaciliter()
            {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('cart.faciliter') }}",
                    success: function(data)
                    {
                        $('#faciliter_12').html("<b>" + data.cart_faciliter_12 + "{{ $settings->currency_icon }}" + "/ mois jusqu'à 12 mois</b>");

                        $('#faciliter_24').html("<b>" + data.cart_faciliter_24 + "{{ $settings->currency_icon }}" + "/ mois jusqu'à 24 mois</b>");
                        $('#faciliter_36').html("<b>" + data.cart_faciliter_36 + "{{ $settings->currency_icon }}" + "/ mois jusqu'à 36 mois</b>");
                        $('#faciliter_48').html("<b>" + data.cart_faciliter_48 + "{{ $settings->currency_icon }}" + "/ mois jusqu'à 48 mois</b>");
                        $('#faciliter_60').html("<b>" + data.cart_faciliter_60 + "{{ $settings->currency_icon }}" + "/ mois jusqu'à 60 mois</b>");

                    },

                    error: function()
                    {
                        
                    }
                });

            }

            /** Variant total */
            function getVariantTotal()
            {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('cart.total-variants') }}",

                    success: function(data)
                    {
                        if(data.status == 'success')
                        {
                            $('#variant_total').text(data.variant_total+"{{ $settings->currency_icon }}")
                        }
                    },

                    error: function()
                    {

                    }
                });
            }




        });

    </script>

@endpush