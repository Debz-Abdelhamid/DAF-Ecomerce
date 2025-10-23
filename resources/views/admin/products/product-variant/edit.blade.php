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
                            <h4>@lang('admin.UpdateVariant')  </h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product-variant.index', ['product' => request()->product ]) }}" class="btn btn-success"><i
                                        class="fas fa-backspace"></i>&nbsp;@lang('admin.Back')</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product-variant.update', $variant->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                
                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input type="text" placeholder="@lang('admin.Name')" name="name" value="{{ old('name', $variant->name) }}" class="form-control">
                                </div>



                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <select name="status" class="form-control form-control-lg">
                                        <option value="" selected disabled>@lang('admin.Select') @lang('admin.Status')</option>
                                        
                                        <option {{ $variant->status ? 'selected' : '' }} value="1">@lang('admin.Active')</option>
                                        <option {{ $variant->status == 0 ? 'selected' : '' }} value="0">@lang('admin.Inactive')</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success">@lang('admin.Update')</button>
                            </form>    
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
