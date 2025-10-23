@extends('frontend.layouts.master')


@section('title')
{{$settings->site_name}} &mdash; Checkout
@endsection

@section('content')




<!--============================
        CHECK OUT PAGE START
    ==============================-->
<section id="wsus__cart_view">
    <div class="container">
        <form action="{{ route('user.checkout.form-submit') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                        <h5 class="mb-3">@lang('product.Billing_Details')</h5>
                    </div>


                    <div class="row">

                        <div class="p-3 wsus__check_form">
                            <div class="row">
                                <div class="col-md-12" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="@lang('product.nom') *" name="name" value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="col-md-6" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="@lang('product.Numero_tel') *" name="phone" value="{{ old('phone') }}">
                                    </div>
                                </div>




                                <div class="col-md-6" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <div class="wsus__check_single_form">
                                        <select class="select_2" name="country">
                                            <option>@lang('product.Country') *</option>
                                            @foreach(config('settings.country_list') as $country)
                                            <option {{ $country ==  old('country') ? 'selected' : ''  }} value="{{ $country }}">{{ $country }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="@lang('product.State') *" name="state" value="{{ old('state') }}">
                                    </div>
                                </div>

                                <div class="col-md-6" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="@lang('product.Town') *" name="city" value="{{ old('city') }}">
                                    </div>
                                </div>

                                <div class="col-md-6" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="@lang('product.Zip') *" name="zip" value="{{ old('zip') }}">
                                    </div>
                                </div>


                                <div class="col-md-6" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="@lang('product.Address') *" name="address" value="{{ old('address') }}">
                                    </div>
                                </div>


                                <div class="form-group col-md-12" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <select id="statusSelect" name="dossier" class="form-select form-control-lg">
                                        <option selected disabled><small>@lang('admin.selectD')</small></option>
                                        <option value="retrait">@lang('admin.retrait')</option>
                                        <option value="retrait militaire">@lang('admin.military_retirement')</option>
                                        <option value="fonctionnaire">@lang('admin.employee')</option>
                                        <option value="fonctionnaire militaire">@lang('admin.military_employee')</option>
                                    </select>

                                </div>


                            </div>


                        </div>
        </form>
    </div>

    <!-- Dossier 1-->
    <div class="row">
        <div class="col-xl-12" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
            <div class="wsus__pro_det_description">
                <div class="wsus__details_bg">
                    <ul class="mb-3 nav nav-pills" id="pills-tab3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab7" data-bs-toggle="pill"
                                data-bs-target="#pills-home22" type="button" role="tab"
                                aria-controls="pills-home" aria-selected="true">@lang('admin.file_to_provide')</button>
                        </li>


                    </ul>
                    <div class="tab-content" id="pills-tabContent4">
                        <div class="tab-pane fade show active " id="pills-home22" role="tabpanel"
                            aria-labelledby="pills-home-tab7">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__description_area">
                                        <div class="conatiner">



                                            <div id="dossierContainer">
                                                <div id="dossier-retrait" class="dossier-section" style="display: none;">
                                                    <b>@lang('admin.retraite_title')</b>
                                                    <ul>
                                                        <li>@lang('admin.cheque')</li>
                                                        <li>@lang('admin.photos')</li>
                                                        <li>@lang('admin.birth_certificate')</li>
                                                        <li>@lang('admin.residence')</li>
                                                        <li>@lang('admin.family_certificate')</li>
                                                        <li>@lang('admin.id_copy')</li>
                                                        <li>@lang('admin.chifa_copy')</li>
                                                        <li>@lang('admin.retirement_book_copy')</li>
                                                        <li>@lang('admin.annual_pay_slip')</li>
                                                        <li>@lang('admin.last_3_months_statement')</li>
                                                    </ul>

                                                </div>

                                                <div id="dossier-retrait militaire" class="dossier-section" style="display: none;">
                                                    <b>@lang('admin.military_retiree_title')</b>
                                                    <ul>
                                                        <li>@lang('admin.cheque')</li>
                                                        <li>@lang('admin.photos')</li>
                                                        <li>@lang('admin.birth_certificate')</li>
                                                        <li>@lang('admin.residence')</li>
                                                        <li>@lang('admin.family_certificate')</li>
                                                        <li>@lang('admin.radiation')</li>
                                                        <li>@lang('admin.id_copy')</li>
                                                        <li>@lang('admin.annual_pay_slip')</li>
                                                        <li>@lang('admin.last_6_months_statement')</li>
                                                    </ul>

                                                </div>

                                                <div id="dossier-fonctionnaire" class="dossier-section" style="display: none;">
                                                    <b>@lang('admin.employee_title')</b>
                                                    <ul>
                                                        <li>@lang('admin.cheque')</li>
                                                        <li>@lang('admin.photos')</li>
                                                        <li>@lang('admin.birth_certificate')</li>
                                                        <li>@lang('admin.residence')</li>
                                                        <li>@lang('admin.family_certificate')</li>
                                                        <li>@lang('admin.id_copy')</li>
                                                        <li>@lang('admin.chifa_copy')</li>
                                                        <li>@lang('admin.last_3_pay_slips')</li>
                                                        <li>@lang('admin.permanisation')</li>
                                                        <li>@lang('admin.last_3_months_statement')</li>
                                                    </ul>

                                                </div>

                                                <div id="dossier-fonctionnaire militaire" class="dossier-section" style="display: none;">
                                                    <b>@lang('admin.military_employee_title')</b>
                                                    <ul>
                                                        <li>@lang('admin.cheque')</li>
                                                        <li>@lang('admin.photos')</li>
                                                        <li>@lang('admin.birth_certificate')</li>
                                                        <li>@lang('admin.residence')</li>
                                                        <li>@lang('admin.family_certificate')</li>
                                                        <li>@lang('admin.id_copy')</li>
                                                        <li>@lang('admin.unit_presence_certificate')</li>
                                                        <li>@lang('admin.annual_pay_slip')</li>
                                                        <li>@lang('admin.last_3_months_statement')</li>
                                                    </ul>

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
        </div>

    </div>



    <script>
        // Récupérer le menu déroulant et le conteneur
        const statusSelect = document.getElementById('statusSelect');
        const dossierSections = document.querySelectorAll('.dossier-section');

        // Écouter le changement de sélection
        statusSelect.addEventListener('change', (event) => {
            const selectedValue = event.target.value;

            // Masquer toutes les sections
            dossierSections.forEach(section => {
                section.style.display = 'none';
            });

            // Afficher la section correspondant à l'option sélectionnée
            const selectedSection = document.getElementById(`dossier-${selectedValue}`);
            if (selectedSection) {
                selectedSection.style.display = 'block';
            }
        });
    </script>








    </div>



    <div class="col-xl-4 col-lg-5">




        <div class="wsus__order_details" id="sticky_sidebar">
            <h5 class="text-center p-2 text-black">@lang('product.Présimulation')</h5>
            <h6 class="text-center p-2">@lang('admin.sal')</h6>

            <div class="accordion-body">
                <div class="price_ranger">
                    <input type="hidden" name="slider" id="slider_range" class="flat-slider" />
                </div>
            </div>
            <h5 class="text-center p-2">@lang('product.Durée')</h5>
            <section class="container p-2  justify-content-center align-items-center text-center">
                <main class="row d-flex justify-content-center align-items-center gap-4">
                    <article class="col-sm-5">
                        <input type="radio" class="btn-check" name="duree" value="price_12" id="option-2" autocomplete="off">
                        <label class="btn btn-outline-primary option option-2" for="option-2">12 @lang('product.Mois')</label>
                        </label>
                    </article>

                    <article class="col-sm-5">
                        <input type="radio" class="btn-check" name="duree" value="price_24" id="option-1" autocomplete="off">
                        <label class="btn btn-outline-primary option option-1" for="option-1">24 @lang('product.Mois')</label>
                    </article>

                    <article class="col-sm-5">
                        <input type="radio" class="btn-check" name="duree" value="price_36" id="option-3" autocomplete="off">
                        <label class="btn btn-outline-primary option option-3" for="option-3">36 @lang('product.Mois')</label>
                    </article>

                    <article class="col-sm-5">
                        <input type="radio" class="btn-check" name="duree" value="price_48" id="option-4" autocomplete="off">
                        <label class="btn btn-outline-primary option option-4" for="option-4">48 @lang('product.Mois')</label>
                    </article>

                    <article class="col-sm-5">
                        <input type="radio" class="btn-check" name="duree" value="price_60" id="option-5" autocomplete="off">
                        <label class="btn btn-outline-primary option option-5" for="option-5">60 @lang('product.Mois')</label>
                    </article>


                </main>
            </section>

            <div
                class="wsus__order_details_summery"
                dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                <p>@lang('product.variant') : <span id="variant_total"> {{ variantTotal() }} {{ $settings->currency_icon }}</span></p>
                <p>@lang('product.subtotal') : <span> {{ cartTotal() }} {{ $settings->currency_icon }}</span></p>
                <p><b>@lang('product.total') :</b> <span><b id="total_amount">{{ cartTotal() }} {{ $settings->currency_icon }}</b></span></p>
            </div>





            <button type="submit" id="submitCheckoutForm" class="common_btn ">@lang('product.Place_Order')</button>

        </div>
        <!--form-->
    </div>
    </form>

    </div>
</section>




@endsection