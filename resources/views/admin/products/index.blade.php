@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Product
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Product</h1>

        </div>

        <div class="section-body" style="box-sizing: border-box;">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Products</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i>&nbsp;&nbsp;Create New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Product Type</th>           
                                        <th>Brand</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Child Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse($products as $product)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td style="width: 150px; height: 100px; overflow: hidden;">
                                                <img src="{{ asset('storage/' . $product->thumb_image) }}" class="img-fluid"
                                                    style="max-width: 100%; max-height: 100%; object-fit: cover;">
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            
                                            
                                            <td>{{ $product->price }}</td>
                                            <td>
                                                
                                                @switch($product->type)

                                                    @case('تقسيط')
                                                    <div class="badge badge-success">
                                                        تقسيط
                                                    </div>
                                                        @break
                                                        
                             

                                                    @default
                                                    <div class="badge badge-dark">
                                                        None
                                                    </div>
                                                        @break

                                                            
                                                @endswitch

                                            </td>
                                            
                                            <td><i class="badge badge-warning">{{ $product->brand->name }}</i></td>
                                            <td><i class="badge badge-dark">{{ $product->category->name }}</i></td>
                                            <td><i class="badge badge-dark">{{ $product->subcategory ? $product->subcategory->name : 'None' }}</i></td>
                                            <td><i class="badge badge-dark">{{ $product->childcategory ? $product->childcategory->name : 'None' }}</i></td>
                                            <td>
                                                @if($product->status == 1)
                                                    
                                                        <label class="custom-switch mt-2">
                                                            <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $product->id }}" checked class="custom-switch-input change-status">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    @else

                                                    <label class="custom-switch mt-2">
                                                        <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $product->id }}" class="custom-switch-input change-status">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>

                                                    @endif
                                            </td>
                                            
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.product.edit', $product) }}"
                                                        class="btn btn-primary"><i class="far fa-edit"></i></a>




                                                    <a href="{{ route('admin.product.destroy', $product->id) }}"
                                                        data-id="{{ $product->id }}"
                                                        class="btn btn-danger ml-2 delete-item"><i
                                                            class="far fa-trash-alt"></i></a>

                                                    <div class="dropdown dropleft d-inline ml-2">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-cog"></i>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                          <a class="dropdown-item has-icon" href="{{ route('admin.product-image-gallery.index', ['product' => $product->id ]) }}"><i class="far fa-heart"></i> Image Gallery</a>
                                                          <a class="dropdown-item has-icon" href="{{ route('admin.product-variant.index', ['product' => $product->id]) }}"><i class="far fa-file"></i>Product Variants</a>
                                                         
                                                        </div>
                                                    </div>

                                                </div>

                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center">No products available. <a
                                                    href="{{ route('admin.product.create') }}"
                                                    class="btn btn-primary ml-2">Create Product</a></td>
                                        </tr>
                                    @endforelse
                                </table>
                                {{ $products->links() }}
                            </div>
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
            $('body').on('click', '.change-status',function(){
                let isChecked = $(this).is(':checked');
                let dataId = $(this).data('id');
                
                $.ajax({
                    method: 'PUT',
                    url:"{{ route('admin.product.change-status') }}",
                    data: {
                        status: isChecked,
                        id: dataId,
                    },

                    success: function(data)
                    {
                        notyf.success(data.message);                                
                    },

                    error: function(xhr,status,error)
                    {
                        notyf.error("Error Can't Update !");                           
                    },

                });

            });
        });

    </script>

@endpush