@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Brand
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Brand</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Brands</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.brand.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i>&nbsp;&nbsp;Create New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Is_featured</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse($brands as $brand)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td style="width: 150px; height: 100px; overflow: hidden;">
                                                <img src="{{ asset('storage/' . $brand->logo) }}" class="img-fluid"
                                                    style="max-width: 100%; max-height: 100%; object-fit: cover;">
                                            </td>
                                            
                                            <td>{{ $brand->name }}</td>

                                            <td>
                                                <div class="badge {{ $brand->is_featured ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $brand->is_featured ? 'Yes' : 'No' }}</div>
                                            </td>

                    
                                            <td>
                                                
                                                    @if($brand->status == 1)
                                                    
                                                        <label class="custom-switch mt-2">
                                                            <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $brand->id }}" checked class="custom-switch-input change-status">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    @else

                                                    <label class="custom-switch mt-2">
                                                        <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $brand->id }}" class="custom-switch-input change-status">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>

                                                    @endif


                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.brand.edit', $brand) }}"
                                                        class="btn btn-primary"><i class="far fa-edit"></i></a>



                                                    <a href="{{ route('admin.brand.destroy', $brand) }}"
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
                                            <td colspan="7" class="text-center">No brands available. <a
                                                    href="{{ route('admin.brand.create') }}"
                                                    class="btn btn-primary ml-2">Create brand</a></td>
                                        </tr>

                                    @endforelse
                                </table>
                                {{ $brands->links() }}
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
                    url:"{{ route('admin.brand.change-status') }}",
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