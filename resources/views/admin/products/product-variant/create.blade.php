@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Product Variant
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>@lang('admin.ProductVariant')</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>@lang('admin.CreateVariant')</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product-variant.index', ['product' => request()->product ]) }}" class="btn btn-success"><i class="fas fa-arrow-left"></i>&nbsp;@lang('admin.Back')</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product-variant.store') }}" method="POST">
                                @csrf

                              
                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <input type="text" placeholder="@lang('admin.ProductName')" name="product_name" value="{{ $product->name }}" class="form-control" readonly>
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input placeholder="@lang('admin.Name')" type="text" name="name" value="{{ old('name') }}" class="form-control">
                                </div>


                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                  
                                    <input type="hidden" name="product" value="{{ $product->id }}" class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <select name="status" class="form-control form-control-lg">
                                        <option value="" selected disabled>@lang('admin.Select') @lang('admin.Status')</option>
                                        <option value="1">@lang('admin.Active')</option>
                                        <option value="0">@lang('admin.Inactive')</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success">@lang('admin.Create')</button>
                            </form>    
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
