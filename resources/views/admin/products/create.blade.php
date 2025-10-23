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
                            <h4>@lang('admin.CreateProduct')</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product.index') }}" class="btn btn-success"><i
                                        class="fas fa-backspace"></i>&nbsp;@lang('admin.Back')</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input type="text" placeholder="@lang('admin.Name')" name="name" value="{{ old('name') }}" class="form-control">
                                </div>

                        

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                            <select name="category" class="form-control form-control-lg main-category">
                                                <option value="" selected disabled>@lang('admin.Select') @lang('admin.Category')</option>

                                                @foreach($categories as $id => $name)

                                                    <option value="{{$id}}">{{$name}}</option>

                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                            
                                            <select name="sub_category" class="form-control form-control-lg sub-category">
                                                <option value="" selected disabled>@lang('admin.Select') @lang('admin.SubCategory')</option>
                                            </select>
                                        </div>
                                    </div>   
                                    
                                    <div class="col-md-4">
                                        <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                            
                                            <select name="child_category" class="form-control form-control-lg child-category">
                                                <option value="" selected disabled>@lang('admin.Select') @lang('admin.ChildCategory')</option>
                                            </select>
                                        </div>
                                    </div>   

                                </div> 
                                
                                
                                
                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <select name="brand" class="form-control form-control-lg">
                                        <option value="" selected disabled>@lang('admin.Select') @lang('admin.Brand')</option>

                                            @foreach($brands as $id => $name)

                                                <option value="{{$id}}">{{$name}}</option>

                                            @endforeach
                                    </select>
                                </div>

                                

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <input type="text" placeholder="@lang('admin.Price')" name="price" value="{{ old('price') }}" class="form-control">
                                </div>
                                         

                                <div class="form-group mt-3"  dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input placeholder="@lang('admin.StockQuantity')" type="number" min="0" name="qty" value="{{ old('qty') }}" class="form-control">
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <input type="text" placeholder="@lang('admin.VideoLink')"  name="video_link" value="{{ old('video_link') }}" class="form-control">
                                </div>


                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <textarea  name="short_description" placeholder="@lang('admin.ShortDescription')" class="form-control">{{ old('short_description') }}</textarea>
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <textarea placeholder="@lang('admin.LongDescription')" name="long_description" class="form-control summernote">{{ old('long_description') }}</textarea>
                                </div>

                                
                                
                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <select name="type" class="form-control form-control-lg">
                                        <option value="" selected disabled>@lang('admin.Select') @lang('admin.ProductType')</option>
                                        <option value="تقسيط">تقسيط</option>
                                    
                                    </select>
                                </div>
                               
   
                                    
                                    
                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                   
                                    <select name="status" class="form-control form-control-lg">
                                    <option value="" selected disabled>@lang('admin.Select') @lang('admin.Status')</option>    
                                    <option value="1">@lang('admin.Active')</option>
                                        <option value="0">@lang('admin.Inactive')</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success">@lang('admin.Create')</button>
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