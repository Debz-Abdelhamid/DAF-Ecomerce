@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Product Variant Items
@endsection


@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>@lang('admin.ProductVariantItems')</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>@lang('admin.CreateVariantItem')</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product-variant-item.index', ['product_id' => $product->id ,'variant_id' => $variant->id ]) }}" class="btn btn-success"><i class="fas fa-arrow-left"></i>&nbsp;@lang('admin.Back')</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product-variant-item.store') }}" method="POST">
                                @csrf

                              
                                <div class="form-group">
                                    <input type="hidden" name="variant_id" value="{{ $variant->id }}" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label>@lang('admin.ProductName')</label>
                                    <input type="text"  value="{{ $product->name }}" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label>@lang('admin.VariantName')</label>
                                    <input type="text" name="variant_name" value="{{ $variant->name }}" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label>@lang('admin.ItemName')</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>@lang('admin.Price') <code>(@lang('admin.Setf'))</code></label>
                                    <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label>@lang('admin.IsDefault')</label>
                                    <select name="is_default" class="form-control form-control-lg">
                                        <option value="" selected disabled>@lang('admin.Select')</option>
                                        <option value="1">@lang('admin.oui')</option>
                                        <option value="0">@lang('admin.non')</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>@lang('admin.Status')</label>
                                    <select name="status" class="form-control form-control-lg">
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
