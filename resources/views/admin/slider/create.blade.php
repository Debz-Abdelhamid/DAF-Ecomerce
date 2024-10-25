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
                            <h4>Create Slider</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.slider.index') }}" class="btn btn-primary"><i
                                        class="fas fa-backspace"></i>&nbsp;Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Banner</label>
                                    <input type="file" name="banner" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" name="type" value="{{ old('type') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Starting Price</label>
                                    <input type="text" name="starting_price" value="{{ old('starting_price') }}"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Button URL</label>
                                    <input type="text" name="btn_url" value="{{ old('btn_url') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Serial</label>
                                    <input type="text" name="serial" value="{{ old('serial') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control form-control-lg">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>

                        </div>

                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
