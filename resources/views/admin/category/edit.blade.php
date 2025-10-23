@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Category
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>@lang('admin.Category')</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>@lang('admin.EditCategory')</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.category.index') }}" class="btn btn-success"><i
                                        class="fas fa-backspace"></i>&nbsp;@lang('admin.Back')</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.category.update', $category) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>@lang('admin.Icon')</label>
                                    <div>
                                        <button class="btn btn-success" data-selected-class="btn-danger"
                                        data-unselected-class="btn-success" role="iconpicker" name="icon" data-icon="{{ $category->icon }}"></button>
                                    </div>
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <input type="text" name="name" placeholder="@lang('admin.Name')" value="{{ old('name', $category->name) }}" class="form-control">
                                </div>


                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <select name="status" class="form-control form-control-lg">
                                        <option selected disabled>@lang('admin.Status')</option>
                                        <option {{ $category->status ? 'selected' : '' }} value="1">@lang('admin.Active')</option>
                                        <option {{ $category->status == 0 ? 'selected' : '' }} value="0">@lang('admin.Inactive')</option>
                                    </select>
                                </div>
                                <div dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

                                    <button dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" type="submit" class="btn btn-success">@lang('admin.Update')</button>
                                </div>
                            </form>    
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
