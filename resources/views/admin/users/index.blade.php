@extends('admin.layouts.master')

@section('title')
    {{$settings->site_name}} &mdash; Users
@endsection


@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>@lang('admin.Admins')</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>@lang('admin.AllAdmins')</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.users.create') }}" class="btn btn-success"><i
                                        class="fas fa-plus"></i>&nbsp;&nbsp;@lang('admin.CreateNew')</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('admin.Name')</th>
                                        <th>@lang('admin.Email')</th>
                                        <th>@lang('admin.Createdat')</th>
                                        <th>@lang('admin.Status')</th>
                                        <th>@lang('admin.Action')</th>
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
                                                        class="btn btn-success"><i class="far fa-edit"></i></a>




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
                                            <td colspan="7" class="text-center">@lang('admin.NoAdminsavailable') <a
                                                    href="{{ route('admin.users.create') }}"
                                                    class="ml-2 btn btn-primary">@lang('admin.CreateAdmin')</a></td>
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
