@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Child Category
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Child Category</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Child Category</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.child-category.index') }}" class="btn btn-primary"><i
                                        class="fas fa-backspace"></i>&nbsp;Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.child-category.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category" class="form-control form-control-lg main-category">
                                            <option value="" selected disabled>Select Category</option>
                                        @forelse($categories as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @empty
                                            <option value="No categories available" disabled >No categories available</option>
                                        @endforelse
                                        
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Sub Category</label>
                                    <select name="sub_category" class="form-control form-control-lg sub-category">
                                        <option value="" selected disabled>Select</option>
                                       
                                        
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
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