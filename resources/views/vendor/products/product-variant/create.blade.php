@extends('vendor.layouts.master')


@section('title')
    {{$settings->site_name}} &mdash; Product Variant
@endsection

@section('content')

  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard" >
    <div class="container-fluid">
      @include('vendor.layouts.sidebard')
      

      <div class="row" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
            <a href="{{ route('vendor.product-variant.index', ['product' => request()->product ]) }}" class="btn btn-success mb-3"><i class="fas fa-arrow-left"></i>&nbsp;@lang('admin.Back')</a>

          <div class="mt-2 dashboard_content mt-md-0">
            <h3><i class="far fa-user"></i>@lang('admin.CreateVariant')</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
               
                
                <form class="" action="{{ route('vendor.product-variant.store') }}" method="POST">
                    @csrf

                  
                    <div class="form-group wsus_input">
                        <label>@lang('admin.ProductName')</label>
                        <input type="text" name="product_name" value="{{ $product->name }}" class="form-control" readonly>
                    </div>
                    

                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.Name')</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>

                    
                    <div class="form-group wsus_input">
                      
                        <input type="hidden" name="product" value="{{ $product->id }}" class="form-control">
                    </div>
                    

                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.Status')</label>
                        <select name="status" class="form-control form-control-lg">
                            <option value="1">@lang('admin.Active')</option>
                            <option value="0">@lang('admin.Inactive')</option>
                        </select>
                    </div>
                  <br/>
                    <button type="submit" class="btn btn-success mt-1">@lang('admin.Create')</button>
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


