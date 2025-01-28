@extends('layout.dashboard')

@section('title')
    booked_appointment
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('booked_appointments.index') }}">Booked_appointment</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="m-5">

        <!--Errors_any-->
        <x-errors />

        <!--form_create_edit_date-->
        <form action="{{ route('booked_appointments.update', $booked_appointment->id) }}" method="post">
            @csrf
            @method('PUT')

            <x-form.text name="appointment_date" type="date" label="Date of birth"
                value="{{ $booked_appointment->appointment_date }}" />

            <x-form.text name="appointment_time" type="time" label="Date of birth"
                value="{{ $booked_appointment->appointment_time }}" />

            <x-form.select name="review_type" :options="['review', 'first_time']" value="{{ $booked_appointment->status }}" />

            <x-form.select name="status" :options="['pending', 'confirmed', 'cancelled']" value="{{ $booked_appointment->status }}" />

            <button type="submit" class="btn btn-primary btn_add">save edit</button>
        </form>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
