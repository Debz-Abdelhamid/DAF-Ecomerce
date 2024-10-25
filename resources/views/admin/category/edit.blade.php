@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Category
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Category</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Category</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.category.index') }}" class="btn btn-primary"><i
                                        class="fas fa-backspace"></i>&nbsp;Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.category.update', $category) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Icon</label>
                                    <div>
                                        <button class="btn btn-primary" data-selected-class="btn-danger"
                                        data-unselected-class="btn-info" role="iconpicker" name="icon" data-icon="{{ $category->icon }}"></button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control form-control-lg">
                                        <option {{ $category->status ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $category->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>    
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
