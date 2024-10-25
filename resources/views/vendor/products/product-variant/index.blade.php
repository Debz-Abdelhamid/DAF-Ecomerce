@extends('vendor.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Product Variant
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
            <a href="{{ route('vendor.product.index') }}" class="btn btn-warning mb-3"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
          <div class="mt-2 dashboard_content mt-md-0">
            <h3><i class="far fa-user"></i>Product Variant</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4> Product : <span class="text-primary"> {{ ucfirst($productItem->name)}} </span></h4>
                                <div class="card-header-action">
                                    <a href="{{ route('vendor.product-variant.create', ['product' => $productItem->id]) }}" class="btn btn-primary"><i
                                            class="fas fa-plus"></i>&nbsp;&nbsp;Create Variant</a>
                                </div>
                                
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
                                                        
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input change-status" data-id="{{ $variant->id }}" type="checkbox" checked id="flexSwitchCheckDefault">
                                                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                        </div>
                                                    @else
    
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input change-status" data-id="{{ $variant->id }}" type="checkbox" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                        </div>
    
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex">
    
                                                        <a href="{{ route('vendor.product-variant-item.index', ['product_id' => $productItem->id, 'variant_id' => $variant->id]) }}"
                                                        class="btn btn-info text-white btn-space-right"><i class="far fa-edit"></i>  Variant Items</a>
    
    
                                                        <a href="{{ route('vendor.product-variant.edit', ['product_variant' => $variant->id, 'product' => $productItem->id ]) }}"
                                                            class="btn btn-primary btn-space-right"><i class="far fa-edit"></i></a>
    
    

                                                        <form id="delete-form-{{ $variant->id }}" action="{{ route('vendor.product-variant.destroy', $variant->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <div class="d-flex">
                                                            <button class="btn btn-danger" type="button" onclick="confirmDelete({{ $variant->id }})">
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
                                                <td colspan="7" class="text-center">No variant available. <a
                                                        href="{{ route('vendor.product-variant.create', ['product' => $productItem->id]) }}"
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

            function confirmDelete(variant) {
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
                        
                        document.getElementById('delete-form-' + variant).submit();
                        
                    }
                });
            }

        $(document).ready(function(){
      

            $('body').on('click', '.change-status',function(){
                let isChecked = $(this).is(':checked');
                let dataId = $(this).data('id');
                
                $.ajax({
                    method: 'PUT',
                    url:"{{ route('vendor.product-variant.change-status') }}",
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