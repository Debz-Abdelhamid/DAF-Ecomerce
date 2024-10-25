@extends('vendor.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Product 
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
          <a href="{{ route('vendor.product.index') }}" class="mb-3 btn btn-warning"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>

          <div class="mt-2 dashboard_content mt-md-0">
            <h3><i class="far fa-user"></i>Update Product</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">

                <form action="{{ route('vendor.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group wsus_input">
                        <div>
                            <label>Preview</label>
                        </div>
                        <img src="{{ asset('storage/' . $product->thumb_image) }}" class="img-fluid" alt=""
                            style="max-width: 100%; height: auto; max-height: 200px;">
                    </div>

                    <div class="form-group wsus_input">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group wsus_input">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control">
                    </div>



                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group wsus_input">
                                <label>Category</label>
                                <select name="category" class="form-control form-control-lg main-category">
                                    <option value="" selected disabled>Select</option>

                                    @foreach($categories as $id => $name)

                                        <option {{ $product->category_id == $id ? 'selected' : '' }} value="{{$id}}">{{$name}}</option>

                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group wsus_input">
                                <label>Sub Category</label>
                                <select name="sub_category" class="form-control form-control-lg sub-category">
                                    <option value="" selected disabled>Select</option>

                                    @foreach($subcategories as $subcategory)
                                        <option {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }} value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group wsus_input">
                                <label>Child Category</label>
                                <select name="child_category" class="form-control form-control-lg child-category">
                                    <option value="" selected disabled>Select</option>

                                    @foreach($childcategories as $childcategory)
                                    <option {{ $childcategory->id == $product->childcategory_id ? 'selected' : '' }} value="{{$childcategory->id}}">{{$childcategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>



                    <div class="form-group wsus_input">
                        <label>Brand</label>
                        <select name="brand" class="form-control form-control-lg">
                            <option value="" selected disabled>Select</option>

                                @foreach($brands as $id => $name)

                                    <option {{ $id == $product->brand_id ? 'selected' : '' }} value="{{$id}}">{{$name}}</option>

                                @endforeach
                        </select>
                    </div>


                    <div class="form-group wsus_input">
                        <label>Price</label>
                        <input type="text" name="price" value="{{ old('price', $product->price) }}" class="form-control">
                    </div>


                    <div class="form-group wsus_input">
                        <label>Prix par DA / mois jusqu'à 12 mois</label>
                        <input type="text" name="price_12" value="{{ old('price_12', $product->price_12) }}" class="form-control">
                    </div>

                    <div class="form-group wsus_input">
                        <label>Prix par DA / mois jusqu'à 24 mois</label>
                        <input type="text" name="price_24" value="{{ old('price_24', $product->price_24) }}" class="form-control">
                    </div>

                    <div class="form-group wsus_input">
                        <label>Prix par DA / mois jusqu'à 36 mois</label>
                        <input type="text" name="price_36" value="{{ old('price_36', $product->price_36) }}" class="form-control">
                    </div>

                    
                    <div class="form-group wsus_input">
                        <label>Prix par DA / mois jusqu'à 48 mois</label>
                        <input type="text" name="price_48" value="{{ old('price_48', $product->price_48) }}" class="form-control">
                    </div>

                    <div class="form-group wsus_input">
                        <label>Prix par DA / mois jusqu'à 60 mois</label>
                        <input type="text" name="price_60" value="{{ old('price_60', $product->price_60) }}" class="form-control">
                    </div>

                    <div class="form-group wsus_input">
                        <label>Offer Price</label>
                        <input type="text" name="offer_price" value="{{ old('offer_price', $product->offer_price) }}" class="form-control">
                    </div>

                    
                    <div class="row">

                        <div class="row">
                            <div class="col-md-6">
                                <label>Offer Start Date</label>
                                <input type="text" name="offer_start_date" value="{{ old('offer_start_date', $product->offer_start_date ? $product->offer_start_date->format('Y-m-d') : '') }}" class="form-control datepicker">
                            </div>

                            <div class="col-md-6">
                                <label>Offer End Date</label>
                                <input type="text" name="offer_end_date" value="{{ old('offer_end_date', $product->offer_end_date ? $product->offer_end_date->format('Y-m-d') : '') }}" class="form-control datepicker">
                            </div>

                        </div>

                    </div>


        
                    <div class="mt-3 form-group wsus_input">
                        <label>Stock Quantity</label>
                        <input type="number" min="0" name="qty" value="{{ old('qty', $product->qty) }}" class="form-control">
                    </div>

                    <div class="form-group wsus_input">
                        <label>Video Link</label>
                        <input type="text"  name="video_link" value="{{ old('video_link', $product->video_link) }}" class="form-control">
                    </div>


                    <div class="form-group wsus_input">
                        <label>Short Description</label>
                        <textarea  name="short_description" class="form-control">{!! $product->short_description !!}</textarea>
                    </div>

                    <div class="form-group wsus_input">
                        <label>Long Description</label>
                        <textarea  name="long_description" class="form-control summernote">{!! $product->long_description !!}</textarea>
                    </div>



                    <div class="form-group wsus_input">
                        <label>Product Type</label>
                        <select name="type" class="form-control form-control-lg">
                            <option  value="" selected disabled>Select</option>
                            <option {{ $product->type == 'تقسيط' ? 'selected' : '' }} value="تقسيط">تقسيط</option>
                           
                        </select>
                    </div>


                    <div class="form-group wsus_input">
                        <label>Status</label>
                        <select name="status" class="form-control form-control-lg">
                            <option {{ $product->status ? 'selected' : '' }} value="1">Active</option>
                            <option {{ $product->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
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

@push('scripts')

    <script>

        $(document).ready(function(){

            $('body').on('change', '.main-category', function(e){
                $('.child-category').html('<option value="" selected disabled>Select</option>')
                let id = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: "{{ route('vendor.product.get-subcategories') }}",
                    data: {
                        id: id,
                    },

                    success: function(data)
                    {

                        $('.sub-category').html('<option value="" selected disabled>Select</option>')

                        $.each(data, function(id, name){
                            console.log(id, name);
                            $('.sub-category').append(`<option value="${id}">${name}</option>`)
                        });
                    },

                    error: function(xhr,status,error)
                    {
                        console.log(error);

                    }

                });

            });




                //Load Child Categories



            $('body').on('change', '.sub-category', function(e){
                let id = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: "{{ route('vendor.product.get-childcategories') }}",
                    data: {
                        id: id,
                    },

                    success: function(data)
                    {

                        $('.child-category').html('<option value="" selected disabled>Select</option>')

                        $.each(data, function(id, name){
                            console.log(id, name);
                            $('.child-category').append(`<option value="${id}">${name}</option>`)
                        });
                    },

                    error: function(xhr,status,error)
                    {
                        console.log(error);

                    }

                });

            });
        });

    </script>

@endpush