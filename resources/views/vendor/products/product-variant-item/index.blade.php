@extends('vendor.layouts.master')


@section('title')
    {{$settings->site_name}} &mdash; Product Variant Item
@endsection

@section('content')

  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
      @include('vendor.layouts.sidebard')
      

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
            <a href="{{ route('vendor.product-variant.index', ['product' => $product->id]) }}" class="btn btn-success mb-3"><i class="fas fa-arrow-left"></i>&nbsp;@lang('admin.Back')</a>
            
          <div class="mt-2 dashboard_content mt-md-0">
            <h3><i class="far fa-user"></i>@lang('admin.ProductVariantItems')</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                <h4>@lang('admin.Product')  : <span class="text-primary"> {{ ucfirst($product->name) }} </span></h4>
                                <h4>@lang('admin.Variant')  : <span class="text-primary"> {{ ucfirst($variant->name) }} </span></h4>
                                <div class="card-header-action">
                                    <a href="{{ route('vendor.product-variant-item.create', ['product_id' => $product->id ,'variant_id' => $variant->id ]) }}" class="btn btn-success"><i
                                            class="fas fa-plus"></i>&nbsp;&nbsp;@lang('vendor.CreateVariantItem') </a>
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
                                            <th>@lang('admin.Variant')</th>
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
                                                        <i class="badge bg-success">@lang('admin.Default')</i>
                                                    @else
                                                        <i class="badge bg-danger">@lang('admin.non')</i>
    
                                                    @endif
    
                                                </td>
                                                
                                                
                                            
                                                <td>
                                                    @if($variantItem->status == 1)
                                                        
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input change-status" data-id="{{ $variantItem->id }}" type="checkbox" checked id="flexSwitchCheckDefault">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                            </div>
                                                        @else
    
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input change-status" data-id="{{ $variantItem->id }}" type="checkbox" id="flexSwitchCheckDefault">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                            </div>
    
                                                        @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex">
    
            
    
    
                                                        <a href="{{ route('vendor.product-variant-item.edit', $variantItem->id ) }}"
                                                            class="btn btn-success" style="margin-right:5px;"><i class="far fa-edit"></i></a>
    
    
    
    
                                                            <form id="delete-form-{{ $variantItem->id }}" action="{{ route('vendor.product-variant-item.destroy', $variantItem->id) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <div class="d-flex">
                                                                <button class="btn btn-danger" type="button" onclick="confirmDelete({{ $variantItem->id }})">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </button>
                                                            </div>
    
                                                        
    
                                                    </div>
    
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">@lang('admin.Novariantavailable')<a
                                                        href="{{route('vendor.product-variant-item.create', ['product_id' => $product->id ,'variant_id' => $variant->id ])}}"
                                                        class="btn btn-success ml-2">@lang('admin.CreateVariant')</a></td>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->

@endsection


@push('scripts')
    <script>

            function confirmDelete(variantItem) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        
                        document.getElementById('delete-form-' + variantItem).submit();
                        
                    }
                });
            }

        $(document).ready(function(){
      

            $('body').on('click', '.change-status',function(){
                let isChecked = $(this).is(':checked');
                let dataId = $(this).data('id');
                
                $.ajax({
                    method: 'PUT',
                    url:"{{ route('vendor.product-variant-item.change-status') }}",
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