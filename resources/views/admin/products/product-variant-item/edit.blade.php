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
                            <h4>@lang('admin.UpdateVariantItem')</h4>
                            
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product-variant-item.update', $variantItem->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                

                                <div class="form-group">
                                    <label>@lang('admin.VariantName')</label>
                                    <input type="text" name="name" value="{{ $variantItem->productvariant->name }}" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label>@lang('admin.ItemName')</label>
                                    <input type="text" name="name" value="{{ old('name', $variantItem->name) }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>@lang('admin.Price') <code> (@lang('admin.Setf')) </code></label>
                                    <input type="text" name="price" value="{{ old('price', $variantItem->price) }}" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label>@lang('admin.IsDefault')</label>
                                    <select name="is_default" class="form-control form-control-lg">
                                        <option value="" selected disabled>@lang('admin.Select')</option>

                                        <option {{ $variantItem->is_default ? 'selected' : '' }} value="1">@lang('admin.oui')</option>
                                        <option {{ $variantItem->is_default == 0 ? 'selected' : '' }} value="0">@lang('admin.non')</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>@lang('admin.Status')</label>
                                    <select name="status" class="form-control form-control-lg">
                                        <option {{ $variantItem->status ? 'selected' : '' }} value="1">@lang('admin.Active')</option>
                                        <option {{ $variantItem->status == 0 ? 'selected' : '' }} value="0">@lang('admin.Inactive')</option>
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
