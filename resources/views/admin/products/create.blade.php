@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Product
@endsection


@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Product</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Product</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product.index') }}" class="btn btn-primary"><i
                                        class="fas fa-backspace"></i>&nbsp;Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                </div>

                        

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
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
                                        <div class="form-group">
                                            <label>Sub Category</label>
                                            <select name="sub_category" class="form-control form-control-lg sub-category">
                                                <option value="" selected disabled>Select</option>
                                            </select>
                                        </div>
                                    </div>   
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Child Category</label>
                                            <select name="child_category" class="form-control form-control-lg child-category">
                                                <option value="" selected disabled>Select</option>
                                            </select>
                                        </div>
                                    </div>   

                                </div> 
                                
                                
                                
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select name="brand" class="form-control form-control-lg">
                                        <option value="" selected disabled>Select</option>

                                            @foreach($brands as $id => $name)

                                                <option value="{{$id}}">{{$name}}</option>

                                            @endforeach
                                    </select>
                                </div>

                                

                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label>Prix par DA / mois jusqu'à 12 mois </label>
                                    <input type="text" name="price_12" value="{{ old('price_12') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Prix par DA / mois jusqu'à 24 mois </label>
                                    <input type="text" name="price_24" value="{{ old('price_24') }}" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label>Prix par DA / mois jusqu'à 36 mois </label>
                                    <input type="text" name="price_36" value="{{ old('price_36') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Prix par DA / mois jusqu'à 48 mois </label>
                                    <input type="text" name="price_48" value="{{ old('price_48') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Prix par DA / mois jusqu'à 60 mois </label>
                                    <input type="text" name="price_60" value="{{ old('price_60') }}" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label>Offer Price</label>
                                    <input type="text" name="offer_price" value="{{ old('offer_price') }}" class="form-control">
                                </div>

                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Offer Start Date</label>
                                        <input type="text" name="offer_start_date" value="{{ old('offer_start_date') }}" class="form-control datepicker">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label>Offer End Date</label>
                                        <input type="text" name="offer_end_date" value="{{ old('offer_end_date') }}" class="form-control datepicker">
                                    </div>
                                    
                                </div>

                                <div class="form-group mt-3">
                                    <label>Stock Quantity</label>
                                    <input type="number" min="0" name="qty" value="{{ old('qty') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Video Link</label>
                                    <input type="text"  name="video_link" value="{{ old('video_link') }}" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea  name="short_description" class="form-control">{{ old('short_description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Long Description</label>
                                    <textarea  name="long_description" class="form-control summernote">{{ old('long_description') }}</textarea>
                                </div>

                                
                                
                                <div class="form-group">
                                    <label>Product Type</label>
                                    <select name="type" class="form-control form-control-lg">
                                        <option value="" selected disabled>Select</option>
                                        <option value="تقسيط">تقسيط</option>
                                    
                                    </select>
                                </div>
                               
   
                                    
                                    
                                <div class="form-group">
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