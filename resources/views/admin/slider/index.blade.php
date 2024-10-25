@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Slider
@endsection


@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Sliders</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.slider.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i>&nbsp;&nbsp;Create New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Banner</th>
                                        <th>Type</th>
                                        <th>Title</th>
                                        <th>serial</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse($sliders as $slider)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td style="width: 150px; height: 100px; overflow: hidden;">
                                                <img src="{{ asset('storage/' .$slider->banner) }}" class="img-fluid"
                                                    style="max-width: 100%; max-height: 100%; object-fit: cover;">
                                            </td>
                                            <td>{{ $slider->type }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->serial }}</td>
                                            <td>
                                                <div class="badge {{ $slider->status ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $slider->status ? 'Active' : 'Inactive' }}</div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.slider.edit', $slider->id) }}"
                                                        class="btn btn-primary"><i class="far fa-edit"></i></a>




                                                    <a href="{{ route('admin.slider.destroy', $slider->id) }}"
                                                        data-id="{{ $slider->id }}"
                                                        class="ml-2 btn btn-danger delete-item"><i
                                                            class="far fa-trash-alt"></i></a>

                                                </div>

                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No sliders available. <a
                                                    href="{{ route('admin.slider.create') }}"
                                                    class="ml-2 btn btn-primary">Create Slider</a></td>
                                        </tr>
                                    @endforelse
                                </table>
                                {{ $sliders->links() }}
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
