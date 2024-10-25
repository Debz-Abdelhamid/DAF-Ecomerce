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
        

          <div class="mt-2 dashboard_content mt-md-0">
            <h3><i class="far fa-user"></i>Update Variant Item</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
               
                
                <form action="{{ route('vendor.product-variant-item.update', $variantItem->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    

                    <div class="form-group wsus_input">
                        <label>Variant Name</label>
                        <input type="text" name="name" value="{{ $variantItem->productvariant->name }}" class="form-control" readonly>
                    </div>

                    <div class="form-group wsus_input">
                        <label>Item Name</label>
                        <input type="text" name="name" value="{{ old('name', $variantItem->name) }}" class="form-control">
                    </div>

                    <div class="form-group wsus_input">
                        <label>Price <code> (Set 0 for Make it Free)</code></label>
                        <input type="text" name="price" value="{{ old('price', $variantItem->price) }}" class="form-control">
                    </div>


                    <div class="form-group wsus_input">
                        <label>Is Default</label>
                        <select name="is_default" class="form-control form-control-lg">
                            <option value="" selected disabled>Select</option>

                            <option {{ $variantItem->is_default ? 'selected' : '' }} value="1">Yes</option>
                            <option {{ $variantItem->is_default == 0 ? 'selected' : '' }} value="0">No</option>
                        </select>
                    </div>

                    <div class="form-group wsus_input">
                        <label>Status</label>
                        <select name="status" class="form-control form-control-lg">
                            <option {{ $variantItem->status ? 'selected' : '' }} value="1">Active</option>
                            <option {{ $variantItem->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
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


