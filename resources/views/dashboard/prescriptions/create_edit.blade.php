@extends('layout.dashboard')

@section('title')
    prescription
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('prescriptions.index') }}">Prescription</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="m-5">

        <!--Errors_any-->
        <x-errors />

        <!--form_create_edit_date-->
        <form
            action="{{{ isset($prescription) ? route('prescriptions.update', $prescription->id) : route('prescriptions.add_prescription',$id_booked_appointments) }}}" method="post">
            @csrf
            @if (isset($prescription))
                @method('PUT')
            @endif

            <x-form.text name="doctor_notes" type="text" label="Doctor Notes"
                value="{{ isset($prescription) ? $prescription->doctor_notes : '' }}" />

            <x-form.text name="diagnosis" type="text" label="Diagnosis"
                value="{{ isset($prescription) ? $prescription->diagnosis : '' }}" />

            <x-form.text name="medications" type="text" label="Medications"
                value="{{ isset($prescription) ? $prescription->medications : '' }}" />

            <x-form.text name="file" type="file" label=File"
                value="{{ isset($prescription) ? $prescription->file : '' }}" />

            <button type="submit" class="btn btn-primary btn_add">save edit</button>
        </form>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush

