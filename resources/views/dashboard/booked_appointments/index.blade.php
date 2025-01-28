@extends('layout.dashboard')

@section('title')
    booked_appointment
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">booked_appointments</li>
    <li class="breadcrumb-item active">index</li>
@endsection

@section('content')
    <!------ Sersh ------->
    <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between m-2">
        @csrf
        <input type="number" name="id" class="form-control mx-2 mt-3 ml-4" placeholder="Appointments ID" value="{{ request('id') }}">
        <input type="text" name="patient_name" class="form-control mx-2 mt-3 ml-4" placeholder="Patient Name" value="{{ request('patient_name') }}">
        <select name="status" id="" class="form-control mx-1 mt-3 ml-4">
            <option value="all">all</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>apending</option>
            <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>confirmed</option>
            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>cancelled</option>
        </select>
        <div class="form-control mx-2 mt-3 ml-4">
        <input type="checkbox" id="day" name="today" class="day" {{ request('today') ? 'checked' : '' }}>
        <label for="day">Today's appointments</label>
        </div>
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
                                <h2 class="ml-lg-2">Booked_appointment Schedule</h2>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Patient_Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Review_Type</th>
                                <th>Notes</th>
                                <th>Status</th>
                                <th>Status_Edit</th>
                            </tr>
                        </thead>

                        <tbody class="tbody">
                            @forelse ($booked_appointments as $booked_appointment)
                                <tr>
                                    <td>{{ $booked_appointment->id }}</td>
                                    <td>{{ $booked_appointment->patient->name }}</td>
                                    <td>{{ $booked_appointment->appointment_date }}</td>
                                    <td>{{ $booked_appointment->appointment_time }}</td>
                                    <td>{{ $booked_appointment->review_type }}</td>
                                    <td><a
                                            href="{{ route('prescriptions.add', $booked_appointment->id) }}">add_prescription</a>
                                    </td>
                                    <td>{{ $booked_appointment->status }}
                                    @if ($booked_appointment->status=='confirmed')
                                         <img class="img_icon" src="{{ asset('img/tick.png') }}">
                                    @elseif ($booked_appointment->status=='cancelled')
                                         <img class="img_icon" src="{{ asset('img/exit.png') }}">
                                    @else
                                    <i class="material-icons" style="margin-left: 25px;color: #df9500">schedule</i>
                                    @endif
                                        </td>
                                    <td>
                                        <a href="{{ route('booked_appointments.edit', $booked_appointment->id) }}"
                                            class="edit" data-toggle="modal">
                                            <i class="material-icons edit" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" style="text-align: center">No Data</td>
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
        .day{
            scale: 1.5;
            margin-right: 10px
        }
    </style>
@endpush

@push('scripts')
@endpush
