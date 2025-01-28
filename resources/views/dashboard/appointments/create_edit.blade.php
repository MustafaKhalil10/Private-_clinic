@extends('layout.dashboard')

@section('title')
    appointments
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('appointments.index') }}">appointments</a></li>
    <li class="breadcrumb-item active">{{ isset($appointment) ? 'Edit' : 'Create' }}</li>
@endsection

@section('content')
    <div class="m-5">

        <!--Errors_any-->
        <x-errors />

        <!--form_create_edit_date-->
        <form
            action="{{ isset($appointment) ? route('appointments.update', $appointment->id) : route('appointments.store') }}"
            method="post">
            @csrf
            @if (isset($appointment))
                @method('PUT')
            @endif

            <x-form.text name="appointment_date" type="date" label="Date of birth"
                value="{{ isset($appointment) ? $appointment->appointment_date : '' }}" />

            <x-form.text name="appointment_time" type="time" label="Date of birth"
                value="{{ isset($appointment) ? $appointment->appointment_time : '' }}" />

            <x-form.select name="status" :options="['active', 'inactive']" value="{{ isset($appointment) ? $appointment->status : '' }}" />

            <button type="submit" class="btn btn-primary btn_add">{{ isset($appointment) ? 'save edit' : 'save' }}</button>
        </form>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
