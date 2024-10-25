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

        <div class="mb-3">
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary"><i
                class="fas fa-backspace"></i>&nbsp;Back</a>
        </div>    
        <div class="section-body" style="box-sizing: border-box;">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4> Product : <span class="text-primary"> {{ ucfirst($productItem->name)}} </span></h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product-variant.create', ['product' => $productItem->id]) }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i>&nbsp;&nbsp;Create New</a>
                            </div>
                            <input type="hidden" class="produit-item" data-product="{{ $productItem->id }}" >
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Variant Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse($ProductVariant as $variant)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            
                                    
                                            <td>{{ $variant->name }}</td>
                                            
                                            
                                        
                                            <td>
                                                @if($variant->status == 1)
                                                    
                                                        <label class="custom-switch mt-2">
                                                            <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $variant->id }}" checked class="custom-switch-input change-status">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    @else

                                                    <label class="custom-switch mt-2">
                                                        <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $variant->id }}" class="custom-switch-input change-status">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>

                                                    @endif
                                            </td>
                                            <td>
                                                <div class="d-flex">

                                                    <a href="{{ route('admin.product-variant-item.index', ['product_id' => $productItem->id, 'variant_id' => $variant->id]) }}"
                                                    class="btn btn-info"><i class="far fa-edit"></i>  Variant Items</a>


                                                    <a href="{{ route('admin.product-variant.edit', ['product_variant' => $variant->id, 'product' => $productItem->id ]) }}"
                                                        class="btn btn-primary ml-2"><i class="far fa-edit"></i></a>




                                                    <a href="{{ route('admin.product-variant.destroy', $variant->id) }}"
                                                        data-id="{{ $variant->id }}"
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
                                                    href="{{ route('admin.product-variant.create', ['product' => $productItem->id]) }}"
                                                    class="btn btn-primary ml-2">Create Variant</a></td>
                                        </tr>
                                    @endforelse
                                </table>
                                {{ $ProductVariant->appends(['product' => $productItem->id])->links() }}
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
                    url:"{{ route('admin.product-variant.change-status') }}",
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