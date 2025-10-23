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


      <div class="row" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <a href="{{ route('vendor.product.index') }}" class="btn btn-success mb-3"><i class="fas fa-arrow-left"></i>&nbsp;@lang('admin.Back')</a>

          <div class="mt-2 dashboard_content mt-md-0">
            <h3><i class="far fa-user"></i>@lang('admin.CreateProduct')</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">

                <form action="{{ route('vendor.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group wsus_input ">
                        <label>@lang('admin.Image')</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.Name')</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>

            

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group wsus_input mt-2">
                                <label>@lang('admin.Category')</label>
                                <select name="category" class="form-control form-control-lg main-category">
                                    <option value="" selected disabled>@lang('admin.Select')</option>

                                    @foreach($categories as $id => $name)

                                        <option value="{{$id}}">{{$name}}</option>

                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group wsus_input mt-2">
                                <label>@lang('admin.SubCategory')</label>
                                <select name="sub_category" class="form-control form-control-lg sub-category">
                                    <option value="" selected disabled>@lang('admin.Select')</option>
                                </select>
                            </div>
                        </div>   
                        
                        <div class="col-md-4">
                            <div class="form-group wsus_input mt-2">
                                <label>@lang('admin.ChildCategory')</label>
                                <select name="child_category" class="form-control form-control-lg child-category">
                                    <option value="" selected disabled>@lang('admin.Select')</option>
                                </select>
                            </div>
                        </div>   

                    </div> 
                    
                    
                    
                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.Brand')</label>
                        <select name="brand" class="form-control form-control-lg">
                            <option value="" selected disabled>@lang('admin.Select')</option>

                                @foreach($brands as $id => $name)

                                    <option value="{{$id}}">{{$name}}</option>

                                @endforeach
                        </select>
                    </div>


                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.Price')</label>
                        <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                    </div>

                   

            
                    
                    

                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.StockQuantity')</label>
                        <input type="number" min="0" name="qty" value="{{ old('qty') }}" class="form-control">
                    </div>

                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.VideoLink')</label>
                        <input type="text"  name="video_link" value="{{ old('video_link') }}" class="form-control">
                    </div>


                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.ShortDescription')</label>
                        <textarea  name="short_description" class="form-control">{{ old('short_description') }}</textarea>
                    </div>

                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.LongDescription')</label>
                        <textarea  name="long_description" class="form-control summernote">{{ old('long_description') }}</textarea>
                    </div>

                  
                    
                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.ProductType')</label>
                        <select name="type" class="form-control form-control-lg">
                            <option value="" selected disabled>@lang('admin.Select')</option>
                            <option value="تقسيط">تقسيط</option>
        
                        </select>
                    </div>
                   

                        
                    


               
                     
                        
                    <div class="form-group wsus_input mt-2">
                        <label>@lang('admin.Status')</label>
                        <select name="status" class="form-control form-control-lg">
                            <option value="1">@lang('admin.Active')</option>
                            <option value="0">@lang('admin.Inactive')</option>
                        </select>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-success mt-2">@lang('admin.Create')</button>
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
