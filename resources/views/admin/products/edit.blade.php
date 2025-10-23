@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Product
@endsection


@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>@lang('admin.Product')</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>@lang('admin.UpdateProduct') </h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product.index') }}" class="btn btn-success"><i class="fas fa-arrow-left"></i>&nbsp;@lang('admin.Back')</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product.update', $product) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group d-flex justify-content-center">
                                    
                                    <img src="{{ asset('storage/' . $product->thumb_image) }}" class="img-fluid" alt=""
                                        style="max-width: 100%; height: auto; max-height: 200px;">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <input type="text" placeholder="@lang('admin.Name')" name="name" value="{{ old('name', $product->name) }}" class="form-control">
                                </div>

                        

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                            
                                            <select name="category" class="form-control form-control-lg main-category">
                                                <option value="" selected disabled>@lang('admin.Select') @lang('admin.Category')</option>

                                                @foreach($categories as $id => $name)

                                                    <option {{ $product->category_id == $id ? 'selected' : '' }} value="{{$id}}">{{$name}}</option>

                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                            
                                            <select name="sub_category" class="form-control form-control-lg sub-category">
                                                <option value="" selected disabled>@lang('admin.Select') @lang('admin.SubCategory')</option>

                                                @foreach($subcategories as $subcategory)
                                                    <option {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }} value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>   
                                    
                                    <div class="col-md-4">
                                        <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                            
                                            <select name="child_category" class="form-control form-control-lg child-category">
                                                <option value="" selected disabled>@lang('admin.Select') @lang('admin.ChildCategory')</option>

                                                @foreach($childcategories as $childcategory)
                                                <option {{ $childcategory->id == $product->childcategory_id ? 'selected' : '' }} value="{{$childcategory->id}}">{{$childcategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>   

                                </div> 
                                
                                
                                
                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <select name="brand" class="form-control form-control-lg">
                                        <option value="" selected disabled>@lang('admin.Select') @lang('admin.Brand')</option>

                                            @foreach($brands as $id => $name)

                                                <option {{ $id == $product->brand_id ? 'selected' : '' }} value="{{$id}}">{{$name}}</option>

                                            @endforeach
                                    </select>
                                </div>

                         

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <input type="text" placeholder="@lang('admin.Price')" name="price" value="{{ old('price', $product->price) }}" class="form-control">
                                </div>
                                

                                <div class="form-group mt-3" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input type="number" placeholder="@lang('admin.StockQuantity')" min="0" name="qty" value="{{ old('qty', $product->qty) }}" class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <label></label>
                                    <input type="text" placeholder="@lang('admin.VideoLink')"  name="video_link" value="{{ old('video_link', $product->video_link) }}" class="form-control">
                                </div>


                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <textarea placeholder="@lang('admin.ShortDescription')"  name="short_description" class="form-control">{!! $product->short_description !!}</textarea>
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <textarea placeholder="@lang('admin.LongDescription')" name="long_description" class="form-control summernote">{!! $product->long_description !!}</textarea>
                                </div>

                                
                                
                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <select name="type" class="form-control form-control-lg">
                                        <option  value="" selected disabled>@lang('admin.Select') @lang('admin.ProductType')</option>
                                        <option {{ $product->type == 'تقسيط' ? 'selected' : '' }} value="تقسيط">تقسيط</option>
                                       
                                    </select>
                                </div>
                               
   
                                    
                        
                                    
                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <select name="status" class="form-control form-control-lg">
                                    <option value="" selected disabled>@lang('admin.Select') @lang('admin.Status')</option>    
                                    <option {{ $product->status ? 'selected' : '' }} value="1">@lang('admin.Active')</option>
                                        <option {{ $product->status == 0 ? 'selected' : '' }} value="0">@lang('admin.Inactive')</option>
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

@push('scripts')

    <script>    

        $(document).ready(function(){

            $('body').on('change', '.main-category', function(e){
                $('.child-category').html('<option value="" selected disabled>Select</option>')
                let id = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.product.get-subcategories') }}",
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
                    url: "{{ route('admin.product.get-childcategories') }}",
                    data: {
                        id: id,
                    },

                    success: function(data)
                    {

                        $('.child-category').html('<option value="" selected disabled>Select</option>')

                        $.each(data, function(id, name){
                            
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