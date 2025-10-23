@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Sub Category
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>@lang('admin.SubCategory') </h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>@lang('admin.UpdateSubCategory')</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.sub-category.index') }}" class="btn btn-success"><i
                                        class="fas fa-backspace"></i>&nbsp;@lang('admin.Back')</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.sub-category.update', $subcategory->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <select name="category" class="form-control form-control-lg">
                                        <option value="" selected disabled>@lang('admin.SelectCategory') </option>
                                        @forelse($categories as $id => $name)
                                            <option {{ $subcategory->category_id == $id ? 'selected' : ''  }} value="{{ $id }}">{{ $name }}</option>
                                        @empty
                                            <option value="No categories available" disabled >@lang('admin.Nocategoriesavailable')</option>
                                        @endforelse
                                        
                                    </select>
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                  
                                    <input type="text" name="name" placeholder="@lang('admin.Name')" value="{{ old('name', $subcategory->name) }}" class="form-control">
                                </div>


                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <select name="status" class="form-control form-control-lg">
                                    <option selected disabled >@lang('admin.Status')</option>
                                        <option {{ $subcategory->status ? 'selected' : '' }} value="1">@lang('admin.Active')</option>
                                        <option {{ $subcategory->status == 0 ? 'selected' : ''  }} value="0">@lang('admin.Inactive')</option>
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
