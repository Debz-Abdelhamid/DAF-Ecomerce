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
                            <h4>Create Variant</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product-variant.index', ['product' => request()->product ]) }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product-variant.store') }}" method="POST">
                                @csrf

                              
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="product_name" value="{{ $product->name }}" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                </div>


                                <div class="form-group">
                                  
                                    <input type="hidden" name="product" value="{{ $product->id }}" class="form-control">
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
