@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Child Category
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>@lang('admin.ChildCategory')</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>@lang('admin.CreateChildCategory')</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.child-category.index') }}" class="btn btn-success"><i
                                        class="fas fa-backspace"></i>&nbsp;@lang('admin.Back')</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.child-category.store') }}" method="POST">
                                @csrf

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <select name="category" class="form-control form-control-lg main-category">
                                            <option value="" selected disabled>@lang('admin.SelectCategory')</option>
                                        @forelse($categories as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @empty
                                            <option value="No categories available" disabled >@lang('admin.Nocategoriesavailable')</option>
                                        @endforelse
                                        
                                    </select>
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <label>@lang('admin.SubCategory')</label>
                                    <select name="sub_category" class="form-control form-control-lg sub-category">
                                        <option value="" selected disabled>@lang('admin.Select')</option>
                                       
                                        
                                    </select>
                                </div>

                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    <input type="text" name="name" placeholder="@lang('admin.Name')" value="{{ old('name') }}" class="form-control">
                                </div>


                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                  
                                    <select name="status" class="form-control form-control-lg">
                                        <option  selected disabled>@lang('admin.Status')</option>
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
                let id = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.get-subcategories') }}",
                    data: {
                        id: id,
                    },

                    success: function(data)
                    {

                        $('.sub-category').html('<option value="" selected disabled>Select</option>')

                        $.each(data, function(id, name){
                            
                            $('.sub-category').append(`<option value="${id}">${name}</option>`)
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