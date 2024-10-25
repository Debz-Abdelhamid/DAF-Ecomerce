@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Child Category
@endsection


@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Child Category</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Child Categories</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.child-category.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i>&nbsp;&nbsp;Create New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse($childcategories as $childcategory)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $childcategory->name }}</td>
                                            <td><i class="badge badge-info">{{ $childcategory->category ? $childcategory->category->name : 'No Category' }}</i></td>
                                            <td><i class="badge badge-info">{{ $childcategory->subCategory ? $childcategory->subCategory->name : 'No SubCategory' }}</i></td>

                                           
                                            <td>
                                                
                                                    @if($childcategory->status == 1)
                                                    
                                                        <label class="custom-switch mt-2">
                                                            <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $childcategory->id }}" checked class="custom-switch-input change-status">
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    @else

                                                    <label class="custom-switch mt-2">
                                                        <input type="checkbox" name="custom-switch-checkbox" data-id="{{ $childcategory->id }}" class="custom-switch-input change-status">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>

                                                    @endif


                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.child-category.edit', $childcategory->id) }}"
                                                        class="btn btn-primary"><i class="far fa-edit"></i></a>



                                                    <a href="{{ route('admin.child-category.destroy', $childcategory->id) }}"
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
                                            <td colspan="7" class="text-center">No child categories available. <a
                                                    href="{{ route('admin.child-category.create') }}"
                                                    class="btn btn-primary ml-2">Create child Category</a></td>
                                        </tr>

                                    @endforelse
                                </table>
                                {{ $childcategories->links() }}
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
                    url:"{{ route('admin.child-category.change-status') }}",
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