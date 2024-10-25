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

        <div class="mb-3">
            <a href="{{ route('admin.product-variant.index', ['product' => $product->id]) }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
        </div>    
        
        <div class="section-body" style="box-sizing: border-box;">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4> Product : <span class="text-primary"> {{ ucfirst($product->name) }} </span></h4>
                            <h4> Variant : <span class="text-primary"> {{ ucfirst($variant->name) }} </span></h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product-variant-item.create', ['product_id' => $product->id ,'variant_id' => $variant->id ]) }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i>&nbsp;&nbsp;Create New</a>
                            </div>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Variant Item Name</th>
                                        <th>Variant Name</th>
                                        <th>Variant Item Price</th>
                                        <th>Is Default</th>
                                        <th>Status</th>
                                        <th>Action</th>
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
                                                    <i class="badge badge-success">Default</i>
                                                @else
                                                    <i class="badge badge-danger">No</i>

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
                                                        class="btn btn-primary ml-2"><i class="far fa-edit"></i></a>




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
                                            <td colspan="7" class="text-center">No variant available. <a
                                                    href="{{route('admin.product-variant-item.create', ['product_id' => $product->id ,'variant_id' => $variant->id ])}}"
                                                    class="btn btn-primary ml-2">Create Variant Item</a></td>
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
                        notyf.error("Error Can't Update !");                           
                    },

                });

            });
        });

    </script>

@endpush