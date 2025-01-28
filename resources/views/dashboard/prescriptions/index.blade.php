@extends('layout.dashboard')

@section('title')
    prescription
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Prescriptions</li>
    <li class="breadcrumb-item active">index</li>
@endsection

@section('content')
    <!------ Sersh ------->
    <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between m-2">
        @csrf
        <input type="number" name="id" class="form-control mx-2 mt-3 ml-4" placeholder="Appointments ID" value="{{ request('id') }}">
        <input type="text" name="patient_name" class="form-control mx-2 mt-3 ml-4" placeholder="Patient Name" value="{{ request('patient_name') }}">
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
                                <h2 class="ml-lg-2">Prescription Schedule</h2>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>ID_BA</th>
                                <th>Patient_Name</th>
                                <th>Doctor_Notes</th>
                                <th>Diagnosis</th>
                                <th>Medications</th>
                                <th>File</th>
                                <th>Edit</th>
                            </tr>
                        </thead>

                        <tbody class="tbody">
                            @forelse ($prescriptions as $prescription)
                                <tr>
                                    <td>{{ $prescription->booked_appointment->id }}</td>
                                    <td>{{ $prescription->booked_appointment->patient->name }}</td>
                                    <td>{{ $prescription->doctor_notes }}</td>
                                    <td>{{ $prescription->diagnosis }}</td>
                                    <td>{{ $prescription->medications }}</td>
                                    <td><a href="#"><i class="material-icons" style="color: #2b72ff">insert_drive_file</i></a></td>
                                    <td>
                                        <a href="{{ route('prescriptions.edit', $prescription->id) }}" class="edit"
                                            data-toggle="modal">
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
    </style>
@endpush

@push('scripts')
@endpush
