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
      

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
            <a href="{{ route('vendor.product-variant-item.index', ['product_id' => $product->id ,'variant_id' => $variant->id ]) }}" class="btn btn-warning mb-3"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>

          <div class="mt-2 dashboard_content mt-md-0">
            <h3><i class="far fa-user"></i>Create Variant Item</h3>
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

                    <div class="form-group wsus_input">
                        <label>Product Name</label>
                        <input type="text"  value="{{ $product->name }}" class="form-control" readonly>
                    </div>

                    <div class="form-group wsus_input">
                        <label>Variant Name</label>
                        <input type="text" name="variant_name" value="{{ $variant->name }}" class="form-control" readonly>
                    </div>

                    <div class="form-group wsus_input">
                        <label>Item Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>

                    <div class="form-group wsus_input">
                        <label>Price <code> (Set 0 for Make it Free)</code></label>
                        <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                    </div>


                    <div class="form-group wsus_input">
                        <label>Is Default</label>
                        <select name="is_default" class="form-control form-control-lg">
                            <option value="" selected disabled>Select</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="form-group wsus_input">
                        <label>Status</label>
                        <select name="status" class="form-control form-control-lg">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Create</button>
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


