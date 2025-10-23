@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Brand
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>@lang('admin.Brand')</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>@lang('admin.UpdateBrand')</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.brand.index') }}" class="btn btn-success"><i
                                        class="fas fa-backspace"></i>&nbsp;@lang('admin.Back')</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.brand.update', $brand) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group d-flex justify-content-center" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                
                                    <img  src="{{ asset('storage/' . $brand->logo) }}" class="img-fluid" alt="not found"
                                        style="max-width: 100%; height: auto; max-height: 200px;">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input type="file" name="logo" class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <input type="text" name="name" placeholder="@lang('admin.Name')" value="{{ old('name', $brand->name) }}" class="form-control">
                                </div>

                                

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <select name="is_featured" class="form-control form-control-lg">
                                        <option value="" selected disabled>@lang('admin.Select') @lang('admin.IsFeatured')</option>
                                        <option {{ $brand->is_featured ? 'selected' : '' }} value="1">@lang('admin.oui')</option>
                                        <option {{ $brand->is_featured == 0 ? 'selected' : '' }} value="0">@lang('admin.non')</option>
                                    </select>
                                </div>

                                
                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <select name="status" class="form-control form-control-lg">
                                        <option value="" selected disabled>@lang('admin.Select') @lang('admin.Status')</option>
                                        <option {{ $brand->status ? 'selected' : '' }} value="1">@lang('admin.Active')</option>
                                        <option {{ $brand->status == 0 ? 'selected' : '' }} value="0">@lang('admin.Inactive')</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success">Update</button>
                            </form>

                        </div>

                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
