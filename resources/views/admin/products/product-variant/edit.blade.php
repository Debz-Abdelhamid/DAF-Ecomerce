@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Product Variant
@endsection


@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Product Variant</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4> Update Variant</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product-variant.index', ['product' => request()->product ]) }}" class="btn btn-primary"><i
                                        class="fas fa-backspace"></i>&nbsp;Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product-variant.update', $variant->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name', $variant->name) }}" class="form-control">
                                </div>



                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control form-control-lg">
                                        <option {{ $variant->status ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $variant->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
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
