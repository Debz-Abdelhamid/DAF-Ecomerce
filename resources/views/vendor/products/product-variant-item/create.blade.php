@extends('vendor.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Product Variant Item
@endsection

@section('content')

  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
      @include('vendor.layouts.sidebard')
      

      <div class="row" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
            <a href="{{ route('vendor.product-variant-item.index', ['product_id' => $product->id ,'variant_id' => $variant->id ]) }}" class="btn btn-success mb-3"><i class="fas fa-arrow-left"></i>&nbsp;@lang('admin.Back')</a>

          <div class="mt-2 dashboard_content mt-md-0">
            <h3><i class="far fa-user"></i>@lang('admin.CreateVariantItem')</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
               
                
                <form action="{{ route('vendor.product-variant-item.store') }}" method="POST">
                    @csrf

                  
                    <div class="form-group wsus_input">
                        <input type="hidden" name="variant_id" value="{{ $variant->id }}" class="form-control" readonly>
                    </div>

                    <div class="form-group wsus_input">
                        <input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control" readonly>
                    </div>

                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.ProductName')</label>
                        <input type="text"  value="{{ $product->name }}" class="form-control" readonly>
                    </div>

                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.VariantName')</label>
                        <input type="text" name="variant_name" value="{{ $variant->name }}" class="form-control" readonly>
                    </div>

                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.ItemName')</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>

                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.Price') <code> ( @lang('admin.Setf'))</code></label>
                        <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                    </div>


                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.IsDefault')</label>
                        <select name="is_default" class="form-control form-control-lg">
                            <option value="" selected disabled>@lang('admin.Select')</option>
                            <option value="1">@lang('admin.oui')</option>
                            <option value="0">@lang('admin.non')</option>
                        </select>
                    </div>

                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.Status')</label>
                        <select name="status" class="form-control form-control-lg">
                            <option value="1">@lang('admin.Active')</option>
                            <option value="0">@lang('admin.Inactive')</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-success mt-3">@lang('admin.Create')</button>
                </form> 
                   
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->

@endsection


