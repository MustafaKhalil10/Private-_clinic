@extends('layout.dashboard')

@section('title')
    appointments
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">appointments</li>
    <li class="breadcrumb-item active">index</li>
@endsection

@section('content')
    <!------ Sersh ------->
    <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between m-2">
        @csrf
        <input type="date" name="appointment_date" class="form-control mx-2 mt-3 ml-4" value="{{ request('appointment_date') }}">
        <input type="time" name="appointment_time" class="form-control mx-2 mt-3 ml-4" value="{{ request('appointment_time') }}">
        <select name="status" id="" class="form-control mx-2 mt-3 ml-4">
            <option value="all">all</option>
            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>active</option>
            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>inactive</option>
        </select>
        <button type="submit" class="btn btn-primary mx-2 pl-5 pr-5 mr-4 mt-3 ml-4 btn_add">Sersh</button>
    </form>
    <!------ End Sersh ------->

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
                                <h2 class="ml-lg-2">appointments Schedule</h2>
                            </div>
                            <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                <a href="{{ route('appointments.create') }}" class="btn btn-success btn_add"
                                    data-toggle="modal">
                                    <i class="material-icons">&#xE147;</i>
                                    <span>Add a appointments</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Status_Edit</th>
                            </tr>
                        </thead>

                        <tbody class="tbody">
                            @forelse ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->id }}</td>
                                    <td>{{ $appointment->appointment_date }}</td>
                                    <td>{{ $appointment->appointment_time }}</td>
                                    <td>{{ $appointment->status }}</td>
                                    <td>
                                        <a href="{{ route('appointments.edit', $appointment->id) }}" class="edit"
                                            data-toggle="modal">
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
    </style>
@endpush

@push('scripts')
@endpush
