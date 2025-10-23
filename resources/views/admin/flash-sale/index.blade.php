@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Flash Sale
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>@lang('admin.FlashSale')</h1>

        </div>


        <div class="section-body" style="box-sizing: border-box;">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>@lang('admin.FlashSaleEndDate')</h4>
                         
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.flash-sale.update') }}" method="POST">  
                                @csrf
                                @method('PUT')
                                <div class="" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                <div class="card-header" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    <p>@lang('admin.SaleEndDate')</p>
                            
                                 </div>    
                                    @if($flashSaleDate)
                                        <input type="text" name="sale_end_date" value="{{ @$flashSaleDate->sale_end_date->format('Y-m-d') }}" class="form-control datepicker">
                                    @else
                                        <input type="text" name="sale_end_date" value="{{ old('sale_end_date')}}" class="form-control datepicker">
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-success mt-3">@lang('admin.Save')</button>
                            </form>    
                        </div>

                    </div>
                </div>

            </div>
        </div>



        <div class="section-body" style="box-sizing: border-box;">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                            <h4>@lang('admin.AddFlashSaleProducts')</h4>
                            
                        </div>
                        <div class="card-body" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                            <form action="{{ route('admin.flash-sale.add-product') }}" method="POST" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                @csrf
                                <div class="form-group" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                    
                                    
                                        <select name="product" id="" class="form-control" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                            <option value="" selected disabled>@lang('admin.Select') @lang('admin.AddProduct')</option>
                                            @foreach($products as $id => $name)

                                                <option value="{{ $id }}">{{ $name }}</option>

                                            @endforeach
                                        </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <select name="show" id="" class="form-control" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                                    <option value="">@lang('admin.Select') @lang('admin.Show')</option>
                                                    <option value="1">@lang('admin.oui')</option>
                                                    <option value="0">@lang('admin.non')</option>
                                            
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <select name="status" id="" class="form-control" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                                                    <option value="">@lang('admin.Select') @lang('admin.Status')</option>
                                                    <option value="1">@lang('admin.Active')</option>
                                                    <option value="0">@lang('admin.Inactive')</option>
                                            
                                                </select>
                                        </div>
                                    </div>

                                </div>   

                                <button type="submit" class="btn btn-success mt-3">@lang('admin.Save')</button>
                            </form>       
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="section-body" style="box-sizing: border-box;">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                            <h4>@lang('admin.AllFlashSaleProducts')</h4>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('admin.ProductImage') </th>
                                        <th>@lang('admin.ProductName') </th>
                                        <th>@lang('admin.Price')</th>
                                        <th>@lang('admin.Show')</th>                                               
                                        <th>@lang('admin.FlashSaleStatus')</th>
                                        <th>@lang('admin.Action')</th>
                                    </tr>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse($FlashSellProducts as $FlashSellProduct)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td style="width: 150px; height: 100px; overflow: hidden;">
                                                <img src="{{ asset('storage/' . $FlashSellProduct->productitem->thumb_image) }}" class="img-fluid"
                                                    style="max-width: 100%; max-height: 100%; object-fit: cover;">
                                            </td>
                                            <td><a href="{{ route('admin.product.edit', $FlashSellProduct->productitem) }}">{{ $FlashSellProduct->productitem->name }}</a></td>
                                            
                                            
                                            <td>{{ $FlashSellProduct->productitem->price }}</td>
                                     

                                            <td>
                                                @if($FlashSellProduct->show_at_home == 1)
                                                    
                                                        <label class="custom-switch mt-2">
                                                            <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $FlashSellProduct->id }}" checked class="custom-switch-input show-home">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                @else

                                                    <label class="custom-switch mt-2">
                                                        <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $FlashSellProduct->id }}" class="custom-switch-input show-home">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>

                                                @endif
                                            </td>
                                            
                                            <td>
                                                @if($FlashSellProduct->status == 1)
                                                    
                                                        <label class="custom-switch mt-2">
                                                            <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $FlashSellProduct->id }}" checked class="custom-switch-input change-status">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    @else

                                                    <label class="custom-switch mt-2">
                                                        
                                                        <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $FlashSellProduct->id }}" class="custom-switch-input change-status">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>

                                                @endif
                                            </td>
                                            
                                            <td>
                                                <div class="d-flex">
                                            
                                                        <form id="delete-form-{{ $FlashSellProduct->id }}" action="{{ route('admin.flash-sale.destroy', $FlashSellProduct->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <div class="d-flex ml-3">
                                                            <button class="btn btn-danger" type="button" onclick="confirmDelete({{ $FlashSellProduct->id }})">
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
                                            <td colspan="11" class="text-center">@lang('admin.NoFlashSalesItemavailable') </td>
                                        </tr>
                                    @endforelse
                                </table>
                                {{ $FlashSellProducts->links() }}
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
        
        function confirmDelete(FlashSellProduct) {
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
                        
                        document.getElementById('delete-form-' + FlashSellProduct).submit();
                        
                    }
                });
        }

        $(document).ready(function(){
            $('body').on('click', '.change-status',function(){
                let isChecked = $(this).is(':checked');
                let dataId = $(this).data('id');
                
                $.ajax({
                    method: 'PUT',
                    url:"{{ route('admin.flash-sale.change-status') }}",
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


            //Show At Home

             $('body').on('click', '.show-home',function(){
                let showHome = $(this).is(':checked');                
                let id = $(this).data('id');
                
                $.ajax({
                    method: 'PUT',
                    url:"{{ route('admin.flash-sale.show-home') }}",
                    data: {
                        show: showHome,
                        id: id,
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