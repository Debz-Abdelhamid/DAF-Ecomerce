@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Category
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>@lang('admin.Category')</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4></h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.category.create') }}" class="btn btn-success"><i
                                        class="fas fa-plus"></i>&nbsp;&nbsp;@lang('admin.CreateNew')</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('admin.Icon')</th>
                                        <th>@lang('admin.Name')</th>
                                        <th>@lang('admin.Status')</th>
                                        <th>@lang('admin.Action')</th>
                                    </tr>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse($categories as $category)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td> <i style="font-size:40px;" class="{{ $category->icon }}"></i></td>
                                            <td>{{ $category->name }}</td>
                    
                                            <td>
                                                
                                                    @if($category->status == 1)
                                                    
                                                        <label class="custom-switch mt-2">
                                                            <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $category->id }}" checked class="custom-switch-input change-status">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    @else

                                                    <label class="custom-switch mt-2">
                                                        <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $category->id }}" class="custom-switch-input change-status">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>

                                                    @endif


                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.category.edit', $category->id) }}"
                                                        class="btn btn-success"><i class="far fa-edit"></i></a>



                                                    <a href="{{ route('admin.category.destroy', $category->id) }}"
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
                                            <td colspan="7" class="text-center">@lang('admin.Nocategoriesavailable') <a
                                                    href="{{ route('admin.category.create') }}"
                                                    class="btn btn-success ml-2">@lang('admin.CreateCategory') </a></td>
                                        </tr>

                                    @endforelse
                                </table>
                                {{ $categories->links() }}
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
                    url:"{{ route('admin.category.change-status') }}",
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