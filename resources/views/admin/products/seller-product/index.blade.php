@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Vendors Products 
@endsection


@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>@lang('admin.Product')</h1>

        </div>

        <div class="section-body" style="box-sizing: border-box;">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>@lang('admin.AllSellersProducts')</h4>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('admin.Vendor')</th>
                                        <th>@lang('admin.Image')</th>
                                        <th>@lang('admin.ProductName')</th>
                                        <th>@lang('admin.Price')</th>
                                        <th>@lang('admin.ProductType')</th>           
                                        <th>@lang('admin.Brand')</th>
                                        <th>@lang('admin.Category')</th>
                                        <th>@lang('admin.SubCategory')</th>
                                        <th>@lang('admin.ChildCategory')</th>
                                        <th>@lang('admin.Status')</th>
                                        <th>@lang('admin.Approve')</th>
                                        <th>@lang('admin.Action')</th>
                                    </tr>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse($products as $product)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $product->user->name }}</td>
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
                                                        @lang('admin.None')
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
                                                    
                                                        <label class="mt-2 custom-switch">
                                                            <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $product->id }}" checked class="custom-switch-input change-status">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    @else

                                                    <label class="mt-2 custom-switch">
                                                        <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $product->id }}" class="custom-switch-input change-status">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>

                                                @endif
                                            </td>

                                            <td>
                                                <select class="form-control is_approve" data-id="{{ $product->id }}">
                                                        
                                                        <option value="0">@lang('admin.Pending') </option>
                                                    <option selected value="1"> @lang('admin.Approved')</option>
                                                    

                                                </select>   
                                            </td> 
                                            
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.product.edit', $product) }}"
                                                        class="btn btn-success"><i class="far fa-edit"></i></a>




                                                    <a href="{{ route('admin.product.destroy', $product->id) }}"
                                                        data-id="{{ $product->id }}"
                                                        class="ml-2 btn btn-danger delete-item"><i
                                                            class="far fa-trash-alt"></i></a>

                                                    <div class="ml-2 dropdown dropleft d-inline">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-cog"></i>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                          <a class="dropdown-item has-icon" href="{{ route('admin.product-image-gallery.index', ['product' => $product->id ]) }}"><i class="far fa-heart"></i>@lang('admin.ImageGallery') </a>
                                                          <a class="dropdown-item has-icon" href="{{ route('admin.product-variant.index', ['product' => $product->id]) }}"><i class="far fa-file"></i>@lang('admin.ProductVariants')</a>
                                                         
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
                                            <td colspan="13" class="text-center">@lang('admin.Noproductsavailable')</td>
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
                        notyf.error("@lang('admin.error_cant_update')");                           
                    },

                });

            });


            // Chnage Approved Status

            $('body').on('change', '.is_approve',function(){

                let value = $(this).val();
                let id = $(this).data('id');

                $.ajax({
                    method: 'PUT',
                    url:"{{ route('admin.change-approve-status') }}",
                    data: {
                        value: value,
                        id: id,
                        
                    },

                    success: function(data)
                    {
                        notyf.success(data.message);
                        window.location.href = "{{ route('admin.seller-products.index') }}";                               
                    },

                    error: function(xhr,status,error)
                    {
                        notyf.error("@lang('admin.error_cant_update')");                           
                    },

                });


            });
        });

    </script>

@endpush