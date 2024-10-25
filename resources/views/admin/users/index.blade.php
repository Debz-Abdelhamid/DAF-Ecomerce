@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Users
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
                            <h4>All Users</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i>&nbsp;&nbsp;Create New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created at</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ date('Y-m-d',strtotime($user->created_at)) }}</td>
                                            <td>
                                                <div class="badge {{ $user->status == 'active' ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $user->status == 'active' ? 'Active' : 'Inactive' }}</div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                                        class="btn btn-primary"><i class="far fa-edit"></i></a>




                                                    <a href="{{ route('admin.users.destroy', $user->id) }}"
                                                        data-id="{{ $user->id }}"
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
                                            <td colspan="7" class="text-center">No Users available. <a
                                                    href="{{ route('admin.users.create') }}"
                                                    class="ml-2 btn btn-primary">Create User</a></td>
                                        </tr>
                                    @endforelse
                                </table>
                                {{ $users->links() }}
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
