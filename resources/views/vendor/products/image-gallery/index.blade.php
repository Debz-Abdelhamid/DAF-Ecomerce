@extends('vendor.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Image Gallery
@endsection

@section('content')

  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
      @include('vendor.layouts.sidebard')
      

      <div class="row" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <a href="{{ route('vendor.product.index') }}" class="btn btn-success mb-3"><i class="fas fa-arrow-left"></i>&nbsp;@lang('admin.Back')</a>
          <div class="mt-2 dashboard_content mt-md-0">
            <h3><i class="fas fa-images"></i>@lang('admin.Product') : {{ ucfirst($productItem->name)}}</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
               
                
                <form action="{{ route('vendor.product-image-gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group wsus_input">
                        <label>@lang('admin.Image') </label>
                        
                        <input type="file" name="image[]" multiple class="form-control">
                    </div>

                    <input type="hidden" name="product" value="{{$productItem->id}}" data-id="{{$productItem->id}}" class="produit">
                    <br/>
                    <button type="submit" class='btn btn-success'>@lang('admin.Save')</button>
                </form>
               
              </div>
            </div>
          </div>
          
        </div>
      </div>






      <div class="row mt-5" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="mt-2 dashboard_content mt-md-0">
            <h3><i class="fas fa-images"></i>@lang('admin.ProductGallery')</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
               
                
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th>#</th>
                            <th>@lang('admin.ProductImage')</th>
                            <th>@lang('admin.Action')</th>
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
                                    <form id="delete-form-{{ $image->id }}" action="{{ route('vendor.product-image-gallery.destroy', $image->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <div class="d-flex">
                                        <button class="btn btn-danger" type="button" onclick="confirmDelete({{ $image->id }})">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">@lang('vendor.NoImagesavailable')</td>
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
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->

@endsection


@push('scripts')
<script>
    function confirmDelete(imageId) {
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
                
                document.getElementById('delete-form-' + imageId).submit();
                
            }
        });
    }
</script>
@endpush