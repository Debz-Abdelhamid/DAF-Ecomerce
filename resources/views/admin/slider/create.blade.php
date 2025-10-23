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
            <div class="row" >
                <div class="col-12">
                    <div class="card" >
                        <div class="card-header" >
                            <h4>@lang('admin.CreateSlider') </h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.slider.index') }}" class="btn btn-success"><i
                                        class="fas fa-backspace"></i>&nbsp;@lang('admin.Back')</a>
                            </div>
                        </div>
                        <div class="card-body" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input placeholder="@lang('admin.Banner')" type="file" name="banner" class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input placeholder="@lang('admin.Type')" type="text" name="type" value="{{ old('type') }}" class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input placeholder="@lang('admin.Title')" type="text" name="title" value="{{ old('title') }}" class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input placeholder="@lang('admin.StartingPrice')" type="text" name="starting_price" value="{{ old('starting_price') }}"
                                        class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input placeholder="@lang('admin.ButtonURL')" type="text" name="btn_url" value="{{ old('btn_url') }}" class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input placeholder="@lang('admin.Serial')" type="text" name="serial" value="{{ old('serial') }}" class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <select name="status" class="form-control form-control-lg">
                                        <option value=""stream_select disabled>@lang('admin.select') @lang('admin.Status')</option>
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
