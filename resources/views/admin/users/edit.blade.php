@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; User
@endsection

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Users</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit User</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-primary"><i
                                        class="fas fa-backspace"></i>&nbsp;Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                                </div>

                            

                                

                                
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control form-control-lg">
                                    
                                        <option value="" selected disabled>Select</option>
                                        <option {{ $user->role == 'vendor' ? 'selected' : '' }} value="vendor">Admin</option>
                                    </select>
                                </div>

                                

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control form-control-lg">
                                        <option {{ $user->status == 'active' ? 'selected' : '' }} value="active">Active</option>
                                        <option {{ $user->status == 'inactive' ? 'selected' : '' }} value="inactive">Inactive</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">update</button>
                            </form>

                        </div>

                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
