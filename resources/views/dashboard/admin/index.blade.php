@extends('layout.dashboard')

@section('title')
    Admin
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Admin</li>
    <li class="breadcrumb-item active">index</li>
@endsection

@section('content')
    <x-alert type="success" />
    <x-alert type="info" />

    <!------main-content-start----------->
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                <h2 class="ml-lg-2">Patients Schedule</h2>
                            </div>
                            <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                <a href="{{ route('admin.create') }}" class="btn btn-success btn_add" data-toggle="modal">
                                    <i class="material-icons">&#xE147;</i>
                                    <span>Add a Admin</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th colspan="3">Admin_Name</th>
                                <th>Email</th>
                                <th>Icon</th>
                                <th>Edit</th>
                            </tr>
                        </thead>

                        <tbody class="tbody">
                            @forelse ($admins as $admin)
                                <tr>
                                    <td colspan="3">{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td><img class="img_icon" src="{{ asset('img/user1.png') }}"></td>
                                    <td>
                                        <a href="{{ route('admin.edit', $admin->id) }}" class="edit" data-toggle="modal">
                                            <i class="material-icons edit" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection


@push('styles')
    <style>
        .thead {
            background: rgba(134, 134, 134, 0.982);
            color: #fff;
            font-size: 30px;
        }

        .delete {
            border: none;
        }

        .edit {
            color: #eabb00;
        }
        .img_icon{
            width: 30px;
            margin-left: 10px;
            border-radius: 10px
        }
    </style>
@endpush

@push('scripts')
@endpush
