@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Profile
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">


            <div class="row mt-sm-4">

                <div class="col-12 col-md-12 col-lg-7">

                    <div class="card">
                        <form method="post" action="{{route('admin.profile.updateImage')}}" class="needs-validation"
                            enctype="multipart/form-data" novalidate="">
                            @csrf
                            @method('PATCH')
                            <div class="card-header">
                                <h4>Update Image</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="mb-3">
                                        <img src="{{ $user->image ? asset("storage/".$user->image) : asset('frontend/images/avatar.webp') }}" width="100px" height="100px" class="rounded-circle"  alt="">
                                    </div>

                                    <div class="form-group  col-12">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control" required="">
                                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                    </div>
                                    
                                </div>


                            </div>
                            <div class="text-right card-footer">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>

                   
                    <div class="card">
                        <form method="post" action="{{ route('admin.profile.update') }}" class="needs-validation" novalidate="">
                            @csrf
                            @method('PATCH')
                            <div class="card-header">
                                <h4>Update Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-md-6 col-12">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $user->name) }}" required="">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ old('email', $user->email) }}" required="">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                </div>


                            </div>
                            <div class="text-right card-footer">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>



                    <div class="card">
                        
                        <form method="POST" action="{{ route('admin.profile.updatePassword') }}" class="needs-validation" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Update Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label>Current Password</label>
                                        <input id="update_password_current_password" type="password" name="current_password" class="form-control" required="">
                                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

                                    </div>

                                    <div class="form-group col-12">
                                        <label>New Password</label>
                                        <input id="update_password_password" type="password" name="password" class="form-control" required="">
                                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                    </div>
                        

                                    <div class="form-group col-12">
                                        <label>Confirm Password</label>
                                        <input id="update_password_password_confirmation" type="password" name="password_confirmation" class="form-control" required="">
                                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                    </div>
                                   
                                    
                                </div>


                            </div>
                            <div class="text-right card-footer">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
