@extends('vendor.layouts.master')


@section('title')
    {{$settings->site_name}} &mdash; Product 
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
          <div class="mt-2 dashboard_content mt-md-0">
            <h3><i class="far fa-user"></i>@lang('admin.CreateProduct')</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
               
                <div class="row">
                    <div class="col-12">
                        <div class="card"  >
                            <div class="card-header"  dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                <h4>@lang('admin.AllProduct')</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('vendor.product.create') }}" class="btn btn-success"><i
                                            class="fas fa-plus"></i>&nbsp;&nbsp;@lang('admin.CreateNew')</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('admin.Image')</th>
                                        <th>@lang('admin.ProductName')</th>
                                        <th>@lang('admin.Price')</th>
                                        <th>@lang('admin.ProductType')</th>           
                                        <th>@lang('admin.Brand')</th>
                                        <th>@lang('admin.Category')</th>
                                        <th>@lang('admin.SubCategory')</th>
                                        <th>@lang('admin.ChildCategory')</th>
                                        <th>@lang('admin.Status')</th>
                                        <th>@lang('admin.Action')</th>
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
                                                        <div class="badge bg-success">
                                                            تقسيط
                                                        </div>
                                                            @break
                                                                                                       
    
                                                        @default
                                                        <div class="badge bg-dark">
                                                            @lang('admin.None')
                                                        </div>
                                                            @break
    
                                                                
                                                    @endswitch
    
                                                </td>
                                                
                                                <td><i class="badge bg-warning">{{ $product->brand->name }}</i></td>
                                                <td><i class="badge bg-dark">{{ $product->category->name }}</i></td>
                                                <td><i class="badge bg-dark">{{ $product->subcategory ? $product->subcategory->name : 'None' }}</i></td>
                                                <td><i class="badge bg-dark">{{ $product->childcategory ? $product->childcategory->name : 'None' }}</i></td>
                                                <td>
                                                    @if($product->status == 1)
                                                        
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input change-status" data-id="{{ $product->id }}" type="checkbox" checked id="flexSwitchCheckDefault">
                                                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                        </div>
                                                    @else
    
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input change-status" data-id="{{ $product->id }}" type="checkbox" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                        </div>
    
                                                    @endif
                                                </td>

                                                <td>
                                                    @if($product->is_approved)
                                                        <i class="badge bg-success">@lang('admin.Approved')</i>
                                                    @else
                                                        <i class="badge bg-warning">@lang('admin.Pending')</i>

                                                    @endif

                                                </td>    
                                                
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('vendor.product.edit', $product) }}"
                                                            class="btn btn-success" style="margin-right:5px;"><i class="far fa-edit"></i></a>
    
    
    
    
                                                            <form id="delete-form-{{ $product->id }}" action="{{ route('vendor.product.destroy', $product->id) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <div class="d-flex">
                                                                <button class="btn btn-danger" type="button" onclick="confirmDelete({{ $product->id }})">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </button>
                                                            </div>
    


                                                        <div class="btn-group dropstart" style="margin-left:5px;">
                                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fas fa-cog"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item has-icon" href="{{ route('vendor.product-image-gallery.index', ['product' => $product->id ]) }}">@lang('admin.ImageGallery') </a></li>
                                                                <li><a class="dropdown-item has-icon" href="{{ route('vendor.product-variant.index', ['product' => $product->id]) }}">@lang('admin.ProductVariants')</a></li>
                                                            </ul>
                                                        </div>
    
                                                    </div>
    
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @empty
                                            <tr>
                                                <td colspan="11" class="text-center">@lang('admin.Noproductsavailable') <a
                                                        href="{{ route('vendor.product.create') }}"
                                                        class="ml-2 btn btn-primary">@lang('admin.CreateProduct')</a></td>
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

            function confirmDelete(product) {
                Swal.fire({
                    title: "@lang('admin.are_you_sure')",
                    text: "@lang('admin.no_revert')",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "@lang('admin.yes_delete')",
                    cancelButtonText: "@lang('admin.cancel')"
                }).then((result) => {
                    if (result.isConfirmed) {
                        
                        document.getElementById('delete-form-' + product).submit();
                        
                    }
                });
            }

        $(document).ready(function(){
      

            $('body').on('click', '.change-status',function(){
                let isChecked = $(this).is(':checked');
                let dataId = $(this).data('id');
                
                $.ajax({
                    method: 'PUT',
                    url:"{{ route('vendor.product.change-status') }}",
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