@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Product Variant Items
@endsection


@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Product Variant Items</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Variant Item</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product-variant-item.index', ['product_id' => $product->id ,'variant_id' => $variant->id ]) }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product-variant-item.store') }}" method="POST">
                                @csrf

                              
                                <div class="form-group">
                                    <input type="hidden" name="variant_id" value="{{ $variant->id }}" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text"  value="{{ $product->name }}" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Variant Name</label>
                                    <input type="text" name="variant_name" value="{{ $variant->name }}" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Item Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Price <code> (Set 0 for Make it Free)</code></label>
                                    <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label>Is Default</label>
                                    <select name="is_default" class="form-control form-control-lg">
                                        <option value="" selected disabled>Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
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
