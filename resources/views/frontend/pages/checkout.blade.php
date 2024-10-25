@extends('frontend.layouts.master')


@section('title')
    {{$settings->site_name}} &mdash; Checkout
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
                        <h4>check out</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="javascript:;">check out</a></li>
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
        CHECK OUT PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">

                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="wsus__check_form">
                            <h5>Billing Details <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">add
                                    new address</a></h5>

                            <div class="row">

                                @foreach($addresses as $address)
                                    <div class="col-xl-6">
                                        <div class="wsus__checkout_single_address">
                                            <div class="form-check">
                                                <input class="form-check-input shipping_address" data-id="{{ $address->id }}" value="{{ $address->id }}" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault-{{ $address->id }}">
                                                <label class="form-check-label" for="flexRadioDefault-{{ $address->id }}">
                                                    Select Address
                                                </label>
                                            </div>
                                            <ul>
                                                <li><span>Name :</span> {{ $address->name }}</li>
                                                <li><span>Phone :</span>{{ $address->phone }}</li>
                                                <li><span>Email :</span>{{ $address->email }}</li>
                                                <li><span>Country :</span>{{ $address->country }}</li>
                                                <li><span>State :</span>{{ $address->state }}</li>
                                                <li><span>City :</span>{{ $address->city }}</li>
                                                <li><span>Zip Code :</span>{{ $address->zip }}</li>
                                                <li><span>Address :</span>{{ $address->address }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">


                    <form id="checkoutform" action="">

                     <div class="wsus__order_details" id="sticky_sidebar">
                        <h5 class="text-center p-2">Pré–simulation</h5>
                        <div class="accordion-body">
                            <div class="price_ranger">
                                <input type="hidden" name="slider" id="slider_range" class="flat-slider" />
                            </div>
                        </div>
                        <h5 class="text-center p-2">Durée de remboursement</h5>
                        <section class="container p-2  justify-content-center align-items-center text-center">
                            <main class="row d-flex justify-content-center align-items-center gap-4">
                                <article class="col-sm-5" >
                                    <input type="radio" class="btn-check" name="duree" value="price_12" id="option-2" autocomplete="off">
                                    <label class="btn btn-outline-primary option option-2" for="option-2">12 Mois</label>
                                </label>
                                </article>

                                <article class="col-sm-5">
                                    <input type="radio" class="btn-check" name="duree" value="price_24" id="option-1" autocomplete="off">
                                    <label class="btn btn-outline-primary option option-1" for="option-1">24 Mois</label>
                                </article>

                                <article class="col-sm-5">
                                    <input type="radio" class="btn-check" name="duree" value="price_36" id="option-3" autocomplete="off">
                                    <label class="btn btn-outline-primary option option-3" for="option-3">36 Mois</label>
                                </article>

                                <article class="col-sm-5">
                                    <input type="radio" class="btn-check" name="duree" value="price_48" id="option-4" autocomplete="off">
                                    <label class="btn btn-outline-primary option option-4" for="option-4">48 Mois</label>
                                </article>

                                <article class="col-sm-5">
                                    <input type="radio" class="btn-check" name="duree" value="price_60" id="option-5" autocomplete="off">
                                    <label class="btn btn-outline-primary option option-5" for="option-5">60 Mois</label>
                                </article>





                            </main>
                        </section>

                            <div class="wsus__order_details_summery">
                                <p>variant total: <span id="variant_total"> {{ variantTotal() }} {{ $settings->currency_icon }}</span></p>
                                <p>subtotal: <span> {{ cartTotal() }} {{ $settings->currency_icon }}</span></p>
                                <p><b>total:</b> <span><b id="total_amount">{{ cartTotal() }} {{ $settings->currency_icon }}</b></span></p>
                            </div>
                            

                                <input type="hidden" name="shipping_address_id" value="" id="shipping_address_id">
                    </form>

                                <a href="" id="submitCheckoutForm" class="common_btn ">Place Order</a>
                            </div>
                    </div>
                    <!--form-->
                </div>

        </div>
    </section>

    <div class="wsus__popup_address">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">add new address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="p-0 modal-body">
                        <div class="p-3 wsus__check_form">
                            <form action="{{ route('user.checkout.address-create') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="First Name" name="name" value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Phone *" name="phone" value="{{ old('phone') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="email" placeholder="Email *" name="email" value="{{ old('email') }}">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <select class="select_2" name="country">
                                                <option>Country / Region *</option>
                                                @foreach(config('settings.country_list') as $country)
                                                    <option {{ $country ==  old('country') ? 'selected' : ''  }} value="{{ $country }}">{{ $country }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="State *" name="state" value="{{ old('state') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Town / City *" name="city" value="{{ old('city') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Zip *" name="zip" value="{{ old('zip') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Address *" name="address" value="{{ old('address') }}">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__check_single_form">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============================
        CHECK OUT PAGE END
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

            $('input[type="radio"]').prop('checked', false);
            $('#shipping_address_id').val("");


            $('.shipping_address').on('click', function(){
                $('#shipping_address_id').val($(this).val());
            });



            $('#submitCheckoutForm').on('click', function(e){
                e.preventDefault();

                if($('#shipping_address_id').val() == "")
                {
                    notyf.error('Shipping adress is Required!');

                }else
                {

                    let formData = $('#checkoutform').serialize();
                    $.ajax({

                        method: 'POST',
                        url: "{{ route('user.checkout.form-submit') }}",
                        data: formData,

                        beforeSend: function()
                        {
                            $('#submitCheckoutForm').html('<i class="fas fa-spinner fa-spin fa-1x"></i>');
                        },

                        success: function(data)
                        {
                            if(data.status == 'success')
                            {
                                $('#submitCheckoutForm').html('Place Order');

                                window.location.href = data.redirect_url;

                            }else if(data.status == 'error')
                            {
                                $('#submitCheckoutForm').html('Place Order');
                                notyf.error(data.message);
                            }


                        },

                        error: function()
                        {


                        }


                    });
                }

            });
        });

    </script>


@endpush