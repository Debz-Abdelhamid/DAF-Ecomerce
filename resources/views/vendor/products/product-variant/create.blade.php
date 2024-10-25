@extends('vendor.layouts.master')


@section('title')
    {{$settings->site_name}} &mdash; Product Variant
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
            <a href="{{ route('vendor.product-variant.index', ['product' => request()->product ]) }}" class="btn btn-warning mb-3"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>

          <div class="mt-2 dashboard_content mt-md-0">
            <h3><i class="far fa-user"></i>Create Variant</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
               
                
                <form action="{{ route('vendor.product-variant.store') }}" method="POST">
                    @csrf

                  
                    <div class="form-group wsus_input">
                        <label>Product Name</label>
                        <input type="text" name="product_name" value="{{ $product->name }}" class="form-control" readonly>
                    </div>

                    <div class="form-group wsus_input">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>


                    <div class="form-group wsus_input">
                      
                        <input type="hidden" name="product" value="{{ $product->id }}" class="form-control">
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


