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
          <a href="{{ route('vendor.product.index') }}" class="btn btn-warning mb-3"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>

          <div class="mt-2 dashboard_content mt-md-0">
            <h3><i class="far fa-user"></i>Create Product</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">

                <form action="{{ route('vendor.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group wsus_input">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group wsus_input">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>

            

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group wsus_input">
                                <label>Category</label>
                                <select name="category" class="form-control form-control-lg main-category">
                                    <option value="" selected disabled>Select</option>

                                    @foreach($categories as $id => $name)

                                        <option value="{{$id}}">{{$name}}</option>

                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group wsus_input">
                                <label>Sub Category</label>
                                <select name="sub_category" class="form-control form-control-lg sub-category">
                                    <option value="" selected disabled>Select</option>
                                </select>
                            </div>
                        </div>   
                        
                        <div class="col-md-4">
                            <div class="form-group wsus_input">
                                <label>Child Category</label>
                                <select name="child_category" class="form-control form-control-lg child-category">
                                    <option value="" selected disabled>Select</option>
                                </select>
                            </div>
                        </div>   

                    </div> 
                    
                    
                    
                    <div class="form-group wsus_input">
                        <label>Brand</label>
                        <select name="brand" class="form-control form-control-lg">
                            <option value="" selected disabled>Select</option>

                                @foreach($brands as $id => $name)

                                    <option value="{{$id}}">{{$name}}</option>

                                @endforeach
                        </select>
                    </div>


                    <div class="form-group wsus_input">
                        <label>Price</label>
                        <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                    </div>

                    <div class="form-group wsus_input">
                        <label>Prix par DA / mois jusqu'à 12 mois</label>
                        <input type="text" name="price_12" value="{{ old('price_12') }}" class="form-control">
                    </div>

                    <div class="form-group wsus_input">
                        <label>Prix par DA / mois jusqu'à 24 mois</label>
                        <input type="text" name="price_24" value="{{ old('price_24') }}" class="form-control">
                    </div>

                    <div class="form-group wsus_input">
                        <label>Prix par DA / mois jusqu'à 36 mois</label>
                        <input type="text" name="price_36" value="{{ old('price_36') }}" class="form-control">
                    </div>

                    <div class="form-group wsus_input">
                        <label>Prix par DA / mois jusqu'à 48 mois</label>
                        <input type="text" name="price_48" value="{{ old('price_48') }}" class="form-control">
                    </div>

                    <div class="form-group wsus_input">
                        <label>Prix par DA / mois jusqu'à 60 mois</label>
                        <input type="text" name="price_60" value="{{ old('price_60') }}" class="form-control">
                    </div>


                    <div class="form-group wsus_input">
                        
                        <label>Offer Price</label>
                        <input type="text" name="offer_price" value="{{ old('offer_price') }}" class="form-control">
                    </div>

                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group wsus_input">
                                <label>Offer Start Date</label>
                                <input type="text" name="offer_start_date" value="{{ old('offer_start_date') }}" class="form-control datepicker">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group wsus_input">
                                <label>Offer End Date</label>
                                <input type="text" name="offer_end_date" value="{{ old('offer_end_date') }}" class="form-control datepicker">
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-group wsus_input">
                        <label>Stock Quantity</label>
                        <input type="number" min="0" name="qty" value="{{ old('qty') }}" class="form-control">
                    </div>

                    <div class="form-group wsus_input">
                        <label>Video Link</label>
                        <input type="text"  name="video_link" value="{{ old('video_link') }}" class="form-control">
                    </div>


                    <div class="form-group wsus_input">
                        <label>Short Description</label>
                        <textarea  name="short_description" class="form-control">{{ old('short_description') }}</textarea>
                    </div>

                    <div class="form-group wsus_input">
                        <label>Long Description</label>
                        <textarea  name="long_description" class="form-control summernote">{{ old('long_description') }}</textarea>
                    </div>

                  
                    
                    <div class="form-group wsus_input">
                        <label>Product Type</label>
                        <select name="type" class="form-control form-control-lg">
                            <option value="" selected disabled>Select</option>
                            <option value="تقسيط">تقسيط</option>
        
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
