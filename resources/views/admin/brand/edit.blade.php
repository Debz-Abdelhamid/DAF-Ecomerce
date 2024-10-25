@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Brand
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Brand</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Brand</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.brand.index') }}" class="btn btn-primary"><i
                                        class="fas fa-backspace"></i>&nbsp;Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.brand.update', $brand) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <div>
                                        <label>Preview</label>
                                    </div>
                                    <img src="{{ asset('storage/' . $brand->logo) }}" class="img-fluid" alt="not found"
                                        style="max-width: 100%; height: auto; max-height: 200px;">
                                </div>

                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" name="logo" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name', $brand->name) }}" class="form-control">
                                </div>

                                

                                <div class="form-group">
                                    <label>Is Featured</label>
                                    <select name="is_featured" class="form-control form-control-lg">
                                        <option value="" selected disabled>Select</option>
                                        <option {{ $brand->is_featured ? 'selected' : '' }} value="1">Yes</option>
                                        <option {{ $brand->is_featured == 0 ? 'selected' : '' }} value="0">No</option>
                                    </select>
                                </div>

                                
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control form-control-lg">
                                        <option {{ $brand->status ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $brand->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
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
