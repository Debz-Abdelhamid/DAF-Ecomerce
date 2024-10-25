@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Sub Category
@endsection


@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Sub Category</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Sub Category</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.sub-category.index') }}" class="btn btn-primary"><i
                                        class="fas fa-backspace"></i>&nbsp;Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.sub-category.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category" class="form-control form-control-lg">
                                        <option value="" selected disabled>Select Category</option>
                                        @forelse($categories as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @empty
                                            <option value="No categories available" disabled >No categories available</option>
                                        @endforelse
                                        
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
