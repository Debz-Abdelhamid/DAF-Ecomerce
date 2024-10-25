@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Image Gallery
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Product Image Gallery</h1>

        </div>
        <div class="mb-3">
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
        </div>
        <div class="section-body" style="box-sizing: border-box;">



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4> Product : <span class="text-primary"> {{ ucfirst($productItem->name)}} </span></h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product-image-gallery.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Image <code> (Multiple Image Supported!)</code></label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                </div>

                                <input type="hidden" name="product" value="{{$productItem->id}}" data-id="{{$productItem->id}}" class="produit">

                                <button type="submit" class='btn btn-primary'>Save</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Images</h4>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Product Image</th>
                                        <th>Action</th>
                                    </tr>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse($ImageGallery as $image)
                                        <tr>
                                            <td style="width: 50px;">{{ $i }}</td>
                                            <td style="width: 150px; height: 150px; overflow: hidden;">
                                                <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid"
                                                    style="max-width: 100%; max-height: 100%; object-fit: cover;">
                                            </td>

                                            <td style="width: 50px;">
                                                <div class="d-flex">

                                                    <a href="{{ route('admin.product-image-gallery.destroy', $image->id) }}"
                                                        data-id="{{ $image->id }}"
                                                        class="btn btn-danger ml-2 delete-item"><i
                                                            class="far fa-trash-alt"></i></a>

                                                </div>

                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No Images available. </td>
                                        </tr>
                                    @endforelse
                                </table>
                                {{ $ImageGallery->appends(['product' => $productItem->id])->links() }}

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
