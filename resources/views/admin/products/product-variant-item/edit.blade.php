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
                            <h4>Update Variant Item</h4>
                            
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product-variant-item.update', $variantItem->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                

                                <div class="form-group">
                                    <label>Variant Name</label>
                                    <input type="text" name="name" value="{{ $variantItem->productvariant->name }}" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Item Name</label>
                                    <input type="text" name="name" value="{{ old('name', $variantItem->name) }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Price <code> (Set 0 for Make it Free)</code></label>
                                    <input type="text" name="price" value="{{ old('price', $variantItem->price) }}" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label>Is Default</label>
                                    <select name="is_default" class="form-control form-control-lg">
                                        <option value="" selected disabled>Select</option>

                                        <option {{ $variantItem->is_default ? 'selected' : '' }} value="1">Yes</option>
                                        <option {{ $variantItem->is_default == 0 ? 'selected' : '' }} value="0">No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control form-control-lg">
                                        <option {{ $variantItem->status ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $variantItem->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
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
