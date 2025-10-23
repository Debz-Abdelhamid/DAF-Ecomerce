@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Product Variant Items
@endsection


@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>@lang('admin.ProductVariantItems')</h1>

        </div>

        <div class="mb-3">
            <a href="{{ route('admin.product-variant.index', ['product' => $product->id]) }}" class="btn btn-success"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
        </div>    
        
        <div class="section-body" style="box-sizing: border-box;">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>@lang('admin.Product')  : <span class="text-primary"> {{ ucfirst($product->name) }} </span></h4>
                            <h4>@lang('admin.Variant')  : <span class="text-primary"> {{ ucfirst($variant->name) }} </span></h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product-variant-item.create', ['product_id' => $product->id ,'variant_id' => $variant->id ]) }}" class="btn btn-success"><i
                                        class="fas fa-plus"></i>&nbsp;&nbsp;@lang('admin.CreateNew')</a>
                            </div>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('admin.VariantItemName')</th>
                                        <th>@lang('admin.VariantName')</th>
                                        <th>@lang('admin.VariantItemPrice')</th>
                                        <th>@lang('admin.IsDefault')</th>
                                        <th>@lang('admin.Status')</th>
                                        <th>@lang('admin.Action')</th>
                                    </tr>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse($variantitems as $variantItem)
                                        <tr>
                                            <td>{{ $i }}</td>                                    
                                            <td>{{ $variantItem->name }}</td>
                                            <td>{{ $variantItem->productvariant->name }}</td>
                                            <td>{{ $variantItem->price }}</td>
                                            <td>
                                                @if($variantItem->is_default)
                                                    <i class="badge badge-success">@lang('admin.Default')</i>
                                                @else
                                                    <i class="badge badge-danger">@lang('admin.non')</i>

                                                @endif

                                            </td>
                                            
                                            
                                        
                                            <td>
                                                @if($variantItem->status == 1)
                                                    
                                                        <label class="custom-switch mt-2">
                                                            <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $variantItem->id }}" checked class="custom-switch-input change-status">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    @else

                                                    <label class="custom-switch mt-2">
                                                        <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $variantItem->id }}" class="custom-switch-input change-status">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>

                                                    @endif
                                            </td>
                                            <td>
                                                <div class="d-flex">

        


                                                    <a href="{{ route('admin.product-variant-item.edit', $variantItem->id ) }}"
                                                        class="btn btn-success ml-2"><i class="far fa-edit"></i></a>




                                                    <a href="{{ route('admin.product-variant-item.destroy', $variantItem->id) }}"
                                                        data-id="{{ $variantItem->id }}"
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
                                            <td colspan="7" class="text-center">@lang('admin.Novariantavailable') <a
                                                    href="{{route('admin.product-variant-item.create', ['product_id' => $product->id ,'variant_id' => $variant->id ])}}"
                                                    class="btn btn-success ml-2">@lang('admin.CreateVariantItem')</a></td>
                                        </tr>
                                    @endforelse
                                </table>
                                {{ $variantitems->links() }}
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
                    url:"{{ route('admin.product-variant-item.change-status') }}",
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
        });

    </script>

@endpush