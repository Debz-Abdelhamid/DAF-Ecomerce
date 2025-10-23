@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Slider
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>@lang('admin.Slider')</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>@lang('admin.EditSlider')</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.slider.index') }}" class="btn btn-success">@lang('admin.Back')</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group d-flex justify-content-center " dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

                                    <img src="{{ asset('storage/' . $slider->banner) }}" class="img-fluid" alt=""
                                        style="max-width: 100%; height: auto; max-height: 200px;">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <input placeholder="@lang('admin.Banner')" type="file" name="banner" class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input placeholder="@lang('admin.Type')" type="text" name="type" value="{{ old('type', $slider->type) }}"
                                        class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input placeholder="@lang('admin.Title')" type="text" name="title" value="{{ old('title', $slider->title) }}"
                                        class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <input placeholder="@lang('admin.StartingPrice')" type="text" name="starting_price"
                                        value="{{ old('starting_price', $slider->starting_price) }}" class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input placeholder="@lang('admin.ButtonURL')" type="text" name="btn_url" value="{{ old('btn_url', $slider->btn_url) }}"
                                        class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input placeholder="@lang('admin.Serial')" type="text" name="serial" value="{{ old('serial', $slider->serial) }}"
                                        class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <select name="status" class="form-control form-control-lg">
                                    <option value=""stream_select disabled>@lang('admin.select') @lang('admin.Status')</option>
                                        
                                    <option {{ $slider->status ? 'selected' : '' }} value="1">@lang('admin.Active')</option>
                                        <option {{ $slider->status == 0 ? 'selected' : '' }} value="0">@lang('admin.Inactive')
                                        </option>
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
